<?php
include("../db.php");

//****Retailer transaction ****
date_default_timezone_set("Asia/Colombo");
$transDate=date("d.m.Y");

date_default_timezone_set("Asia/Colombo");
$transactionDate=date("d.m.Y");

$type="Expence";
$transactionid = "";

//getting details
$retId=($_POST['retId']);
$stockId=($_POST['stockId']);
$quantity=doubleval($_POST['quantity']);

//$retId=1;
//$stockId=1;
//$quantity=100;

//selecting the retailer name
$sql ="SELECT * from retailerdetails WHERE RetailerID='$retId'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
            $RetailerName=$row['RetailerName'];

echo $RetailerName;

//selecting the unit price
$sql2 ="SELECT * from stock WHERE stockID='$stockId'";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
            $unitprice=$row2['selling_price'];

 echo $unitprice;

 $totprice=$quantity*$unitprice;
 echo $totprice;

 $description="Refund money from : ".$RetailerName;

//inserting the transaction in to the fintrans table 
$sql3 = "INSERT INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$transDate','$transactionDate','$type','$description','$totprice')";
	$result3 = mysqli_query($conn, $sql3);


//updating the net balance
   if ($result) {
        echo "Successfully Created";

    //fin_dailybalance db connection
	echo $transDate;
    $sql4 ="SELECT * from fin_dailybalance";
    $result4=mysqli_query($conn,$sql4);
    if($result4){
        while($row=mysqli_fetch_array($result4)){
        echo $row['bDate']."\n";
            if(strcmp($row['bDate'],$transDate)==0){
                $status=1;
                $finId=$row['id'];
            }
        }
        if($status==1){
        	$sql5 ="SELECT * from fin_dailybalance WHERE id='$finId'";
            $result5=mysqli_query($conn,$sql5);
            $row5=mysqli_fetch_array($result5);

        	$netBalance=$row5['netBalance']-$totprice;
            $netBalance= number_format((float)$netBalance,2,'.','');

            $dailyExpense=$row5['dailyExpense']+$totprice;
           	$dailyExpense= number_format((float)$dailyExpense,2,'.','');
            $sql6 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyExpense='$dailyExpense' where bDate='$transDate'";
            mysqli_query($conn,$sql6);
        }

        else{
        	$netBalance=$netBalance-$totprice;
            $netBalance= number_format((float)$netBalance,2,'.','');
            $sql6="INSERT INTO fin_dailybalance (bDate,dailyExpence,netBalance) VALUES ('$transDate','$totprice','$netBalance')";
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


















?>