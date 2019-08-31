<?php

// providing the db connection
include("../db.php");
echo "paycredit\n";

$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];


//entering credits for the seperate credit payments
$Method= $_POST['Method'];
$Credits1= doubleval($_POST['Credits1']);
$RetailerID= doubleval($_POST['RetailerID']);

date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
$array=explode('.', $Date);
$date=$array[0];
$month=$array[1];
$year=$array[2];

$last = date("t.m.Y",strtotime($Date));

$array1=explode('.',$last );
$daysmonth=$array1[0];                            

$creditdate=$date+$plusDate;

if($creditdate>$daysmonth){
 $nextmonth=$array1[1]+1;

 
 if($nextmonth>12){
  $nextyear=$year+1;
  $nextyearmonth=$nextmonth-$month;
  $newdate=$creditdate-$daysmonth;
  $nextyearmonth=sprintf("%02d",$nextyearmonth);
  $newdate=sprintf("%02d",$newdate);
  $arr = array($newdate,$nextyearmonth,$nextyear);
  $Deadline= implode(".", $arr);
  
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

$sql="SELECT * FROM retailer_credits WHERE RetailerID='$RetailerID'";
$list = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($list);


if($Method=='Cheque'){
  $Method_="paymentcheque";
  $Credits1=$Credits1*(-1);
  $credit_amount=doubleval($row['Credits']);
  $sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,'$Method_')";
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
    echo "Successfully updated your details *";

  } else
  echo "error 456" . mysqli_error($conn);


}
else{
  echo "the Credits".doubleval($row['Credits'])."\n";
  echo "credits1".$Credits1."\n";

  $credit_amount=doubleval($row['Credits'])+doubleval($Credits1);
  echo "the amunt".$credit_amount."\n";
  $rowsize=mysqli_num_rows($list);
  echo "no of rows ".$rowsize."\n";
  if ($row<>null||$row<>""){
    if ($credit_amount==0){

      $sql = "DELETE FROM retailer_credits WHERE RetailerID='$RetailerID'";


      $result = mysqli_query($conn, $sql);


      if ($result) {
        echo "Successfully updated your details *****"; 

      } else{
        echo "error 789" . mysqli_error($conn);    


      }
    }
    else{
      if($credit_amount>0){
        $countRes=$row['Count'];
      }
      else{
        $countRes=0;
      }
      echo "credit at paycredit ".$Credits1;
      echo $row['Credits'];
      $BList=0;

      $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList=$BList,Date_='$Date',Deadline='$Deadline',Count='$countRes' WHERE RetailerID=$RetailerID";    


      $result = mysqli_query($conn, $sql);


      if ($result) {
        echo "Successfully updated your details qwerty"; 

      } else 
      echo "error qwerty" . mysqli_error($conn);                 

    }

  }
  else{
    $Count=1;
    $BList=0;
    $sql5 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$credit_amount,'$Date','$Deadline',$BList,$Count)";
    $result5= mysqli_query($conn, $sql5);

    if ($result5) {
      echo "Successfully updated your details *";

    } else
    echo "error 456" . mysqli_error($conn);

  }
}


?>