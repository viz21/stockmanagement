<?php 
include ("db.php"); 


$stockName=$_GET['stockName'];

/*$body='<html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                <h1>We need these items in next delivery.</h1>
                <table>
                <thead>
                <tr>
                
                     
                             
                                 <th>Stock Name</th>
                                 <th>Quantity</th>
                                 <th>Unit Price</th>
                                 <th>Total Price</th>
                                 <th>Discount Price</th>
                                
                                              
                     </tr>
                </thead>

                 <tbody>
                               ';
                                $sql1 = "SELECT * FROM warehouse_damage where status=0 and supplierName='eretretre'";
                                $result = mysqli_query($conn, $sql1);
                                while ($row = mysqli_fetch_assoc($result)) {

                                    $supplierName=$row['supplierName'];
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $row['stockName']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>
                                        <td><?php echo $row['unitPrice']; ?></td>
                                        <td><?php echo $row['totPrice']; ?></td>
                                        <td><?php echo $row['discPrice']; ?></td> 
                                        
                                  </tr> <?php
                                          }
                                          
                                          
                           echo '

                </tbody>
            </table>
                </body>
                </html>';    
   
echo $body;

require 'PHPMailer-master/PHPMailerAutoload.php';



$mail=new PHPMailer();
$mail->IsSmtp();
$mail->SMTPDebug=0;
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host="ssl://smtp.gmail.com";
$mail->Port=465;   //465 //587
$mail->Username="sanila.svj@gmail.com";
$mail->Password="sanila05488630";
$mail->SetFrom("sanila.svj@gmail.com");
$mail->Subject="Stock Requesting123";
$mail->Body=$body;
$mail->IsHTML(true);
$mail->AddAddress("shavindimasha@gmail.com");

if(!$mail->Send()){
    echo "mail error";
}
else{
    echo "send";    
}*/
 	$sql="DELETE FROM pur_temp";
 	mysqli_query($conn, $sql);
header('location:purchasing_order.php?valid=1');
  


 ?>