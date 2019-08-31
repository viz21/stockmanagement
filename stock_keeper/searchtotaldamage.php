<?php
   include ("db.php"); 

 $code=$_GET["code"];



  
                   $sql = "SELECT * FROM lorry_damage_stocks where supplierName='".$code."'";
               $result = mysqli_query($conn,$sql);?>

                            
                         <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                   
                          <form class="form-horizontal"    method="GET" action="deletebtn.php" enctype="multipart/form-data" name="damagestckform">
                         <thead>
                             <tr>
                                 
                                 
                                 <th>Suppliername</th>
                                 <th>Stockname</th>
                                 <th>Damage quntity</th>
                               
                                 
                                 <th>Total Price</th>
                                 
                                 <th>Remove</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php  
                                  $id=2;

                               while( $row = mysqli_fetch_assoc( $result ) ){
                                    //$row['id'];
                                
                                echo "<tr><td>{$row['supplierName']}</td><td>{$row['stockName']}</td><td>{$row['quantity']}</td>
                                       <td>{$row['totPrice']}</td>
                                  
                                       <td>   
                                          <a href='deletebtn.php?id=$id'>Delete</a>
                                   </td> 
                                </tr>\n";


                               }
                               ?>

                              

                               
                          
                       </tbody>
                    </table>

                    </form>
