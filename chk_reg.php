<?php
include 'connection.php';
include 'password_policy.php';
include 'encrypt.php';
session_start();

$user    = mysqli_real_escape_string($con, $_POST['user']);
$pass    = mysqli_real_escape_string($con, $_POST['pass']);
$company = mysqli_real_escape_string($con, $_POST['company']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$title   = mysqli_real_escape_string($con, $_POST['title']);
$city    = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$phone   = mysqli_real_escape_string($con, $_POST['phone']);
$Email   = mysqli_real_escape_string($con, $_POST['Email']);


$_SESSION['user']    = $user;
$_SESSION['company'] = $company;
$_SESSION['contact'] = $contact;
$_SESSION['title']   = $title;
$_SESSION['city']    = $city;
$_SESSION['address'] = $address;
$_SESSION['phone']   = $phone;
$_SESSION['Email']   = $Email;

if (empty($user)) {
    $_SESSION['msg'] = "Enter username";
} elseif (empty($pass)) {
    $_SESSION['msg'] = "Enter password";
} elseif (strlen($pass) < 6) {
    $_SESSION['msg'] = "Password should be more than 6 characters";
} elseif (!chkPass($pass)) {
    $_SESSION['msg'] = "Password should contain at least one capital letter, one small letter, one symbol, and one digit"; 
} elseif (empty($Email)) {
    $_SESSION['msg'] = "Enter your Email";
} elseif (empty($contact)) {
    $_SESSION['msg'] = "Enter contact Name";
} elseif (empty($title)) {
    $_SESSION['msg'] = "Enter Contact title";
} elseif ($city == '0') {
    $_SESSION['msg'] = "Select city";
} elseif (empty($address)) {
    $_SESSION['msg'] = "Enter Address";
} elseif (empty($phone)) {
    $_SESSION['msg'] = "Enter phone number";
} else {
   
    $pass = encrypt($pass);

    // Insert customer record
    $insert = "INSERT INTO customers (CustomerID, username, password, Email, CompanyName, ContactName, ContactTitle, CityID, Phone) 
               VALUES ('$user', '$user', '$pass', '$Email', '$company', '$contact', '$title', '$city', '$phone')";
    if (mysqli_query($con, $insert)) {
        // Insert address record
        $insertAddress = "INSERT INTO address (CustomerID, AddressDetail) VALUES ('$user', '$address')";
        if (mysqli_query($con, $insertAddress)) {
            
            header('location: home.php');
            die();
        } else {
            $_SESSION['msg'] = "Error: " . mysqli_error($con);
        }
    } else {
        $_SESSION['msg'] = "Error: " . mysqli_error($con); 
    }
}

header('location: reg.php');
?>
