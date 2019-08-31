<?php
session_start();
//$username=$_SESSION['username'];
$_SESSION['user']="Mr.obeysekara";
$_SESSION['post']="Admin";
if($_SESSION['user']){
 include ("db.php");


  $ret_nxtid=$_GET['retname'];
 // echo $ret_nxtid;



 // loadTable($ret_nxtid);
 ?>





 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Waligama Distributors | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- jvectormap -->
  <!-- Date Picker -->
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="../plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="../plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
 



  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
 

    <style> 

        div {
            padding-bottom:30px;
           
        }

        .error {
            color: #FF0000;
        }
         #err_qunt{
          color: #FF0000;
         }


   


    </style>
    <script type="text/javascript">

    function viewTempStock(ret){

     var xhttp;
    if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("loadtabletwo").innerHTML  = xhttp.responseText;

    }
  }
  xhttp.open("GET", "showtempstock.php?ret="+ret, true);
  xhttp.send();

    }
//..............
   function viewTempOrd(ret){

        var xhttp;
    if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("loadtabletwo").innerHTML  = xhttp.responseText;

    }
  }
  xhttp.open("GET", "showtempretorder.php?ret="+ret, true);
  xhttp.send();

   } 



//..........    
     function loadTable(itm)
   {
    var xhttp;
    if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("loadtable").innerHTML  = xhttp.responseText;

    }
  }
  xhttp.open("GET", "searchRetorder.php?itm="+itm, true);
  xhttp.send();


}
  


      /*  function load_ordqty(stockid,retid){
           
         
    // $('#ret_name :selected').val();
         
         var xhttp;
   if (window.XMLHttpRequest) {
    // code for modern browsers
      xhttp = new XMLHttpRequest();
   } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtord_qty").value = xhttp.responseText;
      
    }
  }
  xhttp.open("GET", "load_ret_ordqty.php?stockid="+stockid+"&retid="+retid, true);
  xhttp.send();



        }*/


      /*   function loadretproductlist(code)
         {

             if (window.XMLHttpRequest) {
    // code for modern browsers
      xhttp = new XMLHttpRequest();
   } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("sub").innerHTML = xhttp.responseText;
      
    }
  }
  xhttp.open("GET", "productload.php?code="+code, true);
  xhttp.send();

         }
*/




      
    /*   function loadIemInfo(code)
         {
              document.getElementById("err_qunt").innerHTML="";
           var xhttp;
   if (window.XMLHttpRequest) {
    // code for modern browsers
      xhttp = new XMLHttpRequest();
   } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtDiscount").value = xhttp.responseText.split(",")[0];
      document.getElementById("txtPice").value = xhttp.responseText.split(",")[1];
      document.getElementById("txtStquantity").value = xhttp.responseText.split(",")[2];
      document.getElementById("txtsupname").value = xhttp.responseText.split(",")[3];
    }
  }
  xhttp.open("GET", "searchItemInfo.php?code="+code, true);
  xhttp.send();


         }*/

       /*  function checkQuanty(qty,stockqty)
         {   


                
               document.getElementById("err_qunt").innerHTML="";
               //document.getElementById("err_qunt2").innerHTML="";
         
            var qty=parseFloat(qty);
            var stockqty=parseFloat(stockqty);

            if(stockqty<qty)
            {

             // alert("invalid quntityEnter a lower quntity!");  
               

                
                document.getElementById("err_qunt").innerHTML="invalid quntity!warehouse quantity is lower! ADD to order";
                 //document.getElementById("txtQty").value="";

            }
            else if(qty>0) {
                document.getElementById("err_qunt").innerHTML="valid quntity!ADD to lorry";
            }
            else{
                     document.getElementById("err_qunt").innerHTML=""; 
            }

         }*/

        



            
     
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="loadTable('<?php echo $ret_nxtid; ?>')">
  
            <?php
//jason adding to load_lorry_qty & unload_lorry_qty tables start
 
 $quntityErr = "";
  $qunti=  "";






    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
        

    

               

      


if(isset($_POST["btn_submit"])){
   //retname 
   
  //get details of tempstock

         $sql = "SELECT * FROM templorrystck ORDER BY temp_id";
         $list = mysqli_query($conn, $sql);
         $data = array();
     while($row = mysqli_fetch_assoc($list)){
         $data[]= $row;
         $stckname=$row['productname'];
         $stckqty=$row['quntity'];
         $stid=$row['stockID'];

        $sql="UPDATE stock SET qty=qty-'".$stckqty."' WHERE stockID='".$stid."'";
         mysqli_query($conn, $sql);
          

      $sqlselec= "SELECT * from rol_notify WHERE stockId ='".$stid."'";
       $result= mysqli_query($conn, $sqlselec)   ;
       if($result && (mysqli_num_rows($result) <= 0)){
       
                                 
           $sqlrol="SELECT ROL,qty,supplierName FROM stock WHERE stockID='".$stid."'";
           $resrol=mysqli_query($conn,$sqlrol);
       while($rowrol= mysqli_fetch_assoc($resrol)){

                 $suppliername=$rowrol['supplierName'];
                 echo $suppliername;
              if($rowrol['qty']<=$rowrol['ROL']){
                 $sqlin="INSERT INTO rol_notify(stockId,supplierName,stockName,status) VALUES('".$stid."','".$suppliername."','".$stckname."',0)";
                 mysqli_query($conn,$sqlin);
            }  
        }

      }
     }
   //encode temp
         $templorry = json_encode($data);
  
   //getlorry num and repid

       $templorryid=$_POST['lorryid'];
       $temprepnum=$_POST["repnumber"];


       $sql1="SELECT vehiclenum FROM addvehicle WHERE vehicleid='".$templorryid."'";
       $result1=mysqli_query($conn, $sql1);
       $row = mysqli_fetch_assoc($result1);
       $templorrynum=$row['vehiclenum'];

   
        $sqlret="SELECT retName FROM retailer_order WHERE retId='".$ret_nxtid."'";
     $resultret=mysqli_query($conn,$sqlret);
    $rowret = mysqli_fetch_assoc($resultret);
    $retname=$rowret['retName'];

    $sql2= "INSERT INTO load_lorry_ret (lorryID,lorryNumber,repID,stock_details,retId,retName) VALUES('".$templorryid."','".$templorrynum."','".$temprepnum."','".$templorry."','".$ret_nxtid."','".$retname."')"; 
     $sqlunload= "INSERT INTO unload_lorry_ret (lorryID,lorryNumber,repID,stock_details,retId,retName) VALUES('".$templorryid."','".$templorrynum."','".$temprepnum."','".$templorry."','".$ret_nxtid."','".$retname."')"; 
    
    
       mysqli_query($conn, $sql2);
       mysqli_query($conn, $sqlunload);  

       $sqlt="SELECT * FROM retordertemp";
       $resulttem=mysqli_query($conn,$sqlt);
       $data = array();
       if($resulttem && (mysqli_num_rows($resulttem) > 0)){ 
      while($row = mysqli_fetch_assoc($resulttem)){
         $data[]= $row;
        
         }
   }
   else{
         $sqldel3="DELETE FROM retailer_order WHERE retId='".$ret_nxtid."'";
         mysqli_query($conn,$sqldel3);

   }
       $retdetails=json_encode($data);

       $sqlord="UPDATE retailer_order SET stock_details='".$retdetails."' WHERE  retId='".$ret_nxtid."'";
      mysqli_query($conn,$sqlord);
        
       $sqldel="DELETE FROM templorrystck";
         mysqli_query($conn, $sqldel); 

         $sqldel2="DELETE FROM retordertemp";
         mysqli_query($conn, $sqldel2); 



          //$quntityErr = "";


      //   header("Location:./addlorrystock.php");
 
?> 
<script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully loaded!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./addlorrystock.php";
          })
        </script>

<?php
}
//end jason

/*if(isset($_POST["btnADD"]))
{ 
    

   $sid =$_POST["stocknm"] ;
   //$qntit =$_POST["qunti"] ;
   $qntit =$_POST["ord_qty"] ;
   $discount =$_POST["disco_nt"] ;
   $sling_price =$_POST["sel_price"] ;
   $supname=$_POST["supname"];
   if($qntit>0){
  $sqlid="SELECT stockName from stock where stockID='".$sid."'";
  $result=mysqli_query($conn,$sqlid);
  $row=mysqli_fetch_assoc($result);
  $productname=$row['stockName'];
  
   $sql3 = "INSERT INTO templorrystck(stockID,productname,quntity,discount,sellingprice,supplierName) VALUES('".$sid."','".$productname."','".$qntit."','".$discount."','".$sling_price."','".$supname."')";
    mysqli_query($conn, $sql3);

    //header('location:addlorrystock.php');
  }
//    $sql="UPDATE stock SET qty=qty-'".$qntit."' WHERE stockName='".$productname."'";
  //  mysqli_query($conn, $sql);
   
   
}
 
if(isset($_POST["btnord"]))
{ 
    $sid =$_POST["stocknm"] ;
   
   $qntit =$_POST["ord_qty"] ;
   
   if($qntit>0){
 $sqlid="SELECT stockName from stock where stockID='".$sid."'";
 $result=mysqli_query($conn,$sqlid);
  $row=mysqli_fetch_assoc($result);
  $productname=$row['stockName'];
  
   $sql = "INSERT INTO retordertemp(stockId,stockName,ord_qty) VALUES('".$sid."','".$productname."','".$qntit."')";
    mysqli_query($conn, $sql);
  }
    
   
}


}*/
//tempinsert end
}
?>
  <div class="wrapper">
  
    <header class="main-header">
      <!-- Logo -->
       
      <!-- Logo -->
      <a href="index.html" class="logo" >
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>W</b>D</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Waligama</b>Distributors</span>
      </a> 

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu" style="padding-bottom: 0px;">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../dist/img/user.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['user'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['user'];?> - <?php echo $_SESSION['post'];?>
                  </p>
                </li>

                <!-- Menu Body -->

                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          <!-- Control Sidebar Toggle Button
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        -->
      </ul>
    </div>
  </nav>
</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel" style="padding-bottom: 0px;">
      <div class="pull-left image" >
        <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info" style="padding-bottom: 0px;">
        <p><?php echo $_SESSION['user'];?></p>
        <i class="fa fa-circle text-success" style="font-size: 10px"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="addlorrystock.php">
          <i class="fa fa-truck"></i> <span>Load stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="extra.php">
          <i class="fa fa-balance-scale"></i> <span>Load ExtraStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
      <a href="ret_stck_remain.php">
        <i class="fa fa-balance-scale"></i> <span>Remaining Lorry Stock</span>
        <span class="pull-right-container"></span>
      </a>
    </li>
      <li class>
        <a href="remaining.php">
          <i class="fa fa-balance-scale"></i> <span>Remaining Extra Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="damagestock.php">
          <i class="fa fa-trash"></i> <span>Damage LorryStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
       Dashboard
      <small>Enter lorrystock Details</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Load Lorry Stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Load Lorry Stock</h1>
      </div>
      <form class="form-horizontal" role="form"   method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" name="lorystckform">
          
            <!--table-->
               <div>    
                   <div class="col-sm-12" id="loadtable">
                     

 
                   </div>
                </div>

            <!--table end-->



        


         

         

          
         
          <!--  <div>
            <label for="quantity" class="col-md-4" required style="padding-left:12%;padding-top:15px;">
                quantity
            </label>
            <div class="col-md-6">
             <input type="text" class="form-control" name="qunti" id="txtQty"  placeholder="Enter quantity"  value="<?php echo htmlspecialchars($qunti);?>" onkeyup="checkQuanty(txtQty.value,txtStquantity.value)" style="border-radius: 7px"><input type="text" id="txtStquantity" hidden="">
               <span class="error" id="err_qunt2"><?php echo $quntityErr;?></span>    
                <p class="help-block" id="err_qunt">
                   
                </p>          
            </div>
              <div class="col-md-2">
                <i class="fa fa-cart-arrow-down fa-2x"></i>
            </div>
</div>-->
    
       
      </form>
</div>
</div>

</section>
     <!-------------------------------------- Form End Here -------------------------------------------------------------->  
         
 <section class="content" style="padding-top: 1%;padding-left: 5%">
  <div class="row"> 
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">
          
        <!--  <div class ="col-md-6">
          </div>-->
              
   
      
 
         <div class="row">



        <div> 

               <div class="col-md-2">
                <input type="button" class="btn btn-primary" value="View stock in lorry" onclick="viewTempStock('<?php echo $ret_nxtid; ?>')" >
            </div>
            <div class="col-md-2">
                <input type="button" class="btn btn-primary" value="stock added to order" onclick="viewTempOrd('<?php echo $ret_nxtid; ?>')" >
            </div>
        </div>
                    <div class="col-sm-11" id="loadtabletwo">
                        
            </div>
        </div>
      
      
        <!--table end-->
        <form method="post" action=""  name="lorystckform2"> 
             
           <div>
               <label for="lorrynumber" class="col-md-4" style="padding-left:12%;padding-top:15px;">
                lorry number :
            </label>
           <div class="col-md-6">
<?php
     

                $sqlw = "SELECT * FROM addvehicle WHERE type='Lorry'";
                $resultw = mysqli_query($conn,$sqlw); ?>

                   <select name="lorryid"  class="form-control" style="border-radius: 7px">
                   <option>--Please Select a lorrynumber--</option>
<?php

           while ($row = mysqli_fetch_array($resultw )) {
             echo "<option value='" . $row['vehicleid'] ."'>" . $row['vehiclenum'] ."</option>";
           }
            echo "</select>";  

?>
          
            </div> 
              <div class="col-md-2">
                <i class="fa fa-truck fa-2x"></i>
            </div>           
        </div>  

          <div>
               <label for="repname" class="col-md-4" style="padding-left:12%;padding-top:15px;">
                Rep name:
            </label>
           <div class="col-md-6">
                <?php
                 

                $sqlrep = "SELECT * FROM emp_detail WHERE pos_id=4";
                $resultrep = mysqli_query($conn,$sqlrep);?>

                  <select name="repnumber"  class="form-control" style="border-radius: 7px">
                   <option>--Please Select a Repname--</option>
                  <?php
             

           while ($row = mysqli_fetch_array($resultrep)) {
             echo "<option value='" . $row['emp_id'] ."'>" . $row['fname'] ."</option>";
           }
            echo "</select>";  
    

?>
            </div>  
             <div class="col-md-2">
                <i class="fa fa-user fa-2x"></i>
            </div>          
        </div> 
                <div class="col-md-6"></div>  
                <div class="col-md-6">
                  <input type="submit" class="btn btn-primary btn-lg" value="SUBMIT ALL" name="btn_submit">
            </div>
        </form>

     <!--kkddk-->

 </div>
 </div>
 </select>

  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">

  <strong>Copyright &copy; 2017 </strong> All rights reserved.
</footer>


  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body>
</html>
<!-- javascript--><script type="text/javascript">
     
     var qunti = document.forms["lorystckform"]["qunti"];

  



 </script>
 <?php
}
else{
  header('location:../login/index.php');
}
?>