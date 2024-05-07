<?php

require 'vendor/autoload.php';
require 'connection.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['orderDetails'])) {
    // Retrieve the order details array
    $orderDetails = $_POST['orderDetails'];

    $stmt = $con->prepare("INSERT INTO order_details (ProductID, Quantity, UnitPrice) VALUES (?, ?, ?)");

    if (!$stmt) {
        echo json_encode(['success' => false, 'error' => 'Failed to prepare SQL statement']);
        exit;
    }

    
    foreach ($orderDetails as $order) {
        $productID = $order['productID'];
        $quantity = $order['quantity'];
        $unitPrice = $order['price'];

        $stmt->bind_param("iii", $productID, $quantity, $unitPrice);
        if (!$stmt->execute()) {
            echo json_encode(['success' => false, 'error' => 'Failed to insert order into database']);
            exit;
        }
    }

  
    $stmt->close();

    if (isset($_SESSION['logged_user'])) {
        $user = $_SESSION['logged_user'];
        $sql = "SELECT Email FROM customers WHERE username=?";
        $stmt = $con->prepare($sql);
       

        if (!$stmt) {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare SQL statement']);
            exit;
        }

        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userEmail = $row['Email'];

            try {
                // Send Email
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'anwarioanan@gmail.com';
                $mail->Password = 'abxx dpij xowb mfas';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom('anwarioanan@gmail.com', 'anwar');
                $mail->addAddress($userEmail);
                $mail->isHTML(true);
                $mail->Subject = "Order Confirmation";
               
                $mail->Body = '<body>
                <h4>Your Order has been Add successfully</h4>


                </body>';


                $mail->send();
                echo json_encode(['success' => true, 'message' => 'Order placed successfully. Email sent to customer.']);
            } catch (Exception $e) {
                echo json_encode(['success' => false, 'error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'User email not found in the database.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'User not logged in.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'No order details received']);
}

?>