<?php
	session_start();

	if( !isset($_SESSION["USERID"]) && !isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
	
?>	
	
	
<!DOCTYPE html>
<html>
	<head>
		<title> ACCEPT </title>
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
	  <a class="active" href="../index.php"><i class="fa fa-home"></i></a> 
	  <a href="../post/post.php"><i class="fa fa-pencil"></i></a>
	  <a href="../user/user_profile.php"><i class="fa fa-vcard"></i></a>  
	  <a href="../user/friend.php"><i class="fa fa-users"></i></a> 
	  <a href="../user/find_friend.php"><i class="fa fa-user-plus"></i></a>
	  <a href="../user/request.php"><i class="fa fa-handshake-o"></i></a>
	  <a href=""><i class="fa fa-globe"></i></a>
	  <a href=""><i class="fa fa-comments"></i></a>
	  <a href="../logout/logout.php"><i class="fa fa-power-off"></i></a> 
	  <input type="text" name="search" " placeholder= " Search..."> 
</div>


<div style="padding-left:16px">
  
</div>
<?php
	
		require("../database/db_fun.php");
		
		date_default_timezone_set('Asia/Dhaka');
		
			$insertQuery = "UPDATE friend_table SET status = 'FRIENDS' WHERE TID=".$_SESSION["USERID"]." and FID=".$_REQUEST["id"]."";
			
		
			
			if(updateDB($insertQuery))
			{
				
            echo "<script type='text/javascript'>alert('You Are Now Friends');window.location='request.php';</script>";
			

			}
			
			else
			{
				echo "Not Successful!!!";
			}
			
				
				

?> 
</html>
