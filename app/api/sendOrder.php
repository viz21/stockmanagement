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

	$retId=(int)$user_data["id"];
	
	date_default_timezone_set("Asia/Colombo");
	$view_date=date("d.m.Y");
	$sql12="SELECT retId FROM tempcart_order WHERE RepId=$repId  GROUP BY retId";
	$result12 = mysqli_query($conn, $sql12);
	$row12=mysqli_fetch_assoc($result12);
	$retId=$row12['retId'];
	//$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230&repId=".$repId;
	$url = "http://localhost/stockmanagement/app/api/getRetailerDetail.php?token=stock1230&repId=".$repId;
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
		if((int)$list[$i]['RetailerID']==$retId){
			$retName=$list[$i]['RetailerName'];
			$sql = "SELECT * FROM tempcart_order WHERE repId=$repId ORDER BY temp_id";

			$list = mysqli_query($conn, $sql);

			$datalist = array();

			while($row = mysqli_fetch_assoc($list)){
				$datalist[]= $row;
			}
			$datalist=json_encode($datalist);
			$sql="SELECT count(id) as cnt FROM retailer_order WHERE retId=$retId";
			$result = mysqli_query($conn, $sql);
			$row=mysqli_fetch_assoc($result);
			if($row['cnt']==0){
				$sql = "INSERT INTO retailer_order(retId,retName,stock_details,date_) VALUES($retId,'$retName','$datalist','$view_date')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					$sql="DELETE FROM tempcart_order WHERE repId=$repId";
					$result = mysqli_query($conn, $sql);
					$auth=1;
					$data = array("status"=> "succesful","msg"=>"Successfully Ordered","auth"=>$auth);
					echo json_encode($data);

				} 
				else{
					$data = array("status"=> "error","msg"=>mysqli_error($conn),"auth"=>$auth);
					echo json_encode($data);
				}
			}
			else{
				$sql = "UPDATE retailer_order SET stock_details='$datalist', date_='$view_date' WHERE retId=$retId";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					$sql="DELETE FROM tempcart_order WHERE repId=$repId";
					$result = mysqli_query($conn, $sql);
					$auth=1;
					$data = array("status"=> "succesful","msg"=>"Successfully Ordered","auth"=>$auth);
					echo json_encode($data);

				} 
				else{
					$data = array("status"=> "error","msg"=>mysqli_error($conn),"auth"=>$auth);
					echo json_encode($data);
				}
			}
			break;

		}

	}
	
}





?>