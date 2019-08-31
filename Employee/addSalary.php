<?php
include "db.php";
$qs=$_POST['qs'];
$monthnum = $_POST['month'];
$yearnum =  $_POST['year'];
echo $monthnum;
echo $yearnum;
echo $qs;
$test=json_decode($qs,true);
print_r($test);
$arrcount=count($test);
echo $arrcount;
$count = $arrcount;
$otsum = 0 ;
$totsal =0 ;
$monthname;
$year;
//$arr=explode("l", string)
for($i=0;$i<$count;$i++){

            $emp_id =  $test['cl'.$i]['empid'];
            
            $hrs =  $test['cl'.$i]['hrs'];
            $rate =  $test['cl'.$i]['rate'];
            $salary = $test['cl'.$i]['salary'];

            $otsum = $hrs*$rate;
            $totsal = $otsum+$salary;

             if ($monthnum == 1) {
            $monthname = "January";
        } else if($monthnum == 2) {
            $monthname ="February";
        } else if($monthnum == 3) {
            $monthname ="March";
        } else if($monthnum == 4) {
            $monthname ="April";
        } else if($monthnum == 5) {
            $monthname ="May";
        } else if($monthnum == 6) {
            $monthname ="June";
        } else if($monthnum == 7) {
            $monthname ="July";
        } else if($monthnum == 8) {
            $monthname ="August";
        } else if($monthnum == 9) {
            $monthname ="September";
        } else if($monthnum == 10) {
            $monthname ="October";
        } else if($monthnum == 11) {
            $monthname ="November";
        } else if($monthnum == 12) {
            $monthname ="December";
        }

         if($yearnum == 19) {
            $year ="2019";
        } else if($yearnum == 20) {
            $year ="2020";
        } else if($yearnum == 21) {
            $year ="2021";
        } 


            $sql = "Insert INTO emp_sal(emp_id,month,year,hours,rate,total_ot,total_sal) VALUES('$emp_id','$monthname','$year','$hrs','$rate','$otsum','$totsal')";
                $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Successfully Created ".$emp_id."<br/>";
                echo $monthname;
echo $year;
$sql2 ="SELECT sum(total_sal) as qty,month ,year from emp_sal where month = '$monthname'and year = '$year' GROUP BY year";
echo $sql2;
    $result2=mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($result2);

$sendyear=$row['year'];
$month=$row['month'];
$sal=$row['qty'];
echo $sal ;
echo $sendyear;
echo $month;


            } else {
                 echo "error" . mysqli_error($conn);
            }
 
            
    
}
$url = "http://localhost:8080/stockmanagement/finance/employeeTransaction.php";
$data = array('monthlyTotal' => $sal, 'month' => $month, 'year' => $year);
        print_r($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        echo "response";
        echo $response;
               // Header('location:../cashier_salary_view.php');
//$url = "http://localhost/stock_system/Employee/api/testsend.php";

?>