

<?php

Include ("db.php");
$stockName = $_GET['stockName'];

$sql = "UPDATE fin_supplierpayment SET status = 0 where stockName='$stockName'";
mysqli_query($conn,$sql);

Header('location:supplierTransaction.php?valid=1');
?>