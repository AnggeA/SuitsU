<?php  


	if (isset($_POST['addItem'])) {


		include_once "includes/db_conn.php";

		$item_name = htmlentities($_POST['item_name']);
		$item_short_code = htmlentities($_POST['item_short_code']);

		$sql_check = "SELECT item_id 
						FROM `items` 
						WHERE item_name = ?
						OR item_short_code = ?;";


		$stmt_check = mysqli_stmt_init($connect);

		if (!mysqli_stmt_prepare($stmt_check, $sql_check)) {
			echo "Statement Failed";
			exit();
		}
		mysqli_stmt_bind_param($stmt_check, "ss", $item_name, $item_short_code);
		mysqli_stmt_execute($stmt_check);
		$checkRes = mysqli_stmt_get_result($stmt_check);
		$array = array();

		while ($row = mysqli_fetch_assoc($checkRes)) {
			array_push($array, $row);
		}
		

		if (!empty($array)) {
			echo "This item is already in the database";
		}
		else{

			$item_name = htmlentities($_POST['item_name']);
			$item_short_code= htmlentities($_POST['item_short_code']);
			$item_desc = htmlentities($_POST['item_desc']);
			$item_price = htmlentities($_POST['item_price']);
			$item_stock = htmlentities($_POST['item_stock']);
			$item_cat = htmlentities($_POST['item_cat']);
			$item_stat = htmlentities($_POST['item_stat']);

			$sql1 = "INSERT INTO `items`(`item_name`, `item_short_code`, `item_desc`, `item_price`, `item_stock`, `cat_id`, `item_stat`) 
					VALUES (?,?,?,?,?,?,?);";

			$stmt_sql1 = mysqli_stmt_init($connect);

				if (!mysqli_stmt_prepare($stmt_sql1, $sql1)) {
						echo "New Item Failed";
						exit();
				}
				else{
					mysqli_stmt_bind_param($stmt_sql1, "sssssss", $item_name, $item_short_code, $item_desc, $item_price, $item_stock, $item_cat, $item_stat);
					mysqli_stmt_execute($stmt_sql1);
						echo "New Item Recorded";
				}
		}

	}


?>