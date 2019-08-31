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
//$otsum = 0 ;
$action_name;
$monthSal=0;
$monthname;
$year;
//$arr=explode("l", string)
for($i=0;$i<$count;$i++){
    $totsal =0 ;
    $emp_id =  $test['cl'.$i]['empid'];

    $amount =  $test['cl'.$i]['amount'];
    $action =  $test['cl'.$i]['action'];
    $salary = $test['cl'.$i]['salary'];

    if ($action = 1){
        $totsal = $salary+$amount;
        $action_name ="Advance";
    } else if ($action = 0){
        $totsal = $salary-$amount;
        $action_name="Deducted";
    }

            //$otsum = $hrs*$rate;
            //$totsal = $otsum+$salary;

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

    if ($yearnum == 17) {
        $year = "2017";
    } else if($yearnum == 18) {
        $year ="2018";
    } else if($yearnum == 19) {
        $year ="2019";
    } else if($yearnum == 20) {
        $year ="2020";
    } else if($yearnum == 21) {
        $year ="2021";
    } 

    $monthSal=$monthSal+$totsal;

    $sql = "Insert INTO emp_sal(emp_id,month,year,amount,action,total_sal) VALUES('$emp_id','$monthname','$year','$amount','$action_name','$totsal')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Successfully Created ".$emp_id."<br/>";

               // Header('location:../sal_detail.php?valid=1');

    } else {
      echo "error" . mysqli_error($conn);
  }



}

        
        
        $url = "http://waligamainv.sanila.tech/cashier/api/employeeTransaction.php";
        $data = array('monthlyTotal' => $monthSal, 'month' => $monthname, 'year'=>$year);
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

//$url = "http://localhost/stock_system/Employee/api/testsend.php";


?>