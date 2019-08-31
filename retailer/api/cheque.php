<?php

// providing the db connection
include("../db.php");

$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];


$Id=$_GET['Id'];

     $sql="SELECT *FROM Retailer_Cheque WHERE RetailerID=$ID";
            $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($result);

                 $Credits1=$row['Credits'];


         $sql1="SELECT * FROM retailer_credits WHERE RetailerID='$Id'";
                 $list = mysqli_query($conn, $sql1);
                      $row1=mysqli_fetch_array($list);

                  $Credits=$row1['Credits'];

                    $credit_amount=doubleval($row1['Credits'])-doubleval($row['Credits']);


                    //getting the date 


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




//inserting the data in to the payment table 

                                 if ($credit_amount>0) {
                                          $Count = $row['Count'];
                                              if ($Count<=3) {
                                        //if it is a pluse value the remaining amount is added to database with deadlines.
                                                 
                                                 $BList=0;
                                                 $Count=$Count+1;

                                                 $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList='BList'             ,Count='$Count',   Date_='$Date',Deadline='$Deadline'        
                                                         WHERE RetailerID=$Id";    
                              

                                                 $result = mysqli_query($conn, $sql);


                                                    if ($result) {
                                                       echo "Successfully updated your details"; 
                       
                                                   } else
                                                       echo "error 789" . mysqli_error($conn);                 
                 
                                     }




                               
                                    else{


                                                 $Count=$Count+1;
                                                 $BList=1;


                                                 $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList='BList',Count='$Count',Date_='$Date',Deadline='$Deadline'                        WHERE RetailerID=$Id";    
                            

                                                 $result = mysqli_query($conn, $sql);


                                                   if ($result) {
                                                       echo "Successfully updated your details"; 
                       
                                                   } else{
                                                       echo "error 789" . mysqli_error($conn); 
                                                    }
                                
                                           }
                      }
                       else if($credit_amount<0){
                       $Count = 0;
                       $BList=0;
 

                           $sql = "UPDATE retailer_credits SET Credits='$credit_amount',BList='BList',Count='$Count',         Date_='$Date'                                                                                                     WHERE RetailerID=$ID";    
                            
                          $result = mysqli_query($conn, $sql);


                               if ($result) {
                                    echo "Successfully updated your details"; 
                       
                                      } else{
                                         echo "error 789" . mysqli_error($conn); 
                                      }
                   

          }

                         else{
      
                                $sql = "DELETE FROM retailer_credits WHERE RetailerID='$ID'";
                                $result = mysqli_query($conn, $sql);
   
                                          if ($result) {
                                                 echo "Successfully updated your details"; 
                       
                                         } else{
                                                  echo "error 789" . mysqli_error($conn);    


                                                 }
                 
                               }


                                   //deleting the record from the cheque table after the payment


                                  $sql1 = "DELETE FROM Retailer_Cheque WHERE RetailerID='$ID'";
                                   $result1 = mysqli_query($conn, $sql1);
   
                                          if ($result1) {
                                                 echo "Successfully updated your details"; 
                       
                                         } else{
                                                  echo "error 789" . mysqli_error($conn);    


                                                 }
           

?>