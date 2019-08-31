<?php
include("db.php");

//echo $sup_id;


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
  <!--sweet alert-->
  <script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!--end-->

   <style>        
        .error {
            color: #FF0000;
            font-weight: bold;
        }
        
    </style>
<script type="text/javascript">
function loadqty(code)
         {
   if (window.XMLHttpRequest) {
    // code for modern browsers
      xhttp = new XMLHttpRequest();
   } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("fqty").value = xhttp.responseText;
    }
  }
  xhttp.open("GET", "loadqty.php?code="+code, true);
  xhttp.send();

         }  

</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php
 
                     $sup_id=$_GET['txtsupname'];
                     
                     
             
//data addition to the db
    

                /*$stockID = "" ;
              $sql = " UPDATE stock SET qty = '$qty' WHERE stockName = '$stockName'" ;
                $result = mysqli_query($con, $sql);
                if($result) {
                                   echo "Successfully Created";
                                   //header('Location:admin_dash.php');
                            }else
                                   echo "error" . mysqli_error($con);*/
   if(isset($_POST["btn_add"])){
     
   $sup_id=$_POST['sup_id'];
   $id =" ";
   $stockName=$_POST['txtstockname'];
   $qty =$_POST['txtqty'];

   $sql3="SELECT selling_price,stockName FROM stock WHERE stockID='$stockName'";
   $result3=mysqli_query($conn,$sql3);
   $row=mysqli_fetch_array($result3);
   $pprice=$row['selling_price'];
   $stname=$row['stockName'];

//rol//

   $sqlq = "INSERT INTO tempstock(stockName,supplierName,qty,selling_price) VALUES('$stname','$sup_id','$qty','$pprice')";
   $result=mysqli_query($conn,$sqlq);


//iiiii

 //$stockname=$_POST['txtstockname'];
 //$supplierName=$sup_id;
  $stockName;
  $sup_id;

/*$sqls = "SELECT qty FROM tempstock WHERE stockID='".$stockName."' and supplierName='".$sup_id."'";  //get from temp
 $resultss = mysqli_query($con,$sqls);
 while($row=mysqli_fetch_assoc($resultss))
 {

                    $qtyn=$row['qty'];*/
                    /*if($results){
                            echo "Successfully Created";
                                   //header('Location:admin_dash.php');
                            }else
                                   echo "error" . mysqli_error($con);  */ 
  
   //rol
   $sqlrol="SELECT stockID FROM rol_notify WHERE stockID='$stockName'";
   $res=mysqli_query($conn,$sqlrol);
   $row=mysqli_fetch_array($res);
   $rolstockName=$row['stockID'];

   if($stockName==$rolstockName)
   {
      $sqlrol1="SELECT qty,ROL FROM  stock WHERE stockID='$stockName'";
      $resrol1=mysqli_query($conn,$sqlrol1);
      $row=mysqli_fetch_array($resrol1);
      $rolqty=$row['qty'];
      $ROL=$row['ROL'];

           if(($rolqty+$qty)<$ROL)
             {
               $sql1 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stockName' " ;  //update into stock
               $result = mysqli_query($conn, $sql1);  
               
             }
          else
             {
               $sql2 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stockName' " ;  //update into stock
               $result = mysqli_query($conn, $sql2); 
               

               $sqld="DELETE  FROM rol_notify WHERE stockID='$stockName'";  //delete from rol_notify
               $resd=mysqli_query($conn,$sqld);

             }


   }
   else
       $sql23 = " UPDATE stock SET qty = qty+'".$qty."' WHERE stockID = '$stockName' " ;  //update into stock
       $result = mysqli_query($conn, $sql23);  
  
  //end of rol            

                   /* $sql = " UPDATE stock SET qty = qty+'$qtyn' WHERE stockName = '$stockName' " ;  //update into stock
                    $result = mysqli_query($con, $sql);*/
                    /*if($result){
                            echo "Successfully Created";
                                   //header('Location:admin_dash.php');
                            }else
                                   echo "error" . mysqli_error($con);  */

  
   /*if($result) {
                                   echo "Successfully Created";
                                   //header('Location:admin_dash.php');
                            }else
                                   echo "error" . mysqli_error($con);*/
 }    

             $stockN="SELECT stockID,stockName FROM stock WHERE supplierName='$sup_id' ";
             $resultSt =   mysqli_query($conn, $stockN);
                 
   
//header loc


 if(isset($_POST["btn_submit"]))
{
 /*$sqlid="SELECT id FROM tempstock WHERE StockName='$stockName'";
 $resultid=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($resultid);
 $id=$row[];*/
 

//start sendStock
$sql="SELECT SUM(selling_price*qty) as 'total',supplierName FROM tempstock GROUP BY supplierName ";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result))
{

        $supName=$row['supplierName'];
        $total=$row['total'];



        /*echo $supName; echo " ";
         echo $total;*/
        $total=doubleval($total);

   //$sqlo="INSERT INTO temptot(supName,totprice) VALUES('$supName',$total)";
   //echo "<br/>".$sqlo;
   //$resulto=mysqli_query($con,$sqlo);
}


    $sql = "SELECT * FROM tempstock ORDER BY id";

    $list = mysqli_query($conn, $sql);

    $data = array();

    while($row = mysqli_fetch_assoc($list))
    {
      $data[]= $row;
    }

   $supplier_stock=json_encode($data);
   $sqlu="INSERT INTO supplier_stock(stock) VALUES ('$supplier_stock')";
   $resultU=mysqli_query($conn, $sqlu);
   $supp_id=mysqli_insert_id($conn);



    if ($resultU) 
    {        
       // echo $supName;
      //  echo $total;


           //supplier data sending
          // echo $supp_id;

           $url = 'http://waligamainv.sanila.tech/stock_keeper/api/get_stock.php';
           $data = array('id' => $supp_id, 'supName' => $supName, 'totprice' => $total);
//echo $data;
           $ch = curl_init($url);
           curl_setopt($ch, CURLOPT_POST, 1);
           curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
           curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
           curl_setopt($ch, CURLOPT_HEADER, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


           $response = curl_exec($ch);

           $response;
     
			

			$sqlk="DELETE  FROM tempstock";
			$resultk=mysqli_query($conn,$sqlk);


     } 


//end

//sweet alert
     ?> 
<script type="text/javascript"> 
          swal({
            title: 'Successfull!',
            text: "Successfully sent!",
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
            document.location.href = "./updateStock.php";
          })
        </script>

<?php
//end

}

//header('Location:updateStock.php');




 
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
      <li>
        <a href="updateStock.php">
          <i class="fa fa-arrow-left"></i> <span>Back</span>
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
      <small>Update Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Daily Stock</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content" style="padding-top: 5%;padding-left: 5%">
    <div class="row">
      <div class="col-sm-11" style="background-color: #ffffff;padding: 1%;padding-bottom: 3%;border-radius: 15px;">


       <!-------------------------------------------------- Form Start Here -------------------------------------------->

       <div class="row text-center">         
        <h1>Add daily stock</h1>
      </div>
      <form class="form-horizontal" name="abc" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">


        <div class="col-md-12">
            <label for="stockname" class="col-md-3" style="padding-left: 12%;padding-top: 15px;">
                 StockName:
            </label>
            <div class="col-md-7">
                   
                  <select  name="txtstockname" id="stockname" class="form-control" onchange="loadqty(this.value)">
                  <option>--Please Select--</option>
                  <?php
                     while ($row = mysqli_fetch_assoc($resultSt)) {
                         # code...
                          echo "<option value='" . $row['stockID'] ."'>" . $row['stockName'] ."</option>";

                     }
                       
                    ?>
                </select>
                </div> 
             <div class="col-md-2">
                <i class="fa fa-list-ol fa-2x"></i>
            </div>            
        </div>

        <div class="col-md-12">
            <label for="qty" class="col-md-3" style="padding-left:12%;padding-top:15px">
                Quantity:
            </label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="txtqty" id="fqty"  placeholder="Enter Quantity" style="border-radius:7px"><span class="error"><span class="error"></span>
            </div>
             <div class="col-md-2">
                <i class="fa fa-cart-arrow-down fa-2x"></i>
            </div>
        </div>
         <div class="col-md-12"> </div>
        <!---temp table start-->
  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                    
                                   <?php
                  

                $sqltemp = "SELECT * FROM tempstock ";
                $resulttemp = mysqli_query($conn, $sqltemp); ?>
                          
                             <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">

                         <thead >
                             <tr>
                                        <th>Stock Name</th>
                                         <th>Supplier Name</th>
                                         <th>Quantity</th>
                                         <th>Selling Price</th>
                              
                                 <!--<th>Remove</th>-->
                             </tr>
                         </thead>

                         
                         <tbody>
                             <?php
                              while($row = mysqli_fetch_assoc($resulttemp)){
                                  echo "<tr><td>{$row['stockName']}</td><td>{$row['supplierName']}</td><td>{$row['qty']}</td><td>{$row['selling_price']}</td>
                                      
                                </tr>\n";
                              }
                               ?>
                              
                           
                     </tbody>
                        
                   
                    </table>

                </div>
            </div>
        </div>
  

         <div class="col-md-5"></div><input type="hidden" name="sup_id" value="<?php echo  $sup_id ;?>" >    
        <div class="col-md-2">     
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit" class="btn btn-primary" name="btn_add" >Add Stock <i class="fa fa-user-plus"></i></button>
          </div>
          </div>
          <div class="col-md-2">
          <div class="row text-center" style="padding-top: 2%">
           <button type="submit" class="btn btn-primary" name="btn_submit" >Send <i class="fa fa-user-plus"></i></button>
          </div>
          </div>
      </form>

     <!------------------------------------- Form End Here ----------------------------------------------------------->  
   </div>
 </div>
</section>

<!--- /.content -->
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