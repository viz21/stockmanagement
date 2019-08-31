<?php

$supname="shavin";
$price="2450";
$stockid="123";

$url = 'http://localhost:8080/stockmanagementsystem/supplier/get_stock.php';
			$data = array('supName' => $supname, 'totprice' => $price, 'id' => $stockid);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			echo $response;
?>