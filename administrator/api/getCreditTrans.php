<?php
include("../db.php");

//****Retailer transaction ****
date_default_timezone_set("Asia/Colombo");
$transDate=date("d.m.Y");


date_default_timezone_set("Asia/Colombo");
$transactionDate=date("d.m.Y");

$type="Income";
$transactionid = "";

//****Cheque Details ****
date_default_timezone_set("Asia/Colombo");
$chequeDate=date("d.m.Y");

$chequeId = "";


//get cash transaction details
$description=($_POST['retailerName']);
$amount=doubleval($_POST['amount']);
$method=($_POST['method']);


//get cheque transaction details
$retailerId=($_POST['retailerId']);
$method=($_POST['method']);

echo "retailerId is ".$retailerId."\n";
$sql = "SELECT * FROM retailerdetails WHERE RetailerID=$retailerId";
echo $sql;
	$list = mysqli_query($conn, $sql);	
	$row = mysqli_fetch_array($list);
	$retailerName=$row['RetailerName'];
	echo "retname is ".$retailerName;




$amount=doubleval($_POST['amount']);


//fin_transdetails db connection
if(strcmp($method, "Cash")==0){

	$sql = "INSERT INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$transDate','$transactionDate','$type','$retailerName','$amount')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Successfully Created";

    //fin_dailybalance db connection
    echo $transDate;
    $sql2 ="SELECT * from fin_dailybalance";
    $result2=mysqli_query($conn,$sql2);
    if($result2){
        while($row=mysqli_fetch_array($result2)){
        echo $row['bDate']."\n";
            if(strcmp($row['bDate'],$transDate)==0){
                $status=1;
                $finId=$row['id'];
            }
        }
        if($status==1){
            $sql2 ="SELECT * from fin_dailybalance WHERE id='$finId'";
            $result2=mysqli_query($conn,$sql2);
            $row=mysqli_fetch_array($result2);

            $netBalance=$row['netBalance']+$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');

            $dailyIncome=$row['dailyIncome']+$amount;
            $dailyIncome= number_format((float)$dailyIncome,2,'.','');
            $sql4 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyIncome='$dailyIncome' where bDate='$transDate'";
            mysqli_query($conn,$sql4);
        }

        else{
            $netBalance=$netBalance+$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');
            $sql6="INSERT INTO fin_dailybalance (bDate,dailyIncome,netBalance) VALUES ('$transDate','$amount','$netBalance')";
            mysqli_query($conn,$sql6);
        }
    }
    else{   
        echo mysqli_query($conn);
    }

    } 
    else{
        echo "error" . mysqli_error($conn);
    }
}

else{

   ////insert into fin_chequedetails db
    $sql = "INSERT INTO fin_chequedetails(chequeDate,retailerId,retailerName,Amount) VALUES('$chequeDate','$retailerId','$retailerName','$amount')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Successfully Created 123";
    }
    
}



?>