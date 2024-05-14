<?php
include 'connection.php'; 
$query = "SELECT * FROM product";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="excelProcess.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="excel" required>
      
        <?php foreach($result as $row):?>
            <input type="hidden" name="ProductNB" id="productID" value="<?php echo $row['ProductNB']; ?>">
        <?php endforeach;?>
        <button type="submit" name="import" id="import" class="btn btn-primary">Import</button>
    </form>

    <?php
    session_start();
    if(isset($_SESSION['errors'])):
    ?>
    <div class="alert alert-danger" role="alert">
        <ul>
            <?php foreach($_SESSION['errors'] as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
    <?php endif; ?>

    <table class="table" style="margin-top:90px;">
        <thead>
            <tr>
                <th scope="col">ProductNb</th>
                <th scope="col">ProductDes</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">NbInStock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            mysqli_data_seek($result, 0);

            while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <th scope="row"><?php echo $row['ProductNB']; ?></th>
                <td><?php echo $row['ProductDes']; ?></td>
                <td><?php echo $row['Quantity']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><?php echo $row['NbInStock']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
<script>
   jQuery(document).ready(function($){
        $('#import').on('click', function(){
            var productID = $('#productID').val();

            $.ajax({
                url: 'excelProcess.php',
                type: 'POST',
                data: { ProductID: productID },
                dataType: 'json',
                success: function(response) {
                    // Handle the response from the server
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.log(error);
                }
            });
        });
    });
</script>
</html>