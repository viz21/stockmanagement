<?php
include("../db.php");
$retId=5;
$stockId=4;
$re_qty=5;
$status=0;
//checking the retailer id in the table

$sql1="SELECT * FROM retailer_stocks where retId='$retId' ORDER BY id DESC LIMIT 1 ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$rowsize1=mysqli_num_rows($result1);
echo "rowsize".$rowsize1;
$id=$row1['id'];
$quantity;
//checking the row size no stock available
if($rowsize1==0){
 echo "error";
}

//if stock available
else{


  $list= json_decode($row1['stocks'],true);
  $size=sizeof($list);

  for($i=0;$i<$size;$i++){
    if((int)$list[$i]['stockId']==$stockId){

    //the stockid is available
      $quantity=doubleval($list[$i]['quantity']);
      echo "quantity".$quantity;

     //checking the quantity given less the return quantity
      if($re_qty>$quantity){
        echo "error1";
      }
      else{
       $status=1;
       break;
     }
   }
 }
 if($status==1){
  if($row1['returnStocks'] == NULL){
    echo "esdasd";
    $arr = array("stockId"=>"$stockId","quantity"=>"$re_qty");

    $newreturn= json_encode($arr);

      //  $sql2= "INSERT INTO retailer_stocks(returnStocks) VALUES('$newreturn') where retId='$retId' ORDER BY id DESC LIMIT 1 ";

    $sql2="UPDATE retailer_stocks set returnStocks = '$newreturn' where retId='$retId' ORDER BY id DESC LIMIT 1"  ;
 //echo $sql2;


    $rs=mysqli_query($conn,$sql2);
    if($rs){
     echo 'sucessfull Added**'.'<br>';
   }
   else{
     echo 'error'.mysqli_error($conn).'<br>';
   }


 }

           //if not null a previously send retun stock is there

 else{

           //obtainig the values from already existing jason

  $list1= json_decode($row1['returnStocks'],true);
  $size1=sizeof($list1);
  $stockid;
   $quantity1;
  echo $size1;
  for($l=0;$l<$size1;$l++){
   echo "meake athule";

   $stockid=doubleval($list1[$l]['stockId']);
   $quantity1=doubleval($list1[$l]['quantity']);

   break;

 }


   $sqla= "INSERT INTO tempdstok(stockId,quantity) VALUES('".$stockid."','".$quantity1."')";
   mysqli_query($conn,$sqla);
 $sql1="SELECT count(*) as cnt FROM tempdstok where stockId=$stockId";
 echo $sql1;
 $result9=mysqli_query($conn,$sql1);
 $row9=mysqli_fetch_array($result9);
 $rowsize9=mysqli_num_rows($result9);
 echo $row9['cnt'];
 if($row9['cnt']==0){
  echo "there";
  $sqla= "INSERT INTO tempdstok(stockId,quantity) VALUES('".$stockId."','".$re_qty."')";
  $result=mysqli_query($conn,$sqla);
}

else{
  echo "here";
  $sql2="SELECT * FROM tempdstok where stockId='".$stockid."'";
  $result=mysqli_query($conn,$sql2);
  $row=mysqli_fetch_assoc($result);
  $newqnty=$re_qty+$row['quantity'];
  echo $newqnty;
  if($newqnty>$quantity){
    echo "error return stock qty ";
  }
  else{
   $sql3="UPDATE tempdstok SET quantity=$newqnty where stockId=$stockid";
   mysqli_query($conn,$sql3);





}
}
  
   $sql10="SELECT stockId,quantity from tempdstok";

   $list5=mysqli_query($conn,$sql10);

   $data=array();

   while($row10 =mysqli_fetch_assoc($list5)){
    $data[]=$row10;
  }

  $tempdstok1=json_encode($data);


 
  $sqlupdate="UPDATE retailer_stocks SET returnStocks='$tempdstok1' WHERE id=$id";
  echo $sqlupdate;
  mysqli_query($conn,$sqlupdate);
 }
/* $sql="DELETE FROM tempdstok";
 mysqli_query($conn,$sql);
*/
}

}

//$status=1;
//break;




?>





















































