<?php
require("../database/db_fun.php");


$i = 0;

$jsonData= getJSONFromDB("select * from user_info");

$jsn=json_decode($jsonData);

for ($i=0;$i<sizeof($jsn);$i++){
	
	if(trim($_REQUEST['uname']) == trim($jsn[$i]->USER_NAME)){
		$i = 1;
		break;
	}
}

if($i==1){
	echo " Username already exists";
	$i = 0;
}

else{
	echo "ok";
}

?>
