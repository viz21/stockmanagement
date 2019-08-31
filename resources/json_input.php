<?php
header('Content-type:application/json');
 header("Access-Control-Allow-Origin: *");
if($_GET['token']!="stock1230"){
	$data = array("status"=> "error","msg"=>"Authentication Failed");
	echo json_encode($data);
	die();
}
include ("db_connect.php");
	$data=file_get_contents('php://input');
	$receive=json_decode($data,true);
	$user_id=(int)$receive['user_id'];


	$sql = "";	
	$result = mysqli_query($conn, $sql);
	                                     
	$data = array("status"=> "successfull","msg"=>"successfully added");
	echo json_encode($data);


?>