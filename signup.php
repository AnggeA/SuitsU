<?php
		if (isset($_POST['signup-btn'])) {
			
		

		include_once "includes/db_conn.php";
		

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$bdate = $_POST['bdate'];
		$gender = $_POST['gender'];
		$mobileNum = $_POST['mobileNum'];
		$email = $_POST['email'];

		$username = $_POST['username'];
		$password = $_POST['password'];


		$sql = "INSERT INTO `users`(`username`, `password`) VALUES ('$username', '$password')";
		

		if (mysqli_query($connect, $sql))  {

			$user_id = $connect-> insert_id;
			echo "". $user_id;

			$sqlCust = "INSERT INTO `customer`(`fname`, `lname`, `bdate`, `gender`, `mobileNum`, `email`, `username`, `password`,`user_id`)
				VALUES ('$fname', '$lname','$bdate', '$gender', '$mobileNum', '$email', '$username', '$password', '$user_id')";

			$register = $connect->query($sqlCust);

			echo "Successfully Registered!";

		}

		else{
			echo "Error! Please try again!" .$sql .mysqli_error($connect);
		}
}

?>