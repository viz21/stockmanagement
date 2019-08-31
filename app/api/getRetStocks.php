<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");

if($_GET['token']!="stck123"){
	$data = array("status"=> "error","msg"=>"Authentication Failed");
	echo json_encode($data);
	die();
}
else{
	include ("db_connect.php");
	$repId=(int)$_GET['repId'];
	$retId=(int)$_GET['retId'];
	$sql = "SELECT * FROM unload_lorry_ret where repID=$repId AND retId=$retId";

	$list = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($list);
	$sample = $row['stock_details'];
	$dataStock = json_decode($sample,true);

	$sql1="DELETE FROM tempcart WHERE repId=$repId";
	$result = mysqli_query($conn, $sql1);
	$sql1="DELETE FROM tempcart_rep_lorry WHERE repId=$repId";
	$result = mysqli_query($conn, $sql1);
	


	$sql="SELECT * FROM tempcart_rep_rm WHERE repId=$repId";
	$result=mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	if ($row>0){
		$result=mysqli_query($conn, $sql);
		$stock = array();
		
		while($row = mysqli_fetch_assoc($result)){
		
		$url='./lorry/updateLorryRmv.php';
		//$url='http://localhost:89/stock_mangement/api/lorry/updateLorryRmv.php';
		$data = array('stockId'=>$row['stockId'],'repId'=>$repId,'quantity'=>$row['quantity']);
		//print_r($data);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$response = curl_exec($ch);
		//echo "response\n\n".$response."\n\nresponse ends here";
		//echo "response start\n\n";
		//echo $response;
		//echo "\n\nresponse end\n\n";
		}
	$sql="DELETE FROM tempcart_rep_rm WHERE repId=$repId";
	$result = mysqli_query($conn, $sql);
	
	}
	




	echo json_encode($dataStock);
}

?>