<?php
     include("../db.php");
   //  $repId=$_GET["repID"];
    // $details=$_GET["data"];

     $repId=1;
     $details='[{"productname":"anchor butter","quntity":"1"},{"productname":"choclate","quntity":"1"},{"productname":"munchee puff","quntity":"1"}]';
      
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

     $var2=json_decode($details,true);

   print_r($var2);
     $elemcount=count($var2);
     for($x=0; $x<$elemcount; $x++){

         //$stockId=$var2[$x]['stockId'];
         $qty=doubleval($var2[$x]['quntity']);
         $stockName=$var2[$x]['productname'];
             
            // echo $qty;  
          // echo $stockName; 
                    for($y=0;$y<$elem_unload;$y++){
                                   
                                   //decoding unload_lorry_qty
                    	           $unload_stockname=$unload_decode[$y]['productname'];
                                    $unload_qty=doubleval($unload_decode[$y]['quntity']);
                                   // $unload_stock_id=$unload_decode[$y]['stockId'];
                                   $sellingprice=$unload_decode[$y]['sellingprice'];
                                   $discount=$unload_decode[$y]['discount'];
                                  // $temp_id=$unload_decode[$y]['temp_id'];
                                      
                                    
                                if($stockName==$unload_stockname){
                                        $updatedqty=$unload_qty-$qty;

                                        $sqla= "INSERT INTO temp_unload( productname,quntity,discount,sellingprice) VALUES('".$unload_stockname."','".$updatedqty."','".$discount."','".$sellingprice."')";
                                       $result=mysqli_query($conn,$sqla);
                                 }



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