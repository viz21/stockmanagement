<?php 



 
include("db.php");


$id=$_GET['temp_id'];
$empId=$_GET['empId'];

$sql="DELETE FROM tempextrastck WHERE empId=".$empId." AND temp_id='".$id."' ";

mysqli_query($conn,$sql);

 header('location:addlorrystock.php');





?>