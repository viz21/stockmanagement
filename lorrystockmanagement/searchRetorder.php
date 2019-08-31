

<?php
include ("db.php");  
                         
                    $sqlsearch="SELECT * FROM temp_retview";
           
               $retiD=$_GET["itm"];  

      $result1 = mysqli_query($conn,$sqlsearch); 

?>

<table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                          <caption>Retailer order list </caption>

                         <thead>
                             <tr>
                                <!-- <th>product ID</th>-->
                                 <th>stock name</th>
                                 <th>ordered quntity</th>
                                  <th>discount value</th>
                                  <th>selling price</th>
                                  <th>supplier name</th>
                                  
                                  <th>Add to lorry</th>
                                  <th>Add to order</th>
                                  <th>ROL</th>
                                  
                                  
                                 
                             </tr>
                         </thead>
                         <tbody>
                              <?php
                            
                              while($row = mysqli_fetch_assoc($result1))
                              {      
                                          
                                             
                                                      $stockid=$row["stockId"];  
                                                      $stqty=$row["stockqty"];
                                                        $ordqty=$row["ordqty"];
                                                          $productname=$row["stockName"];
                                                          
                                                                $disval=$row["disval"];
                                                                $selingprice=$row["sellingprice"]; 
                                                                $supname=$row["supplierName"];




                                                       

                                      /*   $var1=$row['stock_details'];
                                         
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

                                              */                                                
                                                           
                                                             

                                           
                                                    
                                            




                                                         $sqlrol="SELECT * FROM rol_notify WHERE stockId='".$stockid."'";
                                                         $res=mysqli_query($conn,$sqlrol);
                                                             
                                               

                                               if($stqty>$ordqty){ 

                                                       if($res && (mysqli_num_rows($res) > 0)){
                                                        echo "<tr><td>$productname</td><td>$ordqty</td><td>$disval</td><td>$selingprice</td><td>$supname</td><td> <a  href='lorryaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to lorry</a> </td><td> <a  href='retaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to order</a></td><td style='color: #FF0000'> ROL NOTIFIED! </td>  
                                                              
                                                                 </tr>\n";

                                                        }
                                                        else{                                                        
       
                                             echo "<tr><td>$productname</td><td>$ordqty</td><td>$disval</td><td>$selingprice</td><td>$supname</td>  <td><a  href='lorryaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to lorry</a></td><td>  <a  href='retaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to order</a></td><td></td> 
                                                                            
                                                     </tr>\n";
                                                 }
                                            }
                                                                                                
                                                else{

                                                  if($res && (mysqli_num_rows($res) > 0)){
                                                   echo "<tr><td>$productname</td><td>$ordqty</td><td>$disval</td><td>$selingprice</td><td>$supname</td>  <td style='color: #FF0000'>LOW STOCK! </td><td> <a  href='retaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to order</a></td> <td style='color: #FF0000'> ROL NOTIFIED! </td>
                                                     </tr>\n";
                                                  }
                                                  else{
                                                    echo "<tr><td>$productname</td><td>$ordqty</td><td>$disval</td><td>$selingprice</td><td>$supname</td>  <td style='color: #FF0000'>LOW STOCK! </td><td> <a  href='retaddlink.php?stockname=$productname&stockid=".$stockid."&stockqty=".$stqty."&ord_qty=".$ordqty."&disval=".$disval."&selingprice=".$selingprice."&supname=".$supname."&retid=".$retiD."'>Add to order</a></td> <td></td>
                                                     </tr>\n";

                                                  }  
                                              }

                                    }

                                

                                 
                                                                
                                          
                              
                               ?>
                                    
                           
                        </tbody>
                    </table>

