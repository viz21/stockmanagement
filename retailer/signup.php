
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   
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
                        <li><a href="signup.php"><i class="fa fa-bullseye"></i> SignUp</a></li>
                        <li><a href="retailerDetails.php"><i class="fa fa-bullseye"></i> Retailer Details</a></li>
                        <li class="selected"><a href="retailerDetailsTable.php"><i class="fa fa-bullseye"></i> Retailer Details Table</a></li>
                        
                        <!-- <li ><a href="update.php"><i class="fa fa-bullseye"></i> Update</a></li>-->
                        <li ><a href="retailerStocksTable.php"><i class="fa fa-bullseye"></i> Retailer Stocks table</a></li>
                         <li ><a href="retailerPaymentTable.php"><i class="fa fa-bullseye"></i> Retailer Payments table</a></li>
                          <li ><a href="RetailerCreditsTable.php"><i class="fa fa-bullseye"></i> Retailer Credits table</a></li>
                           <li ><a href="RetailerBlackListTable.php"><i class="fa fa-bullseye"></i> Retailer Black List table</a></li>
   
   
   

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

        <div id="page-wrapper">

            <div class="row">

                <div class="col-lg-12 text-center v-center">

                    <h1>Sign Up</h1>
                    <p class="lead">Enter your email to sign-up for our newsletter</p>

                    <br>
                    <br>
                    <br>

                    <form class="col-lg-12">
                        <div class="input-group" style="width: 340px; text-align: center; margin: 0 auto;">
                            <input class="form-control input-lg" title="Confidential signup."
                                placeholder="Enter your email address" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-lg btn-primary" type="button">OK</button></span>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="text-center">
                <h1>Follow us</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center v-center" style="font-size: 39pt;">
                    <a href="#"><span class="avatar"><i class="fa fa-google-plus"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-linkedin"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-facebook"></i></span></a>
                    <a href="#"><span class="avatar"><i class="fa fa-github"></i></span></a>
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->
    </div>    
</body>
</html>
