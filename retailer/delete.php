<?php
include ('db.php');
$Id=$_GET['Id'];
	
	$sql1="DELETE FROM retailer_credits WHERE Id='$Id'";
	$result1= mysqli_query($conn,$sql1);
	if($result1)
		echo 'sucessfull'.'<br>';
	else
		echo 'error'.mysqli_error($conn).'<br>';
        
            header('Location:./retailerCreditsTable.php') ; 

?>