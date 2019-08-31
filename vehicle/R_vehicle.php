
<?php 
include_once 'dbconnect.php';



$vehicleid=(int)$_GET["vehicleid"];

$sql4="DELETE FROM addvehicle WHERE vehicleid=$vehicleid";

mysqli_query($conn,$sql4);

  header('location:V_vehicle.php?valid=1');
                          
      
               


?>
