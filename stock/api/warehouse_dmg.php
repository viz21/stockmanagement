<?php
include("../db.php");


$sql="SELECT * FROM lorry_damage_stocks ORDER BY id";

$list = mysqli_query($con, $sql);
  
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
  
//start
$sql12="SELECT * FROM warehouse_damage WHERE stockId = '$stockId' and status =0";
$result12=mysqli_query($con, $sql12);

if ($result12 && (mysqli_num_rows($result12) > 0)){
   $row=mysqli_fetch_array($result12);
   $qty=doubleval($row['quantity']);
   $updated_qty = $qty + $quantity;
   $updated_totprice = $unitPrice*$updated_qty;
   $sql13 = "UPDATE warehouse_damage SET quantity ='$updated_qty' , totPrice ='$updated_totprice' WHERE stockId = ' $stockId' ";
   $result13 = mysqli_query($con,$sql13);

echo "succesful";
}
//end
else{
$sql14="INSERT INTO warehouse_damage(supplierName,stockId,stockName,quantity,unitPrice,totPrice,discPrice,status) VALUES('$supName','$stockId','$stockName','$quantity','$unitPrice','$totPrice','$discPrice',0)";

$result14=mysqli_query($con,$sql14);

}


}

$sqld="DELETE FROM  lorry_damage_stocks";
$resultd=mysqli_query($con,$sqld);


header('Location:http://waligama.sanila.tech/lorrystockmanagement/damagestock.php');




?> 