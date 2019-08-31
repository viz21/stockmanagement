<?php
session_start();
$_SESSION['user']="Admin";
$_SESSION['post']="Admin";
if($_SESSION['user']){
  include "db.php"
 //include("../retailer/db.php");
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
function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }    
        $fname = $lname = $address = $telephone = $pos_id = $nic = $sal = $email = $gender = $posname = "";
            $fnameErr = $lnameErr = $addressErr = $telephoneErr = $pos_idErr = $nicErr = $salErr = $emailErr = $genderErr = $posnameErr = "";

            if($_GET){
            $emp_id =(int)$_GET["emp_id"];

        
            

     $sql3 = "SELECT * from emp_detail where emp_id=$emp_id";

            $result = mysqli_query($conn, $sql3);


            $row = mysqli_fetch_array($result);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['address'];
            $telephone = $row['telephone'];
            $pos_id = $row['pos_id'];
            $sal = $row['salary'];
            $email = $row['email'];
            $nic = $row['nic'];
            $gender = $row['gender'];
            }     

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
                $fnameErr = "First Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"])) {
                $fnameErr = "Only letters and white space allowed";
            } else {
                $fname = test_input($_POST["firstname"]);
            }

        if (empty($_POST["lastname"])) {
                $lnameErr = "Last Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["lastname"])) {
                $lnameErr = "Only letters and white space allowed";
            } else {
                $lname = test_input($_POST["lastname"]);
            }

        if (empty($_POST["address"])) {
                $addressErr = "Address is required";
            } else {
                $address = test_input($_POST["address"]);
            }

        if (empty($_POST["telephone"])) {
                $telephoneErr = "Telephone number is required";
            } else if (preg_match("/^[0-9]*$/", $_POST["telephone"])) {
                $scount = strlen($_POST["telephone"]);
                if ($scount < 10 or $scount > 10)
                    $telephoneErr = "only 10 numeric values can add";
                else
                    $telephone = test_input($_POST["telephone"]);
            }
            else {
                $telephoneErr = "Only numeric values can add";
            }

        if (empty($_POST["position"])) {
                $pos_idErr = "Position is required";
            } else {
                $pos_id = test_input($_POST["position"]);
            }

       if ($_POST["position"] == 1) {
              $posname = " ";
          } else if($_POST["position"] == 2) {
              $posname ="Finance Manager";
          } else if($_POST["position"] == 3) {
              $posname ="Retail Manager";
          } else if($_POST["position"] == 4) {
              $posname =" ";
          } else if($_POST["position"] == 5) {
              $posname ="Product Delivery Manager";
          }else if($_POST["position"] == 6) {
              $posname ="Supplier Handler";                
          }else if($_POST["position"] == 7) {
            $posname ="Stock Manager";                
        }     

        if (empty($_POST["basicsal"])) {
                $salErr = "Basic Salary is required";
            } else {
                $sal = test_input($_POST["basicsal"]);
            }

        if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else {
                $email = test_input($_POST["email"]);
            }

         if (empty($_POST["nic"])) {
                $nicErr = "NIC Number is required";
            } else if (!preg_match("/^[0-9]{9}[vVxX]$/", $_POST["nic"])) {
                $nicErr = "Invalid NIC format";
            } else {
                $nic = test_input($_POST["nic"]);
            }

         $gender = test_input($_POST["gender"]);

         $emp_id=test_input($_POST["empID"]);


        if ($fnameErr == "" and  $lnameErr == "" and  $addressErr == "" and  $telephoneErr == "" and  $pos_idErr == "" and  $nicErr == "" and  $salErr == "" and  $emailErr == "") {
                $sql = "UPDATE emp_detail SET fname='$fname',lname='$lname',address='$address',telephone='$telephone',pos_id='$pos_id',pos_name='$posname',salary='$sal',email='$email',nic='$nic',gender='$gender' where emp_id='$emp_id'";

                    $result1 = mysqli_query($conn, $sql);
                    if ($result1) {
                        echo "Successfully updated your details";
                         ?> 
                    <script type="text/javascript"> 
                     swal({
                            title: 'Successfull!',
                            text: "Employee Updated",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                          }).then(function () {
            document.location.href = "./resign_employee.php";
                              })
                    </script>

                    <?php 
                        //header('Location:./details_emp.php') ; 
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
      <a href="index.php" class="logo">
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
  <li class="active treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employee Management</span>
            <span class="pull-right-container">
            </span>
          </a>
      <ul class="treeview-menu">
      <li class="active">
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
     

       <li class = "" >
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
      <small>Update Details</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-users"></i> Employee Details</a></li>
      <li class="active">Update Details</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 3%;border-radius: 15px;">
        <div class="row text-center">         
          <h1>Update Details</h1>
        </div> 
        <div >

          <!-------------------------------------- Table Start Here -------------------------------------------------------------->      
          
           <div class="form-horizontal">
        <div class="row text-center">
          <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            
        </div>
        <div class="col-md-12" >
            <label for="firstname" class="col-md-3" style="padding-left:12%;padding-top:15px;" >
                First Name:
            </label>
            <div class="col-md-7" >
                <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo htmlspecialchars($fname);?>" style="border-radius:7px">
                <span class="error"><?php echo $fnameErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-user fa-2x"></i>
          </div>

        </div>        
        <div class="col-md-12">
            <label for="lastname" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Last Name:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($lname);?>" style="border-radius:7px">
                <span class="error"><?php echo $lnameErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-user fa-2x"></i>
          </div>
            
        </div>
        <div class="col-md-12">
            <label for="address" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Address:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo htmlspecialchars($address);?>" style="border-radius:7px">
                <span class="error"><?php echo $addressErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-map-marker fa-2x"></i>
          </div>
            
        </div>
        <div class="col-md-12">
            <label for="telephone" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Telephone:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="telephone" placeholder="Enter Telephone Number" value="<?php echo htmlspecialchars($telephone);?>" style="border-radius:7px">
                <span class="error"><?php echo $telephoneErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-phone fa-2x"></i>
          </div>
             
        </div>
        <div class="col-md-12">
            <label for="position" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Position:
            </label>
            <div class="col-md-7">
                 <select class="form-control" name="position" style="border-radius:7px" >
                 <option style="border-radius: 7px" value ='0'>--Please Select--</option>
                                        <option value=2>Finance Manager</option>
             <option value=3>Retail Manager</option>
             <option value=6>Supplier Handler</option>
             <option value=5>Product Delivery Manager</option>
       <option value=7>Stock Manager</option>
                                       
                                     </select>
                <span class="error"><?php echo $pos_idErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-user-circle fa-2x"></i>
          </div>
            
        </div>
        <div class="col-md-12">
            <label for="nic" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                NIC:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="nic" placeholder="Enter NIC Number" value="<?php echo htmlspecialchars($nic);?>" style="border-radius:7px">
                <span class="error"><?php echo $nicErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-vcard fa-2x"></i>
          </div>

             
        </div>
        <div class="col-md-12">
            <label for="basicsal" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Basic Salary:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="basicsal" placeholder="Enter Basic Salary" value="<?php echo htmlspecialchars($sal);?>" style="border-radius:7px">
                <span class="error"><?php echo $salErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-money fa-2x"></i>
          </div>
            
        </div>
        <div class="col-md-12">
            <label for="emailaddress" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Email address:
            </label>
            <div class="col-md-7">
                <input type="email" class="form-control" name="email" placeholder="Enter email address" value="<?php echo htmlspecialchars($email);?>" style="border-radius:7px">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="col-md-1">
            <i class="fa fa-at fa-2x"></i>
          </div>
            
        </div>
        <div class="col-md-12">
            <label for="sex" class="col-md-3" style="padding-left:12%;padding-top:15px;">
                Gender:
            </label>
            <div class="col-md-7">
                <label class="radio">
                    <input type="radio" name="gender" value="male" required="required">
                    Male
                </label>
                <label class="radio">
                    <input type="radio" name="gender" value="female">
                    Female
                </label>
            </div>
            <div class="col-md-1">
            <i class="fa fa-transgender fa-2x"></i>
          </div>

        </div>
       <input type="hidden" name="empID" class="form-control" value="<?php echo htmlspecialchars($emp_id);?>" hidden="hidden">
        <div class="col-md-12">
            <div class="col-md-5">
            </div>
            <div class="col-md-5">
                <button type="submit" class="btn btn-primary btn-lg">
                Update
                </button>
            </div>
        </div>
        

    


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