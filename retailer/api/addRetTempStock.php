<?php
session_start();
include("../db.php");
$retailerid=(int)$_POST['RetailerID'];
  //echo $retailerid;
$_SESSION['RetailerID']=$retailerid;



$sqldel2="DELETE FROM tempretstk";
$ts= mysqli_query($conn, $sqldel2);
if($ts){
	echo "dlt tempstck";
}
else{
	echo "error ".mysqli_error();
}
$sql5="SELECT * FROM retailer_order WHERE retId=$retailerid";
$result5 = mysqli_query($conn, $sql5);
$row7 = mysqli_fetch_array($result5);
$rowsize=mysqli_num_rows($result5);
echo "rowsize".$rowsize;
           //  print_r($row7);
if ($rowsize>0){

          // $sqlx= " SELECT * FROM retailer_order WHERE retId=$retailerid";
         //  $resultx=mysqli_query($conn,$sqlx);

	$json=$row7['stock_details'];
	$resultjson= json_decode($json,true);
               //print_r($resultjson);
                    //var_dump($resultjson); 
	$size=count($resultjson);
	for($i=0;$i<$size;$i++){


              // $temp_id= $resultjson[$i]['temp_id'];
		$stockName=$resultjson[$i]['stockName'];
		$quantity=(int)$resultjson[$i]['ord_qty'];
		$stockId=(int)$resultjson[$i]['stockId'];


               //deleting from database

		$sql4 = "INSERT INTO tempretstk(retId,stockName,ord_qty,stockId) VALUES('".$retailerid."','".$stockName."','".$quantity."','".$stockId."')";
		$result4=mysqli_query($conn, $sql4);
		if($result4){
			echo "test";
		}
		else{
			echo "error".mysqli_error($conn);
		}

	}
}
	header('location:../addretailerstock.php');

	?>