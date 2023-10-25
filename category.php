
<?php

include 'conn.php';



if(isset($_POST['submit'])){

    $name = $_POST['cname'];

    // echo $name;

    $query = "insert into category (c_name) values ('$name')";

    $run =   mysqli_query($conn , $query);
    if($run){

        echo "<script>alert('Record inserted!') </script>";
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
<h1>Create Category</h1>

<div class="row">
<form method="POST">
<div class="col-12">
<input type="text" placeholder="Enter category" class="form-control" name="cname">
</div>
<br>
<div class="col-3">
    <input type="submit" value="Create" class="btn btn-info" name="submit">
</div>

</form>
</div>




<!-- display category  -->

<table class="table text-center">

<tr>
  <th>ID </th>
  <th>Name</th>
  <th>Action</th>
</tr>

<?php

$query = "select * from category";
$runn =  mysqli_query($conn , $query);

// echo mysqli_num_rows($runn);
  // mysqli_fetch_array($runn);
// echo $rows['c_id'] . " " . $rows['c_name'];

if(mysqli_num_rows($runn)){

while($rows = mysqli_fetch_array($runn)){


?>
<tr>

<td><?php echo $rows['c_id'] ?></td>
<td><?php echo $rows['c_name'] ?></td>
<td><a href="category_delete.php?id=<?php echo $rows['c_id'] ?>" style="color:red"> Delete</a> | <a href="category_edit.php?id=<?php echo $rows['c_id'] ?>" style="color:green">Edit</a></td>




</tr>


<?php

}
}
?>
</table>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>