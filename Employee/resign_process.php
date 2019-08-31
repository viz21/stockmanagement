

<?php

Include ("db.php");
$emp_id = $_GET['emp_id'];

$sql = "UPDATE emp_detail SET status = 0 where emp_id='$emp_id'";
mysqli_query($conn,$sql);

Header('location:emp_del.php?valid=1');
?>