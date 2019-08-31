<?php
include "../db_connect.php";
$repId=(int)$_POST['repId'];
$qty=(int)$_POST['qty'];
$stockId=(int)$_POST['stockId'];

/*
$repId=2;
$qty=100;
$stockId=31;

$stockNameR="anchor full cream powder";
$unitPriceR="332.5";
$discPriceR="17.5";
$supplierNameR="fontera";*/
$sql="SELECT stock_details FROM unload_lorry_qty where repID=$repId";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);
$var1=$row['stock_details'];
       //print_r($var1);
       //echo $var1[0]['temp_id'];
$unload_decode=json_decode($var1,true);
      // print_r($unload_decode);
        // print_r($unload_decode);
$elem_unload=count($unload_decode);
         //$stockId=$var2[$x]['stockId'];
 echo $elem_unload;
 for($y=0;$y<$elem_unload;$y++){
   echo "meake athule";
                                   //decoding unload_lorry_qt
   $unload_qty=doubleval($unload_decode[$y]['quntity']);
                                   // $unload_stock_id=$unload_decode[$y]['stockId'];
   $sellingprice=$unload_decode[$y]['sellingprice'];
   $discount=$unload_decode[$y]['discount'];
   $stockid=(int)$unload_decode[$y]['stockID'];
   $unload_stockname=$unload_decode[$y]['productname'];
   $supplierName=$unload_decode[$y]['supplierName'];
                                  // $temp_id=$unload_decode[$y]['temp_id'];

   echo "<br/>".$unload_qty."<br/>";  
   echo $stockid."<br/>";
   $sqla= "INSERT INTO temp_unload(stockID,productname,quntity,discount,sellingprice,supplierName) VALUES('".$stockid."','".$unload_stockname."','".$unload_qty."','".$discount."','".$sellingprice."','".$supplierName."')";
    $result=mysqli_query($conn,$sqla);
   
 }
 $sql1="SELECT * FROM temp_unload where stockID='".$stockId."'";
  $result=mysqli_query($conn,$sql1);
  $row=mysqli_fetch_assoc($result);
  $updatedqty=(int)$row['quntity']-(int)$qty;
  $sql3="UPDATE temp_unload SET quntity=$updatedqty where stockID=$stockId";
  mysqli_query($conn,$sql3);
 
 




$sqlsel = "SELECT * FROM temp_unload";

$list = mysqli_query($conn, $sqlsel);

$data = array();

while($row = mysqli_fetch_assoc($list)){
 $data[]= $row;
}

$tempunload_details = json_encode($data);
echo $tempunload_details;
$sqlupdate="UPDATE unload_lorry_qty SET stock_details='".$tempunload_details."' WHERE repID='".$repId."'";
$result=mysqli_query($conn,$sqlupdate);

$sqldel="DELETE FROM temp_unload";
mysqli_query($conn, $sqldel);  
 

?>