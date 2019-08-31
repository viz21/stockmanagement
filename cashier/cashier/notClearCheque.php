<?php
include ("db.php");

$chequeId=(int)$_GET['chequeId'];
$retailerName=$_GET['retailerName'];
$Amount=$_GET['Amount'];

//add to fin_notclearcheque db

date_default_timezone_set("Asia/Colombo");
$chequeDate=date("d.m.Y");

$sql2="INSERT INTO fin_notclearcheque(chequeDate,retailerName,Amount) VALUES('$chequeDate','$retailerName','$Amount')";
    $result2= mysqli_query($conn,$sql2);
    if($result2)
        echo 'sucessfull'.'<br>';
    else
        echo 'error'.mysqli_error($conn).'<br>';




	
//send cleared cheque details to retailer

$url = "http://waligamainv.sanila.tech/retailer/api/test3.php";

$ChequeStatus=1;
$sql2 ="SELECT * from fin_chequedetails WHERE chequeId=$chequeId";
$result2=mysqli_query($conn,$sql2);
if($result2){
    echo "meaw";
}   
else{
    echo mysqli_error($conn);
}
$row = mysqli_fetch_array($result2);

$chequeDate=$row['chequeDate'];
$retailerId=$row['retailerId'];
$Amount=$row['Amount'];
                       
$data = array('ChequeDate' => $chequeDate,'RetailerID' => $retailerId, 'Amount'=> $Amount, 'ChequeStatus'=> $ChequeStatus );
echo "data is ";
print_r($data);
echo "\n";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
echo "response of curl \n";
        echo $response."\n";
echo "response \n";        

echo $Amount;
echo $ChequeStatus;
echo $retailerId;
echo $chequeDate;



// delete from chequedetails db

$sql1="DELETE FROM fin_chequedetails WHERE chequeId=$chequeId";
	$result1= mysqli_query($conn,$sql1);
	if($result1)
		echo 'sucessfully deleted'.'<br>';
	else
		echo 'error 1234566'.mysqli_error($conn).'<br>';

		header('Location:./chequeDetails.php?valid=2');

	


?>