<?php
include ("db.php");
$chequeId=$_GET['chequeId'];
	
	//	update addTransaction db
	date_default_timezone_set("Asia/Colombo");
    $chequeDate=date("d.m.Y");

    $sql3="SELECT Amount from fin_chequedetails where chequeId='$chequeId'";
    $result3= mysqli_query($conn,$sql3);
    $row = mysqli_fetch_array($result3);
    $amount=$row['Amount'];
    
    $type="Income";

    $sql9="SELECT retailerName from fin_chequedetails where chequeId='$chequeId'";
    $result9= mysqli_query($conn,$sql9);
    $row = mysqli_fetch_array($result9);
    $retailerName=$row['retailerName'];


	$sql2="INSERT INTO fin_transdetails(transDate,type,description,amount) VALUES('$chequeDate','$type','$retailerName','$amount')";
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
                if(strcmp($row['bDate'],$chequeDate)==0){
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

                        $netBalance=$row['netBalance']+$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyIncome=$row['dailyIncome']+$amount;
                        $dailyIncome= number_format((float)$dailyIncome,2,'.','');
                        $sql5 = "UPDATE fin_dailybalance SET netBalance='$netBalance ', dailyIncome='$dailyIncome' where bDate='$chequeDate'";
                        mysqli_query($conn,$sql5);

                    }
                    else{
                        $netBalance=$row['netBalance']-$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyExpense=$row['dailyExpense']+$amount;
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

                        $netBalance=$netBalance+$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql7= "INSERT INTO fin_dailybalance (bDate,dailyIncome,netBalance) VALUES ('$ChequeDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql7);
                    } 

                    else{
                        $netBalance=$netBalance-$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql8="INSERT INTO fin_dailybalance (bDate,dailyExpense,netBalance) VALUES ('$chequeDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql8);
                    }
                }

        

    }


//send cleared cheque details to retailer

$url = "http://localhost:89/stock_mangement/api/getLorryStock.php?token=stock1230";

$ChequeStatus=0;
$sql2 ="SELECT * from fin_chequeDetails";
    $result2=mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($result2);

$chequeDate=$row['chequeDate'];
$retailerId=$row['retailerId'];
$Amount=$row['Amount'];
                       
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

$sql1="DELETE FROM fin_chequeDetails WHERE chequeId='$chequeId'";
	$result1= mysqli_query($conn,$sql1);
	if($result1)
		echo 'sucessfull'.'<br>';
	else
		echo 'error'.mysqli_error($conn).'<br>';

		header('Location:./chequeDetails.php');
        
            


	


?>