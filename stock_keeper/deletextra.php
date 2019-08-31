<?php 



 
include("db.php");


$id=$_GET['temp_id'];

$sql="DELETE FROM tempextrastck WHERE temp_id='".$id."' ";

mysqli_query($conn,$sql);

 header('location:addlorrystock.php');





?>