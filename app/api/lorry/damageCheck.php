<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-type");
$auth=0;
if($_GET['token']!="stock1230"){
  $data = array("status"=> "error","msg"=>"Authentication Failed","auth"=>$auth);
  echo json_encode($data);
  die();
}
else{
include ("../db_connect.php");
$status=0;
//checking the retailer id in the table
$repId=(int)$_GET['repId'];
$data=file_get_contents('php://input');
    //$data='{"stockId":"5","quantity":"3"}';
$user_data=json_decode($data,true);

$stockId=(int)$user_data["stockId"];
$re_qty=(int)$user_data["quantity"];
$retId=(int)$user_data["retId"];
$retName=$user_data["retName"];

$sqlselec= "SELECT * from unload_lorry_qty WHERE repID ='".$repId."'";
$result= mysqli_query($conn, $sqlselec);
$rowlorry=mysqli_fetch_assoc($result);
$lorryID=$rowlorry['lorryID'];
$lorryNum=$rowlorry['lorryNumber'];
$url='http://waligamainv.sanila.tech/stock_mangement/api/lorry/sendDamageStock.php?token=stock1230';
    $data = array('stockId'=>$stockId,'quantity'=>$re_qty,'lorryID'=>$lorryID,'lorryNum'=>$lorryNum);
    //print_r($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($ch);
    
     $url='http://waligamainv.sanila.tech/finance/api/getDamageRep.php?token=stock1230';
    $data = array('retId'=>$retId,'stockId'=>$stockId,'quantity'=>$re_qty,'repId'=>$repId);
    //print_r($data);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $response = curl_exec($ch);

    
    
  $auth=1;
  $data = array("status"=> "succesful","msg"=>"Successfully Updated","auth"=>$auth);
  echo json_encode($data);
}


?>





















































