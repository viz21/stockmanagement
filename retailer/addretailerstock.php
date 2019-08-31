<?php
session_start();
$_SESSION['user']="Retail Manager";
$_SESSION['post']="Admin";
if($_SESSION['user']){
 include ("db.php");
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
<script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


<script src="dist/sweetalert-dev.js"></script>
<link rel="stylesheet" href="dist/sweetalert.css">

<style> 

div {
  padding-bottom:30px;

}

.error {
  color: #FF0000;
}
#err_qunt{
  color: #FF0000;
}




</style>
<script type="text/javascript">

 function loadIemInfo(code)
 {
  document.getElementById("err_qunt").innerHTML="";
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
      document.getElementById("txtDiscount").value = xhttp.responseText.split(",")[0];
      document.getElementById("txtPice").value = xhttp.responseText.split(",")[1];
      document.getElementById("txtStquantity").value = xhttp.responseText.split(",")[2];
    }
  }
  xhttp.open("GET", "searchItemInfo.php?code="+code, true);
  xhttp.send();


}

function checkQuanty(qty,stockqty)
{   
 document.getElementById("err_qunt").innerHTML="";
 document.getElementById("err_qunt2").innerHTML="";

 var qty=parseFloat(qty);
 var stockqty=parseFloat(stockqty);

 if(stockqty<qty)
 {

   swal("invalid quntity", "Enter a lower quntity!");  



   document.getElementById("err_qunt").innerHTML="invalid quntity!warehouse quantity is lower.";
   document.getElementById("txtQty").value="";

 }

}







</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">



 <?php

 date_default_timezone_set("Asia/Colombo");
 $Date=date("d.m.Y");
 
 $quantityErr = "";
 $quantity=  "";






 if ($_SERVER["REQUEST_METHOD"] == "POST") {



  if (empty($_POST["quantity"])) {
   $quantityErr = "quantity is required";
   ?><script>qunti.style.border= "1px solid red"</script><?php
 }
 else if(preg_match("/^[0-9]*$/",$_POST["quantity"])){
   $quantity = $_POST["quantity"];
 }
 else {
  $quantityErr="Only numeric values can add";
}










if(isset($_POST["btn_submit"])){





  $RetailerID= $_SESSION["RetailerID"];
  $sql = "SELECT * FROM tempretstk WHERE retId=$RetailerID ORDER BY temp_id";

  $list = mysqli_query($conn, $sql);
  /*if($list){
    echo "select tempretstk";
  }
  else{
    echo "error ".mysqli_error();
  }
*/
 // $resulttemp1 = $_SESSION['resulttemp'];

  $data = array();

  while($row = mysqli_fetch_assoc($list)){
   $data[]= $row;
 }

 $tempstock = json_encode($data);

 
 $sql1="SELECT * FROM retailerdetails Where RetailerID='".$RetailerID."'";
 $result1=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_assoc($result1);
 $RetailerName=$row['RetailerName'];
 // $rowsize=mysqli_num_rows($result1);
// $RetailerID=(int)$row['RetailerID'];

 $sql9="SELECT * FROM retailer_order WHERE retId=".$RetailerID."";
 $result9 = mysqli_query($conn, $sql9);
 $row9 = mysqli_fetch_array($result9);
 $rowsize9=mysqli_num_rows($result9);
 

 if($rowsize9>0){


   $sql10 = "UPDATE retailer_order SET stock_details='".$tempstock."',date_='".$Date."' WHERE retId=".$RetailerID."";
   $result10 = mysqli_query($conn, $sql10);

   if ($result10) {
    
    $sqldel2="DELETE FROM tempretstk";
    mysqli_query($conn, $sqldel2);
    $quntityErr = "";
    session_destroy();
    header('Location:./addingstock.php') ; 
  } else
  echo "error" . mysqli_error($conn);

}

else{
  $sql2= "INSERT INTO retailer_order(retId,retName,stock_details,date_) VALUES(".$RetailerID.",'".$RetailerName."','".$tempstock."','".$Date."')"; 
 //echo $sql2;

  $rs=mysqli_query($conn,$sql2);
  if($rs){
   
   $sqldel2="DELETE FROM tempretstk";
   mysqli_query($conn, $sqldel2);   
   $quntityErr = "";
   session_destroy();
   header('Location:./addingstock.php') ;
 }
 else{
   echo 'error'.mysqli_error($conn).'<br>';
 }



}
    /*  $sqldel="DELETE FROM tempretstk";
        $results= mysqli_query($conn, $sqldel);   
         // $quantityErr = "";
            if($results)
          echo 'sucessfull5678'.'<br>';
             else
          echo 'error'.mysqli_error($conn).'<br>';

          header("Location:./addretailerstock.php");*/
       // }

      /*    $sql1="DELETE FROM tempretstk WHERE retId=".$RetailerID."";
          $result11= mysqli_query($conn,$sql1);
          if($result11)
              echo 'sucessfull'.'<br>';
          else
               echo 'error'.mysqli_error($conn).'<br>';
               header('Location:./addretailerstock.php') ; */

             }


      //templorry insert start
             if(isset($_POST["btnADD"]))
             { 

               $RetailerID= $_SESSION["RetailerID"];
               $data =$_POST["stockName"];
               //echo $data;
               $arr=explode("/", $data);
               $stockName=$arr[0];
               $stockid=$arr[1];
               $quantity =(int)$_POST["quantity"] ;

               if($data==-1 || $quantity<=0){
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
                  })
                </script>
                <?php
              }
              else{
                $sql3 = "INSERT INTO tempretstk(retId,stockName,ord_qty,stockId) VALUES('".$RetailerID."','".$stockName."','".$quantity."','".$stockid."')";
                mysqli_query($conn, $sql3);
                 header('location:./addretailerstock.php');

              }







            }

          }
          ?>

          <div class="wrapper">

            <header class="main-header">
              <!-- Logo -->

              <!-- Logo -->
              <a href="index.html" class="logo" >
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
    <div class="user-panel" style="padding-bottom: 0px;">
      <div class="pull-left image" >
        <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info" style="padding-bottom: 0px;">
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

      <li class>
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

      <li>
        <a href="RetailerBlackListTable.php">
          <i class="fa fa-flag"></i> <span> Retailer Black List table</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li>
        <a href="addingstock.php">
          <i class="fa fa-cart-plus" ></i> <span> Retailer Stock Details</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="active treeview">
        <a href="addretailerstock.php">
          <i class="fa fa-bullseye" ></i> <span> Retailer Stock Details</span>
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
     <small>Enter Retailer Stock Details</small>
   </h1>
   <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"> Retailer Stocks</li>
  </ol>
</section>

<!-- Main content -->
<section class="content" style="padding-top: 5%;padding-left: 5%">
  <div class="row">
    <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


     <!-------------------------------------------------- Form Start Here -------------------------------------------->

     <div class="row text-center">         
      <h1>Retailer Stocks Details</h1>
    </div>
    <form class="form-horizontal" role="form"   method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" name="lorystckform">
      <div>  
       <label for="productname" class="col-md-5" style="padding-left:12%;padding-top:15px;">
        Stock name
      </label>
      <div class="col-md-5">
        <?php 


        $sql4="SELECT stockID,stockName FROM stock ORDER BY stockName ASC";
        $result =   mysqli_query($conn, $sql4);
        ?>

        <select name="stockName"  class="form-control" onchange="loadIemInfo(this.value)">;
          <option value=-1>--Select the stock name--</option>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
                         # code...
            ?>
            <option value="<?php echo $row['stockName'];?>/<?php echo $row['stockID'];?>"><?php echo $row['stockName'];?></option>;
            <?php
          }



          ?>
        </select>
      </div>

    </div>



    <div>
      <label for="quantity" class="col-md-5" required style="padding-left:12%;padding-top:15px;">
        quantity
      </label>
      <div class="col-md-5">
       <input type="text" class="form-control" name="quantity" id="txtQty"  placeholder="Enter quantity"  value="<?php echo htmlspecialchars($quantity);?>" onkeyup="checkQuanty(txtQty.value,txtStquantity.value)"><input type="text" id="txtStquantity" hidden="">
       <span class="error" id="err_qunt2"><?php echo $quantityErr;?></span>    
       <p class="help-block" id="err_qunt">

       </p>          
     </div>



     <div class="col-md-2">
      <input type="Submit" class="btn btn-primary" value="ADD" name="btnADD" >
    </div>
  </div>

</form>
</div>
</div>

</section>
<!-------------------------------------- Form End Here -------------------------------------------------------------->  

<section class="content" style="padding-top: 1%;padding-left: 5%">
  <div class="row"> 
    <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">

        <!--  <div class ="col-md-6">
        </div>-->
        <div class="col-md-2">

        </div>

        


        <div class="row">
          <div class="col-sm-11">
            <div class="card-box table-responsive">

             <?php
             $retailerid =(int)$_SESSION["RetailerID"];
             $sqltemp = "SELECT * FROM tempretstk WHERE retId=$retailerid";
             $resulttemp = mysqli_query($conn,$sqltemp);


             // $_SESSION['resulttemp']=$resulttemp;
/*
               $sqldel2="DELETE FROM tempretstk";
               mysqli_query($conn,    $sqldel2);   
               $quntityErr = "";
*/               
               ?>


               <table id="datatable-responsive"
               class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
               <thead>
                 <tr>
                   <th>Stock Name</th>
                   <th>quntity</th>
                   <th>Remove</th>
                 </tr>
               </thead>


               <tbody>
                 <?php
                 while($row = mysqli_fetch_assoc($resulttemp)){
                  $delid=$row['temp_id'];
                  echo "<tr><td>{$row['stockName']}</td><td>{$row['ord_qty']}</td>
                  <td><a href='deletestock.php?temp_id=$delid'>Delete</a> </td> 
                  </tr>\n";
                }

                ?>


              </tbody>


            </table>



          </tbody>


        </table>

      </div>
    </div>
  </div>


  <!--table end-->


  <form class="form-horizontal" role="form"   method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" name="lorystckform">



    <div class="col-md-6"></div>  
    <div class="col-md-6">
      <input type="submit" class="btn btn-primary btn-lg" value="SUBMIT ALL" name="btn_submit">
    </div>
  </form>

  <!--kkddk-->

</div>
</div>
</select>

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