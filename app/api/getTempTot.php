<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");

if($_GET['token']!="stock1230"){
	$data = array("status"=> "error","msg"=>"Authentication Failed");
	echo json_encode($data);
	die();
}
else{
include ("db_connect.php");
	$repId=(int)$_GET['repId'];
	$sql = "SELECT * FROM tempcart WHERE repId=$repId ORDER BY id";
	    
	$list = mysqli_query($conn, $sql);
	
	$data = array();
	$totalSoldPrice=0;
	$totalDiscount=0;	
	while($row = mysqli_fetch_assoc($list)){
		$totalSoldPrice=$totalSoldPrice+doubleval($row['totPrice']);
		$totalDiscount=$totalDiscount+doubleval($row['discPrice']);
	}
	$totalSoldPrice=number_format((float)$totalSoldPrice, 2, '.', '');
	$totalDiscount=number_format((float)$totalDiscount, 2, '.', '');
	array_push($data, $totalSoldPrice,$totalDiscount);
	echo json_encode($data);
}
?>