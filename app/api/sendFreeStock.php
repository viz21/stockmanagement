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
	$url = "http://localhost/stockmanagement/app/api/getLorryStock.php?token=stock1230&repId=".$repId;
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
			if($quantity<=(int)$list[$i]['quntity']){
				$stockName=$list[$i]['productname'];
				$supplierName=$list[$i]['supplierName'];

				$url = 'http://localhost/stockmanagement/app/api/lorry/updateLorryRmv.php';
				$data = array('repId' => $repId, 'qty' => $quantity, 'stockId' => $stockId);

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


				$response = curl_exec($ch);
				date_default_timezone_set("Asia/Colombo");
				$freeDate=date("d.m.Y");
				$sql1="SELECT * FROM retailer_stocks where retId='$retId' ORDER BY id DESC LIMIT 1 ";
				$result1 = mysqli_query($conn, $sql1);
				$row1 = mysqli_fetch_array($result1);
				$rowsize1=mysqli_num_rows($result1);
//echo "rowsize".$rowsize1;
				$id=$row1['id'];
				$sqla= "INSERT INTO retailer_free_stock(saleId,stockId,stockName,quantity,suppliername,Date_) VALUES('".$id."','".$stockId."','".$stockName."','".$quantity."','".$supplierName."','".$freeDate."')";
				$result=mysqli_query($conn,$sqla);
				$auth=1;
				$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
				echo json_encode($data);
				
			}
			else{
				$auth=2;
				$msg="Maximum no of stocks available is ".$list[$i]['quntity'];
				$data = array("status"=> "error","msg"=>$msg,"auth"=>$auth);
				echo json_encode($data);
			}
		}

	}
	
}
?>