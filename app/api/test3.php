<?php
include "db_connect.php";
$stock=$_POST['stock'];
print_r($stock);
echo "here";
$sql="INSERT INTO test(stocks) VALUES ('$stock')";
$result = mysqli_query($conn, $sql);

?>