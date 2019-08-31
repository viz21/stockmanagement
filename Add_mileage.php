<?php
session_start();
$_SESSION['user']="Mr. Obeysekara";
$_SESSION['post']="Admin";
if($_SESSION['user']){
  include_once 'dbconnect.php'
 //include("../../stock_mangement/api/db_connect.php");
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
          //  $userid = $_SESSION['userid'];
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $vehiclenum = $s_mileage= $f_mileage="";
  $vehiclenumErr = $s_mileageErr= $f_mileageErr="";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["vehiclenum"])) {
      $vehiclenumErr = "Vehicle Number is required";

    } else if (!preg_match("/([A-Z]{2,4}|\d{2,3}|[A-Z]{2} [A-Z]{2})[\-\]|[ ]\d{4}/", $_POST["vehiclenum"])) {
      $vehiclenumErr = "Only Valid Vehicle Numbers";
    } else {
      $vehiclenum = test_input($_POST["vehiclenum"]);
    }

    if(empty($_POST["s_mileage"])){
      $s_mileageErr = "Enter Starting Mileage";
    }
    else
    {

      $s_mileage = test_input($_POST["s_mileage"]);
    }


    date_default_timezone_set("Asia/Colombo");
    $date_=date("d.m.Y");   


    if(empty($_POST["f_mileage"])){
      $f_mileageErr = "Enter Finishing Mileage";
    }else{

      $f_mileage = test_input($_POST["f_mileage"]);
    }

    if (!($f_mileage>$s_mileage)) {
      $f_mileageErr= "Finishing Mileage Error" ;
    }
    $m_perday = $f_mileage - $s_mileage;


    if($vehiclenumErr == "" and $s_mileageErr =="" and $f_mileageErr=="" ){

     $sql = "Insert INTO vehiclemileage(vehiclenum,date_,s_mileage,f_mileage,m_perday) VALUES('$vehiclenum','$date_','$s_mileage','$f_mileage','$m_perday')";

     $result = mysqli_query($conn, $sql);
     if ($result) {
      echo "Successfully Created";

      $Tmileage ="SELECT SUM(m_perday) as sum FROM vehiclemileage  WHERE vehiclenum='".$vehiclenum."'";
      $Smileage ="SELECT servicemileage as servicemileage FROM addvehicle WHERE vehiclenum='".$vehiclenum."'";
      $result1 =  mysqli_query($conn, $Tmileage);
      $result2 = mysqli_query($conn, $Smileage);
      $row1 = mysqli_fetch_array($result1);
      $row2 = mysqli_fetch_array($result2);
      $sum = $row1['sum'];
      $servicemileage = $row2['servicemileage'];
      

      if(($servicemileage - $sum)<=1000){

        ?>
        <script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: " Vehicle Is Ready For Service",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./V_mileage.php";
          })
        </script>

        <?php 
        $sql5 = "UPDATE addvehicle SET status = 1 where vehiclenum='".$vehiclenum."'";
        mysqli_query($conn,$sql5);



        echo "Time For Service";

      }else{
        
         ?>
        <script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
           document.location.href = "./V_mileage.php";
          })
        </script>
        <?php

      }

       


                             //header("Location:./V_mileage.php");

    } else
    echo "error" . mysqli_error($conn);

   


  }
  else{
    ?>
        <script type="text/javascript"> 
          swal({
            title: 'Error!',
            text: "Some fields are empty",
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            //document.location.href = "./V_mileage.php";
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
        <a href="Add_vehicle.php">
          <i class="fa fa-plus"></i> <span>Add Vehicle</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="active treeview">
        <a href="Add_mileage.php">
          <i class="fa fa-plus"></i> <span>Add Mileage</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="Add_service.php">
          <i class="fa fa-plus"></i> <span>Add Service</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="Add_fuel.php">
          <i class="fa fa-plus"></i> <span>Add Fuel</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="V_fuel.php">
          <i class="fa fa-list-alt"></i> <span>View Fuel Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="V_service.php">
          <i class="fa fa-list-alt"></i> <span>View Service Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="V_vehicle.php">
          <i class="fa fa-list-alt"></i> <span>View Vehicle Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="V_mileage.php">
          <i class="fa fa-list-alt"></i> <span>View Mileage Details</span>
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
      Add Mileage
      <small>Enter mileage Details</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Addmileage</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1> Add Mileage</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

        <div class="col-md-12">
          <label for="vehicle number" class="col-md-3" style="padding-left:12%;padding-top:15px">
            Vehicle Number:
          </label>
          <div class="col-md-7">
           <select name="vehiclenum" class="form-control" style="border-radius:7px">
            <option style="border-radius: 7px" value ='0'>--Please Select--</option>
            <?php
            $sql_ = "select * from addvehicle ";
            $list = mysqli_query($conn,$sql_);
            while ($row=mysqli_fetch_assoc($list)) {
             ?>
             <option value=<?php echo $row['vehiclenum'];?> ><?php echo $row['vehiclenum'];?></option>
             <?php     
           }
           ?>
         </select>

         <span class="error"><?php echo $vehiclenumErr;?></span>
       </div>
       <div class="col-md-2">
        <i class="fa fa-id-card fa-2x"></i>
      </div>
    </div>

    <div class="col-md-12">
      <label for="starting Mileage" class="col-md-3" style="padding-left:12%;padding-top:15px">
        starting Mileage :
      </label>
      <div class="col-md-7">
        <input type="text" name="s_mileage" class="form-control"  placeholder="Enter Starting Mileage"   style="border-radius:7px">
        <span class="error"><?php echo $s_mileageErr;?></span>
      </div>
      <div class="col-md-2">
        <i class="fa fa-bars fa-2x"></i>
      </div>
    </div>
    <div class="col-md-12">
      <label for="Finishing mileage" class="col-md-3" style="padding-left:12%;padding-top:5px">
        Finishing mileage:
      </label>
      <div class="col-md-7">
        <input type="text" name="f_mileage" class="form-control"  placeholder="Enter Finishing mileage "  style="border-radius:7px">
        <span class="error"><?php echo $f_mileageErr;?></span>
      </div>
      <div class="col-md-2">
        <i class="fa fa-bars fa-2x"></i>
      </div>          
    </div>


    <div class="col-md-12">         
      <div class="row text-center" style="padding-top: 2%">
       <button type="submit" class="btn btn-primary">Add Mileage <i class="fa fa-user-plus"></i></button>
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