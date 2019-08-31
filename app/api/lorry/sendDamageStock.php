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
	$stockId=0;
	$stockName = "";
	$quantity = 0;
	$quantityErr = "";
	
	$stockId=(int)$_POST["stockId"];
	$quantity=(int)$_POST["quantity"];
	$lorryID=(int)$_POST["lorryID"];
	$lorryNum=$_POST["lorryNum"];
	echo "stock id ".$stockId."\n";
	echo "lorryNum ".$lorryNum."\n";
	$url = "http://waligamainv.sanila.tech/stock_mangement/api/getAllStock.php?token=stock1230";
	//$url = "http://localhost/stock/api/getLorryStock.php?token=stock1230";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
// This is what solved the issue (Accepting gzip encoding)
	curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
	$response = curl_exec($ch);
	curl_close($ch);
	$list= json_decode($response,true);
	$size=sizeof($list);
	for($i=0;$i<$size;$i++){
		if((int)$list[$i]['stockID']==$stockId){
			$stockName=$list[$i]['stockName'];
			$unitPrice=doubleval($list[$i]['purchasing_price']);
			$unitPrice= number_format((float)$unitPrice, 2, '.', '');
			$supplierName=$list[$i]['supplierName'];
			$totPrice=$unitPrice*$quantity;
			$discPrice=doubleval($list[$i]['discount'])*$quantity;
			$discPrice= number_format((float)$discPrice, 2, '.', '');
		//updateode	
			$sqlselec= "SELECT * from lorry_damage_stocks WHERE stockId ='".$stockId."' AND lorryID='".$lorryID."'";
			$result= mysqli_query($conn, $sqlselec);

			if ($result && (mysqli_num_rows($result) > 0)){
				$row=mysqli_fetch_array($result);
				$qty=doubleval($row['quantity']);
				$updated_qunti=$qty+$quantity;
				$updated_totprice=$unitPrice*$updated_qunti;
				$sqlq="UPDATE lorry_damage_stocks SET quantity ='".$updated_qunti."',totPrice='".$updated_totprice."' WHERE stockId ='".$stockId."' AND lorryID='".$lorryID."'";
				$resultq=mysqli_query($conn,$sqlq);
				if ($resultq) {
					$auth=1;
					$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
					echo json_encode($data);
				} 
				else{
					$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
					echo json_encode($data);
				} 

            }  //end
            else{
            	$sql = "Insert INTO lorry_damage_stocks(stockId,supplierName,stockName,quantity,unitPrice,totPrice,discPrice,lorryID,lorryNumber) VALUES('$stockId','$supplierName','$stockName','$quantity','$unitPrice','$totPrice','$discPrice','$lorryID','$lorryNum')";    
            	$result = mysqli_query($conn, $sql);
            	if ($result) {
            		$auth=1;
            		$data = array("status"=> "succesful","msg"=>"Successfully added","auth"=>$auth);
            		echo json_encode($data);
            	} 
            	else{
            		$data = array("status"=> "error","msg"=>"Authentication Failed error","auth"=>$auth);
            		echo json_encode($data);
            	} 
            }

        }
    }


}


?>