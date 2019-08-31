<?php
include_once 'db.php';




$supplierName=$_GET['supplierName'];


         $sql = "SELECT id,stockId,stockName,quantity,unitPrice,totPrice,discPrice FROM warehouse_damage where status=0 and supplierName='".$supplierName."' ";
         $list = mysqli_query($conn, $sql);
         $data = array();
     
      while($row = mysqli_fetch_assoc($list)){
         

                        
        echo $stockName=$row['stockName'];
         
        $sql="UPDATE warehouse_damage SET status=1  WHERE supplierName='".$supplierName."' and stockName ='".$stockName."'";
         mysqli_query($conn, $sql);
          
         $data[]= $row;
         
     

      }
     
     date_default_timezone_set("Asia/Colombo");
                         $view_date=date("d.m.Y");

   //encode temp
         $send_damagestock = json_encode($data);
         echo $send_damagestock;
         
         $sqlu="INSERT INTO send_damagestock(supplierName,damage_list,date_) VALUES ('$supplierName','$send_damagestock','$view_date')";
         $resultU=mysqli_query($conn, $sqlu);
         

      
     header('location:send_email.php?valid=1');
?>




 