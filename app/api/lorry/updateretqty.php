<?php
     include("../db.php");
 //$retId=$_POST["retId"];
 // $details=$_POST["stock"];

   

     $retId=3;
  //  $repId=2;
   $details='[{"stockName":"anchor butter","quantity":"1","stockId":"3"},{"stockName":"choclate","quantity":"1","stockId":"1"}]';
      
    $sql="SELECT stock_details FROM unload_lorry_ret where retId='".$retId."'";
      $result=mysqli_query($conn,$sql);

      $row=mysqli_fetch_assoc($result);
       $var1=$row['stock_details'];
       //print_r($var1);
       //echo $var1[0]['temp_id'];
        $unload_decode=json_decode($var1,true);
      // print_r($unload_decode);
        // print_r($unload_decode);
        $elem_unload=count($unload_decode);

     $var2=json_decode($details,true);

   print_r($var2);
     $elemcount=count($var2);
     for($x=0; $x<$elemcount; $x++){

         //$stockId=$var2[$x]['stockId'];
         $qty=doubleval($var2[$x]['quantity']);
         
         $reciev_stockid=$var2[$x]['stockId'];
             
            // echo $qty;  
          // echo $stockName; 
                    for($y=0;$y<$elem_unload;$y++){
                                   
                                   //decoding unload_lorry_qty
                                 $unload_stockname=$unload_decode[$y]['productname'];
                                    $unload_qty=doubleval($unload_decode[$y]['quntity']);
                                   // $unload_stock_id=$unload_decode[$y]['stockId'];
                                   $sellingprice=$unload_decode[$y]['sellingprice'];
                                   $discount=$unload_decode[$y]['discount'];
                                   $stockid=$unload_decode[$y]['stockID'];
                                  // $temp_id=$unload_decode[$y]['temp_id'];
                                      
                                    
                                if($reciev_stockid==$stockid){
                                        $updatedqty=$unload_qty-$qty;

                                        $sqla= "INSERT INTO temp_unload_ret( stockID,productname,quntity,discount,sellingprice) VALUES('".$stockid."','".$unload_stockname."','".$updatedqty."','".$discount."','".$sellingprice."')";
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





                    $sqlselec= "SELECT * from temp_unload_ret WHERE stockID ='".$stockid2."'";
                                          $result= mysqli_query($conn, $sqlselec)   ;
                                          if($result && (mysqli_num_rows($result) > 0)){
                                           }
                                           else{ 
                                             $sqlab= "INSERT INTO temp_unload_ret(stockID,productname,quntity,discount,sellingprice) VALUES('".$stockid2."','".$unload_stockname2."','".$unload_qty2."','".$discount2."','".$sellingprice2."')";
                                            $resultb=mysqli_query($conn,$sqlab);





              }
     }

    $sqlsel = "SELECT * FROM temp_unload_ret";
      
     $list = mysqli_query($conn, $sqlsel);
  
      $data = array();
    
   while($row = mysqli_fetch_assoc($list)){
       $data[]= $row;
   }
   
    $tempunload_details = json_encode($data);

    $sqlupdate="UPDATE unload_lorry_ret SET stock_details='".$tempunload_details."' WHERE retId='".$retId."'";
    $result=mysqli_query($conn,$sqlupdate);

    $sqldel="DELETE FROM temp_unload_ret";
         mysqli_query($conn, $sqldel);  
  

  

?>