<?php

$data1="tharuka nanayakkara";
$data2="russs";
$data3=3444;


$url = 'http://localhost/StockManagement/retailer/api/cURL test2.php';
    $data = array('data1' => $data1,'data2' => $data2, 'data3'=> $data3 );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    ?>