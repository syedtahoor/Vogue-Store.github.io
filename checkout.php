<?php

include 'conn.php';
session_start();


if(isset($_POST['checkout'])){
    
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
   

    $name =  $_POST['ordername'];
    $contact = $_POST['ordercontact'];
    $email = $_POST['orderemail'];
    $address = $_POST['orderaddress'];


$query = "INSERT INTO ordermanager (o_name , o_contact, o_email , o_address) VALUES ('$name' , '$contact' , '$email' , '$address')";

$runn =  mysqli_query($conn , $query);
if($runn){

    $order_id = mysqli_insert_id($conn);
        // echo $order_id;

        $query2 = "INSERT INTO orderdetails(o_id, product_item , price , quantity) VALUES (?,?,?,?)";

        $stmt =   mysqli_prepare($conn , $query2);
        if($stmt){
            
            
        mysqli_stmt_bind_param($stmt , "isii" , $order_id , $Item_name , $price , $quantity);

        foreach($_SESSION['cart'] as $key => $value){

                        $Item_name = $value['productName'];
                        $price = $value['productPrice'];
                        $quantity = $value['productQuantity'];
                        mysqli_stmt_execute($stmt);
                }
        
        unset($_SESSION['cart']);
                        echo
                        "<script>
                            alert('Order Received!');
                            window.location.href='index.php';
                        </script>";
                }
                else{
        
                    echo
                    "<script>
                        alert('SQL Query Prepare Error');
                        window.location.href='main-cart.php';
                    </script>";
                }
            }
            else{
        
                echo
                "<script>
                    alert('Error');
                    window.location.href='main-cart.php';
                </script>";
            }
        }
        else{
            echo "<script>alert('Login First');
            window.location.href='login.php';
            </script>";
        }
        }


   
?>



