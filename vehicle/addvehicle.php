
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle </title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   

      <style>

        div {
            padding-bottom:20px;
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

       <div>
        <div class="row text-center">
            <h2>ADD Vehicle </h2>
        </div>
        <div>
            <label for="Vehicle ID" class="col-md-2">
                Vehicle ID:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="Vehicle ID" placeholder="Enter Vehicle ID">
            </div>
            <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>        
        <div>
            <label for="Vehicle number " class="col-md-2">
                Vehicle number:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="Vehicle number" placeholder="Enter Vehicle number">
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
           <div>
            <label for="Vehicle type" class="col-md-2">
                Vehicle type:
            </label>
            <div class="col-md-9">
                <select name="Vehicle type" id="Vehicle type" class="form-control">
                    <option>--Please Select--</option>
                    <option>Bike</option>
                    <option>Car</option>
                    <option>Van</option>
                    <option>lorry</option>
                    <option>Others</option>
                </select>
            </div>            
        </div>
        <div>
            <label for="Vehicle size" class="col-md-2">
                Vehicle size:
            </label>
            <div class="col-md-9">
                <select name="Vehicle size" id="Vehicle size" class="form-control">
                    <option>--Please Select--</option>
                    <option>Small</option>
                    <option>Medium</option>
                    <option>large</option>
                    <option>None</option>
                </select>
            </div>            
        </div>
        <div>
            <label for="Fuel type" class="col-md-2">
                Fuel type:
            </label>
            <div class="col-md-9">
                <select name="Fuel type" id="Fuel type" class="form-control">
                    <option>--Please Select--</option>
                    <option>Diesel</option>
                    <option>Petrol</option>
                </select>
            </div>            
        </div>
    
    
     
       
        
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary btn-lg">
                    ADD
                </button>
            </div>
        </div>
    </div>  
    </div>

</body>
</html>
