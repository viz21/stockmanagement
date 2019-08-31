<?php

Include ("db.php");
$id = $_GET['id'];

$sql = "UPDATE tempemp_sal SET status = 0 where id='$id'";
mysqli_query($conn,$sql);

Header('location:sal_detail.php?valid=1');
?>