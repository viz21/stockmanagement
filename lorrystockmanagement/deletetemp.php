<?php 

include ("db.php");
 $ret_nxtid=$_GET['retname'];
 

    $sqlsearch="SELECT stock_details FROM retailer_order where retId='".$ret_nxtid."'";                

      $result1 = mysqli_query($conn,$sqlsearch); 

        
            while($row = mysqli_fetch_assoc($result1))
                              {      
                         
                                         $var1=$row['stock_details'];
                                         
                                         $var2=json_decode($var1,true);
                                          $elementcount = count( $var2) ;
                                      for($x=0; $x<$elementcount; $x++)
                                      {           $stockid=$var2[$x]['stockId'];
                                                   $sql  = "SELECT * FROM stock WHERE stockID ='".$stockid."'";
  
                                          $result = mysqli_query($conn,$sql) or die(mysqli_error());

                                          while($row=mysqli_fetch_array($result))
                                          {           
                                          	          
                                                      $stockid=$row["stockID"];  
                                                      $stqty=$row["qty"];
                                                        $ordqty=$var2[$x]['ord_qty'];
                                                          $productname=$var2[$x]['stockName'];
                                                          
                                                                $disval=$row["diss_value"];
                                                                $selingprice=$row["selling_price"]; 
                                                                $supname=$row["supplierName"];
                                               
                                               $sql="INSERT INTO temp_retview(stockId,stockName,supplierName,stockqty,ordqty,disval,sellingprice) values('".$stockid."','".$productname."','".$supname."','".$stqty."','".$ordqty."','".$disval."','".$selingprice."')";
                                               mysqli_query($conn,$sql);


                                            }

                                   }
                            }







 $sqldel="DELETE FROM templorrystck";
         mysqli_query($conn, $sqldel); 

         $sqldel2="DELETE FROM retordertemp";
         mysqli_query($conn, $sqldel2); 



header('location:loadlorrystck.php?retname='.$ret_nxtid);

?>