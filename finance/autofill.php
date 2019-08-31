<?php
   include ("db.php"); 

 $code=$_GET["code"];


//$code="potato";
  
   $sql  = "SELECT stockName,totprice FROM fin_supplierpayment WHERE status = 1 and supplierName ='".$code."'" ;
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    while($row=mysqli_fetch_array($result))
    {

     echo$row["stockName"].",".$row["totprice"];

    }
?>