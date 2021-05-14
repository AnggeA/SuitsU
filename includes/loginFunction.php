<?php

function UserIDCheck($connect, $username, $password){
	$error;
	$sql = "SELECT * FROM users WHERE username = ? AND password = ?;";
	$stmt = mysqli_stmt_init($connect);

	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: index.php");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss", $username, $password);
	mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		}
		else{
			$error = false;
			return $error;
		}
}
