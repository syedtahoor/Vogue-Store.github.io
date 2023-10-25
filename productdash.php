<?php

include 'conn.php';

if (isset($_POST['submit'])) {
    $productname = $_POST['pname'];
    $productprice = $_POST['pprice'];
    $productquantity = $_POST['pquantity'];
    $productcategory = $_POST['pcategory'];
    
    $imgname = $_FILES['pimg']['name'];
    $mfile = $_FILES['pimg']['tmp_name'];
    move_uploaded_file($mfile ,"img/".$imgname);

    // Perform input validation here, for example, check if fields are not empty and validate data types.

    $query = "INSERT INTO product (p_name, p_price, p_quantity, c_id , p_image) VALUES ('$productname', $productprice, $productquantity, $productcategory , '$imgname')";


    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Record is submitted!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <h1 class="mt-5">Create product:</h1>

    <div class="row">
        <form method="POST" class="mt-5" enctype="multipart/form-data">

            <div class="col-12">
                <input type="text" name="pname" class="form-control" placeholder="Enter product name">
            </div>
            <br>
            <div class="col-12">
                <input type="text" name="pprice" class="form-control" placeholder="Enter product price">
            </div>
            <br>
            <div class="col-12">
                <input type="file" name="pimg" class="form-control">
            </div>
            <br>
            <div class="col-12">
                <input type="text" name="pquantity" class="form-control" placeholder="Enter product quantity">
            </div>
            <br>
            <div class="col-12">
                <select name="pcategory" class="form-control">
                    <?php
                    $query = "SELECT * FROM category";
                    $run = mysqli_query($conn, $query);
                    if (mysqli_num_rows($run)) {
                        while ($rows = mysqli_fetch_array($run)) {
                            ?>
                            <option value="<?php echo $rows['c_id'] ?>"><?php echo $rows['c_name'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="col-3">
                <input type="submit" name="submit" value="Create" class="btn btn-success">
            </div>
        </form>
    </div>

    <table class="table table-hover text-center mt-5">
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php
        $query = "SELECT product.*, category.c_name FROM product INNER JOIN category ON category.c_id = product.c_id";
        
        $runn = mysqli_query($conn, $query);

        while ($rows = mysqli_fetch_array($runn)) {
            ?>
            <tr>
                <td><?php echo $rows['p_id'] ?></td>
                <td><?php echo $rows['p_name'] ?></td>
                <td><img src="<?php echo "img/".$rows ['p_image']?>" width="50px" height="50px" alt=""></td>
                <td><?php echo $rows['p_price'] ?></td>
                <td><?php echo $rows['p_quantity'] ?></td>
                <td><?php echo $rows['c_name'] ?></td>
                <td><a href="product_delete.php?id=<?php echo $rows['p_id'] ?>"
                       class="text-danger text-decoration-none">Delete</a> |
                    <a href="product_edit.php?id=<?php echo $rows['p_id'] ?>"
                       class="text-primary text-decoration-none">Edit</a></td>
            
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
