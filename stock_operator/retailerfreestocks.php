
<?php
 session_start();
 
 $_SESSION['post']="stockoperator";
 if($_SESSION['user6']){
 include("db.php");
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
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
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

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
       
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user1.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user6'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user1.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['user6'];?> - <?php echo $_SESSION['post'];?>
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
          <img src="../dist/img/user1.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['user6'];?></p>
          <i class="fa fa-circle text-success" style="font-size: 10px"></i> Online
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
        <a href="add_employee.php">
          <i class="fa fa-user-plus"></i> <span>Add Employee</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li>
        <a href="retailerDetails.php">
          <i class="fa fa-user-plus"></i> <span>Retailer Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
     <li class="treeview">
      <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Vehicle Management</span>
      <span class="pull-right-container">
      
      </span>
      </a>
      <ul class="treeview-menu">
      <li class>
      <a href="Add_vehicle.php">
          <i class="fa fa-plus"></i> <span>Add Vehicle</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
        <a href="Add_mileage.php">
          <i class="fa fa-plus"></i> <span>Add Mileage</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li>
       <a href="Add_fuel.php">
          <i class="fa fa-plus"></i> <span>Add Fuel</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
        <a href="Add_service.php">
          <i class="fa fa-list-alt"></i> <span>Add Service</span>
          <span class="pull-right-container"></span>
        </a>
    </li>
    </ul>
    <li class="active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Retailer Management</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
      <li class="active treeview">
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
    <li class="treeview">
      <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Lorry Stock Handling</span>
      <span class="pull-right-container">
      
      </span>
      </a>
      <ul class="treeview-menu">
          <li class>
        <a href="addlorrystock.php">
         <i class="fa fa-truck"></i> <span>Load Stock To Lorries </span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      

      <li class>
        <a href="remaininglorrystock.php">
          <i class="fa fa-truck"></i> <span>Remaining Stock In Lorries </span>
          <span class="pull-right-container"></span>
        </a>
      </li>

      <li class>
       
          <a href="damagestock.php">
          <i class="fa fa-truck"></i> <span>Damage Lorry Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      
      </ul>
      </li>
       <li class>
        
            <a href="addstock.php">
          <i class="fa fa-plus-square-o"></i> <span>Add New Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
            <a href="changeStock.php">
           <i class="fa fa-balance-scale"></i> <span>Change New stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
            <a href="updateStock.php">
          <i class="fa fa-plus-square-o"></i> <span>Stock Filling </span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
            <a href="viewstock.php">
          <i class="fa fa-list-alt"></i> <span>View Warehouse Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

     
       <li class>
       
          <a href="damage_list.php">
          <i class="fa fa-list-alt"></i> <span>View Warehouse Damage Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
         <li class>
       
          <a href="claimdamagestock.php">
          <i class="fa fa-minus-circle"></i> <span>Claim Damage Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
       
          <a href="rolnotify.php">
          <i class="fa fa-list-alt"></i> <span>ROL Notifications</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
       
          <a href="returnstockview.php">
          <i class="fa fa-list-alt"></i> <span>Return Stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
       
          <a href="claimDiscounts.php">
          <i class="fa fa-list-alt"></i> <span>Claim Discount</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
       
          <a href="deleteStock.php">
          <i class="fa fa-trash"></i> <span>Delete Warehouse Stock</span>
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
        <small>Sales Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Free Stock Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 5%;padding-left: 5%">
        <div class="row">
            <div class="col-sm-11" style="background-color: #ffffff;padding: 3%;border-radius: 15px;">
            <div class="row text-center">
                <h1>Free Stock Details Table</h1>
            </div>
                <div class="card-box table-responsive">

  <!-------------------------------------- Table Start Here -------------------------------------------------------------->




        <table id="datatable-responsive"
                 class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                 width="100%">
                     <thead>
                           <tr>
                               <th>Item</th>
                               <th>Quantity</th>
                             
                           </tr>
                       </thead>
                       <tbody>


                        <?php
                        
                 

                        $id=$_GET['id'];

                         $sql = "SELECT * FROM retailer_free_stock where id='$id'";
                         $result = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_assoc($result)) {
                            $stockId=$row['stockId'];
                           // echo $RetailerID;
                            ?>


                             <td><?php echo $row['stockName']; ?></td>
                             <td><?php echo $row['quantity']; ?></td>

                              </tr>
                              <?php
                            }
                            ?>
                          </tbody>
                        </table>

                      
                     

               

                                  



          


<!-------------------------------------- Table End Here -------------------------------------------------------------->

        </div>
    </div>
</div>
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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.js"></script>

<script src="../plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../plugins/datatables/jszip.min.js"></script>
<script src="../plugins/datatables/pdfmake.min.js"></script>
<script src="../plugins/datatables/vfs_fonts.js"></script>
<script src="../plugins/datatables/buttons.print.min.js"></script>
<script src="../plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../plugins/datatables/dataTables.colVis.js"></script>
<script src="../plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="../pages/datatables.init.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({keys: true});
        $('#datatable-responsive').DataTable();
        $('#datatable-colvid').DataTable({
            "dom": 'C<"clear">lfrtip',
            "colVis": {
                "buttonText": "Change columns"
            }
        });
        $('#datatable-scroller').DataTable({
            ajax: "assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    TableManageButtons.init();

</script>
</body>
</html>
<?php
}
else{
    header('location:../login/index.php');
}
?>
