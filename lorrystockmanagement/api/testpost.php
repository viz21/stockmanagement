<?php

$repid=2;
$stockN='[{"id":"14","stockId":"16","stockName":"choclate","quantity":"2","unitPrice":"15.00","totPrice":"30.00","discPrice":"10.00","repId":"2"}]';


//'[{"productname":"anchor butter","quntity":"1","stockId":"3"},{"productname":"choclate","quntity":"1","stockId":"1"}]';
//echo $stockN;
$url = 'http://waligama.sanila.tech/lorrystockmanagement/api/updateremaining.php';
			$data = array('repId' => $repid,'stock' => $stockN);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);
			echo $response;
?>