
<?php 
include_once 'db.php';



$vehicleid=(int)$_GET["vehicleid"];

$sql4="DELETE FROM addvehicle WHERE vehicleid=$vehicleid";

mysqli_query($conn,$sql4);

  header('location:vehicleDetails.php?valid=1');
                          
      
               


?>
