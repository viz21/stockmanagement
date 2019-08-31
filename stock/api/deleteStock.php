<?php  
include("../db.php");
function test_input($data){
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

$stockName  = test_input($_POST["stockname"]);
$supplierName = test_input($_POST["supname"]);
$qty = test_input($_POST["qty"]);


$tot;
//start
   // echo $stockName;
  //echo $supplierName;

$refund=(int) $_POST['refund'];
 // $sell=$_POST['refund'];
 //echo $refund;
if($refund==1){
 $sql66="SELECT supplierName, purchasing_price*qty as 'tot' FROM stock WHERE supplierName='$supplierName' AND stockID='$stockName'";
 $res66=mysqli_query($con,$sql66);

 while($row=mysqli_fetch_array($res66))
 {
        //$supName=$row['supplierName'];
  $tot=$row['tot'];
  $tot=doubleval($tot);

}
$supp_id=mysqli_insert_id($con);


if ($res66) 
{      
    //echo ' ' ;
    //echo $tot."here ";  
 $url = 'http://waligama.sanila.tech/finance/getStockTrans.php';
 $data = array('id' => $supp_id, 'supplierName' =>$supplierName, 'amount' => $tot);
//echo $data;
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


 $response = curl_exec($ch);

          //echo $response;
     //echo $tot;



} 
    //delete from stock
$stockID = (int)$stockName ;
$sqli="DELETE FROM stock WHERE stockID='$stockID' and  supplierName='$supplierName'";
$resi=mysqli_query($con,$sqli);
           // delete from stock
$stockID = (int)$stockName ;
$sqlk="DELETE FROM stock WHERE stockID='$stockID' and  supplierName='$supplierName'";
$resultk=mysqli_query($con,$sqlk);
header('Location:../deleteStock.php?valid=1');
}


else if($refund==2)
{

    //echo "awa";
    //$stockName=$_POST['txtstockname'];
  $sql="SELECT * FROM stock WHERE  supplierName='$supplierName' AND stockID='$stockName' ";
  $result = mysqli_query($con, $sql);

  while($row=mysqli_fetch_array( $result)){



   $stockID=$row['stockID'];
   $purchasing_price=$row['purchasing_price'];
   $qty=$row['qty'];
   $disscount=$row['discount'];
   $diss_value=$row['diss_value'];
   $sellPrice=$row['selling_price'];
   $date=$row['ddate'];
   $stockName1=$row['stockName'];



   $sqlmm="INSERT INTO holdstock(stockID,supplierName, stockName,purchasing_price,qty,discount,diss_value,selling_price,ddate)VALUES('$stockID','$supplierName','$stockName1','$purchasing_price','$qty','$disscount','$diss_value',' $sellPrice','$date')";
   $resultmm = mysqli_query($con, $sqlmm);

 }
         // delete from stock
 $stockID = (int)$stockName ;
 $sqlk="DELETE FROM stock WHERE stockID='$stockID' and  supplierName='$supplierName'";
 $resultk=mysqli_query($con,$sqlk);
header('Location:../deleteStock.php?valid=2');
}

//end




?>