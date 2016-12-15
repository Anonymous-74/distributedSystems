<?php
	define('DB_HOST', 'localhost');
    define('DB_USER', 'faridibin');
    define('DB_PASSWORD', 'hamzazara');
    define('DB_DATABASE', 'dsystems');

	// Create connection
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_DATABASE);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}else{
		#echo "Connection Established";
	}
?>