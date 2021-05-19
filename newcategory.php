<?php  


	if (isset($_POST['addCat'])) {


		include_once "includes/db_conn.php";
		include_once "includes/newCatFunction.php";

		$cat_name = htmlentities($_POST['cat_name']);
		

		if (CheckItem($connect, $cat_name) !== false) {
			echo "This category
			 is already in the databe";
		}
		else{

			$cat_name = htmlentities($_POST['cat_name']);

			$sql1 = "INSERT INTO category (cat_name)
					VALUES ('$cat_name')";

				if (mysqli_query($connect, $sql1)) {
						echo "New Category Added";
				}
				else{
					echo "Error!" .$sql1 .mysqli_error($connect);
				}
		}

	}


?>