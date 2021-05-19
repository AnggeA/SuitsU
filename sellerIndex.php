<?php

	include_once "includes/db_conn.php";

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
			<input type="text" name="search" placeholder="Search">
			<a href="" name="search-btn"><img src="img/search.webp" class="search-img"></a>
		</form>
		<a href="#"><img src="img/products.webp" class="prod-img" alt="Products"></a>
		<a href="#"><img src="img/user.webp" class="user-img1" alt="User"></a>
		<a href="#"><img src="img/wishlist.webp" class="wishlist-img"></a>
		<a href="#"><img src="img/cart.webp" class="cart-img"></a>
		
	</header>

	<nav class="seller-nav">
		<div class="new-item">
			<a href="#addItem">Add New Item</a>
		</div>
	</nav>


<!-- Products -->

<div class="prod-wrapper">
	
	<?php

		$sql = "SELECT i.item_id,
						i.item_name,
						i.item_short_code,
						i.item_price,
						c.cat_name
				FROM items i
				JOIN category c
				ON i.cat_id = c.cat_id;";
		$stmt = mysqli_stmt_init($connect);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "Statement Failed";
				exit();
			}
		mysqli_stmt_execute($stmt);
		$resData = mysqli_stmt_get_result($stmt);
		$array = array();

		while ($row = mysqli_fetch_assoc($resData)) {
			array_push($array, $row);	
		}

		echo "<table>";
			foreach ($array as $key => $value) {
				echo "<tr>";
					echo "<td>" . $value['item_name']		. 	"</td>";
					echo "<td>" .$value['item_short_code']	. 	"</td>";
					echo "<td>" .$value['item_price']		. 	"</td>";
					echo "<td>" .$value['cat_name']			.	"</td>";
				echo "</tr>";
			}
		echo "</table>";

	?>

</div>



<!-- Add Items -->

	<div class="item-wrapper" id="addItem">
		<form action="addItem.php" method="POST">
			<div class="item-title">
					<label>Add New Item</label>
				</div>
			<a href="" class="close-btn">&times;</a>
			<div class="item-content">
				
				<div class="item-input1">
				<input type="text" name="item_name" placeholder="Item Name" required>
				</div>
				<div class="item-input">
				<input type="text" name="item_short_code" placeholder="Item Short Code" required>
				</div>
				<div class="item-input">
				<input type="text" name="item_desc" placeholder="Item Description" required>
				</div>
				<div class="item-input">
				<input type="number" name="item_price" placeholder="Price" required>
				</div>
				<div class="item-input">
				<input type="number" name="item_stock" placeholder="Stock" required>
				</div>
				<div class="item-input">
				<label>Category</label>

				<select name="item_cat" class="cat" required>
					<?php
						$sql_cat = "SELECT * FROM category;";
						$sql_res = mysqli_query($connect, $sql_cat);
						if(mysqli_num_rows($sql_res) > 0){
							while($row = mysqli_fetch_assoc($sql_res)){
								echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
							}
					}
					?>
				</select>
				</div>
				<div class="item-input">
					<label>Item Status</label>
				<select name="item_stat" class="stat" required>
					<option value="A">Active</option>
					<option value="D">Discontinued</option>
				</select>
				</div>
				<div class="item-add">
					<input type="submit" name="addItem" value="Add Item">
				</div>
			</div>
		</form>
	</div>




</body>
</html>