<?php
include("./db.php");

date_default_timezone_set("Asia/Colombo");
$claimDate=date("d.m.Y");

$claimedStatus="Not Claimed";

$claimId = "";

//get claimed discount details(amount)

$list= $_POST['list'];

$array=json_decode($list,true);

print_r($array);
$arrcount=count($array);
echo $arrcount;


for($i=0; $i<$arrcount;$i++) {

	$discountAmountt=$array[$i]['discPrice'];
	$stockId=$array[$i]['stockId'];

	//get supplier name from supplier db
	$sql3 ="SELECT * from stock WHERE stockID=$stockId";
	$result3=mysqli_query($conn,$sql3);
	$row=mysqli_fetch_array($result3);
	$supplierName=$row['supplierName'];

		//check whether it is already in db

		if(strcmp($row['supplierName'],$supplierName)==0){

			//update fin_claimeddiscounts db

			$discountAmounre=$row['discountAmount']+$discPrice;
			$sql3 = "UPDATE fin_claimeddiscounts SET discountAmount='$discPrice' where supplierName='$supplierName'";
			$result = mysqli_query($conn, $sql);

    		if ($result) {
        	echo "Successfully Created";
    		}
    	}

    	//insert into fin_claimeddiscount db
    	else{
			$sql = "INSERT INTO fin_claimeddiscounts(claimDate,supplierName,discountAmount,claimedStatus) VALUES('$claimDate','$supplierName','$discountAmount','$claimedStatus')";
			$result = mysqli_query($conn, $sql);

    		if ($result) {
        	echo "Successfully Created";
    		}
    	}

}

?>