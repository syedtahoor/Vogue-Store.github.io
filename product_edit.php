<?php
include 'conn.php';

ob_start();

$id = $_GET['id'];

$query = "SELECT * FROM product WHERE p_id = $id";

$runn = mysqli_query($conn , $query);

$data =  mysqli_fetch_array($runn);

ob_end_flush();

if(isset($_POST["submit"])){

  $productname = $_POST['pname'];
  $productprice = $_POST['pprice'];
  $productquantitity = $_POST['pquantity'];
  $productcategory = $_POST['pcategory'];


  $imgname = $_FILES['pimg']['name'];
  $mfile = $_FILES['pimg']['tmp_name'];
  move_uploaded_file($mfile ,"img/".$imgname);

  $queryys = "UPDATE product SET p_name = '$productname', p_price = $productprice, p_quantity = $productquantitity, c_id = $productcategory, p_image = '$imgname' WHERE p_id = $id";


    $runn = mysqli_query($conn , $queryys);

    if($runn){
      echo "<script>window.location.href='product.php'</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    
<div class="container text-center">
<h1>Create Product</h1>

<div class="row">
<form method="POST" enctype="multipart/form-data">
<div class="col-12">
<input type="text" placeholder="Enter product" class="form-control" name="pname" value="<?php echo $data ['p_name']?>">
</div>
<br>
<div class="col-12">
<input type="text" placeholder="Enter price" class="form-control" name="pprice" value="<?php echo $data ['p_price']?>">
</div>
<br>
<div class="col-12">
<input type="number" placeholder="Enter quantity" class="form-control" name="pquantity" value="<?php echo $data['p_quantity']?>">
</div>
<br>
<div class="col-12">
<input type="file" name="pimg" class="form-control"  value="<?php echo $data['p_image']?>">
</div>
<br>
<div class="col-12">

<select name="pcategory" class="form-control" >

<?php

$query = "select * from category";

$runn =  mysqli_query($conn , $query);
if(mysqli_num_rows($runn)){
  while($rows = mysqli_fetch_array($runn)){
?>
<option value="<?php echo $rows['c_id']?>"><?php echo $rows['c_name'] ?></option>
<?php
}
}
?>
</select>

</div>
<br>
<div class="col-3">
    <input type="submit" value="Update" class="btn btn-info" name="submit">
</div>

</form>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>