<?php

Include ("db.php");
$id = $_GET['id'];

$sql = "UPDATE tempretailer_payments SET status = 0 where id='$id'";
mysqli_query($conn,$sql);

Header('location:getretailerPaymentTable.php?valid=1');
?>