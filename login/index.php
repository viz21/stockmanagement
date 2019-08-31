<?php
include("./db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Login | AE Crist Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="css/style.css">

	<script src="../bower_components/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
</head>

<body>
    <?php
	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM auth_details WHERE username='$username' and password='$pass'";
        echo $sql."\n";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
        if($row <> "" or $row <> null){
            $empname=$row['empname'];
            $type=$row['type'];
            switch ($type) {
                case 1:
                $_SESSION['user'] = $empname;
                header('Location: ../administrator/index.php');
                break;
                case 2:
                $_SESSION['user2'] = $empname;
                header('Location: ../finance/index.php');
                break;
                case 4:
                $_SESSION['user4'] = $empname;
                header('Location: ../Employee/index.php');
                break;
                case 5:
                $_SESSION['user5'] = $empname;
                header('Location: ../vehicle/index.php');
                break;
                case 6:
                $_SESSION['user6'] = $empname;
                header('Location: ../supplier/index.php');
                break;
                case 7:
                $_SESSION['user7'] = $empname;
                header('Location: ../stock/index.php');
                break;
                
                default:
                $_SESSION['user3'] = $empname;
                header('Location: ../retailer/index.php');
                break;
            }
            // user 2 is for finance manager
            //user 5 is for vehicle manager

        }
        else{
	 ?>
        <script type="text/javascript"> 
          swal({
            title: 'Access Denied!',
            text: "Please check the username and password",
            type: 'error',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
          }).then(function () {
          })
        </script>
        <?php
		
        }

    }
    ?>
    <div class="cont">
        <div class="demo">
            <div class="login">
                <div class="login__check"></div>
                <div class="login__form">
                 <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="login__row">
                        <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                        </svg>
                        <input type="text" name="username" class="login__input name" placeholder="Username"/>
                    </div>
                    <div class="login__row">
                        <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                        </svg>
                        <input type="password" name="password" class="login__input pass" placeholder="Password"/>
                    </div>
                    <button type="submit" class="login__submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

</body>
</html>
