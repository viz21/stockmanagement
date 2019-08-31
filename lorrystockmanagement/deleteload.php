<?php 



 
include("db.php");


$id=$_GET['temp_id'];

$sql="DELETE FROM templorrystck WHERE temp_id='".$id."' ";

mysqli_query($conn,$sql);

 header('location:addlorrystock.php');





?>