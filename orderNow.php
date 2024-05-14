<?php

require 'vendor/autoload.php';
require 'connection.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['orderDetails'])) {
    $orderDetails = $_POST['orderDetails'];
           foreach($orderDetails as $order){
            $productID=$order['productID'];
            $price=$order['price'];
            $quantity=$order['quantity'];
            $totAmount=$price*$quantit;

            $insert="SELECT INTO order_details(ProductrID,UnitPrice,Quantity)VALUES('$productID','$price','$quantity')";
           }
           if(mysqli_query($conn,$insert)){
            $response=array("success"=>true,"message"=>"Order has been inserted successfully");
           }else{
            $response=array("success"=>false,"message"=>"Order Again");
           }

        if (isset($_SESSION['logged_user'])) {
            $user = $_SESSION['logged_user'];
            $stmt = $conn->prepare("SELECT Email FROM customers WHERE username = $user");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userEmail = $row['Email'];

                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anwarioanan@gmail.com';
                $mail->Password = 'abxx dpij xowb mfas';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = $config['smtp_port'];
                $mail->setFrom('anwarioanan@gmail.com', 'anwar');
                $mail->addAddress($userEmail);
                $mail->isHTML(true);
                $mail->Subject = "Order Confirmation";

                $receiptHtml = '';
                $receiptHtml .= '<h2>Order Receipt</h2>';
                $receiptHtml .= '<table>';
                $receiptHtml .= '<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';

                foreach ($orderItems as $item) {
                    $receiptHtml .= '<tr>';
                    $receiptHtml .= '<td><img src="' . $item['product_cover'] . '" width="50"> </td>';
                    $receiptHtml .= '<td>$' . number_format($item['price'], 2) . '</td>';
                    $receiptHtml .= '<td>' . $item['quantity'] . '</td>';
                    $receiptHtml .= '<td>$' . number_format($item['total_amount'], 2) . '</td>';
                    $receiptHtml .= '</tr>';
                }

                $receiptHtml .= '<tr><td colspan="3" style="text-align: right;">Total:</td><td>$' . number_format($totalAmount, 2) . '</td></tr>';
                $receiptHtml .= '</table>';

                $mail->Body = $receiptHtml;
                $mail->send();
            } else {
                throw new Exception("User email not found in the database.");
            }
        } else {
            throw new Exception("User not logged in.");
        }

        $conn->commit();
        echo json_encode(['success' => true, 'message' => 'Order placed successfully. Email sent to customer.']);
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No order details received']);
}

?>