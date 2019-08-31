<?php
include"db.php";
//$id = 1 ;
//$details = '[{"retail_name":"sunil","date":"1.2.3","discount":"55","totincome":"5000"},{"retail_name":"namal","date":"1.2.3","discount":"66","totincome":"6000"}]';
$id= $_POST['empid'];
$details= $_POST['data'];
echo $id;
$array=json_decode($details,true);

print_r($array);
$arrcount=count($array);
echo $arrcount;
for($i=0; $i<$arrcount;$i++) {

    date_default_timezone_set("Asia/Colombo");
    $rep_date=date("d.m.y");
	$retailer=$array[$i]['retName'];
	$discount=$array[$i]['discount'];
	$totincome=$array[$i]['totPrice'];

	$sql = "Insert INTO sale_rep(emp_id,retail_name,date,discount,income) VALUES('$id','$retailer','$rep_date','$discount','$totincome')";
                $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Successfully Created";
            } else {
            	 echo "error" . mysqli_error($conn);
            }
}

?>