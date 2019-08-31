<?php
   include ("db.php"); 

 $code=$_GET["code"];


//$code="potato";
  
   $sql  = "SELECT stockName FROM stock WHERE supplierName ='".$code."'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error());

    while($row=mysqli_fetch_array($result))
    {
     echo "<option>--Please Select--</option>";
     echo '<option value="', $row['stockID'],'">', $row['stockName'],'</option>';

    }
?>