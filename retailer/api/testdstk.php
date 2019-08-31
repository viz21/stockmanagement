<?php
include("../db.php");
$retId=2;
$stockId=3;
$re_qty=2;
$status=0;
//checking the retailer id in the table

$sql1="SELECT * FROM retailer_stocks where retId='$retId' ORDER BY id DESC LIMIT 1 ";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$rowsize1=mysqli_num_rows($result1);
//echo "rowsize".$rowsize1;
$id=$row1['id'];
$quantity;
//checking the row size no stock available
if($rowsize1==0){

$auth=0;
$data = array("status"=> "error","msg"=>"Retailer not available","auth"=>$auth);
echo json_encode($data);
}

//if stock available
else{


  $list= json_decode($row1['stocks'],true);
  $size=sizeof($list);

  for($i=0;$i<$size;$i++){
    if((int)$list[$i]['stockId']==$stockId){

    //the stockid is available
      $quantity=doubleval($list[$i]['quantity']);
     // echo "quantity".$quantity;

     //checking the quantity given less the return quantity
      if($re_qty>$quantity){
      //  echo "error1";

        $auth=0;
        $data = array("status"=> "error","msg"=>"Quantity exceeded","auth"=>$auth);
        echo json_encode($data);
      }
      else{
       $status=1;
       break;
     }
   }
 }
 if($status==1){
  if($row1['returnStocks'] == NULL){
    
    $arr[] = array("stockId"=>"$stockId","quantity"=>"$re_qty");
    //echo "<br/>";
    //print_r($arr);
    $newreturn= json_encode($arr);
    //echo "<br/>";
    //print_r($newreturn);
      //  $sql2= "INSERT INTO retailer_stocks(returnStocks) VALUES('$newreturn') where retId='$retId' ORDER BY id DESC LIMIT 1 ";

    $sql2="UPDATE retailer_stocks set returnStocks = '$newreturn' where retId='$retId' ORDER BY id DESC LIMIT 1"  ;
 //echo $sql2;


    $rs=mysqli_query($conn,$sql2);
    if($rs){
     //echo 'sucessfull Added**'.'<br>';
      $auth=1;
      $data = array("status"=> "succesful","msg"=>"Successfully updated","auth"=>$auth);
      echo json_encode($data);

   }
   else{
     //echo 'error'.mysqli_error($conn).'<br>';
     $auth=0;
     $data = array("status"=> "error","msg"=>"Error in update","auth"=>$auth);
     echo json_encode($data);

   }


 }

           //if not null a previously send retun stock is there

 else{

           //obtainig the values from already existing jason
  
  $list1= json_decode($row1['returnStocks'],true);
  //$size1=sizeof($row1['returnStocks']);
   $size1=count($list1);
  //echo "jjjj".$size1;
     $stockid;
     $quantity1;
        for($l=0;$l<$size1;$l++){
   echo "meake athule";
   $stockid=doubleval($list1[$l]['stockId']);
   $quantity1=doubleval($list1[$l]['quantity']);
   
   $sqla= "INSERT INTO tempdstok(stockId,quantity) VALUES('".$stockid."','".$quantity1."')";
   //echo $sqla;
   mysqli_query($conn,$sqla);
   //break;
  //continue;
 }

 
 $sql1="SELECT * FROM tempdstok where stockId=$stockId";
// echo "aaaa".$sql1;
 $result9=mysqli_query($conn,$sql1);
 $row9=mysqli_fetch_array($result9);
 //print_r($row9);
 $rowsize9=mysqli_num_rows($result9);
 //echo "count".$rowsize9;
 //echo "<br/>".$row9['cnt'];*/
// if($row9<>null || $row9==""){
 if($rowsize9<=0){
  echo "there";
  $sqla= "INSERT INTO tempdstok(stockId,quantity) VALUES('".$stockId."','".$re_qty."')";
  $result=mysqli_query($conn,$sqla);
}

else{
  echo "here";
  $sql2="SELECT * FROM tempdstok where stockId='".$stockId."'";
  $result=mysqli_query($conn,$sql2);
  $row=mysqli_fetch_assoc($result);
  $newqnty=$re_qty+$row['quantity'];
  //echo "<br/>".$newqnty;
  if($newqnty>$quantity){
   
$auth=0;
$data = array("status"=> "error","msg"=>"Quantity exceeded","auth"=>$auth);

          echo json_encode($data);
  }
  else{
   $sql3="UPDATE tempdstok SET quantity=$newqnty where stockId=$stockId";
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
$result11=mysqli_query($conn,$sqlupdate);
  if($result11){
    $auth=1;
    $data = array("status"=> "succesful","msg"=>"Successfully Updated","auth"=>$auth);
    echo json_encode($data);
  }
  else{
   $auth=0;
   $data = array("status"=> "error","msg"=>"Error in update","auth"=>$auth);
   echo json_encode($data);

  }

}

$sql="DELETE FROM tempdstok";
mysqli_query($conn,$sql);

}

}

//$status=1;
//break;




?>





















































