<?php
include "../db_connect.php";
//echo "methana";
$repId=$_POST["repId"];
//echo $repId."<br/>";

$details=$_POST["stock"];
//print_r($details);
//echo "<br/>";
 $sql="SELECT stock_details FROM unload_lorry_qty where repID='".$repId."'";
      $result=mysqli_query($conn,$sql);

      $row=mysqli_fetch_assoc($result);
       $var1=$row['stock_details'];
       //print_r($var1);
       //echo $var1[0]['temp_id'];
        $unload_decode=json_decode($var1,true);
      // print_r($unload_decode);
        // print_r($unload_decode);
        $elem_unload=count($unload_decode);

    // $var2=json_decode($details,true);

   //print_r($var2);
     $elemcount=count($details);
   //echo "count is ".$elemcount;
     for($x=0; $x<$elemcount; $x++){
  //echo "check <br/>";
         //$stockId=$var2[$x]['stockId'];
         $qty=doubleval($details[$x]['quantity']);
     
         $stockName=$details[$x]['stockName'];
         $reciev_stockid=(int)$details[$x]['stockId'];
             
            // echo $qty;  
          // echo $stockName; 
                    for($y=0;$y<$elem_unload;$y++){
                                   
                                   //decoding unload_lorry_qty
                                 $unload_stockname=$unload_decode[$y]['productname'];
                                    $unload_qty=doubleval($unload_decode[$y]['quntity']);
                                   // $unload_stock_id=$unload_decode[$y]['stockId'];
                                   $sellingprice=$unload_decode[$y]['sellingprice'];
                                   $discount=$unload_decode[$y]['discount'];
                                   $stockid=(int)$unload_decode[$y]['stockID'];
                   $supplierName=$unload_decode[$y]['supplierName'];
                                  // $temp_id=$unload_decode[$y]['temp_id'];
                                      
                                  //echo "recieve id ".$reciev_stockid."\n";
                  //echo "table id ".$stockid."\n";  
                                if($reciev_stockid==$stockid){
                                        $updatedqty=$unload_qty-$qty;
                    //echo $unload_stockname."<br/>";
                    //echo $updatedqty;
                                        $sqla= "INSERT INTO temp_unload( stockID,productname,quntity,discount,sellingprice,supplierName) VALUES('".$stockid."','".$unload_stockname."','".$updatedqty."','".$discount."','".$sellingprice."','".$supplierName."')";
                                       $result=mysqli_query($conn,$sqla);
                                 }
                        

                    }

     }

     for($i=0;$i<$elem_unload;$i++)
     {
                                   
                                   //decoding unload_lorry_qty
                                 $unload_stockname2=$unload_decode[$i]['productname'];
                                    $unload_qty2=doubleval($unload_decode[$i]['quntity']);
                                   // $unload_stock_id=$unload_decode[$y]['stockId'];
                                   $sellingprice2=$unload_decode[$i]['sellingprice'];
                                   $discount2=$unload_decode[$i]['discount'];
                                   $stockid2=$unload_decode[$i]['stockID'];   





                    $sqlselec= "SELECT * from temp_unload WHERE stockID ='".$stockid2."'";
                                          $result= mysqli_query($conn, $sqlselec)   ;
                                          if($result && (mysqli_num_rows($result) > 0)){
                                           }
                                           else{ 
                                             $sqlab= "INSERT INTO temp_unload(stockID,productname,quntity,discount,sellingprice,supplierName) VALUES('".$stockid2."','".$unload_stockname2."','".$unload_qty2."','".$discount2."','".$sellingprice2."','".$supplierName."')";
                                            $resultb=mysqli_query($conn,$sqlab);





              }
     }

    $sqlsel = "SELECT * FROM temp_unload";
      
     $list = mysqli_query($conn, $sqlsel);
  
      $data = array();
    
   while($row = mysqli_fetch_assoc($list)){
       $data[]= $row;
   }
   
    $tempunload_details = json_encode($data);

    $sqlupdate="UPDATE unload_lorry_qty SET stock_details='".$tempunload_details."' WHERE repID='".$repId."'";
    $result=mysqli_query($conn,$sqlupdate);

    $sqldel="DELETE FROM temp_unload";
         mysqli_query($conn, $sqldel);  
  

  

?>