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
     
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>






  

    
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

         .imgs{
            position: absolute;
            right: 0;
            top: 80px;
            width: 100%;
            height: 450px;
            opacity: 0.5;
            filter: brightness(100%);
        }

        .pics {
            position: relative;
            width: 88%;
            height: 140px;
            top: 450px;
            left: 70px;
            background-color: rgb(237, 237, 237);
            border: 2px solid black;
        }

        .right {
            position: relative;
            top: 550px;
            left: 1120px;
            width: 40px;
            z-index: 1;
        }

        .left {
            position: relative;
            top: 550px;
            width: 40px;
            z-index: 1;
        }

        .horizantal-scroll {
            width: 100%;
            height: 200px;
            background-color: white;
            border-radius: 5px;
           
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
            transition: 1s;
            margin-top: 300px;
        }

        .storys-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            position: absolute;
            left: 0;
            flex-direction: row;
            transition: 0.5s all ease-out;
        }

        .storys-circle {
            width:120px;
            height: 120px;
            margin: 80px ;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            transform: rotateZ(45deg);
        }

        .storys-circle img {
            width: 200px;
            height: 200px;
            border: 2px solid white;
            transform: rotateZ(45deg);
        }

        .horizantal-scroll .btn-scroll {
            background-color: lightgray;
            color: white;
            padding: 5px 8px;
            border: 0px;
            border-radius: 50%;
            margin: 0px 5px;
            z-index: 1;
            cursor: pointer;
        }
        .sideNav{
            position: relative;
            width:250px;
            height:100%;
            background-color: rgb(237,237,237);
            right:400px;
            top:20px;
            border-radius: 5px;
        }

        div.sideNav ul{
            position: relative;
            list-style: none; 
            padding:0;
            margin-left:60px;
           
        }
        div.sideNav ul li a {
            position: relative;
            text-decoration: none;
            padding:15px 19px;
            font-size: 18px;
            display:block;
            color:black;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        div.sideNav ul li a:hover{
            background-color: rgb(50, 205, 50);
            border-radius: 3px;
            
        }
        
        .products {
            position: relative;
             width: 60%;
             left:90px;
             bottom: 840px;
            background-color: white;
            overflow: hidden;
             }
             .productinfo{
                background-color: rgb(50, 205, 50);
                border: none;

             }
             .Name{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

             }
             .intro,h6{
                position: relative;
                right:240px;
             }
             h6{
                color: rgb(186,186,186);
             }
             .title h5{
                position: relative;
                z-index: 1;
                left:380px;
                color: rgb(254,254,51);
                top:3px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

             }
             .btns{
                position: relative;
                background-color: #fff;
                color:black;
                border: none;
             }
             .trolley{
                position: relative;
                width:30px;
                height:30px;
                left:500px;
                bottom: 35px;
             }
              .market{
                position: relative;
                right:300px;
                top:40px;
              }
              .span1{
                position: relative;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color:rgb(50, 205, 50);
                font-size: 19px;
                letter-spacing: 1px;
              }
              .span2{
                position: relative;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color:white;
              }
              .span3,.span4{
                  position: relative;
                  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                  left:5px;
                  color:white;
              }
              .search{
                position: relative;
                top:30px;
                border: none;
                padding: 15px 15px;
                border-radius: 30px;
                width:400px;
              }
              .fresh{
                position: relative;
                color:white;
              }
              .search-btn{
                position: relative;
                background-color: white;
                padding: 15px 15px;
                border: none;
                right:84px;
                top:29px;
                width:80px;
                border-radius: 30px;
                outline: none;
                
              }
              .search-btn img{
                position: relative;
                width:20px;
                height:20px;
                
                
              }

       

    </style>
    <?php

      
      include 'connection.php';
      include 'auth_login.php';

       //fetching categories
      $sqlcategories="SELECT * FROM  categories ";
      $rscategories=mysqli_query($con,$sqlcategories);


      if(isset($_GET['catID']))
           $catID=$_GET['catID'];
        else
        $catID=1;  


      //fetching products
      $sqlproducts="SELECT ProductID,ProductName,UnitPrice,product_cover FROM products where CategoryID='$catID'";
      $rsproducts=mysqli_query($con,$sqlproducts);


      //fetch customers
      $usersql="SELECT * from customers where username='" . $_SESSION['logged_user'] .  "'";
      $ruser=mysqli_query($con,$usersql);
      $userfetch=mysqli_fetch_assoc($ruser);

      //fetch items
      $sql="SELECT product_cover FROM products";
      $items=mysqli_query($con,$sql);

  
   ?> 
    
    <title>Welcome <?php echo $userfetch['ContactName']; ?></title>
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
                                <a href="customer_logout.php" class="dropdown-item">logout</a>
                                
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="view_cart.php"><img src="images/th-removebg-preview.png" class="trolley" alt=""></a>
            </div>
            

       
    </div>

    <div class="img">
        <img src="images/pexels-markus-winkler-1430818-19802110.jpg" class="imgs" alt="">
        <div class="market">
            <span class="span1">Special Price</span>
            <h1 class="fresh">Freshness</h1>
             <h1 class="span2">in every bite</h1>
             <h6 class="span3">We offer the best and the healthest products on the market</h6>
             <h6 class="span4">Try our products for your own benefit</h6>
             <input type="search" placeholder="Search for you own health" class="search">
             <button class="search-btn" value="submit"><img src="images/search-removebg-preview.png" alt=""></button>
        </div>

    </div>

    <div class="horizantal-scroll">
        <button class="btn-scroll" id="btn-scroll-left" onclick="scrollHorizontally(1)"><i class="fas fa-chevron-left"></i></button>
        <button class="btn-scroll" id="btn-scroll-right" onclick="scrollHorizontally(-1)"><i class="fas fa-chevron-right"></i></button>
        <div class="storys-container">
            <?php  foreach($items as $product){?>
                <?php if ($product['product_cover'] == "") { ?>
                        <div class="storys-circle"><img src="public/products/images/product.png" alt="" style="width: 100%; height: auto;"></div>
                    <?php } else { ?>
                        <div class="storys-circle"> <img src="public/products/images/<?php echo $product['product_cover']; ?>" alt="" style="width: 100%; height: auto; top: 60px;"></div>
                    <?php } ?>
             <?php }?>
        </div>
    </div>
       <div class="subText">
        <h2 class="intro">It's Your Day to Get Your Items </h2>
         <h6>Hurry up And Order Now For special Prices</h6>

       </div>
    <div class="sideNav">
            <ul>
                
                  <?php foreach($rscategories as $rscategory ){?>
                   <li><a href="home.php?catID=<?php echo $rscategory['CategoryID']?>" ><?php echo $rscategory['CategoryName'];?></a></li>
                   <?php } ?>
            </ul>
    </div>
    <div class="products">
    <?php $counter = 0; ?>
    <div class="row">
        <?php foreach ($rsproducts as $key => $product) { ?>
            <div class="col-md-4" style="width: 33.33%;">
                <div class="card">
                    <?php if ($product['product_cover'] == "") { ?>
                        <img src="public/products/images/product.png" alt="" style="width: 100%; height: auto;">
                    <?php } else { ?>
                        <img src="public/products/images/<?php echo $product['product_cover']; ?>" alt="" style="width: 100%; height: auto; top: 60px;">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class=" Name card-title"><?php echo $product['ProductName']; ?></h5>
                        <h5 class="card-title"><?php echo number_format($product['UnitPrice'],2); ?>$</h5>
                        <button type="button" class="productinfo btn btn-primary" data-bs-toggle="modal" data-bs-target="#product_detail" data-id="<?php echo $product['ProductID'];?>">
                            Learn more
                        </button>
                    </div>
                </div>
            </div>

            <?php
            $counter++;
            if (($key + 1) % 3 == 0 && ($key + 1) != count($product)) {
                echo '</div><div class="row">';
            }
            ?>
        <?php } ?>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="product_detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog custom-modal" style="max-width: 600px; max-height: 100px;" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Product Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

</div>

<script>
    let currentScrollPosition = 0;
    let ScrollAmount = 320;
    const sCont = document.querySelector(".storys-container");
    const hScroll = document.querySelector(".horizantal-scroll");
    const btnScrollLeft = document.querySelector("#btn-scroll-left");
    const btnScrollRight = document.querySelector("#btn-scroll-right");

    btnScrollLeft.style.opacity = "0";

    let maxScroll = -sCont.offsetWidth + hScroll.offsetWidth;

    function scrollHorizontally(val) {
        currentScrollPosition += val * ScrollAmount;

        if (currentScrollPosition >= 0) {
            currentScrollPosition = 0;
            btnScrollLeft.style.opacity = "0";
        } else {
            btnScrollLeft.style.opacity = "1";
        }

        if (currentScrollPosition <= maxScroll) {
            currentScrollPosition = maxScroll;
            btnScrollRight.style.opacity = "0";
        } else {
            btnScrollRight.style.opacity = "1";
        }
        sCont.style.left = currentScrollPosition + "px";
    }
</script>
<script>
    
 $(document).ready(function() {
    $('.productinfo').click(function(e) {
        e.preventDefault();
        var productID = $(this).data('id');
      

        // Make an AJAX request to get product details
        $.ajax({
            method: 'post',
            url: 'homeprocess.php',
            data: { productID: productID },
            dataType: 'html',
            success: function(data) {
                if (data.error) {
                 
                    console.error(data.error);
                } else {
                    
                   
                    $('#product_detail .modal-body').html(data);
                 

                    // Open the modal
                    $('#product_detail').modal('show');
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});
</script>

</body>
</html>
