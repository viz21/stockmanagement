<?php
require 'PHPMailer-master/PHPMailer-master/PHPMailerAutoload.php';

$item1="choco";
$item2="Marie";
$item3="Pedia Pro";

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
				$mail->Body="<html>
				<head>
				<title>HTML email</title>
				</head>
				<body>
				<h1>We need these items in next delivery.</h1>
				<table>
				<tr>
				<th>Stock Name</th>
				<th>Quantity</th>
				</tr>
				<tr>
				<td>".$item1."</td>
				<td>100</td>
				</tr>
				<tr>
				<td>".$item2."</td>
				<td>200</td>
				</tr>
				<tr>
				<td>".$item3."</td>
				<td>500</td>
				</tr>
				</table>
				</body>
				</html>";
				$mail->IsHTML(true);
				$mail->AddAddress("sanav4@gmail.com");
				
				if(!$mail->Send()){
					echo "mail error";
				}
				else{
					echo "send";	
				}
				?>