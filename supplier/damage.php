<?php
include("db.php");
?>

<!--<?php
session_start();
$_SESSION['user']="Supplier Handler";
$_SESSION['post']="Admin";
if($_SESSION['user']){
 include("../../stock_mangement/api/db_connect.php");
 ?>-->

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AE Crist Products | Dashboard</title>
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
        .error {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php

   function test_input($data){
                           $data = trim($data);
                           $data = stripslashes($data);
                           $data = htmlspecialchars($data);
                           return $data;
                         }

$stockIDErr = $supplierNameErr = $stockNameErr = $qtyErr = "";
$stockID = $supplierName = $stockName = $qty = "";

        

                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    
               // $supplierName=$_POST['txtsupname'];   
                if (empty($_POST["txtsupname"])) {
                    $supplierNameErr = "Supplier Name is required";
                } else {
                    $supplierName = test_input($_POST["txtsupname"]);
                }


                if (empty($_POST["txtstockname"])){                              //stockname validation
                    $stockNameErr =  "Stock Name is required";
                }else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["txtstockname"])){
                    $stockNameErr = "Only letters and white space allowed";
                }else {
                    $stockName = test_input($_POST["txtstockname"]);
                }

                
              

                 
                if (empty($_POST["txtqty"])) {                                      //quantity validation
                  $qtyErr = "Quantity is required";
                   
                  }
                  else {
                    $qty = test_input($_POST["txtqty"]);
                   
                  }

                

            
//data addition to the db
                if ($stockIDErr == "" and $supplierNameErr == "" and $stockNameErr == "" and $qtyErr == ""){
                   
                $id = "" ;


                              

                $sql = "INSERT INTO damage_stock (stockID,supplierName,stockName,qty)VALUES((SELECT stockID from stock where supplierName='$supplierName') ,'$supplierName','$stockName','$qty')";
                $result = mysqli_query($conn, $sql);
                  
                
                if ($result) {
        ?> 
<script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully Added!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./view_stock.php";
          })
        </script>


<?php
        
      } else
      echo "error" . mysqli_error($conn);

    }else{
 ?> 
<script type="text/javascript"> 
          swal({
            title: 'Error!',
            text: "",
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          })
        </script>


<?php
}
        }

             
      
  ?>



  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>W</b>D</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>AE Crist</b> Products</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
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
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['user'];?></p>
        <i class="fa fa-circle text-success" style="font-size: 10px"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li >
        <a href="supplierRegister.php">
          <i class="fa fa-plus"></i> <span>Supplier Registration</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
        <a href="supplierDetails.php">
          <i class="fa fa-pencil"></i> <span>Supplier Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
      <a href="addstock.php">
          <i class="fa fa-pencil"></i> <span>Add New Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
        <a href="changeStock.php">
          <i class="fa fa-pencil"></i> <span>Change Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
        <a href="purchasing_order.php">
          <i class="fa fa-plus"></i> <span>Purchasing Order</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
     <li class ="active treeview">
        <a href="damage.php">
          <i class="fa fa-plus"></i> <span>Damage Items</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      
       <li>
       <a href="view_stock.php">
          <i class="fa fa-plus"></i> <span>Claim Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

     
       <li>
        <a href="supplierPayment.php">
          <i class="fa fa-list-alt"></i> <span>Supplier Payment Details</span>
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
      <small>Add Damage Items</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add Damage Items</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Add Damage Items</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


         <div class="col-md-12">
            <label for="txtsupname" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                 Supplier name:
            </label>
            <div class="col-md-7">
               <select  name="txtsupname" id="fsupname" class="form-control" >
                  <option value="<?php echo htmlspecialchars($supplierName); ?>" style="border-radius: 7px">--Please Select--</option>
                               <?php 
                               $supname="Select * from supplierdetails";
                               $s1=mysqli_query($conn,$supname);
                               while ($rw2=mysqli_fetch_array($s1)) {
                               echo $rw2['fname'];
                               ?>
                    <option value="<?php echo $rw2['fname']; ?>"><?php echo $rw2['fname']; ?></option>
                              <?php
                              };
                              ?>
                </select>
            </div> 
             <div class="col-md-2">
                <i class="fa fa-user fa-2x"></i>
            </div>            
        </div> 

            <div class="col-md-12">
             <label for="stockname" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Stock Name:
            </label>
            <div class="col-md-7">
               <select  name="txtstockname" id="stockName" class="form-control" >
                  <option value="<?php echo htmlspecialchars($stockName); ?>" style="border-radius: 7px">--Please Select--</option>
                               <?php 
                               $stockname="Select * from stock ";
                               $s1=mysqli_query($conn,$stockname);
                               while ($rw2=mysqli_fetch_array($s1)) {
                               echo $rw2['stockName'];
                               ?>
                    <option value="<?php echo $rw2['stockName']; ?>"><?php echo $rw2['stockName']; ?></option>
                              <?php
                              };
                              ?>
                </select>
            </div> 
             <div class="col-md-2">
                <i class="fa fa-list-ol fa-2x"></i>
            </div>
        </div>
        
        <div class="col-md-12">
            <label for="qty" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Quantity:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="txtqty" id="fqty"  placeholder="Enter Quantity" value="<?php echo htmlspecialchars($qty);?>" style="border-radius: 7px"><span class="error"><?php echo $qtyErr;?></span>
            </div>
             <div class="col-md-2">
                <i class="fa fa-cart-arrow-down fa-2x"></i>
            </div>
        </div>

       

        

        <div class="col-md-12">         
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit"   name="btnsubmit" class="btn btn-primary">Add New Record <i class="fa fa-user-plus"></i></button>
          </div>
        </div>   

      </form>



     <!-------------------------------------- Form End Here -------------------------------------------------------------->  
   </div>
 </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">

  <strong>Copyright &copy; 2019 </strong> All rights reserved.
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
<?php
}
else{
  header('location:../login/index.php');
}
?>