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
	$retId=(int)$_GET['retId'];
	$stockId=0;
	$stockName = "";
	$quantity = 0;
	$quantityErr = "";
	
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);

	$stockId=(int)$user_data["stockId"];
	$quantity=(int)$user_data["quantity"];
	
	//$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230&repId=".$repId;
	$url = "http://localhost/stockmanagement/app/api/getAllStock.php?token=stock1230";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
// This is what solved the issue (Accepting gzip encoding)
	curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
	$response = curl_exec($ch);
	curl_close($ch);
	$list= json_decode($response,true);
	$size=sizeof($list);

	for($i=0;$i<$size;$i++){
		if((int)$list[$i]['stockID']==$stockId){
				$stockName=$list[$i]['stockName'];
				$sql = "INSERT INTO tempcart_order(retId,stockName,ord_qty,stockId,repId) VALUES($retId,'$stockName','$quantity','$stockId',$repId)";
				$result = mysqli_query($conn, $sql);
				
					if ($result) {
						$auth=1;
						$data = array("status"=> "succesful","msg"=>"Successfully Added","auth"=>$auth);
						echo json_encode($data);
					}
					else{
						$data = array("status"=> "error","msg"=>mysqli_error($conn),"auth"=>$auth);
						echo json_encode($data);
					}
				
			
		}

	}
	
}
?>