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

	$id=(int)$user_data["id"];
   
   $sql="SELECT * FROM tempcart WHERE id='$id' and repId=$repId";
   $result=mysqli_query($conn,$sql);
   $row=mysqli_fetch_array($result);
   $status=(int)$row['status'];
   if($status==1){
			$sql="DELETE FROM tempcart WHERE id='$id' and repId=$repId"; 
			$result = mysqli_query($conn, $sql);
			$sql="DELETE FROM tempcart_rep_lorry WHERE id='$id' and repId=$repId"; 
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$auth=1;
				$data = array("status"=> "succesful","msg"=>"Successfully Removed","auth"=>$auth);
				echo json_encode($data);
			} 
			else{
				$auth=2;
				$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
				echo json_encode($data);
			} 
	}
	else{
		$stockId=$row["stockId"];
		$stockName=$row["stockName"];
		$quantity=$row["quantity"];
		$unitPrice=$row["unitPrice"];
		$totPrice=$row["totPrice"];
		$discPrice=$row["discPrice"];
		$supplierName=$row["supplierName"];

		$sql = "INSERT INTO tempcart_rep_rm(stockId,stockName,quantity,unitPrice,totPrice,discPrice,repId,supplierName) VALUES('$stockId','$stockName','$quantity','$unitPrice','$totPrice','$discPrice',$repId,'$supplierName')";
					
		$result = mysqli_query($conn, $sql);

		$url='http://localhost/stockmanagement/app/api/lorry/updateLorryAdd.php';

		//$url='http://localhost:89/stock_mangement/api/lorry/updateLorryAdd.php';
			$data = array('stockId' => $stockId,'quantity' => $quantity,'repId'=>$repId,'stockName'=>$stockName,'unitPrice'=>$unitPrice,'discPrice'=>$discPrice,'supplierName'=>$supplierName);
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			/*echo "respoonse start here \n \n";
			echo $response;
			echo "\n \n response end \n";*/
			
			$sql="DELETE FROM tempcart WHERE id='$id' and repId=$repId"; 
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$auth=1;
				$data = array("status"=> "succesful","msg"=>"Successfully Removed","auth"=>$auth);
				echo json_encode($data);
			} 
			else{
				$auth=2;
				$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
				echo json_encode($data);
			} 
		

	}
	
}
?>