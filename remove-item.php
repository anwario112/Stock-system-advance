<?php
session_start();
include 'connection.php';

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user = $_SESSION['logged_user'];

    $sqlUser = "SELECT CustomerID FROM customers WHERE username='$user'";
    $rsUser = mysqli_query($con, $sqlUser);
    $rUser = mysqli_fetch_assoc($rsUser);
    $customer_id = $rUser['CustomerID'];

    // Remove item from cart
    $sqlRemove = "DELETE FROM cart WHERE customer_id='$customer_id' AND product_id='$product_id'";
    if (mysqli_query($con, $sqlRemove)) {
       
        if (isset($_SESSION['num_items']) && $_SESSION['num_items'] > 0) {
            $_SESSION['num_items']--; 
        }
        // Prepare the response
        $response = array(
            'success' => true,
            'numItems' => $_SESSION['num_items'] 
        );
        echo json_encode($response);
    } else {
        
        $response = array(
            'success' => false,
            'message' => 'Failed to remove item from cart'
        );
        echo json_encode($response);
    }
} else {
   
    $response = array(
        'success' => false,
        'message' => 'Product ID not provided'
    );
    echo json_encode($response);
}
?>