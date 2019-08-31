<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");
$auth=0;
if($_GET['token']!="stock1230"){
	$data = array("status"=> "error","msg"=>"Authentication Failed");

	echo json_encode($data);
	die();
}
else{
	include ("db_connect.php");
	$repId=(int)$_GET['repId'];
	$retId=(int)$_GET['retId'];
	if($retId!=0){
		
	$sql="DELETE FROM tempcart_order WHERE repId=$repId";
	$result = mysqli_query($conn, $sql);
	}
	$sql="SELECT count(id) as cnt FROM retailer_order WHERE retId=$retId";
	$result = mysqli_query($conn, $sql);
	$row=mysqli_fetch_assoc($result);
	if($row['cnt']>0){

		$sql = "SELECT * FROM retailer_order where retId=$retId";

		$list = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($list);
		$sample = $row['stock_details'];
		$data = json_decode($sample,true);
		$size=count($data);
		for($i=0;$i<$size;$i++){
			$stockId = $data[$i]['stockId'];
			$stockName = $data[$i]['stockName'];
			$quantity = (int)$data[$i]['ord_qty'];


		/*echo $stockId;
		echo $stockName;
		echo $quantity;
	    echo $unitPrice;
		echo $discPrice;
		echo $supplierName;
		echo $totPrice;*/

		$sql = "INSERT INTO tempcart_order(retId,stockName,ord_qty,stockId,repId) VALUES('$retId','$stockName','$quantity','$stockId',$repId)";
		$result = mysqli_query($conn, $sql);
		
	}
	$auth=1;
	$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
	echo json_encode($data);
}
else{
	$auth=1;
	$data = array("status"=> "succesful","msg"=>"Successfull","auth"=>$auth);
	echo json_encode($data);
}



}

?>