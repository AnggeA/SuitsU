<?php

	if (isset($_POST['login-btn'])) {
		
		include_once "includes/db_conn.php";
		include_once "includes/loginFunction.php";

		$username = htmlentities($_POST['username']);
		$password = htmlentities($_POST['password']);

		if (UserIDCheck($connect, $username, $password) !== false) {
			header("location: hello.svg");
		}
		else{
			echo "User is Not Registered";
		}

	}
?>