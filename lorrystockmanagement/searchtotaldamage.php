<?php
   include ("db.php"); 

 $code=$_GET["code"];



  
   $sql  = "SELECT quantity FROM lorry_damage_stocks WHERE stockId ='".$code."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    while($row=mysqli_fetch_array($result))
    {

     echo$row["quantity"];

    }
?>