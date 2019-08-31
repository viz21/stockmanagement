<?php
   include ("db.php"); 

 $code=$_GET["code"];

 

  
   $sql  = "SELECT * FROM stock WHERE stockID ='".$code."'";
   //"SELECT diss_value,selling_price,qty,supplierName FROM stock WHERE stockName ='".$code."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    while($row=mysqli_fetch_array($result))
    {
     
     echo$row["diss_value"].",".$row["selling_price"].",".$row["qty"].",".$row["supplierName"];

    }
?>