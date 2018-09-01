<?php
	
	if(isset($_POST['loginValid'])){
		require("../../database/db_fun.php");
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
				   
					if((($uname == $v->USER_NAME && $pass== $v->PASSWORD ) || ($uname == $v->EMAIL && $pass == $v->PASSWORD))
						&& $v->USER_TYPE == "ADMIN_USER"){
						session_start();
						$_SESSION["USERID"] = $v->USER_ID;
						$_SESSION["USERTYPE"] = $v->USER_TYPE;
						
						echo "Welcome ".$v->FIRST_NAME." User Type: ".$v->USER_TYPE ;
						$loginStatus = true;
						header("location:../../index.php");
						
					}
				}
				
				if(!$loginStatus){
					header("location: admin_login.php");
				}
			}
		}
	else {
		header("location: admin_login.php");

	}
?>
 
