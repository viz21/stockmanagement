<?php 
include("db.php");


$id=$_GET['id'];

$sql="DELETE FROM lorry_damage_stocks WHERE id='".$id."' ";

mysqli_query($conn,$sql);

 header('location:damagestock.php');


?>