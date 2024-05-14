<?php
include 'connection.php';
session_start();

if(isset($_POST['import'])){

    
    $fileName = $_FILES['excel']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $fileExtension = strtolower($fileExtension);

    if($fileExtension !== 'xlsx' && $fileExtension !== 'xls') {
        $_SESSION['errors'][] = "Invalid file format. Only Excel files (XLSX/XLS) are allowed.";
        header("Location: importExcel.php");
        exit;
    }

    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
    $targetDirectory = "uploads/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $Reader = new SpreadsheetReader($targetDirectory);
    $errors = [];
    $skipFirstRow=true;
    foreach($Reader as $key => $row){

        if($skipFirstRow){
            $skipFirstRow=false;
            continue;
        }
        $ProductDes = mysqli_real_escape_string($con, $row[0]);
        $Quantity = mysqli_real_escape_string($con, $row[1]);
        $Price = mysqli_real_escape_string($con, $row[2]);
        $NbInStock = mysqli_real_escape_string($con, $row[3]);
        $ProductID = mysqli_real_escape_string($con, $_POST['ProductNB']);
    
        if(empty($ProductDes) || empty($Quantity) || empty($Price) || empty($NbInStock)){
            $errors[] = "Missing data in one or more fields";
            continue;
        }
    
        if(!is_numeric($Quantity) || !is_numeric($Price) || !is_numeric($NbInStock)){
            $errors[] = "Invalid data type in one or more fields";
            continue;
        }
    
        $existingProduct = mysqli_query($con, "SELECT * FROM product WHERE ProductNB = '$ProductID'");

        if(mysqli_num_rows($existingProduct) > 0){
            // Update the existing record
            $updateQuery = "UPDATE product SET ProductDes = '$ProductDes', Quantity = '$Quantity', Price = '$Price', NbInStock = '$NbInStock' WHERE ProductNB = '$ProductID'";
        
            if(mysqli_query($con, $updateQuery)){
                
            } else {
                $errors[] = "Error updating record: " . mysqli_error($con);
            }
        } else {
            $insertQuery = "INSERT INTO product (ProductDes, Quantity, Price, NbInStock) VALUES (, '$ProductDes', '$Quantity', '$Price', '$NbInStock')";
            if(mysqli_query($con, $insertQuery)){
                
            } else {
                $errors[] = "Error inserting record: " . mysqli_error($con);
            }
        }
    }
    
    $_SESSION['errors'] = $errors;
    header("Location: importExcel.php");
    exit;
}
?>