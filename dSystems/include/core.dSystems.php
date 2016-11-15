<?php
	/**
	* 
	*/

	class dSystems 
	{
		function logout(){
			if(!isset($_SESSION['name']))
			{
				unset($_SESSION['name']);
				header("Location:../index.php");
			}
			else if(isset($_SESSION['name'])!="")
			{
				unset($_SESSION['name']);
				header("Location:../index.php");
			}
		}
	}
?>