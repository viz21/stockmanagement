<?php
include ('db.php');
$claimId=$_GET['claimId'];
$amount=$_GET['amount'];
$percentage=$_GET['percentage'];
	
	//	update addTransaction db
	date_default_timezone_set("Asia/Colombo");
    $claimDate=date("d.m.Y");

    date_default_timezone_set("Asia/Colombo");
    $transactionDate=date("d.m.Y");
    
 
    $sql3="SELECT claimDate from fin_claimeddiscounts where claimId='$claimId'";
    $result3= mysqli_query($conn,$sql3);
    $row = mysqli_fetch_array($result3);
    $transactionDate=$row['claimDate'];


    $sql3="SELECT supplierName from fin_claimeddiscounts where claimId='$claimId'";
    $result3= mysqli_query($conn,$sql3);
    $row = mysqli_fetch_array($result3);
    $supplierName=$row['supplierName'];

    $sql3="SELECT discountAmount from fin_claimeddiscounts where claimId='$claimId'";
    $result3= mysqli_query($conn,$sql3);
    $row = mysqli_fetch_array($result3);
    $discountAmount=$row['discountAmount'];

    $totamount=$discountAmount-$amount;

    $type="Expense";
    $desc="Claimed ".$percentage."% discount from ". $supplierName;


	$sql2="INSERT INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$claimDate','$transactionDate','$type','$desc','$amount')";
	$result2= mysqli_query($conn,$sql2);
	if($result2)
		echo 'sucessfull'.'<br>';
	else
		echo 'error'.mysqli_error($conn).'<br>';

	// update dailyBalance db

	$sql4 ="SELECT * from fin_dailybalance";
    $result4=mysqli_query($conn,$sql4);
        if($result4){
            while($row=mysqli_fetch_array($result4)){
            	echo $row['bDate']."\n";
                if(strcmp($row['bDate'],$claimDate)==0){
                    $status=1;
                    $finId=$row['id'];
                    }
                }

        if($status==1){
                    $sql4 ="SELECT * from fin_dailybalance WHERE id='$finId'";
                        $result4=mysqli_query($conn,$sql4);
                        $row=mysqli_fetch_array($result4);
                    if(strcmp($type, "Income")==0){
                        echo "athule";
                        echo "<br/>"."netbal ".$row['netBalance'];
                        echo "<br/>"."amount ".$amount;

                        $netBalance=$row['netBalance']+$totamount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyIncome=$row['dailyIncome']+$totamount;
                        $dailyIncome= number_format((float)$dailyIncome,2,'.','');
                        $sql5 = "UPDATE fin_dailybalance SET netBalance='$netBalance ', dailyIncome='$dailyIncome' where bDate='$claimDate'";
                        mysqli_query($conn,$sql5);

                    }
                    else{
                        $netBalance=$row['netBalance']-$totamount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyExpense=$row['dailyExpense']+$totamount;
                        $dailyExpense= number_format((float)$dailyExpense,2,'.','');
                        $sql5 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyExpense='$dailyExpense' where bDate='$transDate'";
                        mysqli_query($conn,$sql5);
                    }
                }

        else{
                    echo "eliye";
                    $sql6="SELECT * FROM fin_dailybalance ORDER BY id DESC LIMIT 1";
                    $resulty=mysqli_query($conn,$sql6);
                    $rowy=mysqli_fetch_array($resulty);
                    $netBalance=$rowy['netBalance'];

                    if(strcmp($type, "Income")==0){

                        $netBalance=$netBalance+$totamount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql7= "INSERT INTO fin_dailybalance (bDate,dailyIncome,netBalance) VALUES ('$claimDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql7);
                    } 

                    else{
                        $netBalance=$netBalance-$totamount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql8="INSERT INTO fin_dailybalance (bDate,dailyExpense,netBalance) VALUES ('$claimDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql8);
                    }
                }

        

    }



	
        
            


	


?>