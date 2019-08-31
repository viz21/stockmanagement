<?php
session_start();
$_SESSION['user']="Mr. Obeysekara";
$_SESSION['post']="Admin";
if($_SESSION['user']){
 include ("db.php");


 $supplierName=$_GET["supname"];
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
 <script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  
 <script src="dist/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="dist/sweetalert.css">

        <script> 
        function loadpage(){

             xhttp.open("http://waligama.sanila.tech/stock/api/warehouse_dmg.php", true);

        } 
        

      function loadIemInfo(code)
         {
              
           var xhttp;
   if (window.XMLHttpRequest) {
    // code for modern browsers
      xhttp = new XMLHttpRequest();
   } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtdamage").value = xhttp.responseText;
     
    }
  }
  xhttp.open("GET", "searchtotaldamage.php?code="+code, true);
  xhttp.send();


         }
        //...............
                


        </script>
      <style>

        div {
            padding-bottom:20px;
        }

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php

if ($_GET['valid']==1) {
        ?> 
<script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully Send!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./rolui.php";
          })
        </script>

<?php
}
  ?>

 <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
       
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

        <div class="navbar-custom-menu" style="padding-bottom: 0px;">
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
      <li>
        
        <a href="supplierRegister.php">
          <i class="fa fa-plus"></i> <span>Supplier Registration</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li>
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
       <li>
       <li class="active treeview">
        <a href="rolui.php">
          <i class="fa fa-list-alt"></i> <span>Rol Notification</span>
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
      <small>View Stock List </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Stock List</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>View stock List</h1>
      </div>
    <form name="remainform" action="" method="post">
        
        
        
            
       

        
           <div class="row">
          
          
          
        </div>

          
        </form>
        
      
                    

         <div class="row">
         <div class="col-sm-3"></div>
                    <div class="col-sm-8">
                        <div class="card-box table-responsive" id="load_damagetable">
                            

                            <form class="form-horizontal" role="form" method="GET" action="send_rol.php" enctype="multipart/form-data" name="lorystckform">
           <table id="datatable-responsive"
                 class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                 width="100%">
            <?php                   

            $sql = "SELECT stockName,stockId FROM rol_notify where supplierName='$supplierName'";
               $result = mysqli_query($conn,$sql);?>

                         <thead>
                             <tr>
                                 
                                 
                                 <th>Stock Name</th>
                                                                       
                                 
                                                                  
                                 <th>Quantity</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php  

                               while( $row = mysqli_fetch_assoc( $result ) ){
                                echo "<tr><td>{$row['stockName']}</td>   
                                        <td>  

                                      <input 

                                   </td> 
                                </tr>\n";

                               }
                               ?>

                       </tbody>
                    </table>

                 

                              
                              <input type="hidden" name="supplierName" value="<?php echo $supplierName;?>">
            <div class="col-md-12">         
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit" class="btn btn-primary">Send Email</i></button>
                   
                </div>

            </div>
        </div>
      
           </form>
      
      
 
</div>
</div>

</section>        
     <!--kkddk-->


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
<!-- javascript--><script type="text/javascript">
     
     var qunti = document.forms["lorystckform"]["qunti"];

  



 </script>
  <?php
}
else{
  header('location:../login/index.php');
}
?>