<?php 

include ("db.php");  

                    $retiD=$_GET["ret"];


?>







<div class="card-box table-responsive">
                    
                                   <?php
                  

                $sqltemp = "SELECT * FROM templorrystck ";
                $resulttemp = mysqli_query($conn,  $sqltemp); ?>
                          

                             <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                          <caption>STOCK ADDED TO LORRY</caption>
                         <thead >
                             <tr>
                               <th>Product Name</th>
                                         <th>quntity</th>
                                         <th>discount</th>
                                         <th>price</th>
                                         
                                 <th>Remove</th>
                             </tr>
                         </thead>

                         
                         <tbody>
                             <?php
                              while($row = mysqli_fetch_assoc($resulttemp)){
                                    $delid=$row['temp_id'];
                                    
                                  echo "<tr><td>{$row['productname']}</td><td>{$row['quntity']}</td><td>{$row['discount']}</td><td>{$row['sellingprice']}</td>
                                        <td><a href='deleteload.php?temp_id=$delid&retid=".$retiD."'>Delete</a> </td> 
                                </tr>\n";
                              }
                               ?>
                              
                           
                     </tbody>
                        
                   
                    </table>

                </div>