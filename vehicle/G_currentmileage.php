<?php
	include_once 'dbconnect.php';

	$id=$_GET["ret"];
	//$_GET["ret"];
	$sql="SELECT f_mileage FROM vehiclemileage WHERE vehiclenum='".$id."' ORDER BY id DESC LIMIT 1";
	$result2=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result2);
    $currentmileage=$row['f_mileage'];
    

    echo $currentmileage;




?>
