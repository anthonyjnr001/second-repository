<?php
session_start();

include "../db.php";
include "../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;


$email_err = $password_err= ""; 
$email = $password= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["email"])) {
    $email_err = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_err = "Invalid email format"; 
    }
  }
  
  
   if (empty($_POST["password"])) {
    $password_err = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
   
  }
    
		
	$email = $link->real_escape_string($_POST['email']);
	$password = $link->real_escape_string($_POST['password']);

	
	
	if($email == "" || $password == ""){
		$msg = "Email or Password fields cannot be empty!";
		
	}else {
		

					$sql1 = "SELECT * FROM users WHERE email='$email'  AND password='$password'";

                 $result1 = $link->query($sql1);
                 if(mysqli_num_rows($result1) > 0){
                     $row = mysqli_fetch_array($result1);

					 $_SESSION['email'] = $email;
					

					header("location: ../account/");
					
					//send email



              require_once "../PHPMailer/PHPMailer.php";
              require_once '../PHPMailer/Exception.php';
              
              
              //PHPMailer Object
              $mail = new PHPMailer;
              
              //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
              //To address and name
              $mail->addAddress($email);
              $mail->addAddress("$email"); //Recipient name is optional
              
              //Address to which recipient will reply
              
              //Send HTML or Plain Text email
              $mail->isHTML(true);
              
              $mail->Subject = "Account Details";
              
              $mail->Body = '
              
              
               <div style="background: #f5f7f8;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 

<div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">




<div style="clear: both;"></div> 

<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<h1>Thank you for investing on '.$name.'</h1>

</div> </div> 

<div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
              
              
              
              
              
              Your account was logged in from '. '(IP: '.$ip.') on '.date("F j, Y, g:i a").', if you did not 
              login from this device, contact your account manager to secure your account.
              
        </p>

<div class="be_footer">
<div style="border-bottom: 1px solid #ccc;"></div>


<div class="be_bluebar" style="background: #1976d2; padding: 20px; color: #fff;margin-top: 10px;">

<p> Please do not reply to this email. Emails sent to this address will not be answered. 
Copyright ©2021 '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>      
              
              
              ';
              
              /*if($mail->send()) {
                
                  $msg =  "Message has been sent successfully!";
              }
                             
                         else{
                              $msg = "Something went wrong. Please try again later!";
                          }*/
                      
                  }else{
                      $msg = "Email or password is incorrect!";
                  }
              
					
              
              
					
					
					
					
				
			
		}
		}
			 
		
		
	
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from forex-premium.com/login/index.phpa/c-c/login-pr/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 06:48:10 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Login to your Mycoinscape account and start placing trades. Safe and reliable trading provided by Mycoinscape.">
  <meta name="keywords" content="Mycoinscape, Binary Options Trading, Forex Trading, CFD Trading, Online Trading, Bitcoin Trading">
  <meta name="author" content="Mycoinscape">
  <title>Login - </title>
  
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
  <link rel="shortcut icon" type="image/x-icon" href="https://Breakoutsfx.com/app-assets/images/ico/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
  rel="stylesheet">
  
  <link href="https://Breakoutsfx.com/maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/login/assets/css/style.css">
  <!-- END Custom CSS-->
   <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


  <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-color: #341E60;" class="vertical-layout vertical-content-menu 1-column   menu-expanded blank-page blank-page"
data-open="click" data-menu="vertical-content-menu" data-col="1-column">
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-11 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="https://mycoinscape.com/images/22logo.png" alt="logo" style="width: 170px; margin-top: -15px;">
                  </div> <br>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-4 pt-2">
                    <span><strong>
Members Login</strong></span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

  <?php if($msg != "") echo "<div class='alert alert-danger'>$msg</div>";  ?>
													<?php if(isset($_GET['success']) && $msg == "") echo "<div class='alert alert-success'> You have successfully registered. Kindly login.</div>" ."</br>";  ?>

                    <form class="form-horizontal form-simple" action="" method="post" enctype="multipart/form-data">

                      <fieldset class="form-group position-relative has-icon-left mb-1">
                      
                        <input type="email" name="email" class="form-control form-control-lg input-lg" placeholder="Email" required>
                        <div class="form-control-position">
                          <i class="fa fa-envelope"></i>
                        </div>
                      </fieldset>

                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" class="form-control form-control-lg input-lg" placeholder="Password" required>
                        <div class="form-control-position">
                          <i class="fa fa-key"></i> 
                        </div>
                      </fieldset>

                      <button type="submit" class="btn btn-outline-success btn-lg btn-block"><i class="fa fa-lock"></i> Login</button> 

                    </form>

                  </div>
                  
                  <div class="card-footer">
                    <div class="">
                      <p class="float-sm-left text-center m-0">
			                <a href="fpass.php" class="card-link text-success">Reset Password</a>
			                </p<br/>
                      <p class="float-sm-right text-center m-0"><a href="signup.php" class="card-link text-success">Sign Up</a></p>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <!-- BEGIN VENDOR JS-->
  <script src="https://Breakoutsfx.com/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="https://Breakoutsfx.com/app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="https://Breakoutsfx.com/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="https://Breakoutsfx.com/app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="https://Breakoutsfx.com/app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="https://Breakoutsfx.com/app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from forex-premium.com/login/index.phpa/c-c/login-pr/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 06:48:32 GMT -->
</html>
