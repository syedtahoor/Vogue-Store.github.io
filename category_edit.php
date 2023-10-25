<?php
include 'conn.php';

ob_start();
$id = $_GET['id'];
$query = "Select * FROM category WHERE c_id = $id";

$run = mysqli_query($conn , $query);

$data =  mysqli_fetch_array($run);

ob_end_flush();

if(isset($_POST['update'])){


$name = $_POST['cname'];

$query = "Update category set c_name = '$name' where c_id = $id";

$run=  mysqli_query($conn , $query);


if($run){

    echo "<script>window.location.href='category.php'</script>";
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
<h1>Update Category</h1>

<div class="row">
<form method="POST">
<div class="col-12">
<input type="text" placeholder="Enter category" class="form-control" name="cname" value="<?php echo $data['c_name'];?>">

</div>
<br>
<div class="col-3">
    <input type="submit" value="Update" class="btn btn-info" name="update">
</div>

</form>
</div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>