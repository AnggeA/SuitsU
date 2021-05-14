<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "suitsu";

$connect = mysqli_connect($servername, $dbusername,$dbpassword, $dbname);

if (!$connect) {
	die("Connection Failed" .mysqli_connect_error());
}
else{
	echo "Connection Established!";
}