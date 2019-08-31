<?php
// providing the db connection
include("db.php");

$json = $_REQUEST['json'];
echo "JSON: \n";
var_dump($json);

$result= json_decode($json,true);
var_dump($result);

$SalesID= $result['SalesID'];
$RetailerID= $result['RetailerID'];
$Price = $result['Price'];
$PaidAmount= $result['PaidAmount'];
$Method= $result['Method'];
$Quantity= $result['Quantity'];
$Discount= $result['Discount'];
$Credits= $result['Credits'];
$Date=$result['Date'];


//insert data into retailer payment table
$sql1 = "INSERT INTO retailer_Payment(RetailerID,SalesID,Price,PaidAmount,Method) values($RetailerID,$SalesID,$Price,$PaidAmount,$Method)";
mysql_query($sql1);



//insert data to retailer stock table
$sql2 = "INSERT INTO retailer_Stocks(RetailerID,Date,SalesID,Quantity,Price,Discount) values($RetailerID,$Date,$SalesID,$Quantity,$Price,$Discount)";
mysql_query($sql2);



//insert data into retailer credits table

//calucualting the deadline date

$sql3 = "INSERT INTO Retailer_credits() values()";
mysql_query($sql3);




?>