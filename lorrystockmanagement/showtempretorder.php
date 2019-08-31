<?php 

include ("db.php");  

                    $retiD=$_GET["ret"];


?>







<div class="card-box table-responsive">
                    
                                   <?php
                  

                $sqltemp = "SELECT * FROM retordertemp";
                $resulttemp = mysqli_query($conn,  $sqltemp); ?>
                          

                             <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                          <caption>STOCK ADDED BACK TO RETAILER ORDER </caption>
                         <thead >
                             <tr>
                               
                                         <th>Stock name</th>
                                         <th>ordered qty</th>
                                        
                                         
                                 <th>Remove</th>
                             </tr>
                         </thead>

                         
                         <tbody>
                             <?php
                              while($row = mysqli_fetch_assoc($resulttemp)){
                                   $delid=$row['tempid'];
                                  echo "<tr><td>{$row['stockName']}</td><td>{$row['ord_qty']}</td>
                                        <td><a href='deleteretord.php?temp_id=$delid&retid=".$retiD."'>Delete</a> </td> 
                                </tr>\n";
                              }
                               ?>
                              
                           
                     </tbody>
                        
                   
                    </table>

                </div>