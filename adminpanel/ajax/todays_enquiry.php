<?php
	include('../class/auth.php');
	header("Content-type: application/json");

	$sqlenquiry = $obj->FlyQuery("SELECT * FROM `enquiry` WHERE `date` = CURDATE()");

	$var=array("data"=>$sqlenquiry);
echo json_encode($var);
	
?>