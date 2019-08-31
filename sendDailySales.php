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
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);
	$repId=(int)$user_data["id"];

	$sql = "SELECT * FROM rep_d_sales WHERE repId=$repId ORDER BY id";
	    
	$list = mysqli_query($conn, $sql);
	
	$data = array();
		
	while($row = mysqli_fetch_assoc($list)){
		$data[]= $row;
	}
	$data=json_encode($data);
	

	$url = 'http://waligama.sanila.tech/Employee/repDailySales.php';
	$data = array('empid' => $repId,'data' => $data);
	echo "data is ".$data."\n";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	echo "\n response start \n";
	echo $response;

/*
	$sql="DELETE FROM rep_d_sales WHERE repId=$repId";   
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$auth=1;
		$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
		echo json_encode($data);
	} 
	else{
		$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
		echo json_encode($data);
	}
	*/ 
	
}       

?>