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
	$sql = "SELECT * FROM unload_lorry_qty where repID=$repId";
	    
	$list = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($list);
	$sample = $row['stock_details'];
	$data = json_decode($sample,true);
		
	
	echo json_encode($data);
                                     
}

?>