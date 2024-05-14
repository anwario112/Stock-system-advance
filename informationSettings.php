<?php  
session_start();
include 'connection.php';

if(!isset($_SESSION['logged_user'])){
    header('location:customer_login.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .Subnav {
            position: fixed;
            top: 0;
            left: 170px;
            right: 170px;
            height: 30px;
            background-color: rgb(50, 205, 50);
            border-bottom-right-radius: 30px;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .nav h2 {
            position: relative;
            right:160px;
            top: 40px;
            color: rgb(50, 205, 50);
            font-size: 25px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            display: flex;
            justify-content: flex-start;
        }

        .nav {
            position: relative;
            width: 100%;
            height: 80px;
        }

        .nav ul {
            position: relative;
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: right;
            bottom: 45px;
            margin-right: 200px;
            top:1PX;
        }

        .nav ul li {
            display: inline;
            margin-right: 50px;
        }

        .nav ul li a {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .nav ul li a:hover {
            color: rgb(0, 153, 0);
           
        }
        .title h5{
                position: relative;
                z-index: 1;
                left:380px;
                color: rgb(254,254,51);
                top:3px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

             }
             .trolley{
                position: relative;
                width:30px;
                height:30px;
                left:500px;
                bottom: 35px;
             }

       .info-container{
        position: relative;
        width:1000px;
        height:450px;
        box-shadow: 2px 2px 4px black;
        border-radius: 5px; 
       }
       .company-container{
        position: relative;
        left:70px;
        top:40px;
       }
       .info-container label{
        font-weight: bold ;

       }
       .CompanyName{
             position: relative;
             border-radius: 2px;
             height:40px;
             width:300px;
             background-color: rgb(249,249,249);
             border: none;
       }

       .contact-container{
        position: relative;
        top:20px;
       }
       .ContactTitle{
       
        position: relative;
             border-radius: 2px;
             height:40px;
             width:300px;
             background-color: rgb(249,249,249);
             border: none;

       }
       .contactName-container{
        position: relative;
        top:40px;
       }
       .ContactName{
          
        position: relative;
             border-radius: 2px;
             height:40px;
             width:300px;
             background-color: rgb(249,249,249);
             border: none;
       }
       .email-container{
        position: relative;
        left:400px;
        bottom: 218px;
       }
       .Email{
        position: relative;
             border-radius: 2px;
             height:40px;
             width:300px;
             background-color: rgb(249,249,249);
             border: none;
       }
       .phone-container{
        position: relative;
        left:400px;
        bottom: 218px;
       }
       .Phone{
        position: relative;
             border-radius: 2px;
             height:40px;
             width:300px;
             background-color: rgb(249,249,249);
             border: none;

       }
       .btns{
        position: relative;
        left:440px;
        bottom: 180px;
        background-color: rgb(42,128,0);
        padding:10px 10px;
        border: none;
        width:200px;
        border-radius: 5px;
       }
       

    </style>
    <?php
    
    include 'connection.php';
     
    $user = $_SESSION['logged_user'];
    $sqlUser = "SELECT * FROM customers WHERE username='$user'";
    $rsUser = mysqli_query($con, $sqlUser);
    $rUser = mysqli_fetch_assoc($rsUser);
    
    ?>
    
</head>
<body>
<div class="container">
    <div class="nav">
        <div CLASS="title">
            <h5>SALE 40% OF ON BULK SHOPPING</h5>
        </div>
        <div class="Subnav">
        
        </div>
        <div>
            <h2>Fruitable</h2>
                            <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="shopDetail.php">Shop Detail</a></li>
                    <li><a href="#">Contact</a></li>
                    <li class="dropdown">
                        <div class="btn-group">
                            <button class=" btn btn-secondary dropdown-toggle" class="btns" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Account
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Privacy</a>
                                <a class="dropdown-item" href="#">information Settings</a>
                                <a href="customer_logout.php" class="logout">logout</a>
                                
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="view_cart.php"><img src="images/th-removebg-preview.png" class="trolley" alt=""></a>
            </div>
            
            <!--info-->
            <div class="info-container">
                <form action="editInfo.php" method="POST">
                        <div class="company-container">
                                <label for="CompanyName">Company Name</label>
                                <br>
                                <input type="text" name="CompanyName" class="CompanyName" value="<?php echo $rUser['CompanyName'];?>">
                                <div class="contact-container">
                                    <label for="ContactTitle">Contact Title</label>
                                    <br>
                                    <input type="text" name="ContactTitle" class="ContactTitle" value="<?php echo $rUser['ContactTitle'];?>">
                                </div>
                                <div class="contactName-container">
                                    <label for="ContactName">Contact Name</label>
                                    <br>
                                    <input type="text" name="ContactName" class="ContactName" value="<?php echo $rUser['ContactName'];?>">
                                </div>
                                <div class="email-container">
                                    <label for="Email">Email</label>
                                    <br>
                                    <input type="text" name="Email" class="Email" value="<?php echo $rUser['Email'];?>">
                                </div>
                                <div class="phone-container">
                                    <label for="Phone">Phone</label>
                                    <br>
                                    <input type="text" name="Phone" class="Phone" value="<?php echo $rUser['Phone'];?>">
                                </div>
                                <div>
                                <button type="submit" class="btns">Edit</button>
                                </div>
                        </div>
                 </form>
            </div>


   
</div>
</body>
<script>

</script>

</html>
