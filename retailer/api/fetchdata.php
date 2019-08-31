<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");
// providing the db connection
include("../db.php");
echo "fetchdata\n";

$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];

/*
$json = $_REQUEST['json'];
echo "JSON: \n";
var_dump($json);

$result= json_decode($json,true);
var_dump($result);
*//*
$SalesID= $result['SalesID'];                  
$RetailerID= $result['RetailerID'];
$Price = $result['Price'];
$PaidAmount= $result['PaidAmount'];
$Method= $result['Method'];
$Quantity= $result['Quantity'];
$Discount= $result['Discount'];
$Credits= $result['Credits'];
$CreditStatus=$result['CreditStatus'];
*/


$SalesID= doubleval($_POST['SalesID']);
$RetailerID= doubleval($_POST['RetailerID']);
$RetailerName= $_POST['RetailerName'];
$Price = doubleval($_POST['Price']);
$PaidAmount= doubleval($_POST['PaidAmount']);
$Method= $_POST['Method'];
$Discount= doubleval($_POST['Discount']);
$Credits1= doubleval($_POST['Credits1']);
$Credits_Status=intval($_POST['Credits_Status']);


echo $SalesID."<br/>";
echo $RetailerID."<br/>";
echo $RetailerName."<br/>";
echo $Price."<br/>";
echo $PaidAmount."<br/>";
echo $Method."<br/>";
echo $Discount."<br/>";
echo $Credits1."<br/>";
echo $Credits_Status."<br/>";

/*$SalesID= 32;
$RetailerID= 4;
$RetailerName= "tharuka nanayakkara";
$Price = 2500;
$PaidAmount= 2000;
$Method= "cash";
$Discount= 200;
$Credits1= 500;
$Credits_Status=1;*/


date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
//echo "$Date";
$array=explode('.', $Date);
$date=$array[0];
$month=$array[1];
$year=$array[2];




//insert data into retailer payment table
$sql1 = "INSERT INTO retailer_payment(RetailerID,SalesID,Date_,Price,PaidAmount,Discount,Method) values($RetailerID,$SalesID,'$Date',$Price,$PaidAmount,$Discount,'$Method')";
$result1 = mysqli_query($conn, $sql1);

if ($result1) {
	echo "Successfully updated your details 123"; 

} else
echo "error 123" . mysqli_error($conn);



//insert data to retailer stock table
/*$sql2 = "INSERT INTO retailer_stocks(RetailerID,Date_,SalesID,Price,Discount) values($RetailerID,'$Date',$SalesID,$Price,$Discount)";
$result2 = mysqli_query($conn, $sql2);

if ($result2) {
	echo "Successfully updated your details"; 

} else
echo "error 456" . mysqli_error($conn);
*/



//calucualting the deadline date

//$CreditStatus= 1;
//$RetailerID= 18;

if ($Method=="Cheque" ){
	if( $Credits_Status==0) {

		$credit_amount=0;
		$Method_="pay";

		$sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$PaidAmount,$credit_amount,'$Method_')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			echo "Successfully updated your details 456 "; 

		} else
		echo "error 456" . mysqli_error($conn);

	}
	else if ( $Credits_Status==1) {
		$Method_="Credits";


		$sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$PaidAmount,$Credits1,'$Method_')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			echo "Successfully updated your details 456"; 

		} else
		echo "error 456" . mysqli_error($conn);

	}
	else{
		$Method_=(string)$Price;

		$sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$PaidAmount,$Credits1,'$Method_')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			echo "Successfully updated your details 789"; 
		} else
		echo "error 789" . mysqli_error($conn);
	}
}

else{

	if ($Credits_Status==1) {



		$last = date("t.m.Y",strtotime($Date));
                             //echo $last."<br/>";
		$array1=explode('.',$last );
		$daysmonth=$array1[0];
                             //echo $daysmonth."<br/>";


		$creditdate=$date+$plusDate;

		if($creditdate>$daysmonth){
			$nextmonth=$array1[1]+1;

                              //if the month is greater than 12 moving to the nxt year with month and date.
			if($nextmonth>12){
				$nextyear=$year+1;
				$nextyearmonth=$nextmonth-$month;
				$newdate=$creditdate-$daysmonth;
				$nextyearmonth=sprintf("%02d",$nextyearmonth);
				$newdate=sprintf("%02d",$newdate);
				$arr = array($newdate,$nextyearmonth,$nextyear);
				$Deadline= implode(".", $arr);
                                // echo $Deadline."<br/>";

			}
			else{

                               //if the month is less than 12 moving to the next month and new date.
				$newdate=$creditdate-$daysmonth;
                                // echo $nextmonth."<br/>";
				$nextmonth=sprintf("%02d",$nextmonth);
				$newdate=sprintf("%02d",$newdate);
				$arr = array($newdate,$nextmonth,$year);
				$Deadline= implode(".", $arr);
                                // echo $Deadline."<br/>";
			}
		}
		else{

                             	//increasing the date to the new date
                             	//echo "less"."<br/>";
			$arr = array($creditdate,$month,$year);
			$Deadline= implode(".", $arr);
                                // echo $Deadline."<br/>";



		}






	          // checking whether ther is a perticular id in database.
		echo $RetailerID;
		$sql="SELECT * FROM retailer_credits WHERE RetailerID=$RetailerID";
		$result = mysqli_query($conn, $sql);
		if ($result) {
					echo "Successfully updated your details ***"; 

				} else{
					echo "error ***" . mysqli_error($conn); 
				}
		$row = mysqli_fetch_array($result);
		$rowsize=mysqli_num_rows($result);
		echo "no of rows ".$rowsize;
		if ($row<>null||$row<>""){
                    // echo 'matched'."<br/>";


                     //obtaining the count for the perticular id
			$Count = $row['Count'];
                      //  echo $Count."<br/>";




			if ($Count<3) {
				$Credits=$row['Credits'];
				$Credits=$Credits+$Credits1;
				echo "\n credit is ". $Credits."\n";
				 if($Credits>0){
     				 $Count=$Count+1;

   				 }
   				 else{
   	 				  $Count=0;

   				 }
				
                             	//echo $Credits."<br/>";

				$Credits1;
				$BList=0;
								
                                 // echo $Count."<br/>";
                                //  echo $Credits."<br/>";

				$sql = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

				$result = mysqli_query($conn, $sql);


				if ($result) {
					echo "Successfully updated your details 147"; 

				} else{
					echo "error 147" . mysqli_error($conn); 
				}




			}

                              //ELSE part contain when the count is equal to 3

			else{
                               	    // obtain the countin database

				$Credits=$row['Credits'];
                               	         //echo $Credits."<br/>";
                                       // $Credits1=2345;
				$Credits=$Credits+$Credits1;
                                       // echo $Credits."<br/>";
				$Count=$Count+1;
				$BList=1;


				$sql = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

				$result = mysqli_query($conn, $sql);


				if ($result) {
					echo "Successfully updated your details 258"; 

				} else{
					echo "error 258" . mysqli_error($conn); 
				}


			}


		}    


		else{
			$Count=1;
			$Credits=$Credits1;
			$BList=0;



                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


			$sql3 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
			$result3 = mysqli_query($conn, $sql3);


			if ($result3) {
				echo "Successfully updated your details 369"; 

			} else
			echo "error 369" . mysqli_error($conn);     

		}            

	}
	else if($Credits_Status==2){
		$url = 'http://waligama.sanila.tech/retailer/api/paycredits.php';
		$data = array('Method' => $Method,'Credits1' => $Credits1, 'RetailerID'=> $RetailerID );
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($ch);

	echo $response;

	}

}


?>