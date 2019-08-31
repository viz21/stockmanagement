<?php 
 include ("db.php"); 
$code=$_GET['supnm'];
$stockName=$_GET['stcknm'];

$qty=doubleval($_GET['qtyst']);

$sql="INSERT INTO pur_temp(stockName,qty) VALUES ('$stockName',$qty)";
$result=mysqli_query($conn,$sql);
if($result){
	echo "success";
}
else{
	echo "error".mysqli_error($conn);
}
header('location:purchasing.php?supnm='.$code);

?>