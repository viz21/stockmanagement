
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Weligama Distributors</title>

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
                        <li><a href="retailerDetailsTable.php"><i class="fa fa-bullseye"></i> Retailer Details Table</a></li>
                        <li class="selected"><a href="forms.php"><i class="fa fa-bullseye"></i> Forms</a></li>
 
                      <!--   <li ><a href="update.php"><i class="fa fa-bullseye"></i> Update</a></li>  -->
                        <!-- <li ><a href="retailerStocksTable.php"><i class="fa fa-bullseye"></i> Retailer Stocks table</a></li>-->
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
                <div class="col-lg-6">

                    <form role="form">

                        <div class="form-group">
                            <label>Text Input</label>
                            <input class="form-control">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>

                        <div class="form-group">
                            <label>Text Input with Placeholder</label>
                            <input class="form-control" placeholder="Enter text">
                        </div>

                        <div class="form-group">
                            <label>Static Control</label>
                            <p class="form-control-static">email@example.com</p>
                        </div>

                        <div class="form-group">
                            <label>File input</label>
                            <input type="file">
                        </div>

                        <div class="form-group">
                            <label>Text area</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                         <div class="form-group">
                            <label>Checkboxes</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox  1
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox  2
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Checkbox  3
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Inline Checkboxes</label>
                            <label class="checkbox-inline">
                                <input type="checkbox">
                                1
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox">
                                2
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox">
                                3
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Radio Buttons</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                    Radio  1
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                    Radio  2
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                                    Radio  3
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Inline Radio Buttons</label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>
                                1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">
                                2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">
                                3
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Selects</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Multiple Selects</label>
                            <select multiple class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Submit Button</button>
                        <button type="reset" class="btn btn-default">Reset Button</button>

                    </form>

                </div>
                <div class="col-lg-6">
                    <h1>RETAILER DETAILS</h1>

                    <form role="form">

                        <fieldset disabled>

                            <div class="form-group">
                                <label for="disabledSelect">Disabled input</label>
                                <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                            </div>

                            <div class="form-group">
                                <label for="disabledSelect">Disabled select menu</label>
                                <select id="disabledSelect" class="form-control">
                                    <option>Disabled select</option>
                                </select>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                    Disabled Checkbox
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary">Disabled Button</button>

                        </fieldset>

                    </form>

                    <h1>Form Validation</h1>

                    <form role="form">

                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess">Input with success</label>
                            <input type="text" class="form-control" id="inputSuccess">
                        </div>

                        <div class="form-group has-warning">
                            <label class="control-label" for="inputWarning">Input with warning</label>
                            <input type="text" class="form-control" id="inputWarning">
                        </div>

                        <div class="form-group has-error">
                            <label class="control-label" for="inputError">Input with error</label>
                            <input type="text" class="form-control" id="inputError">
                        </div>

                    </form>

                    <h1>Input Groups</h1>

                    <form role="form">
                        <div class="form-group input-group">
                            <span class="input-group-addon"> </span>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>

                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>    

</body>
</html>
