<?php
   include ("db.php"); 

 $code=$_GET["code"];


//$code="potato";
  
   $sql  = "SELECT qty,purchasing_price,discount FROM stock WHERE stockName ='".$code."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    while($row=mysqli_fetch_array($result))
    {

     echo$row["qty"].",".$row["purchasing_price"].",".$row["discount"];

    }
?>