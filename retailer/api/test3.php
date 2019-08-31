<?php
echo "test3.\n";

// providing the db connection
include("../db.php");

$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];


$url1='http://waligama.sanila.tech/retailer/api/paycredits.php';

//$ChequeID= doubleval($_POST['ChequeID']);
$RetailerID= doubleval($_POST['RetailerID']);
$ChequeDate= $_POST['ChequeDate'];
$ChequeStatus=$_POST['ChequeStatus'];
$amount=doubleval($_POST['Amount']);


echo $RetailerID."\n";
echo $ChequeDate. "\n";
echo $ChequeStatus."\n";
echo $amount."\n";

//selecting the credit status

$sql="SELECT * FROM retailer_cheque WHERE RetailerID=$RetailerID and Date_='$ChequeDate'";
$result = mysqli_query($conn, $sql);
if($result){
  echo "Success";
  $row = mysqli_fetch_array($result);

$Method_ =$row['Method_'];
$Credit_amount=$row['Credit_amount'];

echo "method is ". $Method_ ."\n";
echo "Credit is ".$Credit_amount."\n";


}
 else{
  mysqli_error($conn);
} 



//forming the deadline date
date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
$array=explode('.', $Date);
$date=$array[0];
$month=$array[1];
$year=$array[2];

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

// addition of the cheque details to the system

if(strcmp($Method_,"pay")==0){

 if($ChequeStatus==0){

  $sql2="DELETE FROM retailer_cheque WHERE Date_='$ChequeDate' and RetailerID = '$RetailerID'";
  $result2= mysqli_query($conn,$sql2);
  if($result2)
    echo 'sucessfull pay ChequeStatus 01'.'<br>';
  else
    echo 'error'.mysqli_error($conn).'<br>';


}
else{

  $sql3="SELECT * FROM retailer_credits WHERE RetailerID=$RetailerID";
  $result3 = mysqli_query($conn, $sql3);
  $row = mysqli_fetch_array($result3);
  $rowsize=mysqli_num_rows($result);
  echo "no of rows ".$rowsize;
  if ($row<>null||$row<>""){
                    // echo 'matched'."<br/>";


                     //obtaining the count for the perticular id
   $Count = $row['Count'];
                      //  echo $Count."<br/>";




   if ($Count<3) {

    $Credits=doubleval($row['Credits']);
                              echo "credit is ".$Credits."\n";

    $Credits1;
    $BList=0;
    $Count=$Count+1;
    $Credits=$Credits+$amount;
    echo "credit is ".$Credits."\n";
    echo "amount is ".$amount."\n";

    $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

    $result2 = mysqli_query($conn, $sql2);


    if ($result2) {
     echo "Successfully updated your details pay ChequeStatus 12"; 

   } else{
     echo "error 789" . mysqli_error($conn); 
   }




 }

                              //ELSE part contain when the count is equal to 3

 else{
                                    // obtain the countin database

  $Credits=$row['Credits'];
                                            //echo $Credits."<br/>";
                                            // $Credits1=2345;
  $Credits=$Credits+$amount;
                                           // echo $Credits."<br/>";
  $Count=$Count+1;
  $BList=1;


  $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

  $result2 = mysqli_query($conn, $sql2);


  if ($result2) {
   echo "Successfully updated your details pay ChequeStatus 13"; 

 } else{
  echo "error 789" . mysqli_error($conn); 
}


}


}    


else{
 $Count=1;
 $Credits=$amount;
 $BList=0;



                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


 $sql4 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
 $result4 = mysqli_query($conn, $sql4);


 if ($result4) {
   echo "Successfully updated your details pay ChequeStatus 14"; 

 } else
 echo "error 789" . mysqli_error($conn);     

}    

}  
}

else if ($Method_=="Credits"){
  if($ChequeStatus==0){


    $sql3="SELECT * FROM retailer_credits WHERE RetailerID=$RetailerID";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_array($result3);
    if ($row<>null||$row<>""){
                    // echo 'matched'."<br/>";


                     //obtaining the count for the perticular id
     $Count = $row['Count'];
                      //  echo $Count."<br/>";




     if ($Count<3) {

      $Credits=$row['Credits'];
                              //echo $Credits."<br/>";

      $Credits1;
      $BList=0;
      $Count=$Count+1;
      $Credits=$Credits+$Credit_amount;
                                 // echo $Count."<br/>";
                                //  echo $Credits."<br/>";

      $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

      $result2 = mysqli_query($conn, $sql2);


      if ($result2) {
       echo "Successfully updated your details credit ChequeStatus 05"; 

     } else{
       echo "error 789" . mysqli_error($conn); 
     }




   }

                              //ELSE part contain when the count is equal to 3

   else{
                                    // obtain the countin database

    $Credits=$row['Credits'];
                                            //echo $Credits."<br/>";
                                            // $Credits1=2345;
    $Credits=$Credits+$Credit_amount;
                                           // echo $Credits."<br/>";
    $Count=$Count+1;
    $BList=1;


    $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

    $result2 = mysqli_query($conn, $sql2);


    if ($result2) {
     echo "Successfully updated your details credit ChequeStatus 06"; 

   } else{
    echo "error 789" . mysqli_error($conn); 
  }


}


}    


else{
 $Count=1;
 $Credits=$Credit_amount;
 $BList=0;



                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


 $sql4 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
 $result4 = mysqli_query($conn, $sql4);


 if ($result4) {
   echo "Successfully updated your details credit ChequeStatus 07"; 

 } else
 echo "error 789" . mysqli_error($conn);     

}    

}

else{


  $sql3="SELECT * FROM retailer_credits WHERE RetailerID=$RetailerID";
  $result3 = mysqli_query($conn, $sql3);
  $row = mysqli_fetch_array($result3);
  if ($row<>null||$row<>""){
                    // echo 'matched'."<br/>";


                     //obtaining the count for the perticular id
   $Count = $row['Count'];
                      //  echo $Count."<br/>";




   if ($Count<3) {

    $Credits=$row['Credits'];
                              //echo $Credits."<br/>";

    $Credits1;
    $BList=0;
    $Count=$Count+1;
    $Credits=$Credits+$amount+$Credit_amount;
                                 // echo $Count."<br/>";
                                //  echo $Credits."<br/>";

    $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

    $result2 = mysqli_query($conn, $sql2);


    if ($result2) {
     echo "Successfully updated your details credit ChequeStatus 18"; 

   } else{
     echo "error 789" . mysqli_error($conn); 
   }




 }

                              //ELSE part contain when the count is equal to 3

 else{
                                    // obtain the countin database

  $Credits=$row['Credits'];
  echo $Credits."<br/>";
                                            // $Credits1=2345;
  $Credits=$Credits+$amount+$Credit_amount;
  echo $Credits."<br/>";
  $Count=$Count+1;
  $BList=1;


  $sql2 = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

  $result2 = mysqli_query($conn, $sql2);


  if ($result2) {
   echo "Successfully updated your details credit ChequeStatus 19"; 

 } else{
  echo "error 789" . mysqli_error($conn); 
}


}


}    


else{
 $Count=1;
 $Credits=$amount+$Credit_amount;
 $BList=0;
 echo "Credit_amount is ".$Credit_amount."\n";
 echo "credit is ".$Credits."\n";
 echo "amount is ".$amount."\n";


                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


 $sql4 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
 $result4 = mysqli_query($conn, $sql4);


 if ($result4) {
   echo "Successfully updated your details credit ChequeStatus 10"; 

 } else
 echo "error 789" . mysqli_error($conn);     

}    

}
}

else if ($Method_=="paymentcheque"){

  if($ChequeStatus==1){

    $sql2="DELETE FROM retailer_cheque WHERE Date_='$ChequeDate' and RetailerID = '$RetailerID'";
    $result2= mysqli_query($conn,$sql2);
    if($result2)
      echo 'sucessfull paymentcheque ChequeStatus 1*'.'<br>';
    else
      echo 'error'.mysqli_error($conn).'<br>';

  }
  else{
    $Method_="Credits";
    $url=$url1;
    echo $url1;
    $amount=$amount*(-1);
    $data = array('Method' => $Method_,'Credits1' => $amount, 'RetailerID'=> $RetailerID );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    echo "payment check <br/>";
    echo $response;
    //echo $Method_;
    //echo $amount;
    //echo $RetailerID;


  }
}

else{
  if($ChequeStatus==0){

   $Method_="Credits";

  $url=$url1;
   $data = array('Method' => $Method_,'Credits1' => $Credit_amount, 'RetailerID'=> $RetailerID );
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $response = curl_exec($ch);
   echo "payment check <br/>";
   echo $response;

 }

 else{
          //cheque payment process when creditstausis 1

  $Method_Amount= doubleval($row['Method_']);
    $sql="SELECT * FROM retailer_credits WHERE RetailerID=$RetailerID";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row<>null||$row<>""){
                    // echo 'matched'."<br/>";


                     //obtaining the count for the perticular id
      $Count = (int)$row['Count'];
                      //  echo $Count."<br/>";




      if ($Count<3) {

        $Credits=$row['Credits'];
                              //echo $Credits."<br/>";

        $Credits1;
        $BList=0;
        $Count=$Count+1;
        $Credits=$Credits+$Method_Amount;
                                 // echo $Count."<br/>";
                                //  echo $Credits."<br/>";

        $sql = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

        $result = mysqli_query($conn, $sql);


        if ($result) {
          echo "Successfully updated your details ChequeStatus 1 **"; 

        } else{
          echo "error 789" . mysqli_error($conn); 
        }




      }

                              //ELSE part contain when the count is equal to 3

      else{
                                    // obtain the countin database

        $Credits=$row['Credits'];
                                         //echo $Credits."<br/>";
                                       // $Credits1=2345;
        $Credits=$Credits+$Method_Amount;
                                       // echo $Credits."<br/>";
        $Count=$Count+1;
        $BList=1;


        $sql = "UPDATE retailer_credits SET Credits='$Credits',BList=$BList,Count='$Count',Date_='$Date' WHERE RetailerID=$RetailerID";    

        $result = mysqli_query($conn, $sql);


        if ($result) {
          echo "Successfully updated your details ChequeStatus 1 *******"; 

        } else{
          echo "error 789" . mysqli_error($conn); 
        }


      }


    }    


    else{
      $Count=1;
      $Credits=$Method_Amount;
      $BList=0;



                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


      $sql3 = "INSERT INTO retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
      $result3 = mysqli_query($conn, $sql3);


      if ($result3) {
        echo "Successfully updated your details ChequeStatus=1 ***********************"; 

      } else
      echo "error 789" . mysqli_error($conn);     

    }







  }
}


$sql8="DELETE FROM retailer_cheque WHERE Date_='$ChequeDate' and RetailerID = '$RetailerID'";
$result8= mysqli_query($conn,$sql8);
if($result8)
  echo 'sucessfull Delete****************##########*******'.'<br>';
else
  echo 'error'.mysqli_error($conn).'<br>';



?>