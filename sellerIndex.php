<?php

	include_once "includes/db_conn.php";

	$search = "";

	if (isset($_GET['search'])) {
		$search = $_GET['search'];
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Suits U</title>

	<link rel="stylesheet" type="text/css" href="css/seller.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

	<header>
		
		<a href="#"><label>Suits U</label></a>
		<form action="" method="">
			<input type="text" name="search" placeholder="Search">
		</form>
		
		<a href="products.php"><img src="img/products.webp" class="prod-img"></a>
		<a href="#"><img src="img/user.webp" class="user-img1" alt="User"></a>
		<a href="#"><img src="img/wishlist.webp" class="wishlist-img"></a>
		<a href="#"><img src="img/cart.webp" class="cart-img"></a>
	</header>



</body>
</html>