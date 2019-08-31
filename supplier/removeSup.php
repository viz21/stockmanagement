<?php 
include_once 'db.php';



$Supid=(int)$_GET["Supid"];

$sql4="DELETE FROM supplierdetails WHERE Supid=$Supid";

mysqli_query($conn,$sql4);

  header('location:supplierDetails.php?valid=1');


?>