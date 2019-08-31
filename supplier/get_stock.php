<?php
 include_once 'db.php';
 


 $supName=$_POST['supName'];
 $price = doubleval($_POST['totprice']);
 $stock_ID=(int)$_POST['id'];

 

 echo $supName;
 echo $price;
 echo $stock_ID;

$sql = "INSERT INTO sup_temptable(supName,price,stock_ID) VALUES('$supName','$price','$stock_ID')";    
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$s_ID=mysqli_insert_id($conn);
		$url = 'http://waligama.sanila.tech/finance/getSupplier.php';
			$data = array('s_ID' => $s_ID, 'supName' => $supName, 'totprice' => $price);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);

			echo $response;



			//finance data sending

			/*$url = 'http://localhost:89/stock_mangement/api/finance.php?token=stock1230';
			$data = array('RetailerID' => $retId, 'RetailerName' => $retName,'Price' => $totPr0ice, 'PaidAmount' => $amount, 'Method' => $payment_method, 'Discount' => $discount);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);

			//Lorry Stock data sending

			$tempStock= json_encode($unloaded);*/
/*
			$url = 'http://localhost:89/stock_mangement/api/lorry.php?token=stock1230';
			$data = array('stock' => $tempStock);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);

*/
}
			?>