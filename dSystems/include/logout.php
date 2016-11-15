<?php
	session_start();
	//require 'db_conn.php';
	require 'core.dSystems.php';

	$obj = new dSystems();
	$obj->logout();
?>