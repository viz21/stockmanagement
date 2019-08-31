<?php
include_once 'db.php';




 echo $supplierName=$_GET['supplierName'];



/*
           require 'PHPMailer-master/PHPMailerAutoload.php';
        $mail=new PHPMailer();
        $mail->IsSmtp();
        $mail->SMTPDebug=0;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Host="ssl://smtp.gmail.com";
        $mail->Port=465;   //465 //587
        $mail->Username="shavindimasha@gmail.com";
        $mail->Password="DimaEmpire";
        $mail->SetFrom("shavindimasha@gmail.com");
        $mail->Subject="Testing";
        $mail->Body="meka assata dapan msg eka";
        $mail->IsHTML(true);
        $mail->AddAddress("upssep14@gamail.com");*/
     
        
       echo "jfhjh";
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




 