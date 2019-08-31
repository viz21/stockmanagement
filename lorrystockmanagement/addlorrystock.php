<?php
session_start();
$_SESSION['user']="Lorry Stock Manager";
$_SESSION['post']="Admin";
if($_SESSION['user']){
 include ("db.php");
 ?>



<?php
//jason adding to load_lorry_qty & unload_lorry_qty tables start
 
 $quntityErr = "";
  $qunti=  "";






    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
                //amount
        if (empty($_POST["qunti"])) {
           $quntityErr = "quantity is required";
          ?><script>qunti.style.border= "1px solid red"</script><?php
        }
        else if(preg_match("/^[0-9]*$/",$_POST["qunti"])){
           $qunti = $_POST["qunti"];
        }
        else {
          $quntityErr="Only numeric values can add";
        }

    

               

      


if(isset($_POST["btn_submit"])){
    

  

     $sql = "SELECT * FROM templorrystck ORDER BY temp_id";
      
     $list = mysqli_query($conn, $sql);
  
      $data = array();
    
   while($row = mysqli_fetch_assoc($list)){
       $data[]= $row;

       $stckname=$row['productname'];
       $stckqty=$row['quntity'];

       $sql="UPDATE stock SET qty=qty-'".$stckqty."' WHERE stockName='".$stckname."'";
   mysqli_query($conn, $sql);


   }
   
    $templorry = json_encode($data);
  

  $templorrynum= $_POST["lorrynumber"];
  $temprepnum=$_POST["repnumber"];


   $sql1="SELECT lorryid FROM lorry WHERE lorrynumber='".$templorrynum."'";
   $result1=mysqli_query($conn, $sql1);

    $row = mysqli_fetch_assoc($result1);
     $templorryid= $row['lorryid'];

   

    $sql2= "INSERT INTO load_lorry_qty (lorryID,lorryNumber,repID,stock_details) VALUES('".$templorryid."','".$templorrynum."','".$temprepnum."','".$templorry."')"; 
     $sqlunload= "INSERT INTO unload_lorry_qty (lorryID,lorryNumber,repID,stock_details) VALUES('".$templorryid."','".$templorrynum."','".$temprepnum."','".$templorry."')"; 
    
    
       mysqli_query($conn, $sql2);
       mysqli_query($conn, $sqlunload);   
        
       $sqldel="DELETE FROM templorrystck";
         mysqli_query($conn, $sqldel);   
          $quntityErr = "";


      //   header("Location:./addlorrystock.php");
 

}
//end jason

//templorry insert start
if(isset($_POST["btnADD"]))
{ 


   $productname =$_POST["stocknm"] ;
   $qntit =$_POST["qunti"] ;
   $discount =$_POST["disco_nt"] ;
   $sling_price =$_POST["sel_price"] ;
   
   
   $sql3 = "INSERT INTO templorrystck( productname,quntity,discount,sellingprice) VALUES('".$productname."','".$qntit."','".$discount."','".$sling_price."')";

    mysqli_query($conn, $sql3);
  
//    $sql="UPDATE stock SET qty=qty-'".$qntit."' WHERE stockName='".$productname."'";
  //  mysqli_query($conn, $sql);

   
}

}
//tempinsert end
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
      <li class="active treeview">
        <a href="addlorrystock.php">
          <i class="fa fa-dashboard"></i> <span>Load stock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="remaining.php">
          <i class="fa fa-dashboard"></i> <span>Remaining LorryStock</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class>
        <a href="damagestock.php">
          <i class="fa fa-dashboard"></i> <span>Damage LorryStock</span>
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
      <small>Enter lorrystock Details</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Load Lorry Stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Lorrystock Details</h1>
      </div>
      <form class="form-horizontal" role="form"   method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" name="lorystckform">
        <div>  
         <label for="productname" class="col-md-5" style="padding-left:12%;padding-top:15px;">
                Product name
            </label>
            <div class="col-md-5">
                <?php 
                

                     $sql4="SELECT stockID,stockName FROM stock ORDER BY stockName ASC";
                     $result =   mysqli_query($conn, $sql4);
                     ?>

                     <select name="stocknm"  class="form-control" onchange="loadIemInfo(this.value)">;
                      <option>--Please Select a Productname--</option>
                     <?php
                     while ($row = mysqli_fetch_assoc($result)) {
                         # code...
                          echo "<option value='" . $row['stockName'] ."'>" . $row['stockName'] ."</option>";

                     }
                        


                ?>
                </select>
            </div>
         
        </div>


         

          <div>
            <label for="discount" class="col-md-5" style="padding-left:12%;padding-top:15px;">
                discount
            </label>
            <div class="col-md-5">
             <input type="text" class="form-control" name="disco_nt" id="txtDiscount" placeholder="discount">
                <p class="help-block">
                   
                </p>
            </div>
             <div class="col-md-2">
                <i class="fa fa-lock fa-1x"></i>
            </div>
        </div>

          <div>
            <label for="price" class="col-md-5" style="padding-left:12%;padding-top:15px;">
                Selling Price
            </label>
            <div class="col-md-5">
             <input type="text" class="form-control" id="txtPice"  name="sel_price" placeholder="price">
                <p class="help-block">
                   
                </p>
            </div>
             <div class="col-md-2">
                <i class="fa fa-lock fa-1x"></i>
            </div>
        </div> 
            <div>
            <label for="quantity" class="col-md-5" required style="padding-left:12%;padding-top:15px;">
                quantity
            </label>
            <div class="col-md-5">
             <input type="text" class="form-control" name="qunti" id="txtQty"  placeholder="Enter quantity"  value="<?php echo htmlspecialchars($qunti);?>" onkeyup="checkQuanty(txtQty.value,txtStquantity.value)"><input type="text" id="txtStquantity" hidden="">
               <span class="error" id="err_qunt2"><?php echo $quntityErr;?></span>    
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
                  

                $sqltemp = "SELECT * FROM templorrystck ";
                $resulttemp = mysqli_query($conn,  $sqltemp); ?>
                          

                             <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                         <thead >
                             <tr>
                               <th>Product Name</th>
                                         <th>quntity</th>
                                         <th>discount</th>
                                         <th>price</th>
                              
                                 <th>Remove</th>
                             </tr>
                         </thead>

                         
                         <tbody>
                             <?php
                              while($row = mysqli_fetch_assoc($resulttemp)){
                                    $delid=$row['temp_id'];
                                  echo "<tr><td>{$row['productname']}</td><td>{$row['quntity']}</td><td>{$row['discount']}</td><td>{$row['sellingprice']}</td>
                                        <td><a href='deleteload.php?temp_id=$delid'>Delete</a> </td> 
                                </tr>\n";
                              }
                               ?>
                              
                           
                     </tbody>
                        
                   
                    </table>

                </div>
            </div>
        </div>
      
      
        <!--table end-->
        <form method="post" action=""  name="lorystckform2"> 
             
           <div>
               <label for="lorrynumber" class="col-md-5" style="padding-left:12%;padding-top:15px;">
                lorry number :
            </label>
           <div class="col-md-5">
<?php
     

                $sqlw = "SELECT * FROM addvehicle";
                $resultw = mysqli_query($conn,$sqlw); ?>

                   <select name="lorrynumber"  class="form-control">
                   <option>--Please Select a lorrynumber--</option>
<?php

           while ($row = mysqli_fetch_array($resultw )) {
             echo "<option value='" . $row['vehiclenum'] ."'>" . $row['vehiclenum'] ."</option>";
           }
            echo "</select>";  

?>
          
            </div>            
        </div>  

          <div>
               <label for="repname" class="col-md-5" style="padding-left:12%;padding-top:15px;">
                Rep name:
            </label>
           <div class="col-md-5">
                <?php
                 

                $sqlrep = "SELECT * FROM auth_details where type=4";
                $resultrep = mysqli_query($conn,$sqlrep);?>

                  <select name="repnumber"  class="form-control">
                   <option>--Please Select a Repname--</option>
                  <?php
             

           while ($row = mysqli_fetch_array($resultrep)) {
             echo "<option value='" . $row['empid'] ."'>" . $row['empname'] ."</option>";
           }
            echo "</select>";  
    

?>
            </div>            
        </div> 
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