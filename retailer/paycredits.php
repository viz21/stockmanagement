<?php

// providing the db connection
include("../db.php");

//entering credits for the seperate credit payments
$Method= $_POST['Method'];
$Credits1= doubleval($_POST['Credits1']);
$RetailerID= doubleval($_POST['RetailerID']);

//$credits1=0;
//$CreditStatus=1;

/*$Method="Cash";
$Credits1= 2500;
$RetailerID= 2;
$Credits_Status=1;*/

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


$creditdate=$date+7;

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

$sql="SELECT * FROM retailer_credits WHERE RetailerID='$RetailerID'";
$list = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($list);


if($Method=='Cheque'){
  $Method_="paymentcheque";
  $credit_amount=doubleval($row['Credits']);
  $sql2 = "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount) values($RetailerID,'$Date',$Credits1,$credit_amount)";
  $result2 = mysqli_query($conn, $sql2);

  if ($result2) {
    echo "Successfully updated your details *";

  } else
  echo "error 456" . mysqli_error($conn);






  
 /* if ( $Credits_Status==1) {
    $Method_="paymentcheque";


    $sql2 =  "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,'$Method_')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
      echo "Successfully updated your details"; 

    } else
    echo "error 456" . mysqli_error($conn);

  }
  else{
   // $Method_=(string)$Price;
    $Method_=$Credits1;

    $sql2 =  "INSERT INTO retailer_cheque(RetailerID,Date_,Amount,Credit_amount,Method_) values($RetailerID,'$Date',$Credits1,$credit_amount,'$Method_')";
    $result2 = mysqli_query($conn, $sql2);

    if ($result2) {
      echo "Successfully updated your details"; 
    } else
    echo "error 456" . mysqli_error($conn);
  }
*/








}
else{
  echo "the Credits".doubleval($row['Credits'])."\n";
  echo "credits1".$Credits1."\n";

  $credit_amount=doubleval($row['Credits'])+doubleval($Credits1);
    echo "the amunt".$credit_amount."\n";
    $rowsize=mysqli_num_rows($list);
    echo "no of rows ".$rowsize."\n";
    if ($rowsize>0){
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
   echo "credit at paycredit ".$Credits1;
   echo $row['Credits'];
   $BList=0;

   $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList=$BList,Date_='$Date',Deadline='$Deadline' WHERE RetailerID=$RetailerID";    


   $result = mysqli_query($conn, $sql);


   if ($result) {
    echo "Successfully updated your details qwerty"; 

  } else 
  echo "error qwerty" . mysqli_error($conn);                 
  /*  if ($result) {
      $auth=1;
      $data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
      echo json_encode($data);
    } 
    else{
      $data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
      echo json_encode($data);
    } */



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



















 /* $data=file_get_contents('php://input');
  $user_data=json_decode($data,true);
  $retId=(int)$user_data["retId"]; 
  $amount = $user_data["amount"];

  $sql="SELECT * FROM retailer_credits WHERE RetailerID='$retId'";
  $list = mysqli_query($conn, $sql);
  $row=mysqli_fetch_array($list);
  $credit_amount=doubleval($row['Credits'])-doubleval($amount);

  $credit_amount= number_format((float)$credit_amount, 2, '.', '');






    
 if($credit_amount>0){

 }




      

  
  

if ($CreditStatus==1) {
                             
                             
                                  
                             $last = date("t.m.Y",strtotime($Date));
                             //echo $last."<br/>";
                             $array1=explode('.',$last );
                             $daysmonth=$array1[0];
                             //echo $daysmonth."<br/>";
                             
                             
                             $creditdate=$date+7;
                             
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
            $sql="SELECT *FROM Retailer_Credits WHERE RetailerID=$RetailerID";
            $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($result);
                  if ($row>0){
                    // echo 'matched'."<br/>";

          
                     //obtaining the count for the perticular id
                       $Count = $row['Count'];
                      //  echo $Count."<br/>";


      

                               if ($Count<3) {
                              
                              $Credits=$row['Credits'];
                              //echo $Credits."<br/>";
                  
                                 $Credits1=0;
                                 $BList=0;
                                 $Count=$Count+1;
                                 $Credits=$Credits+$Credits1;
                                 // echo $Count."<br/>";
                                //  echo $Credits."<br/>";
                              
                            

                              }

                              //ELSE part contain when the count is equal to 3

                               else{
                                    // obtain the countin database

                                        $Credits=$row['Credits'];
                                         //echo $Credits."<br/>";
                                       // $Credits1=2345;
                                        $Credits=$Credits+$Credits1;
                                       // echo $Credits."<br/>";
                                        $BList=1;
               
                          
                                   }


            }    

            
               else{
                $Count=1;
                $Credits=$Credits1;
                $BList=0;
               }   

               
                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


                      $sql3 = "INSERT INTO Retailer_credits(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,$Credits,'$Date','$Deadline',$BList,$Count)";
                       $result3 = mysqli_query($conn, $sql3);


                    if ($result3) {
                        echo "Successfully updated your details"; 
                       
                    } else
                        echo "error 789" . mysqli_error($conn);                 
                 
}
*/












?>