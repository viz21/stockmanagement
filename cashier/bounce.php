<?php
include ("db.php");

$chequeId=(int)$_GET['chequeId'];

// delete from notclearchequedetails db

$sql1="DELETE FROM fin_chequedetails WHERE chequeId=$chequeId";
	$result1= mysqli_query($conn,$sql1);
	if($result1)
		echo 'sucessfully deleted notclearchequedetails'.'<br>';
	else
		echo 'error 1234566'.mysqli_error($conn).'<br>';

		header('Location:./notClearChequeDetails.php?valid=2');

	


?>