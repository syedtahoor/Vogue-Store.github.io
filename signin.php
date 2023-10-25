<?php
session_start();
include 'conn.php';
if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE u_name = '$username' and u_password = '$password' ";
    $run = mysqli_query($conn , $query);

    if(mysqli_num_rows($run) ==1){
        $_SESSION['username'] = $username;
        header('location:category.php');
    }
    else{
        echo "<script>alert('wrong username or password!')</script>";

    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIGN IN</title>
    <style>
body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}
form {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    max-width: 400px;
    width: 100%;
}

h1 {
    text-align: center;
    color: #333;
}

.form-control {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 100%;
}

.btn {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.btn:hover {
    background-color: #c82333;
}

    </style>
</head>
<body>

    <div class="container">
        <form method="POST">
            <div class="">
                <h1 class="text-center my-3">SIGN IN</h1>
                <input type="text" class="form-control my-2" name="username" placeholder="Enter username or email.....">
                <input type="text" class="form-control my-2" name="password" placeholder="Enter password here.....">
                <input type="submit" class="form-control my-2 btn btn-danger" name="signin" value="signin">

            </div>
        </form>
    </div>
    
</body>
</html>


