<?php 



 
include("db.php");

$retid=$_GET['retid'];
$id=$_GET['temp_id'];

$sql1="SELECT * FROM retordertemp where tempid='".$id."'";
$result=mysqli_query($conn,$sql1);

 while($row = mysqli_fetch_assoc($result)){

       $stid=$row["stockId"];
       

 }




$sql1="SELECT * FROM del_retview where stockId='".$stid."'";
$result1=mysqli_query($conn,$sql1);

while($row=mysqli_fetch_assoc($result1)){

     $stockid=$row["stockId"];
     $productname=$row["stockName"];
     $supname=$row["supplierName"];
     $stqty=$row["stockqty"];
     $ordqty=$row["ordqty"];
     $disval=$row["disval"];
     $selingprice=$row["sellingprice"];



     

}


 $sql="INSERT INTO temp_retview(stockId,stockName,supplierName,stockqty,ordqty,disval,sellingprice) values('".$stockid."','".$productname."','".$supname."','".$stqty."','".$ordqty."','".$disval."','".$selingprice."')";
                                               mysqli_query($conn,$sql);


$sql="DELETE FROM retordertemp WHERE tempid='".$id."' ";

mysqli_query($conn,$sql);

$sql1="DELETE FROM del_retview where stockId='".$stid."'";
mysqli_query($conn,$sql1);


 header('location:loadlorrystck.php?retname='.$retid);





?>