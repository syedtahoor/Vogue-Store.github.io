

<?php

include 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM category WHERE c_id = $id";

 $runn =  mysqli_query($conn , $query );

if($runn){

    echo "<script>window.location.href='category.php' </script>";
}

?>















