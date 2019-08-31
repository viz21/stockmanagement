<?php
   include ("db.php"); 

 $code=$_GET["code"];


//$code="potato";
  
    $sql  = "SELECT stockName,stockID FROM stock WHERE supplierName ='".$code."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    
    echo "<option>--Please Select--</option>";
    while($row=mysqli_fetch_array($result))
    {
     echo '<option value="', $row['stockID'],'">', $row['stockName'],'</option>';
    }
?>