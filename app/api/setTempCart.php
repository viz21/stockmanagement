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
	$sql = "SELECT * FROM unload_lorry_ret where repID=$repId AND retId=$retId";
	    
	$list = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($list);
	$sample = $row['stock_details'];
	$data = json_decode($sample,true);
	$size=count($data);
	for($i=0;$i<$size;$i++){
		$stockId = $data[$i]['stockID'];
		$stockName = $data[$i]['productname'];
		$quantity = (int)$data[$i]['quntity'];
		$unitPrice = doubleval($data[$i]['sellingprice']);
		$discPrice = $data[$i]['discount']*$quantity;
		$supplierName = $data[$i]['supplierName'];
		$totPrice=doubleval($quantity)*$unitPrice;


		/*echo $stockId;
		echo $stockName;
		echo $quantity;
	    echo $unitPrice;
		echo $discPrice;
		echo $supplierName;
		echo $totPrice;*/
		$sql = "INSERT INTO tempcart(stockId,stockName,quantity,unitPrice,totPrice,discPrice,repId,supplierName,status) VALUES('$stockId','$stockName','$quantity','$unitPrice','$totPrice','$discPrice',$repId,'$supplierName',0)";
		$result = mysqli_query($conn, $sql);
			/*if ($result) {
				$auth=1;
				$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
				echo json_encode($data);
			} 
			else{
				$data = array("status"=> "error","msg"=>mysqli_error($conn),"auth"=>$auth);
				echo json_encode($data);
			} */

	}
	$auth=1;
	$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
	echo json_encode($data);

                                     
}

?>