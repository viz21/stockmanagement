<?php
 session_start();
 $_SESSION['user']="Admin";
 $_SESSION['post']="Admin";
 if($_SESSION['user']){
 //include("../../stock_mangement/api/db_connect.php");
 include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AE Crist Products |Monthly Profit</title>
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
      <span class="logo-mini"><b>A</b>E</span>
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
      
      <li class=" treeview">
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

      <li class="">
        <a href="retailerPaymentTable.php">
          <i class="fa fa-money"></i> <span>  Retailer Payments table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

    </ul>
  </li>
  <li class=" treeview">
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
      <li class="">
        <a href="salaryDetails.php">
          <i class="fa fa-dashboard"></i> <span>Employee Salary Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
   

      <li class="">
        <a href="resign_employee.php">
          <i class="fa fa-user-times"></i> <span>Resigned Employee Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="active">
        <a href="employee_delete.php">
          <i class="fa fa-window-close"></i> <span>Resignation</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
    </ul>
  </li>
  <li class="active treeview">
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
        <li class="active">
          <a href="profit.php">
            <i class="fa fa-money"></i> <span>Monthly Profit</span>
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
    <li class=" treeview">
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
      <li class="">
        <a href="supplierDetails.php">
          <i class="fa fa-pencil"></i> <span>Supplier Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="active">
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
        Dashboard
        <small>Monthly Profit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Monthly Profit</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 5%;padding-left: 5%">
        <div class="row">
            <div class="col-sm-11" style="background-color: #ffffff;padding: 3%;border-radius: 15px;">

            <div class="row text-center">         
              <h1>Monthly Profit</h1>
            </div>
            <div class="card-box table-responsive">

  <!-------------------------------------- Table Start Here -------------------------------------------------------------->      

                
                <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">

                         <thead>
                             <tr>
                                 <th>Month</th>
                                 <th>Total Income</th>
                                 <th>Total Expense</th>
                                 <th>Profit</th>
                             </tr>
                         </thead>
                         


                        <?php

                            $sql="SELECT * FROM fin_dailybalance";
                            $result= mysqli_query($conn, $sql);
                            $num_rows = mysqli_num_rows($result);
                            $row = mysqli_fetch_array($result);
                            for($i=1; $i<13; $i++){

                                $month;
                                $monthName="";
                                $income=0;
                                $expense=0;
                                $profit=0;
                              //  echo $i;
                            for($l=0;$l<$num_rows;$l++){
                               // echo $i;
                                $sql="SELECT * FROM fin_dailybalance ORDER BY id DESC LIMIT 1 OFFSET $l";
                                $result= mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                $bDate=$row['bDate'];
                            
                                $array=explode('.', $bDate);
                                $date=$array[0];
                                $month=(int)$array[1];
                                $year=$array[2];
                                
                                 switch ($i){
                                        case 1 : 
                                        $monthName="January";
                                        break;
                                        case 2 : 
                                        $monthName="February";
                                        break;
                                        case 3 : 
                                        $monthName="March";
                                        break;
                                        case 4 : 
                                        $monthName="April";
                                        break;
                                        case 5 : 
                                        $monthName="May";
                                        break;
                                        case 6 : 
                                        $monthName="June";
                                        break;
                                        case 7 : 
                                        $monthName="July";
                                        break;
                                        case 8 : 
                                        $monthName="August";
                                        break;
                                        case 9 : 
                                        $monthName="September";
                                        break;
                                        case 10 : 
                                        $monthName="October";
                                        break;
                                        case 11 : 
                                        $monthName="November";
                                        break;
                                        Default :
                                        $monthName="December";

                                        
                                    }
                                if($month==$i){
                                    $income=$income+$row['dailyIncome'];
                                    //echo $row['dailyIncome']."<br/>";
                                    $expense=$expense+(int)$row['dailyExpense'];
                                    //echo $row['dailyExpense']."<br/>";
                                    $profit=$income-$expense;
                                    

                                   
                                }
                            


                            }

                            ?>
                                <tr>
                                        <td><?php echo $monthName; ?></td>
                                        <td><?php echo $income; ?></td>
                                        <td><?php echo $expense; ?></td>
                                        <td><?php echo $profit; ?></td>
                                        

                                        

                                        </tr>
                        <?php
                        }

                        ?>





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