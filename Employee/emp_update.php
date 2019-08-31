<?php
include "db.php"
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE Employee</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>   

      <style>

        div {
            padding-bottom:20px;
        }
        .error {color: #ff0000;}
    </style>
</head>
<body>
<?php

    $emp_id =(int)$_GET["emp_id"];
        
            $fname = $lname = $address = $telephone = $pos_id = $nic = $sal = $email = $gender = $posname = "";
            $fnameErr = $lnameErr = $addressErr = $telephoneErr = $pos_idErr = $nicErr = $salErr = $emailErr = $genderErr = $posnameErr = "";

     $sql3 = "SELECT * from emp_detail where emp_id=$emp_id";

            $result = mysqli_query($conn, $sql3);


            $row = mysqli_fetch_array($result);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['address'];
            $telephone = $row['telephone'];
            $pos_id = $row['pos_id'];
            $sal = $row['salary'];
            $email = $row['email'];
            $nic = $row['nic'];
            $gender = $row['gender'];
            

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
                $fnameErr = "First Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["firstname"])) {
                $fnameErr = "Only letters and white space allowed";
            } else {
                $fname = test_input($_POST["firstname"]);
            }

        if (empty($_POST["lastname"])) {
                $lnameErr = "Last Name is required";
            } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST["lastname"])) {
                $lnameErr = "Only letters and white space allowed";
            } else {
                $lname = test_input($_POST["lastname"]);
            }

        if (empty($_POST["address"])) {
                $addressErr = "Address is required";
            } else {
                $address = test_input($_POST["address"]);
            }

        if (empty($_POST["telephone"])) {
                $telephoneErr = "Telephone number is required";
            } else if (preg_match("/^[0-9]*$/", $_POST["telephone"])) {
                $scount = strlen($_POST["telephone"]);
                if ($scount < 10 or $scount > 10)
                    $telephoneErr = "only 10 numeric values can add";
                else
                    $telephone = test_input($_POST["telephone"]);
            }
            else {
                $telephoneErr = "Only numeric values can add";
            }

        if (empty($_POST["position"])) {
                $pos_idErr = "Position is required";
            } else {
                $pos_id = test_input($_POST["position"]);
            }

         if ($_POST["position"] == 1) {
                $posname = "Cashier";
            } else if($_POST["position"] == 2) {
                $posname ="Operator";
            } else if($_POST["position"] == 3) {
                $posname ="Labourer";
            } else if($_POST["position"] == 4) {
                $posname ="Sales Representative";
            } else if($_POST["position"] == 5) {
                $posname ="Stock Keeper";
            }    

        if (empty($_POST["basicsal"])) {
                $salErr = "Basic Salary is required";
            } else {
                $sal = test_input($_POST["basicsal"]);
            }

        if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else {
                $email = test_input($_POST["email"]);
            }

         if (empty($_POST["nic"])) {
                $nicErr = "NIC Number is required";
            } else if (!preg_match("/^[0-9]*$/", $_POST["nic"])) {
                $nicErr = "Only letters and white space allowed";
            } else {
                $nic = test_input($_POST["nic"]);
            }

         $gender = test_input($_POST["gender"]);

         $emp_id=test_input($_POST["empID"]);


        if ($fnameErr == "" and  $lnameErr == "" and  $addressErr == "" and  $telephoneErr == "" and  $pos_idErr == "" and  $nicErr == "" and  $salErr == "" and  $emailErr == "" and $posname == "") {
                $sql = "UPDATE emp_detail SET fname='$fname',lname='$lname',address='$address',telephone='$telephone',pos_id='$pos_id',pos_name='$posname',salary='$sal',email='$email',nic='$nic',gender='$gender' where emp_id='$emp_id'";

                    $result1 = mysqli_query($conn, $sql);
                    if ($result1) {
                        echo "Successfully updated your details"; 
                        header('Location:./emp_details.php') ; 
                    } else
                        echo "error" . mysqli_error($conn);

            }   
            else{
                echo "methana";
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
                        <li><a href="signup.php"><i class="fa fa-list-ol"></i> SignUp</a></li>
                        <li><a href="register.php"><i class="fa fa-font"></i> Register</a></li>
                        <li class="selected"><a href="timeline.php"><i class="fa fa-font"></i> Table</a></li>
                        <li><a href="forms.php"><i class="fa fa-list-ol"></i> Forms</a></li>
                        <li><a href="emp_details.php"><i class="fa fa-list-ol"></i> Empolyee</a></li>
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
          <form class="form-horizontal" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
            <h2>Update Employee</h2>
        </div>
        <div>
            <label for="firstname" class="col-md-2">
                First Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo htmlspecialchars($fname);?>">
                <span class="error"><?php echo $fnameErr; ?></span>
            </div>

        </div>        
        <div>
            <label for="lastname" class="col-md-2">
                Last Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($lname);?>">
                <span class="error"><?php echo $lnameErr; ?></span>
            </div>
            
        </div>
        <div>
            <label for="address" class="col-md-2">
                Address:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo htmlspecialchars($address);?>">
                <span class="error"><?php echo $addressErr; ?></span>
            </div>
            
        </div>
        <div>
            <label for="telephone" class="col-md-2">
                Telephone:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="telephone" placeholder="Enter Telephone Number" value="<?php echo htmlspecialchars($telephone);?>">
                <span class="error"><?php echo $telephoneErr; ?></span>
            </div>
             
        </div>
        <div>
            <label for="position" class="col-md-2">
                Position:
            </label>
            <div class="col-md-9">
                 <select class="form-control" name="position" >
                                        <option value='1'>Cashier</option>
                                        <option value='2'>Operator</option>
                                        <option value='3'>Labourer</option>
                                        <option value='4'>Sales Representation</option>
                                        <option value='5'>Stock Keeper</option>
                                       
                                     </select>
                <span class="error"><?php echo $pos_idErr; ?></span>
            </div>
            
        </div>
        <div>
            <label for="nic" class="col-md-2">
                NIC:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="nic" placeholder="Enter NIC Number" value="<?php echo htmlspecialchars($nic);?>">
                <span class="error"><?php echo $nicErr; ?></span>
            </div>
             
        </div>
        <div>
            <label for="basicsal" class="col-md-2">
                Basic Salary:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="basicsal" placeholder="Enter Basic Salary" value="<?php echo htmlspecialchars($sal);?>">
                <span class="error"><?php echo $salErr; ?></span>
            </div>
            
        </div>
        <div>
            <label for="emailaddress" class="col-md-2">
                Email address:
            </label>
            <div class="col-md-9">
                <input type="email" class="form-control" name="email" placeholder="Enter email address" value="<?php echo htmlspecialchars($email);?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            
        </div>
        <div>
            <label for="sex" class="col-md-2">
                Gender:
            </label>
            <div class="col-md-10">
                <label class="radio">
                    <input type="radio" name="gender" value="male" required="required">
                    Male
                </label>
                <label class="radio">
                    <input type="radio" name="gender" value="female">
                    Female
                </label>
            </div>             
        </div>
       <input type="hidden" name="empID" class="form-control" value="<?php echo htmlspecialchars($emp_id);?>" hidden="hidden">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-primary btn-lg">
                UPDATE
                </button>
            </div>
        </div>
    </div>  
    </div>

</body>
</html>
