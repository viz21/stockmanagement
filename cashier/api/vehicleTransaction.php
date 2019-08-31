<?php
include("./db.php");

//get vehicle transaction details

date_default_timezone_set("Asia/Colombo");
$transDate=date("d.m.Y");


date_default_timezone_set("Asia/Colombo");
$transactionDate=date("d.m.Y");

$type=$type="Expense";

$description=$_POST['description'];
$amount=doubleval($_POST['amount']);

$status=0;
$finId;

//fin_transdetails db connection

$transactionid = "";
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

        	$netBalance=$row['netBalance']-$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');

            $dailyExpense=$row['dailyExpense']+$amount;
           	$dailyExpense= number_format((float)$dailyExpense,2,'.','');
            $sql4 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyExpense='$dailyExpense' where bDate='$transDate'";
            mysqli_query($conn,$sql4);
        }

        else{
        	$netBalance=$netBalance-$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');
            $sql6="INSERT INTO fin_dailybalance (bDate,dailyExpense,netBalance) VALUES ('$transDate','$amount','$netBalance')";
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