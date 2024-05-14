<?php
session_start();
include 'connection.php';

if(isset($_POST['CustomerID']) && isset($_POST['address'])){
    $customerID = $_POST['CustomerID'];
    $address = $_POST['address'];
    
    
    
    $sql = "INSERT INTO address (CustomerID, AddressDetail) VALUES ('$customerID', '$address')";
    if(mysqli_query($con,$sql)){
        $response=array("success"=>true,"message"=>"Address has been inserted successfully");
    }else{
        $response=array("success"=>false,"message"=>"Try to insert the address again");
    }
    echo json_encode($response);
} else {
    $response['success'] = false;
    echo json_encode($response);
}
?>