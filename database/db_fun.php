<?php
    $server = "localhost";
	$databse_user_name = "root";
	$password = "";
	$databasename = "social";
	function updateDB($sql){
		
		$conn = mysqli_connect("localhost","root","","social");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		if(mysqli_query($conn, $sql)) {
			return true;
		}
		else{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			return false;
		}
	}

	function getJSONFromDB($sql){
		//$GLOBALS['server'],$GLOBALS['databse_user_name'],$GLOBALS['password'],$GLOBALS['databasename']
		$conn = mysqli_connect("localhost","root","","social");
		//echo $sql;
		$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
		$arr=array();
		//print_r($result);
		while($row = mysqli_fetch_assoc($result)) {
			$arr[]=$row;
		}
		return json_encode($arr);
	}
?>