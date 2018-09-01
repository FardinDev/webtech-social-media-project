<?php
	session_start();

	if( !isset($_SESSION["USERID"]) && !isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Profile</title>
		<script type="text/javascript" src="../js/validation.js"> </script>
		<link rel="stylesheet" type="text/css" href= "css/user_profile_design.css" />
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
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.container {
  padding: 0 16px;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
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
</html>

<html>
<head>

</head>
<body>

<?php	
echo '<h2 style="text-align:center">Profile</h2>';
echo '<div class="card">';
 echo ' <div class="container">';

if(isset($_SESSION["USERID"]) && $_SESSION["USERTYPE"]){
			
			require("../database/db_fun.php");
			require("../function/functions.php");
				
			$destination  = "../profile_picture/".$_REQUEST["id"].".jpg";
			
			$imageChanged = false;
			if(isset($_POST['pic_choose_btn'])){
					
				$imageType = $_FILES['propic']['type'];
				$tmp_src = $_FILES['propic']['tmp_name'];
				$imageType = explode('/',$imageType);
				
				if($imageType[0] == 'image'){
					move_uploaded_file($tmp_src,$destination);
					
					$jsoninsertpic="UPDATE userprofile SET IMAGE = '$destination' WHERE USER_ID  = '".$_REQUEST["id"]."'" ;
					
					if(updateDB($jsoninsertpic)){
						$imageChanged = true;
					}else{
				
					}
				}else{
					
				}
			}
				echo '<form action="add.php" method="post">';	
				
			if(file_exists($destination)){
				
				echo '<br><img src="'.$destination.'" alt="icon"  height=100% style="width:100%">'."<br><br>";
				
				if($imageChanged)
					echo "<script> alert('Your Profile Picture Has Changed') </script>";
				
			}else{
				
				echo '<br><img src="../profile_picture/noimage.png" alt="icon"  height=100% style="width:100%" >'."<br><br>";
			}
		
		}		
	
			$to_id = $_SESSION["USERID"];
			$from_id = $_REQUEST["id"];
			
			echo "<input type='hidden' name = 'to_id' value='$to_id'/>";
			echo "<input type='hidden' name = 'form_id' value='$from_id'/>";
		

			$myid = $_SESSION["USERID"];
			$friendid=$_REQUEST["id"];
			
			$jsonData = getJSONFromDB("select status from friend_table WHERE TID =".$myid." and FID =".$friendid." or TID =".$friendid." and FID =".$myid."");
			
			$jsn=json_decode($jsonData);
			
				if (empty($jsn))
			{
				
				$check = 'submit';
				echo'<input type="'.$check.'" style="width:400px; height: 35px; text-align: center;
			background-color: black; font-weight: bold; color:gray; opacity: 0.8;" name = "visitbutton" value= "Add Friend" /><br><br>';
				
			}
			



		foreach($jsn as $v)
			{
			
			
				
		if($v->status == "FRIENDS")
		
		{
			$check = "hidden";
		}
		  else if($v->status == "NOTFRIENDS")
		{
		  $check = 'hidden';
		  echo '<h4>Request Sent<h4>';
		}
		  echo'<input type="'.$check.'" style="width:400px; height: 35px; text-align: center;
			background-color: black; font-weight: bold; color:gray; opacity: 0.8;" name = "visitbutton" value= "Add Friend" /><br><br>';
			
			}
		  
		  echo '</form>';


$joiningQuery = "SELECT * FROM user_info  INNER JOIN userprofile on user_info.USER_ID = userprofile.USER_ID 
						WHERE user_info.USER_ID = '".$_REQUEST["id"]."'";
		$jsonData =  getJSONFromDB($joiningQuery);
		$jsn=json_decode($jsonData);


echo strtoupper("<h1>".$jsn[0]->FIRST_NAME."</h1><h2> ".$jsn[0]->LAST_NAME."</br>"."</br></h2>");


  echo '  <p class="title">Student</p>';
    echo '  <p class="title">';
  echo "<h3></br> ".$jsn[0]->EMAIL."</br>"."</br></h3>";
  echo "<h5></br> ".$jsn[0]->DOB."</br>"."</br></h5>";
  echo "<h5></br> ".$jsn[0]->GENDER."</br>"."</br></h5>";
  echo '  <p>American International University-Bangladesh</p>';
  echo '  <div style="margin: 24px 0;">';
   echo '   <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a> &nbsp&nbsp'; 
   echo '   <a href="https://www.facebook.com"><i class="fa fa-linkedin"></i></a> &nbsp&nbsp ';
    echo '  <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a> &nbsp&nbsp';
   echo '</div>';
  echo '<p><button>See posts</button></p>';
  echo '</div>';
echo '</div>';
?>


</body>
</html>






