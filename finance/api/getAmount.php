<?php
	include ("./db.php");
	$id=(int)$_POST['id'];
	$sql="SELECT * FROM fin_supplierpayment WHERE Id=$id";
	$result2=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result2);
    $supplierName=$row['supplierName'];
    $amount=$row['price'];

    $data_ = array("status"=>"Successfull","amount"=>$amount,"supplierName"=>$supplierName);
    echo json_encode($data_);
?>