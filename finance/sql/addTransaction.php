<?php
 session_start();
 $_SESSION['user']="Finance Manager";
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
  <title>AE Crist Products | Add Transactions</title>
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
<style>


        div {
            
            padding-bottom:30px;
            padding-top: 7px;

        }

        .error {
            color: #FF0000;
        }



    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<?php
    $descriptionErr = $amountErr = $typeErr = $transactionDateErr ="";
    $description = $amount= $type = $transactionDate = "";

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

    date_default_timezone_set("Asia/Colombo");
    $transDate=date("d.m.Y");


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //transactionDate
       if (empty($_POST["transactionDate"])) {
            $transactionDateErr = "Date is required";
        }
        else {
            $transactionDate = test_input($_POST["transactionDate"]);
        }

        //description
        if (empty($_POST["description"])) {
            $descriptionErr = "Description is required";
        }
        else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["description"])) {
            $descriptionErr = "Only letters and white space allowed";
        } else {
            $description = test_input($_POST["description"]);
        }

        //amount
        if (empty($_POST["amount"])) {
            $amountErr = "Amount is required";
        }
        else if(preg_match("/^[0-9]*$/",$_POST["amount"])){
            $amount = test_input($_POST["amount"]);
        }
        else {
            $amountErr="Only numeric values can add";
        }

        $type=test_input($_POST["optionsRadios"]);

        //transactiondetails database connection

        $amount=doubleval($_POST['amount']);
        $status=0;
        $finId;
        if ($descriptionErr == "" and  $amountErr == "" and $transactionDateErr == ""  ) {
            $transactionid = "";
            $sql = "INSERT INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$transDate','$transactionDate', '$type','$description','$amount')";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                //echo "Successfully Created";


                        //fin_dailybalance databse connection
               // echo $transDate;
                $sql2 ="SELECT * from fin_dailybalance";
                $result2=mysqli_query($conn,$sql2);
                if($result2){
                   while($row=mysqli_fetch_array($result2)){
                    //echo $row['bDate']."\n";
                    if(strcmp($row['bDate'],$transDate)==0){
                        $status=1;
                        $finId=$row['id'];
                    }
                }


                if($status==1){
                    $sql2 ="SELECT * from fin_dailybalance WHERE id='$finId'";
                        $result2=mysqli_query($conn,$sql2);
                        $row=mysqli_fetch_array($result2);
                    if(strcmp($type, "Income")==0){
                        echo "athule";
                        echo "<br/>"."netbal ".$row['netBalance'];
                        echo "<br/>"."amount ".$amount;

                        $netBalance=$row['netBalance']+$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyIncome=$row['dailyIncome']+$amount;
                        $dailyIncome= number_format((float)$dailyIncome,2,'.','');
                        $sql3 = "UPDATE fin_dailybalance SET netBalance='$netBalance ', dailyIncome='$dailyIncome' where bDate='$transDate'";
                        mysqli_query($conn,$sql3);

                    }
                    else{
                        $netBalance=$row['netBalance']-$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');

                        $dailyExpense=$row['dailyExpense']+$amount;
                        $dailyExpense= number_format((float)$dailyExpense,2,'.','');
                        $sql4 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyExpense='$dailyExpense' where bDate='$transDate'";
                        mysqli_query($conn,$sql4);
                    }
                }

                else{
                    //echo "eliye";
                    $sql="SELECT * FROM fin_dailybalance ORDER BY id DESC LIMIT 1";
                    $resulty=mysqli_query($conn,$sql);
                    $rowy=mysqli_fetch_array($resulty);
                    $netBalance=$rowy['netBalance'];

                    if(strcmp($type, "Income")==0){

                        $netBalance=$netBalance+$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql5= "INSERT INTO fin_dailybalance (bDate,dailyIncome,netBalance) VALUES ('$transDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql5);
                    } 

                    else{
                        $netBalance=$netBalance-$amount;
                        $netBalance= number_format((float)$netBalance,2,'.','');
                        $sql6="INSERT INTO fin_dailybalance (bDate,dailyExpense,netBalance) VALUES ('$transDate','$amount','$netBalance')";
                        mysqli_query($conn,$sql6);
                    }
                }
            } 
            else{   
                echo mysqli_query($conn);

            }
        } else
        echo "error" . mysqli_error($conn);

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
        <li class="active treeview">
          <a href="addTransaction.php">
              <i class="fa fa-plus-square"></i> <span>Add Transactions</span>
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
          <a href="profit.php">
            <i class="fa fa-money"></i> <span>Monthly Profit</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        
        <li class>
          <a href="supplierTransaction.php">
            <i class="fa fa-address-card-o"></i> <span>Supplier Transactions</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        <li class>
          <a href="getretailerPaymentTable.php">
            <i class="fa fa-address-card-o"></i> <span>Retailer Payments</span>
            <span class="pull-right-container"></span>
          </a>
        </li>
        

        <li class>
          <a href="sal_detail.php">
            <i class="fa fa-address-card-o"></i> <span>Employee Salary Details</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class>
          <a href="fueldetail.php">
            <i class="fa fa-address-card-o"></i> <span>Vehicle Payment Details</span>
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
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Add Transactions</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Transactions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 5%;padding-left: 5%">
        <div class="row">
            <div class="col-sm-11" style="background-color: #ffffff;padding: 3%;border-radius: 15px;">
            
                <div class="card-box table-responsive">

  <!-------------------------------------- Content Start Here -------------------------------------------------------------->      

<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-10">

            <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

                <div class="col-md-8">        
                    <h1>Add Transactions</h1>
                </div>
               
                <div class="col-md-8">
                  <label>Transaction Date</label>
                  <input type="date" name="transactionDate"  class="form-control"  value="<?php echo htmlspecialchars($transactionDate);?>" style="border-radius:7px"><span class="error"><?php echo $transactionDateErr;?></span>
                </div>

                <div class="radio">
                  <div class="col-md-8">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="Income" checked>
                        Income
                      </label>
                </div>
               
                <div class="radio">
                   <div class="col-md-8">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="Expense" checked>
                        Expense
                    </label>
                </div>
            </div>

        </div>

        <div class="col-md-8">
            <label>Description</label>
            <input type="text" name="description" placeholder="Enter Description" class="form-control"  value="<?php echo htmlspecialchars($description);?>" style="border-radius:7px"><span class="error"><?php echo $descriptionErr;?></span>
        
        </div>

        <div class="col-md-8">
            <label>Amount</label>
            <input type="text" name="amount" placeholder="Enter Amount" class="form-control"  value="<?php echo htmlspecialchars($amount);?>" style="border-radius:7px"><span class="error"><?php echo $amountErr;?></span>
        </div>


        <div class="col-md-8" >
            <div class="row text-center" style="padding-top: 2%">
            <button type="submit" class="btn btn-primary" style="height: 40px; width: 250px">Add <i class="fa fa-user-plus"></i></button>
            </div>
        </div>

        </form>

    </div>
</div>

<!-------------------------------------- Content End Here -------------------------------------------------------------->

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