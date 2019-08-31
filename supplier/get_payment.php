<?php
include_once 'db.php';
$s_ID=(int)$_POST['s_id'];
 $method = $_POST["method"];
 $amount=$_POST['totprice'];
 date_default_timezone_set("Asia/Colombo");
 $view_date=date("d.m.Y");

 $sql = "SELECT * FROM sup_temptable WHERE s_ID=$s_ID ";
 $list = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($list);
 $supName=$row["supName"];
 $stock_ID=(int)$row["stock_ID"];
echo $supName;
echo $stock_ID;
 $sql = "Insert INTO sup_payment(date_,method,amount,supName,stock_ID) VALUES('$view_date','$method','$amount','$supName',$stock_ID)";    
 $result = mysqli_query($conn, $sql);
 if ($result) {
				//$sql = "SELECT * FROM payment WHERE pID=$pID ";


 	$sql="DELETE FROM sup_temptable WHERE s_ID=$s_ID";
 	$result = mysqli_query($conn, $sql);


 }
 else{
 	echo "error".mysqli_error($conn);
 }




 ?>