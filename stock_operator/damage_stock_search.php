<?php
   include ("db.php");  

                    $sqlsearch="SELECT * FROM lorry_damage_stocks where lorryID='".$_GET["itm"]."'";
           
                  

      $result1 = mysqli_query($conn,$sqlsearch); 



?>

<table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                         <thead>
                               <tr>
                                 
                                 
                                 <th>Suppliername</th>
                                 <th>Stockname</th>
                                 <th>Damage quntity</th>
                               
                                 
                                 <th>Total Price</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php  
                                  $id=2;

                               while( $row = mysqli_fetch_assoc( $result1 ) ){
                                    //$row['id'];
                                
                                echo "<tr><td>{$row['supplierName']}</td><td>{$row['stockName']}</td><td>{$row['quantity']}</td>
                                       <td>{$row['totPrice']}</td>
                                  
                                </tr>\n";


                               }
                               ?>
                              
                           
                        </tbody>
                    </table>