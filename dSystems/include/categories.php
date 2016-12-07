<?php
	//Start session
	session_start();

	//Include database connection details
	include 'db_conn.php';
	//Include class details
	include 'core.dSystems.php';

	$obj = new dSystems  ();

	

	$query="UPDATE `categories` 
			SET `Pictures`='".@$_POST['Pictures']."',
				`Music`='".@$_POST['Music']."',
				`Videos`='".@$_POST['Videos']."',
				`Documents`='".@$_POST['Documents']."',
				`Archives`='".@$_POST['Archives']."' 
			WHERE `idu` ='".@$_SESSION['SESS_USER_ID']."'";

	$result=mysqli_query($conn, $query);
	if($result) {
		header("Location: ../home.php");
	}else{

	}
?>