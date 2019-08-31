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
	$amount = $user_data["amount"];
	$method = $user_data["method"];

	
	$sql="SELECT * FROM rep_d_fin WHERE rep_id=$repId";
	$list =mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($list);
	$curr=$row[$method]+$amount;

	$sql="UPDATE rep_d_fin SET $method=$curr WHERE rep_id=$repId";
	$list =mysqli_query($conn,$sql);

	$credit=$amount*(-1);
	$url = 'http://localhost/stockmanagement/retailer/api/paycredits.php';
	$data = array('RetailerID' => $retId,'Method' => $method,'Credits1' => $credit);
	//echo "retailer data ".$data."\n";	
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);
		/*	echo "echo from Retailer response \n";
			echo $response."\n";
			echo "end of retaier response \n";
		*/	


			$url = 'http://localhost/stockmanagement/finance/api/getCreditTrans.php';	
			$data = array('retailerId' => $retId,'amount' => $amount, 'method' => $method);
		//	echo "finance data ".$data."\n";
		//	print_r($data);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);
		/*	echo "<br/>";
			echo "echo from Finance response \n";
			echo $response."\n";
			echo "end of Finance response \n";

			
*/			$auth=1;
			$data = array("status"=> "error","msg"=>"Successfully Paid","auth"=>$auth);
			echo json_encode($data);


}		
			
?>