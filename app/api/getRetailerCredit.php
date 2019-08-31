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
	
	$sql = "SELECT * FROM retailer_credits ORDER BY id";
	    
	$list = mysqli_query($conn, $sql);
	
	$data = array();
		
	while($row = mysqli_fetch_assoc($list)){
		$id=(int)$row['RetailerID'];
		$sql1 = "SELECT * FROM retailerdetails WHERE RetailerID=$id";	    
		$list1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($list1);
		$row['RetailerName']=$row1['RetailerName'];
		$row['ShopName']=$row1['ShopName'];
		$data[]= $row;
	}
	
	echo json_encode($data);
                                     
}

?>