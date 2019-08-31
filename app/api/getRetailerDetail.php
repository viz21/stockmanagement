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
	
	$sql = "SELECT * FROM retailerdetails ORDER BY ShopName ASC";
	    
	$list = mysqli_query($conn, $sql);
	
	$data = array();
		
	while($row = mysqli_fetch_assoc($list)){
		$data[]= $row;
	}
	
	echo json_encode($data);
 }                                    


?>