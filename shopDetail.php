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

        @import url('https://fonts.googleapis.com/css?family=Assistant');


.cell-1 {
  border-collapse: separate;
  border-spacing: 0 4em;
  background: #fff;
  border-bottom: 5px solid transparent;
  /*background-color: gold;*/
  background-clip: padding-box;
}

thead {
  background: #dddcdc;
}

.toggle-btn {
  width: 40px;
  height: 21px;
  background: grey;
  border-radius: 50px;
  padding: 3px;
  cursor: pointer;
  -webkit-transition: all 0.3s 0.1s ease-in-out;
  -moz-transition: all 0.3s 0.1s ease-in-out;
  -o-transition: all 0.3s 0.1s ease-in-out;
  transition: all 0.3s 0.1s ease-in-out;
}

.toggle-btn > .inner-circle {
  width: 15px;
  height: 15px;
  background: #fff;
  border-radius: 50%;
  -webkit-transition: all 0.3s 0.1s ease-in-out;
  -moz-transition: all 0.3s 0.1s ease-in-out;
  -o-transition: all 0.3s 0.1s ease-in-out;
  transition: all 0.3s 0.1s ease-in-out;
}

.toggle-btn.active {
  background: blue !important;
}

.toggle-btn.active > .inner-circle {
  margin-left: 19px;
}


       

    </style>
    <?php
     include 'connection.php';
     
     $user = $_SESSION['logged_user'];
     $sqlUser = "SELECT * FROM customers WHERE username='$user'";
     $rsUser = mysqli_query($con, $sqlUser);
     $rUser = mysqli_fetch_assoc($rsUser);
     
     $sqlcart = "SELECT ProductName, order_details.UnitPrice * order_details.Quantity AS tot, order_details.OrderID, orders.OrderDate 
     FROM products 
     INNER JOIN order_details ON order_details.ProductID = products.ProductID 
     INNER JOIN orders ON orders.OrderID = order_details.OrderID 
     WHERE CustomerID = '" . $rUser['CustomerID'] . "'";
     $fetch=mysqli_query($con,$sqlcart);

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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop Detail</a></li>
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
            

            <div class="container-fluid mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="toggle-btn">
                                        <div class="inner-circle"></div>
                                    </div>
                                </th>
                                <th>Order </th>
                                <th>ProductName</th>
                                <th>status</th>
                                <th>Total</th>
                                <th>Created</th>
                                
                            </tr>
                        </thead>
                        <tbody class="table-body">
                        <?php foreach($fetch as $order){?>
                            <tr class="cell-1">
                                    <td class="text-center">
                                        <div class="toggle-btn">
                                            <div class="inner-circle"></div>
                                        </div>
                                    </td>
                                    <td><?php echo $order['OrderID'];?></td>
                                    <td><?php echo $order['ProductName'];?></td>
                                    <td><span class="badge badge-success">Fullfilled</span></td>
                                    <td><?php echo $order['tot'];?></td>
                                    <td><?php echo date('d/m/y',strtotime($order['OrderDate']));?></td>
                                    
                                <?php }?>
                            </tr>
                            
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
</body>
<script>
    $(document).ready(function(){

$('.toggle-btn').click(function() {
$(this).toggleClass('active').siblings().removeClass('active');
});

});
</script>
</html>
