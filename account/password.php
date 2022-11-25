<?php


session_start();




include "../db.php";
include "../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;



if(isset($_SESSION['email'])){

    $email = $link->real_escape_string($_SESSION['email']);

    $sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result) > 0){

        $row1 = mysqli_fetch_assoc($result);
        $ubalance = round($row1['walletbalance'],2);
        $udate = $row1['date'];
        $uprofit = round($row1['profit'],2);
        $upassword = $row1['password'];
       
        

    

    }else{
  
  
        header("location: ../login.php");
        }
}else{
    header('location: ../login.php');
    die();
}



$pdbalance = 0;
$pdprofit = 0;
$percentage = 0;
$wbtc1 = 0;

 





$fname_err = $cpassword_err = $opassword_err = $password_err = "";

if(isset($_POST['submit'])){





  
  // Validate name
  if(empty(trim($_POST["opassword"]))){
    $opassword_err = "Please enter old password.";     
}else{
    $opassword =$link->real_escape_string( $_POST['opassword']);
}
 if(empty(trim($_POST["password"]))){
    $password_err = "Please enter new password.";     
}else{
    $password =$link->real_escape_string( $_POST['password']);
}

 if(empty(trim($_POST["cpassword"]))){
    $cpassword_err = "Please confirm password.";     
}else{
    $cpassword =$link->real_escape_string( $_POST['cpassword']);
}

if($opassword != $upassword){
    $opassword_err = "Wrong old password"; 
}

if(strlen($password) < 6){
    $password_err = "Password must have atleast 6 characters."; 
}
if($password != $cpassword){
    $cpassword_err = "Password did not match"; 
}

  
if(empty($cpassword_err) && empty($opassword_err) && empty($password_err)){


  
$sql = "UPDATE users SET password ='$password' WHERE email='$email'";
                    if (mysqli_query($link, $sql)) {
  
    
                 $msg= " Password changed successfully ";
  
                             }
    
                          }
                        }   
  





?>
<!doctype html>
            <html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

                    <title>Change Password Mycoinscape</title>

                    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
                    <meta name="viewport" content="width=device-width" />


                    <!-- Bootstrap core CSS     -->
                    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

                    <!-- Animation library for notifications   -->
                    <link href="assets/css/animate.min.css" rel="stylesheet"/>

                    <!--  Light Bootstrap Table core CSS    -->
                    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


                    <!--  CSS for Demo Purpose, don't include it in your project     -->
                    <link href="assets/css/demo.css" rel="stylesheet" />


                    <!--     Fonts and icons     -->
                    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
                    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
                    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
                </head>
                <body>

                    <div class="wrapper">
                        <div class="sidebar" >

                            <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                            <div class="sidebar-wrapper">
                                <div class="logo">
                                    <a href="../" class="simple-text">
                                        <img class="img-responsive" alt="logo" src="../assets/img/logo.png">
                                    </a>
                                </div>

                                <ul class="nav">
                                        <li>
                            <a href="./">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="pe-7s-user"></i>
                                <p>User Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="packages.php">
                                <i class="pe-7s-photo-gallery"></i>
                                <p>Deposit</p>
                            </a>
                        </li>
                        <li>
                            <a href="packages.php">
                                <i class="pe-7s-photo-gallery"></i>
                                <p>Investment plans</p>
                            </a>
                        </li>
                        <li>
                            <a href="mypackages.php">
                                <i class="pe-7s-photo-gallery"></i>
                                <p>My Investment</p>
                            </a>
                        </li>
                        <li>
                            <a href="history.php">
                                 <i class="pe-7s-graph"></i>
                                <p>History</p>
                            </a>
                        </li>
                         <li>
                            <a href="downline.php">
                                 <i class="pe-7s-graph"></i>
                                <p>Downline</p>
                            </a>
                        </li>
                         <li class="active">
                            <a href="password.php">
                                 <i class="pe-7s-key"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                        <li>
                                    <a href="withdrawal.php">
                                        <i class="pe-7s-cash"></i>
                                        <p>Withdrawal</p>
                                    </a>
                                </li>
                                    <li class="active-pro">
                                        <a href="logout.php">
                                            <i class="pe-7s-user"></i>
                                            <p>Logout</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="main-panel">
                            <nav class="navbar navbar-default navbar-fixed">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a class="navbar-brand" href="#">Change Password</a>
                                          <li>
                            <div id="google_translate_element" style="">

</div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>
                                    </div>
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li>
                                                <a href="">
                                                    <p>Account</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <p>Log out</p>
                                                </a>
                                            </li>
                                            <li class="separator hidden-lg hidden-md"></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>


                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h4 class="title">Change Password</h4>
                                                </div>
                                                <div class="content">
                                                    <form action="" method="post">
                                                    <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br>";  ?>
                                                    
                                                    
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Old Password</label>
                                                                    <input type="password" class="form-control" placeholder="Old Password" name="opassword" value="" required>
                                                                     <span style="color: red;"> <?php echo $opassword_err; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input name="password" type="password" class="form-control" placeholder="New Password" value="" required>
                                                                    <span style="color: red;"> <?php echo $password_err; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Confirm Password</label>
                                                                    <input name="cpassword" type="password" class="form-control" placeholder="Confirm Password" value="" required>
                                                                    <span style="color: red;"> <?php echo $cpassword_err; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                 
                                                        
                                                    
                                                        <hr>
                                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Update</button>
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                  

                                    </div>
                                </div>
                            </div>


                            <footer class="footer">
                                <div class="container-fluid">
                                    <p class="copyright pull-right">
                                        &copy; <script>document.write(new Date().getFullYear())</script> <a>Mycoinscape</a>
                                    </p>
                                </div>
                            </footer>

                        </div>
                    </div>


                </body>

                <!--   Core JS Files   -->
                <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
                <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

                <!--  Charts Plugin -->
                <script src="assets/js/chartist.min.js"></script>

                <!--  Notifications Plugin    -->
                <script src="assets/js/bootstrap-notify.js"></script>

                <!--  Google Maps Plugin    -->
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

                <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
                <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

                <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
                <script src="assets/js/demo.js"></script>

            </html>
            