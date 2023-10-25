<?php 

include "conn.php";
if(isset($_POST['submit'])){
    $username =$_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query ="INSERT INTO users ( u_name, u_email, u_password) VALUES ('$username ', '$email', '$password')";

    $run = mysqli_query($conn , $query);
    if($run){
        echo "<script>alert('Record Submitted!')</script>";
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SIGN UP</title>

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
        <form method="POST" >
            <div>
                <h1 class="text-center my-3">SIGN UP</h1>
                <input type="text" class="form-control my-2" name="username" placeholder="Enter username.....">
                <input type="email" class="form-control my-2" name="email" placeholder="Enter email.....">
                <input type="text" class="form-control my-2" name="password" placeholder="Enter password.....">
                <input type="submit" class="form-control my-2 btn btn-info" name="submit" value="signup">

            </div>
        </form>
    </div>
    
</body>
</html>