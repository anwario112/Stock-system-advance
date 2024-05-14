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

 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>



<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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


             .cart-order {
                    position: relative;
                    box-shadow: 2px 2px 4px black;
                    width: 100%;
                    height: 700px;
                    left:4px;
                    background: linear-gradient(to right, #fff 70%, #f0f0f0 70%);
                    overflow: hidden;
                }
                .title-cart{
                    position: relative;
                    left:80px;
                    top:60px;
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    font-weight: bold;
                }
                .nb-items{
                    position: absolute;
                    left:500px;
                    top:60px;
                    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                    font-weight: bold;
                }
                .line{
                    position: absolute;
                    width:530px;
                    left:90px;
                    top:100px;
                    background-color: lightgray;
                  
                }
        .table {
            position: absolute;
            width: 70%;
            top:140px;
            border-collapse:unset;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            margin:0;
            padding:0;
        }
        .remove-item {
           
            cursor: pointer;
            color: red;
        }

        .summary{
            position: relative;
            left:800px;
            top:15px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }
        hr{
            position: relative;
            width:300px;
            left:800px;
            top:25px;

        }
        .summary-item{
            position: relative;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
            left:800px;
            top:43px;
            font-size: 19px; 
        }
        .total{
            position: relative;
            left:1000px;
            top:10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }
        .address-detail{
            position: relative;
            left:790px;
            top:60px;
            font-size: 16px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .username{
            position: relative;
            left:7px;
            color: lightslategray;
        }
        .address{
            position: relative;
            left:910px;
            top:50px;
            font-size: 15px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:lightslategray;
            word-wrap:break-word;
        }
        .change-address{
            position: relative;
            left:720px;
            top:90px;
            color:rgb(50, 205, 50);
            text-decoration: underline;
            border: none;
            
        }
        .modal-title{
            position: relative;
            font-size: 17px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:green;
        }
        .btn{
            background-color:green;
        }
        .CustomerName{
            font-weight: bold;
        }
        .address-title{
            font-size: 14px;
        }
        .address-container {
        margin-bottom: 5px;
        border-radius: 5px;
        width: 500px;
        padding: 10px 15px;
    }
    .address-container:hover {
        background-color: #f0f8f0; 
    }
    .edit{
        position: relative;
        color:rgb(50,205,50);
        
        background-color: transparent;
        border: none;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-style: oblique;
     
    }
    .new-address{
        position: relative;
        font-size: 10px;
    }
    .city ,.name,.phone{
        font-weight: bold;
    }
    .form{
        position: relative;
        top:20px;
    }
    .city{
        position: relative;
        width:500px;
        height:25px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .name{
        position: relative;
        top: 15px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .Name{
       position: relative;
       width:500px;
       top:10px;
    }
    .phone{
        position: relative;
        top:20px;
    }
    .modal-content{
        position: relative;
        height:590px;
    }
    .addressz{
        position: relative;
        top:25px;
        font-weight: bold;
    }
    .addresses{
        position: relative;
        top:20px;
    }
    .OrderNow{
        position: relative;
        z-index: 1;
        left: 800px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        top:100px;
        background-color:rgb(50, 205, 50) ;
        border: none;
        color: white;
        padding:10px 10px;
        width:300px;
    }
    
    


 
             


       

    </style>
     <?php 
            include 'connection.php';
         
            
            if (!isset($_SESSION['logged_user'])) {
                header('location:customer_login.php');
                die();
            }
            
            $user = $_SESSION['logged_user'];
            $sqlUser = "SELECT CustomerID,Phone,customers.CityID,cities.name,username FROM customers 
            INNER JOIN cities on cities.CityID=customers.CityID
            WHERE username='$user'";
            $rsUser = mysqli_query($con, $sqlUser);
            $rUser = mysqli_fetch_assoc($rsUser);
          
            
            $sqlcart = "SELECT ProductName, product_cover, UnitPrice, qty, UnitPrice*qty as tot, ProductID FROM products
            INNER JOIN cart ON cart.product_id = products.ProductID
            WHERE customer_id='" . $rUser['CustomerID'] ."'";
            
            $rscart = mysqli_query($con, $sqlcart);
            $total = 0;
            $numItems=mysqli_num_rows($rscart); 

              //fetch first address and username
              $sqlAddress = "SELECT AddressDetail, CustomerID FROM address     
              WHERE CustomerID = '" . $rUser['CustomerID'] . "'
              LIMIT 1";
            $fetchAddress=mysqli_query($con,$sqlAddress);
            $result=mysqli_fetch_assoc($fetchAddress);

            //fetch the address of the user
            $sqlAll = "SELECT AddressDetail, AddressID,CustomerID FROM address
             WHERE CustomerID = '" . $rUser['CustomerID'] . "'";
            $userAddress = mysqli_query($con, $sqlAll);
            
            if (!$userAddress) {
                die("Error in SQL query: " . mysqli_error($con));
            }
            
            $numRows = mysqli_num_rows($userAddress);
            $fetchAll = array();
            
            while ($row = mysqli_fetch_array($userAddress)) {
                $fetchAll[] = $row;
            }
           
             
            
            
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
                                <a href="customer_logout.php" class="dropdown-item">logout</a>
                                
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="view_cart.php"><img src="images/th-removebg-preview.png" class="trolley" alt=""></a>
            </div>
                 <div class="alert alert-success"style="display:none;" role="alert">
               
                </div>

               <div class="cart-order">
                        <h3 class="title-cart">Shopping Cart</h3>
                        <h3 class="nb-items"><?php echo $numItems;?> Items</h3>
                        <hr class="line">
                        <div >
                            <table class="table">
                                    <thread>
                                        <tr>
                                            <th>ProductDetails</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>total</th>
                                        </tr>
                                    </thread>
                                    <tbody>
                                        
                                    <?php foreach ($rscart as $cart) { ?>
                                       
                                        <tr>
                                            <td>
                                                   <?php if ($cart['product_cover'] == " ") { ?>
                                                    <img src="public/products/images/product.png" alt="" style="width: 100%; height: auto;">
                                                <?php } else { ?>
                                                    <img src="public/products/images/<?php echo $cart['product_cover']; ?>" class="productCover" alt="<?php echo $cart['ProductID']; ?>" style="width: 15%; height: auto; top: 60px;margin-left:20px">
                                                <?php } ?>  
                                            </td>
                                            <td><input type="number" class="quantity-input" value="<?php echo $rcart['qty']; ?>" min="1"> </td>
                                            <td><?php echo number_format($cart['UnitPrice'],2);?>$</td>
                                            <td><?php echo number_format($cart['tot'],2);?></td>
                                            <td><span class="remove-item"  data-product-id="<?php echo $cart['ProductID']; ?>">X</span></td>
                                           </tr>
                                       <?php  
                                           $total += $cart['tot'];} ?>
                                    </tbody>
                                </table>
                                
                        </div>    
                                           <!-- Modal -->
                    <div class="modal fade" id="change-address" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog custom-modal" style="max-width: 600px; max-height: 100px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Choose your shipping Address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <?php foreach ($fetchAll as $address): ?>
                                    <div class="address-container">
                                        <input type="radio" name="selected_address" value="<?php echo $address['AddressID']; ?>">
                                        <label for="" class="CustomerName"><?php echo $address['CustomerID'];?></label> 
                                        <label for="" class="address-title"><?php echo $address['AddressDetail']; ?></label><button type="submit" class="edit">Edit</button>
                                    </div>
                                <?php endforeach; ?>
                                <button type="submit" class="btn btn-secondary"  data-bs-toggle="modal" data-bs-target="#newAddress"class="new-address">Add New Address</button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="select-address-btn">Select Address</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                        <div class="orderSummary">
                            <h3 class="summary">Order Summary</h3>
                            <hr>
                            <h4 class="summary-item"> <?php echo $numItems;?> Items</h4>
                            <h5 class="total">$<?php echo number_format($total, 2); ?>$</h5>
                            <h4 class="address-detail">Shipping Address <span class="username"> <?php echo $result['CustomerID'];?></span></h4>
                             <span class="address"><?php echo $result['AddressDetail'];?></span>
                              <button type="submit" class="change-address" data-bs-toggle="modal" data-bs-target="#change-address">change</button>
                                         <div>
                                         <button type="button" class="OrderNow" id="OrderNow" name="Order" style="margin-top:30px;">Order Now</button>
                                            </div>
                        </div>

               </div>

                              <!-- Modal -->
                              <div class="modal fade" id="newAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog custom-modal" style="max-width: 600px; max-height: 400px;">
                            <div class="modal-content" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter your new Address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5>Add a new address</h5>
                                    <div>
                                           <div class="alert alert-success" style="display:none;" id="message-div"role="alert">
                                               
                                            </div>
                                    </div>
                                    <form action="" class="form">
                                            <div>
                                                <label for="city" class="city">City/Region</label>
                                                <br>
                                                <select name="City" class="city" id="city">
                                                    <option value="<?php echo $rUser['CityID'];?>"><?php echo $rUser['name'];?></option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="name" class="name">Full name(First and Last name)</label>
                                                <br>
                                                <input type="text" name="Name" value="<?php echo $rUser['username'];?>"class=" Name" id="name"  >
                                            </div>
                                            <div>
                                                    <label for="phone" class="phone">Phone</label>
                                                    <br>
                                                    <input type="phone" id="phone" value="<?php echo $rUser['Phone'];?>"class="phone" name="phone">
                                            </div>
                                            <div>
                                                <label for="Address" class="addressz">Address</label>
                                                <br>
                                                <input type="text" id="Address" name="address" class="addresses">
                                            </div>
                                            <div>
                                            <button type="button" class="btn btn-secondary submit" name="submit" style="margin-top:30px;">Add Address</button>
                                            </div>

                                           
                                    </form>

                               
                              

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"class="btns" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
</body>
<script>
     // Function to update totals when quantity changes
     $('.quantity-input').on('input', function() {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();
        var unitPrice = $(this).closest('tr').find('td:eq(2)').text().replace('$', '');
        var newTotal = quantity * unitPrice;
        $(this).closest('tr').find('td:eq(3)').text(newTotal.toFixed(2) + '$');
        recalculateTotal();
    });

    // Function to recalculate total
    function recalculateTotal() {
        var total = 0;
        $('.quantity-input').each(function() {
            var quantity = $(this).val();
            var unitPrice = $(this).closest('tr').find('td:eq(2)').text().replace('$', '');
            total += quantity * unitPrice;
        });
        $('.total').text('$' + total.toFixed(2));
    }

    $(document).ready(function() {
    
    $('.remove-item').on('click', function() {
        var productId = $(this).data('product-id');
        var $row = $(this).closest('tr');

       
        $.ajax({
            url: 'remove-item.php',
            type: 'POST',
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                
                if (response.success) {
                    
                    $row.remove(); 
                    recalculateTotal();
                   
                    $('.nb-items').text(response.numItems + ' Items');
                } else {
                 
                    console.error('Failed to remove item');
                }
            },
            error: function(xhr, status, error) {
                
                console.error('AJAX request failed: ' + status + ', ' + error);
            }
        });
    });
});


$(document).ready(function() {
   
    var selectedAddressID = localStorage.getItem("selectedAddressID");
    
    
    if (selectedAddressID) {
        
        var selectedAddressText = $(".address-container input[value='" + selectedAddressID + "']").siblings(".address-title").text();
        $(".address").text(selectedAddressText);
    }
    
    $("#select-address-btn").click(function() {
       
        var selectedAddressID = $("input[name='selected_address']:checked").val();
        
        var selectedAddressText = $(".address-container input[value='" + selectedAddressID + "']").siblings(".address-title").text();
        $(".address").text(selectedAddressText);
        
       
        localStorage.setItem("selectedAddressID", selectedAddressID);
        $("#change-address").modal("hide");
    });
});

$(document).ready(function(){
    $(".submit").on('click', function(){
        var CustomerID = $("label.CustomerName:first").text().trim();
        var address = $("#Address").val();
        
        $.ajax({
            url: 'addAddress.php',
            type: 'POST',
            data: {CustomerID: CustomerID,
                address: address
            },
            dataType: 'json',
            success: function(response){
                if(response.message){
                    $('#message-div').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
                } else {
                    $('#message-div').removeClass('alert-success').addClass('alert-danger').text(response.message).show();
                }
            }
        });
    });
});
$("#OrderNow").click(function(){
    var orderDetails = [];

    $(".cart-item").each(function(){
        var productID = $(this).find('.remove-item').data('product-id');
        var price = parseFloat($(this).find(".unit-price").text().replace("Price: $", "").trim()); 
        var quantity = parseInt($(this).find(".quantity-input").val());
        var productCover = $(this).find(".productCover").val();
       
        if (isNaN(quantity) || quantity <= 0) {
            console.error("Invalid quantity for product ID: " + productID);
            return; 
        }
        
        orderDetails.push({
            productID: productID,
            price: price,
            quantity: quantity,
            productCover: productCover
        });
    });
    
    
    

    $.ajax({
        method: 'post',
        url: 'orderNow.php',
        dataType: 'json',
        data: { orderDetails: orderDetails }, 
        success: function(response) {
            console.log(response);
            if (response.message) {
                
                $(".alert-success").html('Order placed successfully!');
                $(".alert-success").show();
                $(".alert-danger").hide();
                $("#cart-items").empty();
            } else {
                $(".alert-danger").html('Failed to place order: ' + response.error);
                $(".alert-danger").show();
                $(".alert-success").hide();
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $(".alert-danger").html('An error occurred while processing the request.');
            $(".alert-danger").show();
            $(".alert-success").hide();
        }
    });
});
</script>

</html>
