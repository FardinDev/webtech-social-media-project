
<?php
	
	session_start();
	if(isset($_SESSION["USERID"]) && $_SESSION["USERTYPE"])
		header("location: ../index.php");
	
	if(isset($_POST['loginValid'])){
		require("../database/db_fun.php");
			if (empty($_POST['username']) || empty($_POST['password'])) {
						echo "fileds are empty!!!!!!!!";
			}
			else{
				$uname = $_POST['username'];
				$pass = $_POST['password'];
				$jsonData = getJSONFromDB("select * from user_info");
				
				
			   $jsn=json_decode($jsonData);
			   $loginStatus = false;	
			   foreach($jsn as $v){
				   
					if($uname == $v->USER_NAME && $pass== $v->PASSWORD)
					{
						$_SESSION["USERID"] = $v->USER_ID;
						$_SESSION["USERTYPE"] = $v->USER_TYPE;
						$loginStatus = true;
						header("location:../index.php");	
					}
				}
				
				if(!$loginStatus){
					
					
					echo "User not found or password did not match<br><br>"; 
					echo '<a href = "user_login.php" style="text-decoration: none"> <b> Login </b> </a> ';
					
				}
			}
		 
		   
		}
	else {
		header("location: user_login.php");

	}
?>
 
