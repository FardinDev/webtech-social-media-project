<?php

	session_start();

	if( !isset($_SESSION["USERID"]) && !isset($_SESSION["USERTYPE"]))
		header("location: ../index.php");
	


date_default_timezone_set('Asia/Dhaka');

$conn = mysqli_connect("localhost", "root", "","social");


$postlen = strlen($_REQUEST['post']);

if($postlen == 4)
{
	
echo "<script type='text/javascript'>alert('Please write something');window.location='post.php'</script>";	
	
}


$uploadOk = 1;
$target_dir = "image/";
$target_file = $target_dir.$_FILES['imageUpload']['name'];
echo $target_file."<br>";
$length = strlen($target_file);

$myid = $_SESSION["USERID"];
echo $_FILES["imageUpload"]["tmp_name"]."<br>";

	if($length == 6)
	{
		echo "<script type='text/javascript'>alert('No Image selected');window.location='post.php'</script>";
		$uploadOk = 0;

	}
    else if (file_exists($target_file)) {
    echo "Sorry, file already exists."."<br>";
       $uploadOk = 0;
    }
  else{
    if(move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
    $sql="insert into post (path,post,date,post_by) values('".$target_file."','".$_REQUEST['post']."','".date('Y-m-d H:i:s a')."','".$myid."')";
    $result = mysqli_query($conn, $sql)or die(mysqli_error());
    
    echo "<script type='text/javascript'>alert('The file ".  $_FILES["imageUpload"]["name"]. " has been uploaded');window.location='../index.php'</script>";
    }else {

		echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file');window.location='post.php'</script>";
    }
  }
?>
