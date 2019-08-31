<?php
include ('db.php');
$Id=$_GET['Id'];
 //echo $Id;
 $BList=0;
	
	$sql="UPDATE retailer_credits set BList=$BList where Id=$Id";
	$result1= mysqli_query($conn,$sql);
	if($result1)
		echo 'sucessfull'.'<br>';
	else
		echo 'error'.mysqli_error($conn).'<br>';
        
            header('Location:./RetailerCreditsTable.php') ; 

?>