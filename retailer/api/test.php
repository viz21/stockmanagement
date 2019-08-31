<?php

// providing the db connection
include("../db.php");

$CreditStatus= 1;
$RetailerID= 18;
$sql="SELECT * FROM `credit_dates` WHERE id=1";
$result= mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$plusDate=(int)$row['days'];

if ($CreditStatus==1) {

       //splitting the date
                             //date_default_timezone_set("Asia/Colombo");
                            // $Date=date("d.m.Y");
                               $Date="31.12.2017";
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
                                 echo $Deadline."<br/>";
                             
                                }
                                else{
                               //if the month is less than 12 moving to the next month and new date.
                             $newdate=$creditdate-$daysmonth;
                                // echo $nextmonth."<br/>";
                                 $nextmonth=sprintf("%02d",$nextmonth);
                                 $newdate=sprintf("%02d",$newdate);
                                 $arr = array($newdate,$nextmonth,$year);
                                 $Deadline= implode(".", $arr);
                                 echo $Deadline."<br/>";
                                  }
                             }
                             else{
                             
                             	//increasing the date to the new date
                             	//echo "less"."<br/>";
                             	 $arr = array($creditdate,$month,$year);
                                 $Deadline= implode(".", $arr);
                                 echo $Deadline."<br/>";
                                
                             
                                 
                             }





    
	          // checking whether ther is a perticular id in database.
	          $sql="SELECT *FROM Retailer_Credits WHERE RetailerID=$RetailerID";
	          $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_array($result);
                  if ($row>0){
                     echo 'matched'."<br/>";
          
                     //obtaining the count for the perticular id
                       $Count = $row['Count'];
                        echo $Count."<br/>";


      

                               if ($Count<3) {
                             	
                             	$Credits=$row['Credits'];
                             	echo $Credits."<br/>";
                	
                                 $Credits1=0;
                                 $BList=0;
                                 $Count=$Count+1;
                                 $Credits=$Credits+$Credits1;
                                  echo $Count."<br/>";
                                  echo $Credits."<br/>";
                              
                            

                              }

                              //ELSE part contain when the count is equal to 3
                               else{
                               	    // obtain the countin database
                               	        $Credits=$row['Credits'];
                               	         echo $Credits."<br/>";
                                        $Credits1=2345;
                                        $Credits=$Credits+$Credits1;
                                        echo $Credits."<br/>";
                                        $BList=1;
               
                          
                                   }


            }    

            
               else{
               	$Count=1;
               	$Credits=$Credits1;
               	$BList=0;
               }   

               
                       //INSERTING DATA TO THE RETAILER CREDITS TABLE


                      // $sql3 = "INSERT INTO Retailer_credits(RetailerID,Credits,Date,Deadline,BList,Count) values($RetailerID,$Credits,$Date,$Deadline,$BList,$Count)";
                            // mysql_query($sql3);
                 
                 
}
	 











?>