<?php

	function Register($connect, $fname, $lname, $bdate, $gender, $mobileNum, $email, $username, $password){

			$error;
			$sql = "INSERT INTO `customer`(`fname`, `lname`, `bdate`, `gender`, `mobileNum`, `email`, `password`)
					VALUES (?,?,?,?,?,?,?);";

			$stmt = mysqli_stmt_init($connect);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				return false;
				exit();
			}
			mysqli_stmt_bind_param($stmt, "sssssss" ,$fname, $lname, $bdate, $gender, $mobileNum, $email, $username, $password);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_close($stmt);


	}