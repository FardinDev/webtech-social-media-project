<!DOCTYPE html>
<html>
	<head>
		<title> Find Friends </title>
		
		<script>
		
		
		</script>
	
	</head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
body {margin:0;}

.icon-bar {
    width: 100%;
    background-color: #555;
    overflow: auto;
}

.icon-bar a {
    float: left;
    width: 8%;
    text-align: center;
    padding: 2px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 27px;
}

.icon-bar a:hover {
    background-color: #000;
}

.active {
    background-color: #4CAF50 !important;
}
input[type=text]
{
	width:10px;
	box-sizing:border-box;
	border: 2px solid black;
	border-radius:20px;
	font-size:15px;
	background-color:white;
	padding: 10px 25px 10px 40px;
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
	height:18px;
	margin:7px;
}
input[type=text]:focus
{
	width: 15%;
}
</style>
	
	
<body style="background-color:#C0BDBC"">
<div class="icon-bar">
	  <a  href="../index.php"><i class="fa fa-home"></i></a> 
	  <a href="../post/post.php"><i class="fa fa-pencil"></i></a>
	  <a href="../user/user_profile.php"><i class="fa fa-vcard"></i></a>  
	  <a class="active" href="../user/friend.php"><i class="fa fa-users"></i></a> 
	  <a href="../user/find_friend.php"><i class="fa fa-user-plus"></i></a>
	  <a href="../user/request.php"><i class="fa fa-handshake-o"></i></a>
	  <a href=""><i class="fa fa-globe"></i></a>
	  <a href=""><i class="fa fa-comments"></i></a>
	  <a href="../logout/logout.php"><i class="fa fa-power-off"></i></a> 
	  <input type="text" name="search" " placeholder= " Search..."> 
</div>


<div style="padding-left:16px">
  
</div>
	

	<h2>FRIENDS</h2>
	<hr>
	
	
	<?php

session_start();



		if ( isset($_SESSION["USERTYPE"]) && isset($_SESSION["USERID"]) )
		{
			require("../database/db_fun.php");
			require("../function/functions.php");
			$myid = $_SESSION["USERID"];
			$jsonData = getJSONFromDB("select * from friend_table WHERE status='FRIENDS' and FID =".$myid." or TID =".$myid."");
			
			$jsn=json_decode($jsonData);
			
		
			foreach($jsn as $v)
			{	
			echo '<form method="post" action="visit_profile.php" id = "id" ><p>';
			
			
			
			
			$jsonData1 = getJSONFromDB("select * from user_info WHERE USER_ID=".$v->TID." or USER_ID=".$v->FID."");
			
			$jsn1=json_decode($jsonData1);
			
			foreach($jsn1 as $va)
			{	
			echo '<form method="post" action="visit_profile.php" id = "id" >';
			
			if($_SESSION["USERID"]!= $va->USER_ID)
			
		{
			
			$name = $va->FIRST_NAME." ".$va->LAST_NAME;
			
			$id =  $va->USER_ID;
		
			$destination  = "../profile_picture/".$va->USER_ID.".jpg";
						

						
		    if(file_exists($destination)){
				echo '<img src="'.$destination.'" alt="icon" align="left" width=40 height=40 onclick="Profile()">';
					echo strtoupper(space(2)."<b>   ".$name."<br></b> ");
					
							echo "<input type='hidden' name = 'id' value='$id'/>";
					
					echo space(2).'<input type="submit" id = "visitbutton"  value ="View" name ="visitbutton" style="width:80px; height: 25px; text-align: center;
			background-color: black; font-weight: bold; color:gray; opacity: 0.8;"> ';
						
		    
			
					
			}else{
			echo '<img src="../profile_picture/noimage.png" alt="icon" align="left" width=40 height=40 onclick="Profile()">';
						echo strtoupper(space(2)."<b>  ".$name."<br></b> ") ;
						
							echo "<input type='hidden' name = 'id' value='$id'/>";
						
											echo space(2).'<input type="submit" id = "visitbutton"  value ="View" name ="visitbutton" style="width:80px; height: 25px; text-align: center;
			background-color: black; font-weight: bold; color:gray; opacity: 0.8;"> ';
						
		           
						
			}
		
				
				
			}
			
			echo "</form>";
			}
			}
		}
		
		else 
		{
			include("function/functions.php");
			echo '<a href = "user/user_login.php" style="text-decoration: none"> <b> Got an ID? Login Here </b>  </a><br> <br> ';
			echo '<a href = "user/user_registration.php"  style="text-decoration: none"> <b> No? Sign-Up Here </b></a>';
		}



?>