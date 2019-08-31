<?php

  include ("../db_connect.php");
  $status=0;
//checking the retailer id in the table
  $repId=(int)$_GET['repId'];
  $data=file_get_contents('php://input');
    //$data='{"stockId":"5","quantity":"3"}';
  $user_data=json_decode($data,true);

  $stockId=(int)$user_data["stockId"];
  $re_qty=(int)$user_data["quantity"];
  $retId=(int)$user_data["retId"];
  $retName=$user_data["retName"];
  $sql1="SELECT * FROM retailer_stocks where retId='$retId' ORDER BY id DESC LIMIT 1 ";
  $result1 = mysqli_query($conn, $sql1);
  $row1 = mysqli_fetch_array($result1);
  $rowsize1=mysqli_num_rows($result1);
//echo "rowsize".$rowsize1;
  $id=$row1['id'];
  $sqla= "INSERT INTO free_Stock(saleId,stockId,stockName,quantity) VALUES('".$id."','".$re_qty."')";
  $result=mysqli_query($conn,$sqla);




?>





















































