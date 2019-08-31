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
	$stockId=0;
	$stockName = "";
	$quantity = 0;
	$quantityErr = "";
	
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);

	$stockId=(int)$user_data["stockId"];
	$quantity=(int)$user_data["quantity"];

	//$url = "http://waligamainv.sanila.tech/stock_mangement/api/getLorryStock.php?token=stock1230";
	$url = "http://localhost/stockmanagement/app/api/getAllStock.php";
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
	if((int)$list[$i]['id']==$stockId){

			$stockName=$list[$i]['stockName'];
			$unitPrice=doubleval($list[$i]['purchasing_price']);
			$unitPrice= number_format((float)$unitPrice, 2, '.', '');
			$totPrice=$unitPrice*$quantity;
			$discPrice=doubleval($list[$i]['discount'])*$quantity;
			$discPrice= number_format((float)$discPrice, 2, '.', '');
			$sql = "Insert INTO damage_stocks(stockId,stockName,quantity,unitPrice,totPrice,discPrice) VALUES('$stockId','$stockName','$quantity','$unitPrice','$totPrice','$discPrice')";    
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
		
		
	}

}
	
}
?>