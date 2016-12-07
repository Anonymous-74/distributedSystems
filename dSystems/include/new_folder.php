<?php
	//Start session
	session_start();

	//Include database connection details
	include 'db_conn.php';
	//Include class details
	include 'core.dSystems.php';

	$obj = new dSystems();

	$folder_name = $obj->clean($_POST['name']);

	$directoryName = '../cloud/'.$_SESSION['SESS_USER_ID'].'/'.$folder_name;
 
	//Check if the directory already exists.
	if(!is_dir($directoryName)){
	    //Directory does not exist, so lets create it.
	    mkdir($directoryName, 0755, true);
	    header("Location: ../home.php?nf=true");
	}else{
		header("Location: ../home.php?nf=false");
	}

?>