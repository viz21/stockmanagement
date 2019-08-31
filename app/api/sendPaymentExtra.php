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
	else if($credit_amount>0){
		$credit_status=1;//less paid
		$sql="SELECT * FROM rep_d_fin WHERE rep_id=$repId";
		$list =mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($list);
		$curr=$row['credit']+$credit_amount;

		$sql="UPDATE rep_d_fin SET credit=$curr WHERE rep_id=$repId";
		$list =mysqli_query($conn,$sql);
	}
	else if($credit_amount<0){
		$credit_status=2;//over paid
	}

	$sql="SELECT * FROM rep_d_fin WHERE rep_id=$repId";
	$list =mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($list);
	$curr=$row[$payment_method]+$amount;

	$sql="UPDATE rep_d_fin SET $payment_method=$curr WHERE rep_id=$repId";
	$list =mysqli_query($conn,$sql);
		

	$sql = "INSERT INTO rep_d_sales(retId,retName,totPrice,discount,repId) VALUES('$retId','$retName','$totPrice','$discount',$repId)";    
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$sql = "SELECT * FROM tempcart_extra WHERE repId=$repId ORDER BY id";

		$list = mysqli_query($conn, $sql);

		$unloaded = array();

		while($row = mysqli_fetch_assoc($list)){
			$unloaded[]= $row;
		}

		$stocks= json_encode($unloaded);
		$sql1="INSERT INTO retailer_stocks(stocks,retId) VALUES ('$stocks',$retId)";
		$result1 = mysqli_query($conn, $sql1);
		if ($result1) {
			$sales_id=mysqli_insert_id($conn);

	//-------------------------------- Retailer data sending --------------------------------------------------
			$url = 'http://localhost/stockmanagement/retailer/api/fetchdata.php';
			$data = array('SalesID' => $sales_id, 'RetailerID' => $retId, 'RetailerName' => $retName,'Price' => $totPrice, 'PaidAmount' => $amount, 'Method' => $payment_method, 'Discount' => $discount, 'Credits1' => $credit_amount, 'Credits_Status' => $credit_status);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);
		/*
			echo "echo from Retailer response \n";
			echo $response."\n";
			echo "end of retaier response \n";
			*/

	//--------------------------------finance data sending-----------------------------------
			

			$url = 'http://localhost/stockmanagement/finance/api/getRepTransaction.php';
			//echo $amount;	
			$data = array('retailerId' => $retId, 'retailerName' => $retName,'amount' => $amount, 'method' => $payment_method, 'discount' => $discount, 'list' => $stocks);
			//print_r($data);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);
		/*
			echo "<br/>";
			echo "echo from finance response \n";
			echo $response."\n";
			echo "end of finance response \n";
		*/



	//---------------- Lorry Stock data sending----------------------------------------------------



			//$url = 'http://waligamainv.sanila.tech/stock_mangement/lorrystockmanagement/api/updateremaining.php';
			$url='http://localhost/stockmanagement/app/api/lorry/updateLorry.php';
			$data = array('stock' => $unloaded,'repId'=>$repId);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			/*echo "<br/>";
			echo "echo from lorry response \n";
			echo $response."\n";
			echo "end of lorry response \n";
			*/


			
			$sql="DELETE FROM tempcart_extra WHERE repId=$repId";
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
		else{
			$data = array("status"=> "error eka meaken ","msg"=>mysqli_error($conn),"auth"=>$auth);
			echo json_encode($data);
		}
	}

	else{
		$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
		echo json_encode($data);
	}

}
?>