<?php
include("db.php");



session_start();

$_SESSION['post4']="storekeeper";
if($_SESSION['user4']){

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
   <style>        
        .error {
            color: #FF0000;
            font-weight: bold;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php

   function test_input($data){
                           $data = trim($data);
                           $data = stripslashes($data);
                           $data = htmlspecialchars($data);
                           return $data;
                         }

$supplierNameErr = $stockNameErr = $purchasing_priceErr = $disscountErr = $qtyErr = $dateErr = $ROLErr = "";
$supplierName = $stockName = $purchasing_price = $disscount = $qty = $date = $ROL ="";




                

              date_default_timezone_set("Asia/Colombo");   //date
              $date = date("d.m.y");

                if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    
               // $supplierName=$_POST['txtsupname'];   
                if (empty($_POST["txtsupname"])) {
                    $supplierNameErr = "Supplier Name is required";
                } else {
                    $supplierName = test_input($_POST["txtsupname"]);
                }

				if (empty($_POST["txtstockname"])) {
                $stockNameErr = "Stock Name is required";
            } else {
                $stockName = test_input($_POST["txtstockname"]);
            }
				
                //if (empty($_POST["txtstockname"])){                              //stockname validation
                    //$stockNameErr =  "Stock Name is required";
                //}else if (!preg_match("/^[a-zA-Z ][0-9]*$/", $_POST["txtstockname"])){
                    //$stockNameErr = "Only letters and white space allowed";
                //}else {
                    //$stockName = test_input($_POST["txtstockname"]);
                //}

                
                 if (empty($_POST["txtpurprice"])) {                            //purchasing price validation
                    $purchasing_priceErr = "Purchasing price is required";
                } else if (preg_match("/^(?:0|[1-9]\d*)(?:\.\d{2})?$/", $_POST["txtpurprice"])) {
                    $purchasing_price = test_input($_POST["txtpurprice"]);
                }
                else {
                    $purchasing_priceErr = "only numeric values can add"; 
                }
                

                if (empty($_POST["txtdisount"])) {                                        // validate for percentage value
                     $disscountErr = "percentage value is required";                     // /(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)/i
                } else if (preg_match("/(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)/i", $_POST["txtdisount"])) {
                     $disscount = test_input($_POST["txtdisount"]);
                }
                else {
                     $disscountErr = "Only numeric values can add";
                }

                 
                if (empty($_POST["txtqty"])) {                                      //quantity validation
                   $qtyErr = "Quantity is required";
                } else if (preg_match("/^[0-9]*$/", $_POST["txtqty"])) {
                    $qty = test_input($_POST["txtqty"]);
                }
                else {
                    $qtyErr = "Only numeric values can add";
                }

                if (empty($_POST["txtROL"])){
                  $ROLErr = "Return Order Limit required";
                } elseif (preg_match("/^[0-9]*$/", $_POST["txtROL"])) {
                    $ROL = test_input($_POST["txtROL"]);
                }
                else {
                    $ROLErr = "Only numeric values can add";
                }

             

                $diss_value = $purchasing_price * ($disscount/100);
                $sellPrice = $purchasing_price - $diss_value;
                // $retuItems = 10;
 

//data addition to the db
                if ($supplierNameErr == "" and $stockNameErr == "" and $purchasing_priceErr == ""  and $disscountErr == ""  and $qtyErr == ""   and $dateErr == ""  and $ROLErr == "" ){
                   
                $stockID = "" ;
                $sql = "INSERT INTO stock(supplierName,stockName,purchasing_price,qty,discount,diss_value,selling_price,ddate,ROL)VALUES('$supplierName','$stockName','$purchasing_price','$qty','$disscount','$diss_value',' $sellPrice','$date','$ROL')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
        ?> 
<script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully Added!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./addstock.php";
          })
        </script>


<?php
        
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
                <span class="hidden-xs"><?php echo $_SESSION['user4'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../dist/img/user1.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['user4'];?> - <?php echo $_SESSION['post4'];?>
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
        <p><?php echo $_SESSION['user4'];?></p>
        <i class="fa fa-circle text-success" style="font-size: 10px"></i> Online
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
      <a href="#">
      <i class="fa fa-files-o"></i>
      <span>Lorry stock handling</span>
      <span class="pull-right-container">
      
      </span>
      </a>
      <ul class="treeview-menu">
          <li class>
        <a href="addlorrystock.php">
         <i class="fa fa-truck"></i> <span>Load Stock to Lorries </span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      

      <li class>
        <a href="remaininglorrystock.php">
          <i class="fa fa-truck"></i> <span>Remaining Stock in Lorries </span>
          <span class="pull-right-container"></span>
        </a>
      </li>

      <li class>
       
          <a href="damagestock.php">
          <i class="fa fa-truck"></i> <span>Damage LorryStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      
      </ul>
      </li>
       <li class="active treeview">
        
            <a href="addstock.php">
          <i class="fa fa-plus-square-o"></i> <span>Add new stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
            <a href="changeStock.php">
           <i class="fa fa-balance-scale"></i> <span>Change new stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
            <a href="updateStock.php">
          <i class="fa fa-plus-square-o"></i> <span>stock filling </span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
            <a href="viewstock.php">
          <i class="fa fa-list-alt"></i> <span>View warehouse stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>

     
       <li class>
       
          <a href="damage_list.php">
          <i class="fa fa-list-alt"></i> <span>view warehouse DamageStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
         <li class>
       
          <a href="claimdamagestock.php">
          <i class="fa fa-minus-circle"></i> <span>Claim DamageStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
       <li class>
       
          <a href="rolnotify.php">
          <i class="fa fa-list-alt"></i> <span>ROL notifications</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
        <li class>
       
          <a href="deleteStock.php">
          <i class="fa fa-trash"></i> <span>Delete warehouse Stock</span>
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
      <small>Add New Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Add New Stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Add New Stock</h1>
      </div>
      <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


         <div class="col-md-12">
            <label for="txtsupname" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                 Supplier name:
            </label>
            <div class="col-md-7">
               <select  name="txtsupname" id="fsupname" class="form-control" >
                  <option value="<?php echo htmlspecialchars($supplierName); ?>" style="border-radius: 7px">--Please Select--</option>
                               <?php 
                               $supname="Select * from supplierdetails";
                               $s1=mysqli_query($conn,$supname);
                               while ($rw2=mysqli_fetch_array($s1)) {
                               echo $rw2['fname'];
                               ?>
                    <option value="<?php echo $rw2['fname']; ?>"><?php echo $rw2['fname']; ?></option>
                              <?php
                              };
                              ?>
                </select>
            </div> 
             <div class="col-md-2">
                <i class="fa fa-user fa-2x"></i>
            </div>            
        </div> 

            <div class="col-md-12">
             <label for="stockname" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Stock Name:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control"  name="txtstockname" id="fstname" placeholder="Enter Stock Name"  value="<?php echo htmlspecialchars($stockName);?>" style="border-radius: 7px"><span class="error"><?php echo $stockNameErr;?></span>
            </div>
             <div class="col-md-2">
                <i class="fa fa-list-ol fa-2x"></i>
            </div>
        </div>
        
        <div class="col-md-12">
            <label for="qty" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Quantity:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="txtqty" id="fqty"  placeholder="Enter Quantity" value="<?php echo htmlspecialchars($qty);?>" style="border-radius: 7px"><span class="error"><?php echo $qtyErr;?></span>
            </div>
             <div class="col-md-2">
                <i class="fa fa-cart-arrow-down fa-2x"></i>
            </div>
        </div>

        <div class="col-md-12">
            <label for="purprice" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Purchasing Price:
            </label>
            <div class="col-md-7">
               <input type="text" class="form-control"  name="txtpurprice" id="fpprice" placeholder="Enter Purchasing Price" value="<?php echo htmlspecialchars($purchasing_price);?>" style="border-radius: 7px"><span class="error"><?php echo $purchasing_priceErr;?></span>
            </div>
            <div class="col-md-2">
                <i class="fa fa-money fa-2x"></i>
            </div>
        </div>

       <div class="col-md-12">
            <label for="discount" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Discount percentage:
            </label>
            <div class="col-md-7">
               <input type="text" class="form-control"  name="txtdisount" id="fdisp" placeholder="Enter Discount" value="<?php echo htmlspecialchars($disscount);?>" style="border-radius: 7px"><span class="error"><?php echo $disscountErr;?></span>
            </div>
            <div class="col-md-2">
                <i class="fa fa-percent fa-2x"></i>
            </div>
        </div>

     <div class="col-md-12">
            <label for="txtdate" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                Date:
            </label>
            <div class="col-md-7">
               <input type="text" class="form-control"  name="txtdate" id="fdate"  placeholder="Enter Date" value="<?php echo htmlspecialchars($date);?>" style="border-radius: 7px"><span class="error"><?php echo $dateErr;?></span>
            </div>
            <div class="col-md-2">
                <i class="fa fa-calendar fa-2x"></i>
            </div>
        </div>

        <div class="col-md-12">
            <label for="discount" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                ROL:
            </label>
            <div class="col-md-7">
               <input type="text" class="form-control"  name="txtROL" id="fdisp" placeholder="Enter Return Order Limit" value="<?php echo htmlspecialchars($disscount);?>" style="border-radius: 7px"><span class="error"><?php echo $ROLErr;?></span>
            </div>
            <div class="col-md-2">
                <i class="fa fa-percent fa-2x"></i>
            </div>
        </div>

        <div class="col-md-12">         
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit"   name="btnsubmit" class="btn btn-primary">Add New Record <i class="fa fa-user-plus"></i></button>
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