<?php



//when rep sends data checking for the cheques (fetchdata.php).

if ($Method=="Cheque" && $Credits_status==0) {

 $credit_amount=0;
 $Method_="pay";

 $sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,$Method_)";
 $result2 = mysqli_query($conn, $sql2);

 if ($result2) {
  echo "Successfully updated your details"; 

} else
echo "error 456" . mysqli_error($conn);

}
else if ($Method=="Cheque" && $Credits_status==1) {
  $credit_amount=1;
  $Method="Credits";


  $sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,$Method_)";
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
    echo "Successfully updated your details"; 

  } else
  echo "error 456" . mysqli_error($conn);

}
else{
  $credit_amount=0;
  $Method="pay";


  $sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,$Method_)";
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
    echo "Successfully updated your details"; 

  } else
  echo "error 456" . mysqli_error($conn);
}





//when finance sends cheque bounce or cleared


//selecting data from cheque table

$sql="SELECT * FROM retailer_cheque WHERE RetailerID='$RetailerId' and Date_='$Date'";
$list = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($list);
$credit_amount=row['Credit_amount'];
$Method_=row['Method_'];


//date calculation
date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
$array=explode('.', $Date);
$date=$array[0];
$month=$array[1];
$year=$array[2];
$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];

last = date("t.m.Y",strtotime($Date));
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

//cheque is clear

if ($ChequeStatus==0 ) {
  if ($credit_amount >0) {
    
  if ($Method_=='pay') {
     //paycredit.php curl

    $url = 'http://localhost/StockManagement/retailer/api/paycredits.php';
    $data = array('Method' => $Method,'Credits1' => $Credits1, 'RetailerID'=> $RetailerID );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);

 }
 else{
   $credit_amount=doubleval($row['Credits'])+doubleval($amount);

   $Count = $row['Count'];
   if ($Count<=3) {

    $Credits=$row['Credits'];
                 //echo $Credits."<br/>";

                 // $Credits1;
    $BList=0;
    $Count=$Count+1;


    $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList='BList',Count='$Count',  Date_='$Date',Deadline='$Deadline'        WHERE RetailerID=$RetailerId";    


    $result = mysqli_query($conn, $sql);


    if ($result) {
      echo "Successfully updated your details"; 

    } else
    echo "error 789" . mysqli_error($conn);                 

  }

}
} 
else{

 $sql1="DELETE FROM retailer_cheque WHERE Date_='$ChequeDate' and RetailerID = '$RetailerID'";
 $result1= mysqli_query($conn,$sql1);
 if($result1)
  echo 'sucessfull'.'<br>';
else
  echo 'error'.mysqli_error($conn).'<br>';
}

//cheque is bounce
else{
 if ($credit_amount =0) {
 
   $count=1;
    $BList=0;

    $sql2 = "INSERT INTO retailer_credit(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,'$amount',$Date,$Deadline,$BList,$Count)";
    $result2 = mysqli_query($conn, $sql2);

                    if ($result2) {
                        echo "Successfully updated your details"; 
                       
                    } else
                        echo "error 456" . mysqli_error($conn);

 }
 else{

  if ($Method_=="Credit") {
    
  }
  else{

  }

 }


}
?>