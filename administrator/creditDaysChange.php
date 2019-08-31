<?php
session_start();
$_SESSION['user']="Admin";
$_SESSION['post']="Admin";
if($_SESSION['user']){
  include_once 'db.php';

 //include("../../stock_mangement/api/db_connect.php");
  ?>
  
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
<script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>


  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>        
    .error {
      color: #FF0000;
      font-weight: bold;
    }




  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php 	


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

   
      $days = test_input($_POST["days"]);
    
        //database addition of data

  /*  if ($retailernameErr == "" and  $shopnameErr == "" and  $addressErr== "" and  $conumberErr== "" and  $emailErr== ""  ) {
      $retailerid = "";
      $sql = "Insert INTO retailerdetails(RetailerName,ShopName,Address,CoNumber,MobNumber,Email) VALUES('$retailername','$shopname','$address','$conumber','$mobnumber','$email')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "Successfully Created";
        header('Location:retailerDetails.php');
      } else
      echo "error" . mysqli_error($conn);

    }*/

      $sql="UPDATE credit_dates SET days=$days WHERE id=1";
      $result = mysqli_query($conn, $sql);
      if ($result) {
             
        ?>
        <script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully updated the credit date limit",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./creditDaysChange.php";
          })
        </script>
        <?php
      } else
      echo "error" . mysqli_error($conn);

  }




?>
 

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>AE Crist </b>Products</span>
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
      
      <li class="">
        <a href="index.php">
          <i class="fa fa-bullseye"></i> <span>Dashboard</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="">
        <a href="authenticationDetails.php">
          <i class="fa fa-bullseye"></i> <span>Authentication Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="active">
        <a href="creditDaysChange.php">
          <i class="fa fa-bullseye"></i> <span>Change Credit Date</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Retail Handling</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
      <li class>
        <a href="retailerDetailsTable.php">
          <i class="fa fa-database"></i> <span> Retailer Details Table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

      <li class>
        <a href="retailerPaymentTable.php">
          <i class="fa fa-money"></i> <span>  Retailer Payments table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

      <li class>
        <a href="RetailerCreditsTable.php">
          <i class="fa fa-list"></i> <span>  Retailer Credits table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

      <li class>
        <a href="RetailerBlackListTable.php">
          <i class="fa fa-flag"></i> <span> Retailer Black List table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
    </ul>
  </li>
  <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employee Management</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
     <li class>
        <a href="employeeDetails.php">
          <i class="fa fa-users"></i> <span>Employee Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class >
        <a href="salaryDetails.php">
          <i class="fa fa-dashboard"></i> <span>Employee Salary Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
        <a href="sales_rep.php">
          <i class="fa fa-line-chart"></i> <span>Sales Representative's Progress</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

       <li class >
        <a href="resign_employee.php">
          <i class="fa fa-user-times"></i> <span>Resigned Employee Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class >
        <a href="employee_delete.php">
          <i class="fa fa-window-close"></i> <span>Resignation</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
    </ul>
  </li>
  <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Finance Management</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
      <li class>
          <a href="balance.php">
            <i class="fa fa-balance-scale"></i> <span>Daily Balance</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="profit.php">
            <i class="fa fa-money"></i> <span>Monthly Profit</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="displayProfit.php">
            <i class="fa fa-bars"></i> <span>Profit Details</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="displayTrans.php">
            <i class="fa fa-exchange"></i> <span>Transaction Details</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
      </ul>
    </li>
    <li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i>
            <span>Supply Management</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
        <li class>
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
       <li class>
        <a href="supplierPayment.php">
          <i class="fa fa-list-alt"></i> <span>Supplier Payment Details</span>
          <span class="pull-right-container"></span>
        </a>
      
      </li>
    </ul>
  </li>
  <li class="treeview">
          <a href="#">
            <i class="fa fa-car"></i>
            <span>Product Delivery</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
       <li class>
        <a href="fuelDetails.php">
          <i class="fa fa-list-alt"></i> <span>View Fuel Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="serviceDetails.php">
          <i class="fa fa-list-alt"></i> <span>View Service Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="mileageDetails.php">
          <i class="fa fa-list-alt"></i> <span>View Mileage Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
          <li class>
        <a href="vehicleDetails.php">
          <i class="fa fa-list-alt"></i> <span>View Vehicle Details</span>
          <span class="pull-right-container"></span>
        </a>

      </li>
    </ul>
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
      Due date
      <small>Due date</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">due date</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1> Add Due Date</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

	<div class="col-md-12">
      <label for="days" class="col-md-3" style="padding-left:12%;padding-top:15px">
         Days:
      </label>
      <div class="col-md-7">
        <input type="number" name="days"  class="form-control"  placeholder="Enter Number of days"   style="border-radius:7px" required="required">
       
      </div>
      <div class="col-md-2">
        <i class="fa fa-bars fa-2x"></i>
      </div>
    </div>
   
	
    


    <div class="col-md-12">         
      <div class="row text-center" style="padding-top: 2%">
       <button type="submit" class="btn btn-primary">Submit  <i class="fa fa-user-plus"></i></button>
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