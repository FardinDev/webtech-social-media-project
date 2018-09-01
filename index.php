<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> News Feed </title>
		
		
		<script>
		function Profile()
		{
		  
		 window.location="user/user_profile.php";
		 
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



.img{
  height: 300px;
  weight : 300px;
}
.picture
{
 
  display: block;
    margin: 8px;
  border: 3px solid #858778;
    border-radius: 4px;
    padding: 2px;
    width: 230px;
  height: 250px;
  cursor: pointer;
  float: left;
  display: table;
}
divv{
        width: 744.8px; 
        background-color: none; 
        float: left; 
        height: 300px; 
        text-align: center; 
        
      }
	  
	  
	  body, html {
    height: 80%;
    margin: 0;
}

.bg {
  
    background-image: url("profile_picture/121.JPG");

   
    height: 80%; 


    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
	
	<body>
	
	
	
	<?php
		if ( isset($_SESSION["USERTYPE"]) && isset($_SESSION["USERID"]) ){
			require("database/db_fun.php");
			require("function/functions.php");
			
			$jsonData = getJSONFromDB("select * from user_info");
			$jsn=json_decode($jsonData);
			foreach($jsn as $v)
			{	
		
				if($v->USER_ID == $_SESSION["USERID"]){
					

					if($_SESSION["USERTYPE"] == "AUTH_USER")	{ 
						$destination  = "profile_picture/".$_SESSION["USERID"].".jpg";
						

						
		





		echo	'<body style="background-color: #C0BDBC">';
		echo	 '<div class="icon-bar">';
		echo     '<a class="active" href="index.php"><i class="fa fa-home"></i></a> ';
		echo     '	<a href="post/post.php"><i class="fa fa-pencil"></i></a>';
		echo     ' <a href="user/user_profile.php"><i class="fa fa-vcard"></i></a>';
 		echo     '<a href="user/friend.php"><i class="fa fa-users"></i></a> ';
 		echo     '<a href="user/find_friend.php"><i class="fa fa-user-plus"></i></a>';
		echo     '<a href="user/request.php"><i class="fa fa-handshake-o"></i></a>';
		echo	 '<a href=""><i class="fa fa-globe"></i></a>';
		echo	 '<a href=""><i class="fa fa-comments"></i></a>';
		echo     ' <a href = "logout/logout.php"> <i class="fa fa-power-off"></i></a>';
		echo 	' <input type="text" name="search" placeholder= " Search..."> ';

		echo'</div>';

		echo '</body>';
						
?>
<h1>News Feed</h1>
	
	<hr>
<?php
$jsonData= getJSONFromDB("select * from post;");
$jsn=json_decode($jsonData);
 ?>
 <div>
<tr>


<?php
$p=0;
for($j=0;$j<sizeof($jsn);$j++){
    ?>
     <divv>

 

      
    <img id="myImg" class="picture" hight='50' width = '100'
     src= "post/<?php echo $jsn[$j]->path; ?>" > 
	 
	 
	 <br>   
     
	 <?php 
	 
	 
	 $jsonDatap= getJSONFromDB("select * from userprofile where USER_ID = '".$jsn[$j]->post_by."';");
     $jsnp=json_decode($jsonDatap);
	 
	 

	 
	$impath= $jsnp[0]->IMAGE;
	 
	$org = str_replace("../","","$impath");
	 
//echo $org;
	 
	 echo'<img id="myIm" hight="50" width = "50" src= "'.$org.'">';
	 
	 
	 
	 
	 ?>
	 
	 <br> 	 
     <br>

     <br>   
     <br>
	 <?php 
	 
	 
	 $jsonData1= getJSONFromDB("select * from user_info where USER_ID = '".$jsn[$j]->post_by."';");
     $jsn1=json_decode($jsonData1);
	 
	 

	 
	 echo '<b>'.strtoupper($jsn1[0]->FIRST_NAME." ".$jsn1[0]->LAST_NAME).'</b>';
	 
	 
	 
	 
	 ?>
	 
	 <br> 	 
     <br>
	 
	 
	 
	 
	   <b>
     <?php echo $jsn[$j]->post;?>
	 </b>
     <br> 
	 <br>
       &nbsp;
     
   
     <?php echo $jsn[$j]->date; ?> 
     
     <br>
      
    </divv>

  <?php 
} ?>
</tr>
</div>

<?php			
					}
					else if($_SESSION["USERTYPE"] == "ADMIN_USER"){
						$destination  = "profile_picture/".$_SESSION["USERID"].".jpg";
						
						
						if(file_exists($destination)){
						
							echo '<img src="'.$destination.'" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}else{
					
							echo '<img src="profile_picture/noimage.png" alt="icon" align="right" width=80 height=80 onclick="Profile()">';
						}
						
						echo '<a href = "index.php" style="text-decoration: none"> <b> Home </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo '<a href = "post/post.php" style="text-decoration: none"> <b> Post </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo '<a href = "user/user_profile.php" style="text-decoration: none"> <b> Profile </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo '<a href = "" style="text-decoration: none"> <b> Friend list </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo '<a href = "user/friend.php" style="text-decoration: none"> <b> Find People </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo space(180).'<a href = "user/search.php" style="text-decoration: none"> <b> Search </b> </a>'.' &nbsp &nbsp &nbsp ';
						echo '<a href = "logout/logout.php" style="text-decoration: none"> <b> Logout </b> </a><br>';
						//echo "<br>Welcome ".$v->FIRST_NAME." !!!!!";
			
				    }
				}
				
			}
			
		}else {
			?>
			<center>
         
	
<div class="bg"></div>
			
			<?php
			include("function/functions.php");
			echo '<br><br> <br><br> <br><br> <br><br> <br><br><a href = "user/user_login.php" style="text-decoration: none;"> 
			<b><h2 style="color:black; "> Got an ID? Login Here </h2></b>  </a><br> <br> ';
			echo '<a href = "user/user_registration.php"  style="text-decoration: none"> <b> 
			<h2 style="color:black; "> No? Sign-Up Here </h2></b></a>';
			
            echo '</div>';
			
		}
	?>
		</center>
		
	</body>
</html>