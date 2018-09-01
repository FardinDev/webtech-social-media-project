<!DOCTYPE html>
<html>
	<head>
		<title> Find Friends </title>
		
		<script>
		function visit()
		
		{
		  var name = document.getElementById('id');
		alert(name);
		}
		
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
	  <a href="../user/friend.php"><i class="fa fa-users"></i></a> 
	  <a class="active" href="../user/find_friend.php"><i class="fa fa-user-plus"></i></a>
	  <a href="../user/request.php"><i class="fa fa-handshake-o"></i></a>
	  <a href=""><i class="fa fa-globe"></i></a>
	  <a href=""><i class="fa fa-comments"></i></a>
	  <a href="../logout/logout.php"><i class="fa fa-power-off"></i></a> 
	  <input type="text" name="search" " placeholder= " Search..."> 
</div>


<div style="padding-left:16px">
  
</div>

	<h2>Find Friends</h2>
	<hr>
	
	
	<?php

session_start();



		if ( isset($_SESSION["USERTYPE"]) && isset($_SESSION["USERID"]) ){
			require("../database/db_fun.php");
			require("../function/functions.php");
			
			$jsonData = getJSONFromDB("select * from user_info");
			$jsn=json_decode($jsonData);
			foreach($jsn as $v)
			{	
			echo '<form method="post" action="visit_profile.php" id = "id" >';
			
			if($_SESSION["USERID"]!= $v->USER_ID)
			
		{
			
			$name = $v->FIRST_NAME." ".$v->LAST_NAME;
			
			$id =  $v->USER_ID;
		
			$destination  = "../profile_picture/".$v->USER_ID.".jpg";
						

						
		    if(file_exists($destination)){
				echo '<img src="'.$destination.'" alt="icon" align="left"  height=50 width=50 onclick="Profile()">';
					echo strtoupper(space(2)."<b>   ".$name."<br></b> ");
					
							echo "<input type='hidden' name = 'id' value='$id'/>";
					
					echo space(2).'<input type="submit" id = "visitbutton"  value ="Visit" name ="visitbutton"> <br> <br>';
						
		             $_COOK = $id;
			
					//echo '<a href = "user/find_friend.php" style="text-decoration: none"> <b> $name </b> </a>';
			}else{
			echo '<img src="../profile_picture/noimage.png" alt="icon" align="left" height=50 width=50 onclick="Profile()">';
						echo strtoupper(space(2)."<b>   ".$name."<br></b> ");
						
							echo "<input type='hidden' name = 'id' value='$id'/>";
						
						echo space(2).'<input type="submit" id = "visitbutton"  value ="Visit" name ="visitbutton"> <br> <br>';
						
						$_COOK = $id;
						//echo '<a href = "user/find_friend.php" style="text-decoration: none"> <b> $name </b> </a>';
			}
		
				
				
			}
			
			echo "</form>";
			}
			
		}else {
			include("function/functions.php");
			echo '<a href = "user/user_login.php" style="text-decoration: none"> <b> Got an ID? Login Here </b>  </a><br> <br> ';
			echo '<a href = "user/user_registration.php"  style="text-decoration: none"> <b> No? Sign-Up Here </b></a>';
		}








?>

