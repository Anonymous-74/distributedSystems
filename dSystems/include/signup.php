<?php
	//Start session
	session_start();

	//Include database connection details
	include 'db_conn.php';
	//Include class details
	include 'core.dSystems.php';

	$obj = new dSystems  ();

	$fullname = $obj->clean($_GET['fullname']);
	$username = $obj->clean($_GET['username']);
	$email = $obj->clean($_GET['email']);
	$password  = $obj->clean($_GET['password']);
	$tel = $obj->clean($_GET['tel']);
	$first_name=ucwords(explode(' ',trim($fullname))[0]);
	$last_name=ucwords(explode(' ',trim($fullname))[1]);

	//Create query
	$query="INSERT INTO `users`(`idu`, `username`, `password`, `email`, `telephone`, `first_name`, `last_name`) VALUES ('','$username','".sha1($password)."','$email','$tel','$first_name','$last_name')";
	$result=mysqli_query($conn, $query);
	
	//Check whether the query was successful or not
	if($result) {
		$query="SELECT * FROM `users` WHERE (`username`='$username' OR `email`='$username') AND `password`='".sha1($password)."'";
		$result=mysqli_query($conn, $query);

		if(mysqli_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysqli_fetch_assoc($result);
			$_SESSION['SESS_USER_ID'] = $member['idu'];
			$_SESSION['SESS_FIRST_NAME'] = $member['first_name'];
			$_SESSION['SESS_LAST_NAME'] = $member['last_name'];
			session_write_close();

			//Set User Categories
			$query="INSERT INTO `dsystems`.`categories` (`idc`, `idu`, `Pictures`, `Music`, `Videos`, `Documents`, `Archives`) VALUES ('', '".$member['idu']."', 0, 0, 0, 0, 0)";
			$result=mysqli_query($conn, $query);

			//Create User Directory
			$directoryName = '../cloud/'.$member['idu'];
 
			//Check if the directory already exists.
			if(!is_dir($directoryName)){
			    //Directory does not exist, so lets create it.
			    mkdir($directoryName, 0755, true);
			}
			
			die("Query Successful");
			exit();
		}else {
			//Login failed
			die("Failed");
			exit();
		}
	}else {
		die("Query Failed");
	}

?>