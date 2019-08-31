<?php
 include_once 'db.php';

 $supplierName=$_GET['supplierName'];
 	$idstock =$_GET["id"];				

 						$sql = " SELECT * FROM send_damagestock WHERE supplierName='$supplierName'";
                       // $sql = " SELECT * FROM retailer_stocks WHERE id=42";
                        $list =mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($list);
                        $test=$row['damage_list'];
                        $slist=json_decode($test,true);
                        $size = sizeof($slist);
                        for($i=0;$i<$size;$i++){
                            $id=$slist[$i]['id'];
                            $stockName=$slist[$i]['stockName'];
                            $qty=(int)$slist[$i]['quantity'];
                             $stckid=$slist[$i]['stockId'];


                              
			            	$sql="DELETE FROM warehouse_damage WHERE id='$id'";
 				            $result = mysqli_query($conn, $sql);
                            

                              $sqlrol="SELECT stockID FROM rol_notify WHERE stockID='$stckid'";
                              $res=mysqli_query($conn,$sqlrol);
                               
                              
                            if ($res && (mysqli_num_rows($res) > 0)){
                              $row=mysqli_fetch_array($res);

                              $rolstockid=$row['stockID'];


                      
                         
			                         $sqlrol1="SELECT qty,ROL FROM  stock WHERE stockID='$stckid'";
			                         $resrol1=mysqli_query($conn,$sqlrol1);
			                         $row=mysqli_fetch_array($resrol1);
			                         $rolqty=$row['qty'];
			                         $ROL=$row['ROL'];

			                        if(($rolqty+$qty)<$ROL)
			                          {
			                            $sql1 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stckid' " ;  //update into stock
			                            $result = mysqli_query($conn, $sql1);  
			               
			                       }
			                       else
			                    {
			                      $sql2 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stckid' " ;  //update into stock
			                      $result = mysqli_query($conn, $sql2); 
			               

			                    $sqld="DELETE  FROM rol_notify WHERE stockID='$stckid'";  //delete from rol_notify
			                    $resd=mysqli_query($conn,$sqld);

			                  }


                     }
			   else
			     {  $sql23 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stckid' " ;  //update into stock
			       $result = mysqli_query($conn, $sql23);
			                        
			     }			

					





    }


   $sql1="DELETE FROM send_damagestock WHERE id='$idstock'";
 				$result = mysqli_query($conn, $sql1);


 header('location:item_transactionlist.php?valid=1');				

?>			 		