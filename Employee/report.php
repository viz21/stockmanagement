<?php
include "db.php"
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculation</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
    <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>


    <link href="../assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <!--[if lt IE 9]>
        <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="../assets/js/modernizr.min.js"></script>
        <style>

            div {
                padding-bottom:20px;

            }
            button{
                color: black;
                border-radius: 6px;
            }

        </style>
    </head>
    <body>
       
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Back to Admin</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                    <li><a href="signup.php"><i class="fa fa-list-ol"></i> SignUp</a></li>
                    <li><a href="register.php"><i class="fa fa-font"></i> Register</a></li>
                    <li class="selected"><a href="timeline.php"><i class="fa fa-font"></i> Table</a></li>
                    <li><a href="forms.php"><i class="fa fa-list-ol"></i> Forms</a></li>
                    <li><a href="bootstrap-elements.php"><i class="fa fa-list-ul"></i> Bootstrap Elements</a></li>      
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                  <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Steve Miller<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <hr />
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="container">
            <div class="page-header">
                <h1 id="timeline">Employee Salary Calculation</h1>
            </div>
            <div class="row">
                <div class="col-sm-11">
                    <div class="card-box table-responsive">
                       <div ng-app="Stock" ng-controller="add">

                        <div name="product"> <!-- START OF product LIST -->



                         <table id="datatable-responsive"
                         class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                         width="100%">
                         <thead>
                             <tr>
                                 <th>Employee Name</th>
                                 <th>Basic Salary</th>
                                 <th>Month</th>
                                 <th>Year</th>
                                 <th>OT Hours</th>
                                 <th>OT Rate</th>

                             </tr>
                         </thead>
                         <tbody>
                             <?php

                             $emp_id="";
                             $sql1 = "SELECT * FROM emp_detail";
                             $result = mysqli_query($conn, $sql1);
                             while ($row = mysqli_fetch_array($result)) {

                                $emp_id=$row['emp_id'];
                                ?>

                                <tr>


                                    <td><?php echo $row['fname'] .$row['lname']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="month" ng-model="product.cl<?php echo $row['emp_id']; ?>.month">
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </td>
                                <td><select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="year" ng-model="product.cl<?php echo $row['emp_id']; ?>.year">
                                    <option value="17">2017</option>
                                    <option value="18">2018</option>
                                    <option value="19">2019</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                </select>
                            </td>
                            <td>

                                <input ng-model="product.cl<?php echo $row['emp_id']; ?>.hrs" name ="hrs" type="text" style="color:black" required>

                                <span class ="error"><?php //echo $hrsErr; ?></span>
                            </td>
                            <td>

                             <input ng-model="product.cl<?php echo $row['emp_id']; ?>.rate" name ="rate" type="text" style="color:black" required>
                              <input ng-model="product.cl<?php echo $row['emp_id']; ?>.empid" name ="empid" id="empid" type="hidden" ng-init="product.cl<?php echo $row['emp_id']; ?>.empid=<?php echo $row['emp_id']; ?>" ng-value="empid">
                             <span class ="error"><?php// echo $rateErr; ?></span>
                         </td>

                     </tr>                            

                     <?php
                 }




                 ?>
                 {{product}}
             </tbody>
         </table>
          <div class="row panel panel-default panel-body">
           <div class="col-md-6 col-md-offset-5">
            <input type="text" name="qs" id="qs" value={{product}} hidden />
            <button id="submit" type="submit" class="btn btn-default">Submit</button>
        </div>

    </div>
     </div>
 </div>
</div>
<div class="row">
    <div class="col-md-0">
    </div>
    <div class="col-md-10">


</div>
</div>
</div>
</div>

</div>
</form>
</div>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>

<script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/jszip.min.js"></script>
<script src="../assets/plugins/datatables/pdfmake.min.js"></script>
<script src="../assets/plugins/datatables/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../assets/plugins/datatables/dataTables.colVis.js"></script>
<script src="../assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="../assets/pages/datatables.init.js"></script>
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">

    $( "form" ).on( "submit", function( event ) {

        event.preventDefault();

        var data = $( this ).serializeArray() ;
        var qs = document.getElementById("qs").value;
        console.log(data);
        console.log(qs);
       $.ajax({
            type: "POST",
            url: './api/addSalary.php',
            data: {qs:qs},
            success: function(data)
            {
                JSalert();
            }
        });
        
    });


</script>

<script>

    var app = angular.module('Stock', []);
    app.controller('add', function($scope) {

    });
</script>




</body>
</html>
