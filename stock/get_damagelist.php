<?php
include_once 'db.php';




 $supplierName=$_GET['supplierName'];



/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/PHPMailerAutoload.php';
function sendMail($msg){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Recipients
        $mail->setFrom('shavindimasha@gmail.com', 'Mailer');
        $mail->addAddress('shavindimasha@gmail.com');     // Add a recipient
        // $mail->addAddress('nuwan.tissera@my.sliit.lk');
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $supplierName;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        return true;
    } catch (Exception $e) {
//         echo 'Message could not be sent.';
//         echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
    }
}*/


        
     
        
       echo "jfhjh";
         $sql = "SELECT id,stockId,stockName,quantity,unitPrice,totPrice,discPrice FROM warehouse_damage where status=0 and supplierName='".$supplierName."' ";
         $list = mysqli_query($con, $sql);
         $data = array();
     
      while($row = mysqli_fetch_assoc($list)){
         

                        
        echo $stockName=$row['stockName'];
         
        $sql="UPDATE warehouse_damage SET status=1  WHERE supplierName='".$supplierName."' and stockName ='".$stockName."'";
         mysqli_query($con, $sql);
          
         $data[]= $row;
         
     

      }
     
     date_default_timezone_set("Asia/Colombo");
                         $view_date=date("d.m.Y");

   //encode temp
         $send_damagestock = json_encode($data);
         echo $send_damagestock;
         
         $sqlu="INSERT INTO send_damagestock(supplierName,damage_list,date_) VALUES ('$supplierName','$send_damagestock','$view_date')";
         $resultU=mysqli_query($con, $sqlu);
         

      
     header('location:send_email.php?valid=1');
?>




 