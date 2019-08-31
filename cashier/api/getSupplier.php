<?php
include("../db.php");

//get supplier transaction details

$supplierName=$_POST['supName'];
$price=doubleval($_POST['totprice']);
$Id=$_POST['s_ID'];
//echo $supplierName;

//echo "Price is".$_POST['totprice'];

//insert into supplierpayment db
$sql="INSERT INTO fin_supplierpayment (supplierName, price, Id) VALUES ('$supplierName', '$price', '$Id')";
$result = mysqli_query($conn, $sql);


?>