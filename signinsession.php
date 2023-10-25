<?php
session_start();
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
}
else
{
    echo "<script>window.location.href='login.php'</script>";
  }?>