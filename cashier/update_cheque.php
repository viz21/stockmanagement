
  <?php
//session_start();
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

            $chequeid =(int)$_GET["chequeid"];
            $retailernameErr = $amountErr = $chequeNumberErr = $bankErr = $branchErr = $chequeDateErr  = "";
            $retailername = $amount = $chequeNumber = $bank = $branch = $chequeDate = $supplier="";
         

          // the fetching of data from database

             $sql3 = "SELECT * from fin_chequedetails where chequeId=$chequeid";

            $result = mysqli_query($conn, $sql3);


            $row = mysqli_fetch_array($result);
            $retailername = $row['retailerName'];
            $amount=$row['Amount'];
            $chequeNumber = $row['chequeNumber'];
            $bank = $row['bank'];
            $branch = $row['branch'];
            $chequeDate = $row['chequeDate'];
            $lorryNo = $row['LorryNo'];
            
          
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["bank"])) {
      $bankErr = "Telephone number is required";
    } else{
        $bank = test_input($_POST["bank"]);
    }

    if (empty($_POST["branch"])) {
      $branchErr = "Mobile number is required";
    } 
    else{
        $branch = test_input($_POST["branch"]);
    }

  
           $chequeid=test_input($_POST["chequeid"]);
           $chequeid=(int)$chequeid;
           $supplier=test_input($_POST["supplier"]);
        //database addition of data
 /*echo $retailername;
                 echo $amount;
                  echo $bank;
                  echo $branch;
                  echo $chequeDate;*/
             if ($bankErr== "" and $branchErr== "") {
               
                  
             
                   

           
           //UPDATING THE RETRIVED DATA TO THE DATABASE

                    $sql = "UPDATE fin_chequedetails SET bank='$bank',branch='$branch',Brand='$supplier',updated=1 where chequeId='$chequeid'";

                    $result1 = mysqli_query($conn, $sql);







                    if ($result1) {
                       ?>
        <script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully updated a Cheque",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./chequeDetails.php";
          })
        </script>
        <?php
      } else
      echo "error" . mysqli_error($conn);

    }
    else{
      ?>
        <script type="text/javascript"> 
          swal({
            title: 'Error!',
            text: "Some fields are empty.",
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
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
                <span class="hidden-xs"><?php echo $_SESSION['user2'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['user2'];?> - <?php echo $_SESSION['post'];?>
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
        <p><?php echo $_SESSION['user2'];?></p>
        <i class="fa fa-circle text-success" style="font-size: 10px"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
   <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class>
          <a href="addTransaction.php">
              <i class="fa fa-plus-square"></i> <span>Add Transactions</span>
              <span class="pull-right-container"></span>
          </a>  
        </li>
        <li class="active treeview">
        <a href="#">
          <i class="fa fa-bullseye"></i>
          <span>Cheque Management</span>
          <span class="pull-right-container">
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active">
            <a href="chequeDetails.php">
              <i class="fa fa-suitcase"></i> <span>Cheque Details</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class>
            <a href="clearChequeDetails.php">
              <i class="fa fa-check-square"></i> <span>Cleared Cheque Details</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
          <li class>
            <a href="notClearChequeDetails.php">
              <i class="fa fa-times"></i> <span>Bounced Cheque Details</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        </ul>
      </li>
      <li class>
        <a href="claimDiscounts.php">
          <i class="fa fa-check-square-o"></i> <span>Claim Discounts</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
          <a href="supplierTransaction.php">
            <i class="fa fa-address-card-o"></i> <span>SupplierTransctions</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
        <a href="salaryCalculation.php">
          <i class="fa fa-money"></i> <span>Calculate Employee Salary</span>
          <span class="pull-right-container"></span>
        </a>
        </li>
        <li class>
          <a href="cashier_salary_view.php">
            <i class="fa fa-users"></i> <span>Employee Salary Details</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="balance.php">
            <i class="fa fa-balance-scale"></i> <span>Daily Balance</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="displayTransactions.php">
            <i class="fa fa-bars"></i> <span>Transaction Details</span>
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
            <i class="fa fa-info"></i> <span>Profit Details</span>
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
      <small> Cheque Details Update</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Cheque Details Update</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1  style="padding-bottom: 25px;">Cheque Details Update</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="col-md-12">
          <label for="Retailername" class="col-md-3" style="padding-left:100px;padding-top:25px;">
            Retailer Name:
          </label>
          <div class="col-md-8" style="padding-right:120px; padding-top: 20px">
            <input type="text" name="retailername" class="form-control"  placeholder="Enter First Name"   value="<?php echo htmlspecialchars($retailername);?>" style="border-radius:7px"  readonly="readonly"><span class="error"><?php echo $retailernameErr;?></span>
          </div>
          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-user fa-2x"></i>
          </div>
        </div>        
        <div class="col-md-12">
          <label for="amount" class="col-md-3" style="padding-left:100px;padding-top:25px" readonly="readonly">
            Amount:
          </label>
          <div class="col-md-8" style="padding-right:120px ; padding-top: 20px">
            <input type="text" name="amount" class="form-control"  placeholder="Enter Shop Name"  value="<?php echo htmlspecialchars($amount);?>" style="border-radius:7px"  readonly="readonly"><span class="error"><?php echo $amountErr;?></span>
          </div>
          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-home fa-2x"></i>
          </div>
        </div>
        
        <div class="col-md-12">
          <label for="chequeNumber" class="col-md-3" style="padding-left:100px;padding-top:25px">
            Cheque Number :
          </label>
          <div class="col-md-8" style="padding-right:120px; padding-top: 20px">
            <input type="text" name="chequeNumber" class="form-control"  placeholder="Enter the chequeNumber"  value="<?php echo htmlspecialchars($chequeNumber);?>" style="border-radius:7px"  readonly="readonly"><span class="error"><?php echo $chequeNumberErr;?></span>
          </div>
          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-book fa-2x"></i>
          </div>
        </div>
        <div class="col-md-12">
          <label for="chequeDate" class="col-md-3" style="padding-left:100px;padding-top:25px">
            chequeDate:
          </label>

          <div class="col-md-8" style="padding-right:120px ; padding-top: 20px">
            <input type="chequeDate" name="chequeDate" class="form-control"  placeholder="Enter chequeDate"  value="<?php echo htmlspecialchars($chequeDate);?>" style="border-radius:7px"  readonly="readonly"><span class="error"><?php echo $chequeDateErr;?></span>

          </div>

          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-envelope-square fa-2x"></i>
          </div>
        </div>
        <div class="col-md-12">
          <label for="chequeDate" class="col-md-3" style="padding-left:100px;padding-top:25px">
            Lorry Number:
          </label>

          <div class="col-md-8" style="padding-right:120px ; padding-top: 20px">
            <input type="text" name="lorryNo" class="form-control"  value="<?php echo htmlspecialchars($lorryNo);?>" style="border-radius:7px"  readonly="readonly"><span class="error"></span>

          </div>

          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-envelope-square fa-2x"></i>
          </div>
        </div>  
          <div class="col-md-12">
            <label for="sex" class="col-md-3" style="padding-left:100px;padding-top:25px">
                Supplier:
            </label>
            <div class="col-md-8" style="padding-left:35px ; padding-top: 20px">
                <label class="radio">
                    <input type="radio"  name="supplier" value="Fonterra" checked>
                    Fonterra
                </label>
                <label class="radio">
                    <input type="radio"  name="supplier" value="CBL">
                    CBL
                </label>
            </div>
            <div class="col-md-1" style="padding-top:25px;">
            <i class=""></i>
          </div>             
        </div>
        <div class="col-md-12">
          <label for="bank" class="col-md-3" style="padding-left:100px;padding-top:25px">
            Bank:
          </label>
          <div class="col-md-8" style="padding-right:120px ; padding-top: 20px">
            <input type="text" name="bank" class="form-control"  placeholder="Enter the Telephone number "  value="<?php echo htmlspecialchars($bank);?>" style="border-radius:7px"><span class="error"><?php echo $bankErr;?></span>
          </div>
          <div class="col-md-1" style="padding-top:25px;">
            <i class="fa fa-volume-control-phone fa-2x"></i>
          </div>          
        </div>
        <div class="col-md-12">
          <label for="branch" class="col-md-3" style="padding-left:100px;padding-top:25px">
            Branch:
          </label>
          <div class="col-md-8" style="padding-right:120px ; padding-top: 20px">
            <input type="text" name="branch" class="form-control" placeholder="Enter Branch"  value="<?php echo htmlspecialchars($branch);?>" style="border-radius:7px"><span class="error"><?php echo $branchErr;?></span>
          </div>
          <div class="col-md-1" style="padding-top:22px;">
            <i class="fa fa-mobile fa-3x"></i>
          </div>
        </div>
        
      <input type="hidden" name="chequeid" class="form-control" value="<?php echo htmlspecialchars($chequeid);?>" hidden="hidden">
        <div class="col-md-12">         
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit" class="btn btn-primary">Submit Button <i class="fa fa-user-plus"></i></button>
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
<?php
}
else{
  header('location:../login/index.php');
}
?>

