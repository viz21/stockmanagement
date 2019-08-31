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

//****Claim Discount Details ****
date_default_timezone_set("Asia/Colombo");
$claimDate=date("d.m.Y");

$claimedStatus="Not Claimed";

$claimId = "";

//get cash transaction details
$description=($_POST['retailerName']);
$amount=doubleval($_POST['amount']);
$method=($_POST['method']);


//get cheque transaction details
$retailerId=($_POST['retailerId']);
$method=($_POST['method']);
$retailerName=($_POST['retailerName']);
$amount=doubleval($_POST['amount']);

echo "amount is ".$amount;


//get claimed discount details(amount,supplierName)

//$list=['{"id":"21","stockId":"12","stockName":"butter carolls","quantity":"5","unitPrice":"20.40","totPrice":"102.00","discPrice":"2.00","repId":"2","supplierName":"Shavin"},{"id":"22","stockId":"14","stockName":"cream","quantity":"2","unitPrice":"10.10","totPrice":"20.20","discPrice":"0.20","repId":"2","supplierName":"yesil"}'];

$list1= $_POST['list'];
//$discPrice=$_POST['discount'];

//echo "discount is ".$discPrice;

$array=json_decode($list1,true);

print_r($array);
$arrcount=count($array);
echo $arrcount;



//fin_transdetails db connection
if(strcmp($method, "Cash")==0){

	$sql = "INSERT INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$transDate','$transactionDate','$type','$description','$amount')";
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



//fin_claimeddiscount db connection
for($i=0; $i<$arrcount;$i++) {

   
    $stockId=$array[$i]['stockId'];
    $supplierName1=$array[$i]['supplierName'];
    $discPrice=$array[$i]['discPrice'];
    $quantity=$array[$i]['quantity'];
    $totdiscPrice=$discPrice;

    //get supplier name from fin_claimeddiscounts db
    $sql3 ="SELECT * from fin_claimeddiscounts where supplierName='$supplierName1'";
    $result3=mysqli_query($conn,$sql3);
    $row=mysqli_fetch_array($result3);
    $supplierName=$row['supplierName'];

        //compair supplierNames

        if($row<>null||$row<>""){
            //update fin_claimeddiscounts db

            $discountAmount=$row['discountAmount']+$totdiscPrice;
            $sql3 = "UPDATE fin_claimeddiscounts SET discountAmount=$discountAmount where supplierName='$supplierName1'";
            $result = mysqli_query($conn, $sql3);

            echo "totalprice".$totdiscPrice;
            echo "supname".$supplierName1;

            if ($result) {
            echo "Successfully Created";
            }
        }

        

            //insert into fin_claimeddiscount db
        else{
            $sql = "INSERT INTO fin_claimeddiscounts(claimDate,supplierName,discountAmount,claimedStatus) VALUES('$claimDate','$supplierName1',$totdiscPrice,'$claimedStatus')";
            $result = mysqli_query($conn, $sql);

            echo "Total price".$totdiscPrice;
            echo "supname".$supplierName1;

            if ($result) {
            echo "Successfully Created 789";
            }
        }

}


?>
