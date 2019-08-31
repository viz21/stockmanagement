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
	$stockId=0;
	$stockName = "";
	$quantity = 0;
	$quantityErr = "";
	
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);

	$stockId=(int)$user_data["stockId"];
	$quantity=(int)$user_data["quantity"];
	$retId=(int)$user_data["retId"];
	$retName=(int)$user_data["retName"];
	//$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230&repId=".$repId;
	$url = "http://localhost/stockmanagement/app/api/getAllStock.php?token=stock1230&repId=".$repId;
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
			$supplierName=$list[$i]['supplierName'];
			$unitPrice=$list[$i]['purchasing_price'];
			$discPrice=$list[$i]['discount'];

			$url = 'http://localhost/stockmanagement/app/api/lorry/updateLorryAdd.php';
			$data = array('repId' => $repId, 'quantity' => $quantity, 'stockId' => $stockId, 'supplierName' => $supplierName, 'unitPrice' => $unitPrice, 'discPrice' => $discPrice, 'stockName' => $stockName);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);
			$url='http://localhost/stockmanagement/finance/api/getReturnRep.php?token=stock1230';
			$data = array('retId'=>$retId,'stockId'=>$stockId,'quantity'=>$quantity,'repId'=>$repId);
    //print_r($data);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);

			date_default_timezone_set("Asia/Colombo");
			$freeDate=date("d.m.Y");
			
			$sqla= "INSERT INTO return_stock(stockName,suppliername,quantity,Date_,retailerName) VALUES('".$stockName."','".$supplierName."','".$quantity."','".$freeDate."')";
			$result=mysqli_query($conn,$sqla);
			$auth=1;
			$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
			echo json_encode($data);


		}

	}
	
}
?>