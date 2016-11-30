<?php
	//Start session
	session_start();

	//Include database connection details
	include 'db_conn.php';
	//Include class details
	include 'core.dSystems.php';

	$obj = new dSystems  ();

	$username = $obj->clean($_GET['username']);
	$password  = $obj->clean($_GET['password']);

	//Create query
	$query="SELECT * FROM `users` WHERE (`username`='$username' OR `email`='$username') AND `password`='".sha1($password)."'";
	$result=mysqli_query($conn, $query);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USER_ID'] = $member['idu'];
			$_SESSION['SESS_FIRST_NAME'] = $member['first_name'];
			$_SESSION['SESS_LAST_NAME'] = $member['last_name'];
			session_write_close();
			
			die("Query Successful");
			exit();
		}else {
			//Login failed
			die("Wrong Username or Password");
			exit();
		}
	}else {
		die("Query Failed");
	}

?>
