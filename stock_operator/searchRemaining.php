<?php
   include ("db.php");  

                    $sqlsearch="SELECT stock_details FROM unload_lorry_qty where lorryID='".$_GET["itm"]."'";
                    $sqlsearch2="SELECT stock_details FROM load_lorry_qty where lorryID='".$_GET["itm"]."'";
                  

      $result1 = mysqli_query($conn,$sqlsearch); 
      $result2 = mysqli_query($conn,$sqlsearch2); 

?>

<table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                         <thead>
                             <tr>
                                <!-- <th>product ID</th>-->
                                 <th>Product name</th>
                                 <th>loaded quntity</th>
                                 <th>remaining quantity</th>
                                 <th>sold quantity</th>
                              
                                 
                             </tr>
                         </thead>
                         <tbody>
                              <?php
                            
                              while($row = mysqli_fetch_assoc($result1)){
                                    
                                      while($row2 = mysqli_fetch_assoc($result2)){     
                                         
                                         $loadvar1=$row2['stock_details'];
                                         $loadvar2=json_decode($loadvar1,true);
                                         $loadcount=count($loadvar2);

                                         $var1=$row['stock_details'];
                                         
                                         $var2=json_decode($var1,true);
                                          $elementcount = count( $var2) ;
                                      for($x=0; $x<$elementcount; $x++){

                                            for($y=0;$y<$loadcount;$y++){
                                              $sid1=$var2[$x]['stockID'];
                                               $sid2=$loadvar2[$y]['stockID'];
                                               if($sid1==$sid2){
                                                $name=$var2[$x]['productname'];
                                                 $loadqty=$loadvar2[$y]['quntity'];
                                                $remqty=$var2[$x]['quntity'];
                                                $soldqty=$loadqty-$remqty;
                                             echo "<tr><td>$name</td><td>$loadqty</td><td>$remqty</td><td>$soldqty</td>
                                            
                                        
                                      
                                </tr>\n";
                                      }
                                    }
                                   }
                             }         
                              }
                               ?>
                              
                           
                        </tbody>
                    </table>