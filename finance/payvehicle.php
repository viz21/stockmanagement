<?php

Include ("db.php");
$id = $_GET['id'];

$sql = "UPDATE tempvehiclefuel SET status = 0 where id='$id'";
mysqli_query($conn,$sql);

Header('location:fueldetail.php?valid=1');
?>