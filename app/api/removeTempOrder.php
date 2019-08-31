<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");
$auth=0;
if($_GET['token']!="stock1230"){
	$data = array("status"=> "error","msg"=>"Authentication Failed","auth"=>$auth);
	echo json_encode($data);
	die();
}
else{
	include ("db_connect.php");
	$repId=(int)$_GET['repId'];
	$stockId=0;
	$stockName = "";
	$quantity = 0;
	$quantityErr = "";
	
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);

	$id=(int)$user_data["id"];

	$sql="DELETE FROM tempcart_order WHERE temp_id='$id' and repId=$repId";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$auth=1;
		$data = array("status"=> "succesful","msg"=>"Successfully Removed","auth"=>$auth);
		echo json_encode($data);
	} 
	else{
		$auth=2;
		$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
		echo json_encode($data);
	} 
	
	
}
?>