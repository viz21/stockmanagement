<?php
	include ("db_connect.php");
	$sql="SELECT * FROM retailer_stocks WHERE id=1";
	$list =mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($list);
	$test=$row['stocks'];
	$slist=json_decode($test,true);
	print_r($slist);
	$size = sizeof($slist);
	for($i=0;$i<$size;$i++){
		echo $slist[0]['id']."<br/>";

	}

?>