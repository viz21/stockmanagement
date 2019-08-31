<?php
   include ("db.php");  

                    $sqlsearch="SELECT stock_details FROM unload_lorry_ret where retId='".$_GET["itm"]."'";
           
                  

      $result1 = mysqli_query($conn,$sqlsearch); 

?>

<table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                         <thead>
                             <tr>
                                <!-- <th>product ID</th>-->
                                 <th>Product name</th>
                                 <th>remaining quntity</th>
                                 <th>sellingprice</th>
                                 
                              
                                 
                             </tr>
                         </thead>
                         <tbody>
                              <?php
                            
                              while($row = mysqli_fetch_assoc($result1)){
                                    
                         
                                         $var1=$row['stock_details'];
                                         
                                         $var2=json_decode($var1,true);
                                          $elementcount = count( $var2) ;
                                      for($x=0; $x<$elementcount; $x++){

                                             echo "<tr><td>{$var2[$x]['productname']}</td><td>{$var2[$x]['quntity']}</td><td>{$var2[$x]['sellingprice']}</td></tr>\n";
                                      }
                             }         
                              
                               ?>
                              
                           
                        </tbody>
                    </table>