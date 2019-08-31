<?php
include ("db.php");

//get supplier transaction details

$supplierName=$_POST['supName'];
$price=doubleval($_POST['totprice']);
$Id=$_POST['s_ID'];

//insert into supplierpayment db
$sql="INSERT INTO fin_supplierpayment (supplierName, price, Id) VALUES ('$supplierName', '$price', '$Id')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Successfully Created";
}

//send supplier transaction details back to supplier

$sql2 ="SELECT * from fin_supplierpayment";
    $result2=mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($result2);

$supName=$row['supplierName'];
$totprice=$row['price'];
$s_ID=$row['Id'];

$url = "http://localhost/stockmangementsystem/api/getLorryStock.php";

$data = array('s_ID'=> $Id,'totprice' => $amount,  'method'=> $method);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

echo $ID;
echo $amount;
echo $method;









?>