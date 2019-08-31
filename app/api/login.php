<?php
header('Content-type:application/json');
header("Access-Control-Allow-Origin: *");
if($_GET['token']!="stock1230"){
	$data = array("status"=> "error","msg"=>"Authentication Failed");
	echo json_encode($data);
	die();
}
include ("db_connect.php");
	//$data='{"username":"17SanilaJ01","password":"Saniya123"}';
	$data=file_get_contents('php://input');
	$user_data=json_decode($data,true);
	$user_name=$user_data['username'];
	$password=$user_data['password'];
	$auth_code=0;	
	$sql="SELECT * FROM auth_details WHERE username='$user_name' and password='$password' and type=4";
	$result = mysqli_query($conn, $sql);
    if ($result)
		{   $row = mysqli_fetch_array($result);
			if ($row <> "" or $row <> null) {
					$auth_code=1;
					$data=array("username"=> $row['username'],"password"=>$row['password'],"empId"=>$row['empId'],"id"=>$row['id'],"auth_code"=>$auth_code);
					echo json_encode($data);
							
			} 
			else{
                    $data = array("status"=> "error","msg"=>"Unauthorize Access. Check username and password again.","auth_code"=>$auth_code);
					echo json_encode($data);
			}
		}
?>