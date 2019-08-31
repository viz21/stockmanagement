<?php

include("db.php");

$stckID=$_GET['stockID'];
$supname=$_GET['supplierName'];

$sql="DELETE FROM holdstock WHERE stockID='$stckID'";

mysqli_query($conn,$sql);
 
header('location:viewstock.php');













?>