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
/*	
	
$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
// This is what solved the issue (Accepting gzip encoding)
curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
$response = curl_exec($ch);
curl_close($ch);
echo $response;

$test= json_decode($response,true);
echo sizeof($test);
if((int)$test[0]['id']==1){
	echo "hari";

}
else{
	echo "waradi";
}

$s="5";
$t=intval($s)+5;
echo (int)$t."<br/>";
date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
$a_date = "1.02.2017";
$s= date("t.m.Y", strtotime($a_date));
echo $s;
*/
$SalesID= doubleval($_POST['SalesID']);
$RetailerID= doubleval($_POST['RetailerID']);
$RetailerName= $_POST['RetailerName'];
$Price = doubleval($_POST['Price']);
$PaidAmount= doubleval($_POST['PaidAmount']);
$Method= $_POST['Method'];
$Discount= doubleval($_POST['Discount']);
$Credits= doubleval($_POST['Credits']);
$Credits_Status=doubleval($_POST['Credits_Status']);

$sql="INSERT INTO cartitems(SalesID,RetailerID,RetailerName,Price,PaidAmount,Method,Discount,Credits,status) VALUES ($SalesID,$RetailerID,'$RetailerName',$Price,$PaidAmount,'$Method',$Discount,$Credits,$Credits_Status) ";
$result=mysqli_query($conn, $sql);
if($result){
	$data = array("status"=> "success","msg"=>"success");
echo json_encode($data);
}
else{
	echo "error ".mysqli_error($conn);
}
}
?>