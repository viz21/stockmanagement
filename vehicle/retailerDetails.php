<?php
include("db.php");
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   

      <style>

        div {
            padding-bottom:30px;
            padding-top: 7px;
        }
     
     .error {
    color: #FF0000;
}


       
    </style>
</head>
<body>

<?php

          //  $userid = $_SESSION['userid'];

            $retailernameErr = $shopnameErr = $addressErr = $conumberErr = $mobnumberErr = $emailErr  = "";
            $retailername = $shopname = $address = $conumber = $mobnumber = $email = "";
     

             if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["retailername"])) {
                $retailernameErr = "Retailer Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["retailername"])) {
                $retailernameErr = "Only letters and white space allowed";
            } else {
                $retailername = test_input($_POST["retailername"]);
            }


        
            if (empty($_POST["shopname"])) {
                $shopnameErr = "Shop Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["shopname"])) {
                $shopnameErr = "Only letters and white space allowed";
            } else {
                $shopname = test_input($_POST["shopname"]);
            }

             if (empty($_POST["address"])) {
                $addressErr = "Address is required";
            } else {
                $address = test_input($_POST["address"]);
            }

             if (empty($_POST["conumber"])) {
                $conumberErr = "Telephone number is required";
            } else if (preg_match("/^[0-9]*$/", $_POST["conumber"])) {
                $scount = strlen($_POST["conumber"]);
                if ($scount < 10 or $scount > 10)
                    $conumberErr = "only 10 numeric values can add";
                else
                    $conumber = test_input($_POST["conumber"]);
            }
            else {
                $conumberErr = "Only numeric values can add";
            }

             if (empty($_POST["mobnumber"])) {
                $mobnumberErr = "Mobile number is required";
            } else if (preg_match("/^[0-9]*$/", $_POST["mobnumber"])) {
                $scount = strlen($_POST["mobnumber"]);
                if ($scount < 10 or $scount > 10)
                    $mobnumberErr = "only 10 numeric values can add";
                else
                    $mobnumber = test_input($_POST["mobnumber"]);
            }
            else {
                $mobnumberErr = "Only numeric values can add";
            }

             if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else {
                $email = test_input($_POST["email"]);
            }



        //database addition of data

             if ($retailernameErr == "" and  $shopnameErr == "" and  $addressErr== "" and  $conumberErr== "" and  $emailErr== ""  ) {
                    $retailerid = "";
                    $sql = "Insert INTO retailerdetails(RetailerName,ShopName,Address,CoNumber,MobNumber,Email) VALUES('$retailername','$shopname','$address','$conumber','$mobnumber','$email')";
                    $result = mysqli_query($conn, $sql);
                       if ($result) {
                    echo "Successfully Created";
                    //header('Location:admin_dash.php');
                } else
                    echo "error" . mysqli_error($conn);

            }
        }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }


  ?>





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
                        <li class ="selected"><a href="retailerDetails .php"><i class="fa fa-bullseye"></i> Retailer Details</a></li>
                        <li><a href="retailerDetailsTable.php"><i class="fa fa-bullseye"></i> Retailer Details Table</a></li>
                        <li><a href="forms.php"><i class="fa fa-bullseye"></i> Forms</a></li>
                        <li><a href="bootstrap-elements.php"><i class="fa fa-bullseye"></i> Bootstrap Elements</a></li>  
                         <li><a href="update.php"><i class="fa fa-bullseye"></i> Update</a></li>   
                      <li><a href="RetailerCreditsTable.php"><i class="fa fa-bullseye"></i> Retailer Credits Table</a></li>
 
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
           <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <h1>Retailer Details</h1>
        </div>
        <div>
            <label for="Retailername" class="col-md-3">
                Retailer Name:
            </label>
            <div class="col-md-8">
                <input type="text" name="retailername" class="form-control"  placeholder="Enter First Name"   value="<?php echo htmlspecialchars($retailername);?>"><span class="error"><?php echo $retailernameErr;?></span>
            </div>
            <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>        
        <div>
            <label for="Shopname" class="col-md-3">
                Shop Name:
            </label>
            <div class="col-md-8">
                <input type="text" name="shopname" class="form-control"  placeholder="Enter Shop Name"  value="<?php echo htmlspecialchars($shopname);?>"><span class="error"><?php echo $shopnameErr;?></span>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
       
        <div>
            <label for="Addresss" class="col-md-3">
                Addresss :
            </label>
            <div class="col-md-8">
                <input type="text" name="address" class="form-control"  placeholder="Enter the Addresss"  value="<?php echo htmlspecialchars($address);?>"><span class="error"><?php echo $addressErr;?></span>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
        <div>
            <label for="Telephone" class="col-md-3">
                Telephone number:
            </label>
            <div class="col-md-8">
                <input type="text" name="conumber" class="form-control"  placeholder="Enter the Telephone number "  value="<?php echo htmlspecialchars($conumber);?>"><span class="error"><?php echo $conumberErr;?></span>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
          <div>
            <label for="Mobile" class="col-md-3">
                Mobile number:
            </label>
            <div class="col-md-8">
                <input type="text" name="mobnumber" class="form-control" placeholder="Enter Mobile number"  value="<?php echo htmlspecialchars($mobnumber);?>"><span class="error"><?php echo $mobnumberErr;?></span>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
        </div>
        <div>
            <label for="emailaddress" class="col-md-3">
                  Email address:
            </label>
            <div class="col-md-8">
                <input type="email" name="email" class="form-control"  placeholder="Enter email address"  value="<?php echo htmlspecialchars($email);?>"><span class="error"><?php echo $emailErr;?></span>
                <p class="help-block">
                    Example: yourname@domain.com
                </p>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
          
             
       

    </div>  
        
            
    </div> 
    <div class="row text-center">
    <button type="submit" class="btn btn-primary">Submit Button <i class="fa fa-user-plus"></i></button>
    </div>                   

                 </body>
</html>
