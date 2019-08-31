<?php
include ("db.php");

	
//send not cleared cheque details to retailer

$ChequeStatus=1;
$sql2 ="SELECT * from fin_chequeDetails";
    $result2=mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($result2);

$chequeDate=$row['chequeDate'];
$retailerId=$row['retailerId'];
$Amount=$row['Amount'];

$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230";
$data = array('ChequeDate' => $chequeDate,'RetailerID' => $retailerId, 'Amount'=> $Amount, 'ChequeStatus'=> $ChequeStatus );
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

echo $Amount;
echo $ChequeStatus;
echo $retailerId;
echo $chequeDate;



// delete from chequedetails db

$chequeId=$_GET['chequeId'];

    $sql1="DELETE FROM fin_chequeDetails WHERE chequeId='$chequeId'";
    $result1= mysqli_query($conn,$sql1);
    if($result1)
        echo 'sucessfull'.'<br>';
    else
        echo 'error'.mysqli_error($conn).'<br>';

        header('Location:./chequeDetails.php');
        
        
            


	


?>