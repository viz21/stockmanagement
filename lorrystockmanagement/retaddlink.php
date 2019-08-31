<?php 



 
include("db.php");


$stockname=$_GET['stockname'];
$stockid=$_GET['stockid'];
$stckqty=$_GET['stockqty'];
$ord=$_GET['ord_qty'];
$discount=$_GET['disval'];
$sellingprice=$_GET['selingprice'];
$supname=$_GET['supname'];
   $retid=$_GET['retid'];
        


	$sql="SELECT * FROM retordertemp WHERE stockId='".$stockid."'";
	$result=mysqli_query($conn,$sql);
   
if ($result && (mysqli_num_rows($result) == 0)){
	
	 $sql2="INSERT INTO retordertemp(stockId,stockName,ord_qty) VALUES('".$stockid."','".$stockname."','".$ord."')";
     mysqli_query($conn,$sql2);

    

           $sql="INSERT INTO del_retview(stockId,stockName,supplierName,stockqty,ordqty,disval,sellingprice) VALUES ('".$stockid."','".$stockname."','".$supname."','".$stckqty."','".$ord."','".$discount."','".$sellingprice."')";
                                               mysqli_query($conn,$sql);


                                                $sql="DELETE FROM temp_retview where stockId='".$stockid."'";
                                                      mysqli_query($conn,$sql);

}


header('location:loadlorrystck.php?retname='.$retid);


?>