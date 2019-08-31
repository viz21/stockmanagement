<?php
session_start();
$_SESSION['post2']="Cashier";
if($_SESSION['user2']){
 include("./db.php");
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

          //  $userid = $_SESSION['userid'];

  $supplierName = $amount = $method = $s_Id= "";


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $supplierName = test_input($_POST["supplierName"]);
    $amount = test_input($_POST["amount"]);
    $method = $_POST["method"];
    $s_Id = test_input($_POST["supId"]);
    $amount= number_format((float)$amount,2,'.','');

    date_default_timezone_set("Asia/Colombo");
    $view_date=date("d.m.Y");

    date_default_timezone_set("Asia/Colombo");
    $transactionDate=date("d.m.Y");

    $type="Expense";
        //database addition of data

    if ($supplierName != "" and  $amount != "" and  $method != "") {

      $sql = "Insert INTO fin_transdetails(transDate,transactionDate,type,description,amount) VALUES('$view_date','$transactionDate','$type','$supplierName','$amount')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        //echo "Successfully Created";



        $url = 'http://waligamainv.sanila.tech/supplier/api/get_payment.php';
        //echo $amount; 
        $data = array('s_id' => $s_Id, 'method' => $method,'totprice' => $amount);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $response = curl_exec($ch);
        //echo "<br/>";
        //echo $response;
       // header('Location:retailerDetails.php');

      //fin_dailybalance db connection

        //echo $view_date;
        $sql2 ="SELECT * from fin_dailybalance";
        $result2=mysqli_query($conn,$sql2);
        if($result2){
          while($row=mysqli_fetch_array($result2)){
            //echo $row['bDate']."\n";
            if(strcmp($row['bDate'],$view_date)==0){
              $status=1;
              $finId=$row['id'];
            }
          }
          if($status==1){
            $sql2 ="SELECT * from fin_dailybalance WHERE id='$finId'";
            $result2=mysqli_query($conn,$sql2);
            $row=mysqli_fetch_array($result2);

            $netBalance=$row['netBalance']-$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');

            $dailyExpense=$row['dailyExpense']+$amount;
            $dailyExpense= number_format((float)$dailyExpense,2,'.','');
            $sql4 = "UPDATE fin_dailybalance SET netBalance='$netBalance' , dailyExpense='$dailyExpense' where bDate='$view_date'";
            mysqli_query($conn,$sql4);
          }

          else{
            $netBalance=$netBalance-$amount;
            $netBalance= number_format((float)$netBalance,2,'.','');
            $sql6="INSERT INTO fin_dailybalance (bDate,dailyExpense,netBalance) VALUES ('$view_date','$amount','$netBalance')";
            mysqli_query($conn,$sql6);
          }


        } 
        else{
          echo "error" . mysqli_error($conn);
        }

        // delete from chequedetails db

        $sql1="DELETE FROM fin_supplierpayment WHERE Id=$s_Id";
        $result1= mysqli_query($conn,$sql1);
        if($result1){
          //echo 'sucessfully deleted'.'<br>';
	  ?>
        <script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully Paid",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./supplierTransaction.php";
          })
        </script>
        <?php
		}
        else
          echo 'error 1234566'.mysqli_error($conn).'<br>';

        //header('Location:./supplierTransaction.php');

      }

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
                  <img src="../dist/img/user1.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['user2'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/user1.jpg" class="img-circle" alt="User Image">

                    <p>
                      <?php echo $_SESSION['user2'];?> - <?php echo $_SESSION['post2'];?>
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
        <li class="treeview">
        <a href="#">
          <i class="fa fa-bullseye"></i>
          <span>Cheque Management</span>
          <span class="pull-right-container">
          </span>
        </a>
        <ul class="treeview-menu">
          <li class>
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
        <li class="active treeview">
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
      <small>Supplier Transactions</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Supplier Transactions</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Supplier Transactions</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="col-md-12">
          <label for="supplierName" class="col-md-3" style="padding-left:12%;padding-top:15px;">
            Supplier Name:
          </label>
          <div class="col-md-7">
            <select class="form-control" name="supId" id="supId" onchange="changeValue();">
              <option value=0>Select Supplier</option>
              <?php
              $sql="SELECT * FROM fin_supplierpayment";
              $result2=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($result2)){
                ?>
                <option value=<?php echo $row['Id']?>><?php echo $row['supplierName']?></option>
                <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-2">
            <i class="fa fa-user fa-2x"></i>
          </div>
        </div>        
        <div class="col-md-12">
          <label for="Shopname" class="col-md-3" style="padding-left:12%;padding-top:15px">
            Amount:
          </label>
          <div class="col-md-7">
            <input type="text" name="amount" id="amount" class="form-control" style="border-radius:7px" readonly="">
          </div>
          <div class="col-md-2">
            <i class="fa fa-home fa-2x"></i>
          </div>
        </div>
        
        <div class="col-md-12">
          <div>
            <label for="method" class="col-md-3" style="padding-left:12%;padding-top:15px">
              Payment Method:
            </label>
            <div class="col-md-7" style="padding-left: 4%">
              <label class="radio">
                <input type="radio"  name="method" value="Cash" checked>
                Cash
              </label>
              <label class="radio">
                <input type="radio"  name="method" value="Cheque">
                Cheque
              </label>
            </div>             
          </div>
          <input type="hidden" name="supplierName" id="supplierName" class="form-control" style="border-radius:7px">
          <div class="col-md-2">
            <i class="fa fa-book fa-2x"></i>
          </div>
        </div> 
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
  <script type="text/javascript">
    function changeValue(){
      var id=document.getElementById('supId').value;
      console.log(id);
      $.ajax({
        type: "POST",
        url: 'http://waligamainv.sanila.tech/finance/api/getAmount.php',
        data: {id:id},
        success: function(data)
        {   
          document.getElementById('amount').value = JSON.parse(data).amount;
          document.getElementById('supplierName').value = JSON.parse(data).supplierName;
        }
      });  

    }
  </script>
</body>
</html>
<?php
}
else{
  header('location:../login/index.php');
}
?>