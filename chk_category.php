<?php
 session_start();
 include 'connection.php';
if($_SERVER['REQUEST_METHOD']=="POST"){

    $categoryName=$_POST['categoryName'];
    $description=$_POST['CategoryDescription'];

    $sqlcategory="INSERT INTO categories(categoryName,description)VALUES('$categoryName','$description')";
      

    if(mysqli_query($conn ,$sqlcategory)){
        $_SESSION['msg']="Has been inserted successfully";
        header('location:addcategory.php');
    }else{
        $_SESSION['msg']="failed to insert";
    }
}


?>