<?php
include("../db.php");
$lorryid=(int)$_POST["lorryid_un"];

$sql="SELECT * FROM lorry_damage_stocks WHERE lorryID=$lorryid ORDER BY id";

$list = mysqli_query($conn, $sql);

$data = array();

while($row = mysqli_fetch_assoc($list)){
  $data[]= $row;
}
print_r($data);

$elementcount = count($data);
for($x=0; $x<$elementcount; $x++){
  $id=$data[$x]['id'];
  $stockId=$data[$x]['stockId'];
  $stockName=$data[$x]['stockName'];
  $supName=$data[$x]['supplierName'];
  $quantity=doubleval($data[$x]['quantity']);
  $unitPrice=doubleval($data[$x]['unitPrice']);
  $totPrice=doubleval($data[$x]['totPrice']);
  $discPrice=doubleval($data[$x]['discPrice']);
  date_default_timezone_set("Asia/Colombo");
  $Date=date("d.m.Y");
  $date=$array[0];
  $array=explode('.', $Date);
  $month=$array[1];
  $year=$array[2];
  $dateStr=".".$month.".".$year;
  echo $dateStr;
//start
  $sql12="SELECT * FROM warehouse_damage WHERE stockId = '$stockId'  and status =0 and Date_ like '%$dateStr%'";
  
  $result12=mysqli_query($conn, $sql12);
  


  if ($result12 && (mysqli_num_rows($result12) > 0)){
   $row=mysqli_fetch_array($result12);
   $qty=doubleval($row['quantity']);
   $updated_qty = $qty + $quantity;
   $updated_totprice = $unitPrice*$updated_qty;
   $sql13 = "UPDATE warehouse_damage SET quantity ='$updated_qty' , totPrice ='$updated_totprice' WHERE stockId = ' $stockId' ";
   $result13 = mysqli_query($conn,$sql13);

   echo "succesful";
 }
//end
 else{
  $sql14="INSERT INTO warehouse_damage(supplierName,stockId,stockName,quantity,unitPrice,totPrice,discPrice,status,Date_) VALUES('$supName','$stockId','$stockName','$quantity','$unitPrice','$totPrice','$discPrice',0,'$Date')";

  $result14=mysqli_query($conn,$sql14);

}


}

$sqld="DELETE FROM  lorry_damage_stocks where lorryID=$lorryid";
$resultd=mysqli_query($conn,$sqld);


header('Location:http://waligamainv.sanila.tech/stock_keeper/damagestock.php');




?> 