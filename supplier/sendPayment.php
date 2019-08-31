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
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);
	$retId=(int)$user_data["retId"]; 
	$amount = doubleval($user_data["amount"]);
	$payment_method = $user_data["method"];
	$totPrice = doubleval($user_data["totPrice"]);	
	$discount = doubleval($user_data["discount"]);
	$retName = $user_data["retName"];
	$credit_status;
	$credit_amount=$totPrice-$amount;
	if($credit_amount==0){
		$credit_status=0;
	}
	else if($credit_amount<0){
		$credit_status=1;//aduwen gewwoth
	}
	else{
		$credit_status=2;//wadipura gewwoth

	}

	$sql = "Insert INTO rep_d_sales(retId,retName,totPrice,discount) VALUES('$retId','$retName','$totPrice','$discount')";    
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$sql = "SELECT * FROM tempcart WHERE repId=$repId ORDER BY id";

		$list = mysqli_query($conn, $sql);

		$unloaded = array();

		while($row = mysqli_fetch_assoc($list)){
			$unloaded[]= $row;
		}

		$stocks= json_encode($unloaded);
		$sql1="INSERT INTO retailer_stocks(stocks) VALUES ('$stocks')";
		$result1 = mysqli_query($conn, $sql1);
		if ($result1) {
			$sales_id=mysqli_insert_id($conn);
			//Retailer data sending
			/*$url = 'http://localhost:89/stock_mangement/api/test.php?token=stock1230';
			$data = array('SalesID' => $sales_id, 'RetailerID' => $retId, 'RetailerName' => $retName,'Price' => $totPrice, 'PaidAmount' => $amount, 'Method' => $payment_method, 'Discount' => $discount, 'Credits1' => $credit_amount, 'Credits_Status' => $credit_status);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);

			//finance data sending

			$url = 'http://localhost:89/stock_mangement/api/finance.php?token=stock1230';
			$data = array('RetailerID' => $retId, 'RetailerName' => $retName,'Price' => $totPr0ice, 'PaidAmount' => $amount, 'Method' => $payment_method, 'Discount' => $discount);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);

			//Lorry Stock data sending

			$tempStock= json_encode($unloaded);

			$url = 'http://localhost:89/stock_mangement/api/lorry.php?token=stock1230';
			$data = array('stock' => $tempStock);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);


*/
				//Lorry Stock data sending

			$sql = "SELECT * FROM tempcart WHERE repId=$repId ORDER BY id";

			$list = mysqli_query($conn, $sql);

			$data = array();

			while($row = mysqli_fetch_assoc($list)){
				$data[]= $row;
			}

			$tempStock= json_encode($data);

			$url = 'http://localhost:89/stock_mangement/api/lorry.php?token=stock1230';
			$data = array('stock' => $tempStock);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);

			$sql="DELETE FROM tempcart";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$sql="DELETE FROM tempcart";
				$auth=1;
				$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
				echo json_encode($data);
			} 
			else{
				$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
				echo json_encode($data);
			}
		} 
		else{
			$data = array("status"=> "error eka meaken ","msg"=>mysqli_error($con),"auth"=>$auth);
			echo json_encode($data);
		}
	}

	else{
		$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
		echo json_encode($data);
	}

}
?>