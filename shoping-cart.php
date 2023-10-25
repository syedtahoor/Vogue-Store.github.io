
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	

	<?php
	
	session_start();
	// session_destroy();
	if(isset($_POST['submit'])){
       $pname = $_POST['pname'];
	   $pprice = $_POST['pprice'];
	   $pquantity  = $_POST['pquantity'];
	   $pimage = $_POST['pimg'];

	   
    // if(isset($_SESSION['cart'])){

	// 	$count = count($_SESSION['cart']);
	// 	$_SESSION['cart'][$count] = array('productName' => $pname , 'productPrice' => $pprice , 'ProductQuantity' => $pquantity , 'ProductPicture' => $pimage );
	// 	// print_r($_SESSION['cart']);
		
	// 	echo "
	// 	<script>
	// 		window.location.href='main-cart.php';
	// 	</script>
	// 	";
		

	// }

	if(isset($_SESSION['cart'])){
        $myitem = array_column($_SESSION['cart'] , 'productName');
        if(in_array($pname , $myitem)){
            echo "<script> alert('Item Already Exists!');
            window.location.href='product.php';
            </script>";
        }

        else{
            $count = count($_SESSION['cart']);
            $_SESSION['cart'][$count] = array('productName' => $pname , 'productPrice' => $pprice , 'productQuantity' => $pquantity , 'ProductPicture' => $pimage);
            // print_r($_SESSION['cart']);
			echo "<script> alert('Item Added');
            window.location.href='main-cart.php';
            </script>";
        }
      
    }

	

    else{
        $_SESSION['cart'][0] = array('productName' => $pname , 'productPrice' => $pprice , 'productQuantity' => $pquantity ,'ProductPicture' => $pimage );
        // print_r($_SESSION['cart']);
		echo "<script> alert('Item Added');
		window.location.href='main-cart.php';
		</script>";

    
	
	echo "
	<script>
		window.location.href='main-cart.php';
	</script>
	";
	
	}
	}
	

	if(isset($_POST['remove_item'])){
		$pname = $_POST['pro_name'];
		foreach($_SESSION['cart'] as $key => $value){

			if($value['productName'] == $pname){
				unset($_SESSION['cart'][$key]);
				$_SESSION['cart'] = array_values($_SESSION['cart']);

				echo "
				<script>
				alert('Product Removed!')
                    window.location.href='main-cart.php';
				</script>
				";
			}
		}
	}



	
if(isset($_POST['Mod_quantity'])){


	$pname =  $_POST['product_name'];
   
	foreach($_SESSION['cart'] as $key => $value){
   
	  if($value['productName'] == $pname){
   
	   $_SESSION['cart'][$key]['productQuantity'] = $_POST['Mod_quantity'];
   
	   echo "
	   
	   <script>window.location.href = 'main-cart.php'</script>
	   ";
	  }
	}
   
   }
   

	
	?>






	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>