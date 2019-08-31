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

	$sqlselec= "SELECT * from unload_lorry_qty WHERE repID ='".$repId."'";
	$result= mysqli_query($conn, $sqlselec);
	$rowlorry=mysqli_fetch_assoc($result);
	
	$lorryID=$rowlorry['lorryID'];

	$sql = "SELECT * FROM lorry_damage_stocks WHERE lorryID=$lorryID ORDER BY id";
	    
	$list = mysqli_query($conn, $sql);
	
	$data = array();
		
	while($row = mysqli_fetch_assoc($list)){
		$data[]= $row;
	}
	
	echo json_encode($data);
                                     
}

?>