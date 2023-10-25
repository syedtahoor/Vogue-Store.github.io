<?php

include 'conn.php';

$id = $_GET['id'];

$query = "DELETE FROM product WHERE p_id = $id";

$runn = mysqli_query($conn , $query);

if($runn){
    echo "<script>window.location.href='productdash.php'</script>";
}
?>