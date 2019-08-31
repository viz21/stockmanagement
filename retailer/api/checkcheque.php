<?php


// providing the db connection
include("../db.php");

$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];

//$ChequeID= doubleval($_POST['ChequeID']);
$RetailerID= doubleval($_POST['RetailerID']);
$ChequeDate= $_POST['ChequeDate'];
$ChequeStatus=$_POST['ChequeStatus'];
$amount=$_POST['Amount'];

date_default_timezone_set("Asia/Colombo");
$Date=date("d.m.Y");
$array=explode('.', $Date);
$date=$array[0];
$month=$array[1];
$year=$array[2];

$last = date("d.m.Y",strtotime($Date));


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


if($ChequeStatus==0){

   $sql1="DELETE FROM retailer_cheque WHERE Date_='$ChequeDate' and RetailerID = '$RetailerID'";
  $result1= mysqli_query($conn,$sql1);
  if($result1)
    echo 'sucessfull'.'<br>';
  else
    echo 'error'.mysqli_error($conn).'<br>';
        

}
  
  else {


    $sql="SELECT * FROM retailer_credits WHERE RetailerID='$RetailerId'";
    $list = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($list);
    if ($row<>null || $row==""){

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


                else{


          
                       $Count=$Count+1;
                       $BList=1;


                       $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList='BList',Count='$Count',Date_='$Date',Deadline='$Deadline'        WHERE RetailerID=$RetailerId";    
                            

                       $result = mysqli_query($conn, $sql);


                    if ($result) {
                        echo "Successfully updated your details"; 
                       
                    } else{
                        echo "error 789" . mysqli_error($conn); 
                               }
                                
         }
}
else
{
    $count=1;
    $BList=0;

    $sql2 = "INSERT INTO retailer_credit(RetailerID,Credits,Date_,Deadline,BList,Count) values($RetailerID,'$amount',$Date,$Deadline,$BList,$Count)";
    $result2 = mysqli_query($conn, $sql2);

                    if ($result2) {
                        echo "Successfully updated your details"; 
                       
                    } else
                        echo "error 456" . mysqli_error($conn);

}
}
