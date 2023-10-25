<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Cart</h1>
        <div class="row">
            <div class="col-9">
<table class="table">
    <thead>
        <tr>
            <td>S-No</td>
            <td>Item Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Image</td>
            <td>Total</td>
            <td>Action</td>
        </tr>
    </thead>
    <?php
     if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            $sr = $key + 1;
            echo "<tr>
            <td>$sr</td>
            <td>$value[productName]</td>
            <td>$value[productPrice]</td>
            <form action='' method='POST'>
            <input type='number' class='quantity' onchange='this.form.submit' name='Mod_Quantity' value='$value[productQuantity]'>
            <input type='hidden' name='product_name' value='$value[ProductName]'>
            <input type='hidden' class='price' name='product_name' value='$value[ProductPrice]'>
            <input type='hidden' name='product_name' value='$value[ProductName]'>
            </form>
            <td><img src='img/$value[ProductPicture]' width='50' height='50'></td>
            <td>0</td>
            <form action='shoping-cart.php' method='POST'>
            <input type='hidden' name='product_name' value='$value[productName]'>
            <td><button name='remove_item' class='btn btn-danger'>Remove</button></td>
            </form>
            </tr>";
        }
     }
    ?>
</table>
            </div>
 
        <div class="col-3">
            <h1>Grand total</h1>
        </div>
        </div>
    </div>
</body>
</html>