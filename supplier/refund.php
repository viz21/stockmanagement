<?php
 include_once 'db.php';

 			$supplierName=$_GET['supplierName'];
 			$idstock=$_GET["id"];
 				echo $supplierName;
 				echo $id;
 						$sum=0;
 						$sql = " SELECT * FROM send_damagestock WHERE supplierName='$supplierName'";
                       // $sql = " SELECT * FROM retailer_stocks WHERE id=42";
                        $list =mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($list);
                        $test=$row['damage_list'];
                        $slist=json_decode($test,true);
                        $size = sizeof($slist);
                        for($i=0;$i<$size;$i++){
                            $id=$slist[$i]['id']; 
                             
			                  $totst=doubleval($slist[$i]['totPrice']); 
                              $sum=$sum+$totst;
				
				$sql="DELETE FROM warehouse_damage WHERE id='$id'";
 				$result = mysqli_query($conn, $sql);

                  }

				$sql1="DELETE FROM send_damagestock WHERE id='$idstock'";
 				$result = mysqli_query($conn, $sql1);

echo $sum;
 		$id=mysqli_insert_id($conn);
		$url = 'http://waligama.sanila.tech/finance/getDamageTrans.php';
			$data = array('amount' => $sum,'supplierName'=> $supplierName);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


			$response = curl_exec($ch);

			echo $response;
			
   
header('location:refund_list.php?valid=1');



?>