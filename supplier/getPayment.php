<!--<?php
include("db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Weligama Distributors</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
    <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>-->


        <!--[if lt IE 9]>
        <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

     <!--   <script src="../assets/js/modernizr.min.js"></script>
        <style>

            div {
                padding-bottom:20px;

            }
            button{
                color: black;
                border-radius: 6px;

                margin:auto;
                display:block;

            }

        </style>
    </head>
    <body>


        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Back to Admin</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                     <ul class="nav navbar-nav side-nav">
                    <li><a href="retailerDetails.php"><i class="fa fa-bullseye"></i> Retailer Details</a></li>
                    <li><a href="retailerDetailsTable.php"><i class="fa fa-bullseye"></i> Retailer Details Table</a></li>-->

                    <!--  <li><a href="update.php"><i class="fa fa-bullseye"></i> Update</a></li>   -->
                    <!-- <li><a href="retailerStocksTable.php"><i class="fa fa-bullseye"></i> Retailer Stocks table</a></li>-->
                 <!--   <li class ="selected"><a href="retailerPaymentTable.php"><i class="fa fa-bullseye"></i> Retailer Payments table</a></li>
                    <li ><a href="RetailerCreditsTable.php"><i class="fa fa-bullseye"></i> Retailer Credits table</a></li>
                    <li ><a href="RetailerBlackListTable.php"><i class="fa fa-bullseye"></i> Retailer Black List table</a></li>
                </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                      <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Steve Miller<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <hr />
        <div class="container">
            <div class="page-header">
                <h1 id="timeline">Retailers Payment Details</h1>
            </div>
            <div class="row">
                <div class="col-sm-11">
                    <div class="card-box table-responsive">



                     <table id="datatable-responsive"
                     class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                     width="100%">
                     <thead>
                         <tr>
                             <th>Ret_Name</th>
                             <th>Date</th>
                             <th>Price</th>
                             <th>PaidAmount</th>
                             <th>Discount</th>
                             <th>Method</th>
                             
                             <th>View Stocks</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php



                         $Id="";


                         $sql = "SELECT * FROM retailer_payment";
                         $result = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_assoc($result)) {
                            $row1;
                            $row2;
                            //retriving retailer name
                            $RetailerID=$row['RetailerID'];
                           // echo $RetailerID;
                            $sql="SELECT RetailerName FROM retailerdetails where RetailerID='$RetailerID'";
                            $result1=mysqli_query($conn, $sql);
                            if ($result1) {
                                $row1=mysqli_fetch_assoc($result1); 
                            } else{
                                echo "error" . mysqli_error($conn);
                            }


                             //retriving sales rep name who handled the payments
                          /*  $SalesID=$row['SalesID'];
                            echo $SalesID;
                            $sql1="SELECT SalesName FROM Salesdetails where SalesID='$SalesID'";
                            $result2=mysqli_query($conn, $sql1);
                            if ($result2) {
                                $row2=mysqli_fetch_assoc($result2); 
                            } else{
                                echo "error" . mysqli_error($conn);
                            }*/





                            $Id=$row['SalesID'];
                            ?>
                            <tr>
                                <td><?php echo $row1['RetailerName']; ?></td>
                                <td><?php echo $row['Date_']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><?php echo $row['PaidAmount']; ?></td>
                                <td><?php echo $row['Discount']; ?></td>
                                <td><?php echo $row['Method']; ?></td>
                                <td><a href="retailerSalesDetails.php?id=<?php echo $Id; ?>">View</a></td>
                            </tr>
                        <?php
                        }
                        ?>











                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/jszip.min.js"></script>
<script src="../assets/plugins/datatables/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="../assets/pages/datatables.init.js"></script>
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
</html>-->




<?php
// session_start();
 $_SESSION['user']="Mr. Obeysekara";
 $_SESSION['post']="Admin";
 if($_SESSION['user']){
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
    <a href="index.html" class="logo">
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
         <li class>
          <a href="retailerDetails.php.">
              <i class="fa fa-id-card"></i> <span>Retailer Details</span>
              <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
          <a href="retailerDetailsTable.php">
              <i class="fa fa-database"></i> <span> Retailer Details Table</span>
              <span class="pull-right-container"></span>
        </a>
      </li>

      <li class="active treeview">
          <a href="retailerPaymentTable.php">
              <i class="fa fa-bullseye"></i> <span>  Retailer Payments table</span>
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
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Payment Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Payments</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 5%;padding-left: 5%">
        <div class="row">
            <div class="col-sm-11" style="background-color: #ffffff;padding: 3%;border-radius: 15px;">
            <div class="row text-center">
                <h1>Payment Details</h1>
            </div>
                <div class="card-box table-responsive">

  <!-------------------------------------- Table Start Here -------------------------------------------------------------->

                      
                     

               

                                   <table id="datatable-responsive"
                     class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                     width="100%">
                     <thead>
                         <tr>
                                        <th>Supplier Name</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>Paid Amount</th>
                                        <th>Method</th>
                                        <th>View Stocks</th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php



                         $Id="";


                         $sql = "SELECT * FROM payment";
                         $result = mysqli_query($conn, $sql);
                         while ($row = mysqli_fetch_assoc($result)) {
                            $row1;
                            $row2;
                            //retriving retailer name
                            $RetailerID=$row['RetailerID'];
                           // echo $RetailerID;
                            $sql="SELECT RetailerName FROM retailerdetails where RetailerID='$RetailerID'";
                            $result1=mysqli_query($conn, $sql);
                            if ($result1) {
                                $row1=mysqli_fetch_assoc($result1); 
                            } else{
                                echo "error" . mysqli_error($conn);
                            }


                             //retriving sales rep name who handled the payments
                          /*  $SalesID=$row['SalesID'];
                            echo $SalesID;
                            $sql1="SELECT SalesName FROM Salesdetails where SalesID='$SalesID'";
                            $result2=mysqli_query($conn, $sql1);
                            if ($result2) {
                                $row2=mysqli_fetch_assoc($result2); 
                            } else{
                                echo "error" . mysqli_error($conn);
                            }*/





                            $Id=$row['SalesID'];
                            ?>
                            <tr>
                                <td><?php echo $row1['RetailerName']; ?></td>
                                <td><?php echo $row['Date_']; ?></td>
                                <td><?php echo $row['Price']; ?></td>
                                <td><?php echo $row['PaidAmount']; ?></td>
                                <td><?php echo $row['Discount']; ?></td>
                                <td><?php echo $row['Method']; ?></td>
                                <td><a href="retailerSalesDetails.php?id=<?php echo $Id; ?>">View</a></td>
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

