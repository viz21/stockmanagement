<?php 

include ("db.php"); 
   $stockId=$_GET["stockid"];
  $retId=$_GET["retid"];
  
    $sql= "SELECT stock_details from retailer_order where retId='".$retId."'";
    $result = mysqli_query($conn,$sql);
    while($data = mysqli_fetch_assoc($result)){

      

                                         $var1=$data['stock_details'];
                                         
                                         $var2=json_decode($var1,true);
                                          $elementcount = count( $var2) ;
                                      for($x=0; $x<$elementcount; $x++){

    	
                        if($var2[$x]['stockId']==$stockId){
                                         echo $var2[$x]['ord_qty'];	  
                        }


        }
  }


?>