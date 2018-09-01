<?php
	session_start();
	  
	if(isset($_SESSION["USERTYPE"])){
		
		if($_SESSION["USERTYPE"] == "ADMIN_USER")
		{
			session_destroy();
			header("location: ../admin/login/admin_login.php");
		}	
		else if($_SESSION["USERTYPE"] == "AUTH_USER"){		
			session_destroy();
			header("location: ../user/user_login.php");			
		}
		 		  
	}			
?>