<?php
include ("db_connect.php");
$sql="SELECT * FROM lorryitems WHERE id=3";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$str="10.50";
$a=doubleval($str)+$row['discount'];
echo $a."\n";
$a= number_format((float)$str, 2, '.', '');
echo $a;
$sql="UPDATE lorryitems SET discount='$a' WHERE id=3";
mysqli_query($conn,$sql);
?>