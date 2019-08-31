      <?php
        include ("db.php");  
              

                $sql = "SELECT * FROM lorry_damage_stocks";
               $result = mysqli_query($conn,$sql);

          
         ?>
                          
   
                         <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                          <form class="form-horizontal"    method="GET" action="deletebtn.php" enctype="multipart/form-data" name="damagestckform">
                         <thead>
                             <tr>
                                 <th>productId</th>
                                 <th>Damage quntity</th>
                               
                                 <th>Unit price</th>
                                 <th>Total Price</th>
                                 <th>Discount Price</th>
                                 <th>Remove</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php  

                               while( $row = mysqli_fetch_assoc( $result ) ){
                                   $id=$row['id'];
                                echo "<tr><td>{$row['stockName']}</td><td>{$row['quantity']}</td>
                                       <td>{$row['unitPrice']}</td><td>{$row['totPrice']}</td><td>{$row['discPrice']}</td>
                                  
                                       <td>   
                                          <a href='deletebtn.php?id=$id'>Delete</a>
                                   </td> 
                                </tr>\n";


                               }
                               ?>

                              

                               
                          
                       </tbody>
                    </table>

                    </form>