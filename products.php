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
	<title>Suits U - Products</title>
	<link rel="stylesheet" type="text/css" href="css/seller.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<header>
		
		<a href="sellerIndex.php"><label>Suits U</label></a>
		<form action="" method="">
			<input type="text" name="search" placeholder="Search">
		</form>
		
		<a href="products.php"><img src="img/products.webp" class="prod-img"></a>
		<a href="#"><img src="img/user.webp" class="user-img1" alt="User"></a>
		<a href="#"><img src="img/wishlist.webp" class="wishlist-img"></a>
		<a href="#"><img src="img/cart.webp" class="cart-img"></a>
	</header>

			<nav class="seller-nav">
					<ul>
						<li><a href="#addItem">Add New Item</a></li>
						<li><a href="#addCat">Add New Category</a></li>
					</ul>
				</div>
			</nav>

			<div>
				<form action="sellerIndex.php" method="GET">
					<input type="text" name="search" placeholder="Search">
				</form>
			</div>

			<div>
						<?php


							if ($search == "") {

								$sql = "SELECT i.item_id,
											i.item_name,
											i.item_short_code,
											i.item_price,
											i.item_stock,
											i.item_stat,
											c.cat_name
									FROM items i
									JOIN category c
									ON i.cat_id = c.cat_id;";

								$stmt = mysqli_stmt_init($connect);

								if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "Statement Failed";
								exit();
							}
						}
							else{

							$sql = "SELECT i.item_id,
											i.item_name,
											i.item_short_code,
											i.item_price,
											i.item_stock,
											i.item_stat,
											c.cat_name
									FROM items i
									JOIN category c
										ON i.cat_id = c.cat_id
									WHERE i.item_name = ?
									OR i.item_short_code = ?;";


							$stmt = mysqli_stmt_init($connect);

							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "Statement Failed";
								exit();
							}

							mysqli_stmt_bind_param($stmt, "ss", $search, $search);

						}

							mysqli_stmt_execute($stmt);
							$resData = mysqli_stmt_get_result($stmt);
							$array = array();

							while ($row = mysqli_fetch_assoc($resData)) {
								array_push($array, $row);	
							}

							if (!empty($array)) {

							echo "<table class = 'prod-table'>";
								echo "<thead>";
									echo "<tr>";
										echo "<td> Item Name 		</td>" ;
										echo "<td> Item Short Code 	</td>" ;
										echo "<td> Item Price 		</td>" ;
										echo "<td> Item Stock 		</td>" ;
										echo "<td> Category Name    </td>" ;
										echo "<td> Item Status    	</td>" ;
										echo "<td> 			    	</td>" ;
									echo "</tr>";
								echo "</thead>";

									foreach ($array as $key => $value) {
								echo "<tbody>";
									echo "<tr>";
										echo "<td>" .$value['item_name']		. 	"</td>";
										echo "<td>" .$value['item_short_code']	. 	"</td>";
										echo "<td>" .$value['item_price']		. 	"</td>";
										echo "<td>" .$value['item_stock']		. 	"</td>";
										echo "<td>" .$value['cat_name']			.	"</td>";
										echo "<td>" .$value['item_stat']		.	"</td>";
										echo "<td>
												<form action = '' method = ''>
													<button>
														Update
													</button>
												</form>
											  </td>";
									echo "</tr>";
								echo "</tbody>";
								}
							echo "</table>";
						}

						else{
							echo "No Record has found";
						}
						

						?>

					</div>
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

	<div class="cat-wrapper" id="addCat">
		<form action="newcategory.php" method="POST">
			<div class="cat-title">
				<label>Add New Category</label>
			</div>
			<a href="" class="close-btn">&times;</a>
			<div class="cat-content">
				<div class="input-cat">
					<input type="text" name="cat_name" placeholder="Category Name" required>
				</div>
				<div class="add-cat">
				<input type="submit" name="addCat" value="Add Category">
				</div>
			</div>
		</form>
	</div>

</body>
</html>