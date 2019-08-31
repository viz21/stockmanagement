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
        

if($ord<$stckqty){
	
   
	$sql="SELECT * FROM templorrystck WHERE stockID='".$stockid."'";
	$result=mysqli_query($conn,$sql);
   
if ($result && (mysqli_num_rows($result) == 0)){

	
	 $sql2="INSERT INTO templorrystck(stockID,productname,quntity,discount,sellingprice,supplierName) VALUES('".$stockid."','".$stockname."','".$ord."','".$discount."','".$sellingprice."','".$supname."')";
     mysqli_query($conn,$sql2);

      
     $sql="INSERT INTO del_retview(stockId,stockName,supplierName,stockqty,ordqty,disval,sellingprice) VALUES ('".$stockid."','".$stockname."','".$supname."','".$stckqty."','".$ord."','".$discount."','".$sellingprice."')";
                                               mysqli_query($conn,$sql);


      
        $sql="DELETE FROM temp_retview where stockId='".$stockid."'";
        mysqli_query($conn,$sql);


      //delete from jason retailer order
         /*       $sqlsearch="SELECT stock_details FROM retailer_order where retId='".$retid."'";
                $result1 = mysqli_query($conn,$sqlsearch);

                while($row = mysqli_fetch_assoc($result1))
                     {      
                         
                                         $var1=$row['stock_details'];
                                         
                                         $var2=json_decode($var1,true);
                                          $elementcount = count( $var2) ;
                                      for($x=0; $x<$elementcount; $x++)
                                      {           $stockidjs=$var2[$x]['stockId'];
                                                  $ordqty=$var2[$x]['ord_qty'];
                                                  $productname=$var2[$x]['stockName'];
                                                  $tempid=$var2[$x]['tempid'];

                                                 if($stockid!=$stockidjs){

                                                          $sql="INSERT INTO retjasontemp(tempid,stockId,stockName,ord_qty) values ('".$tempid."','".$stockidjs."','".$productname."','".$ordqty."')";
                                                          mysqli_query($conn,$sql);
                                                 }


                              }
                       }*/
           }
}


header('location:loadlorrystck.php?retname='.$retid);


?>