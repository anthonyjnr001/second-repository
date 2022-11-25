<?php
// Include config file
include "../db.php";
include "../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


 
// Define variables and initialize with empty values
$lname = $fname =$username = $email = $password = $cpassword = $phone = "";
$lname_err = $fname_err = $username_err = $email_err = $password_err = $cpassword_err = $phone_err =  "";



if(isset($_GET['ref'])){

    $refcode = $_GET['ref'];

}else {
    $refcode='';
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


      // Validate email
      if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
       // Validate username
      if(empty(trim($_POST["username"]))){
        $username_err = "Please enter an username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
	 // Validate name
	 if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter first name.";     
    }else{
        $fname = trim($_POST["fname"]);
    }
	if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter last name.";     
    }else{
        $lname = trim($_POST["lname"]);
    }

	
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $cpassword_err = "Please confirm password.";     
    } else{
        $cpassword = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $cpassword)){
            $cpassword_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err) && empty($fname_err) && empty($lname_err) && empty($cpassword_err) && empty($username_err)){
        

            $referred = $_POST['referred'];
             $refcode ='kllcabcdg19etsfjhdshdsh35678gwyjerehuhbdTSGSAWQUJHDCSMNBVCBNRTPZXMCBVN1234567890';
                $refcode = str_shuffle($refcode);
                 $refcode= substr($refcode,0, 10);
                 
                 if($referred!='')
{  
    
  $ref11usrid=$referred;
                        $qryusrref11 = "SELECT * FROM users WHERE refcode='$ref11usrid'";
                        $rslusrref11=mysqli_query($link, $qryusrref11);
                        $arrusrref11 =  mysqli_fetch_assoc($rslusrref11);
                        
                        $referred = $arrusrref11['refcode']."_";
                        
                        if($arrusrref11['referred']!='')
                          {
                            $exp_ref = explode("_", $arrusrref11['referred']);
                        $qryusrref22 = "SELECT * FROM users WHERE refcode='$exp_ref[0]' or refcode='$exp_ref[1]' or refcode='$exp_ref[2]'";
                        
                        $rslusrref22=mysqli_query($link, $qryusrref22);
                        $arrusrref22 =  mysqli_fetch_assoc($rslusrref22);
                        
                        $referred = $referred.$arrusrref22['refcode']."_";
                        
                            if($arrusrref22['referred']!='')
                            {
                                $exp_ref1 = explode("_", $arrusrref22['referred']);      
                        $qryusrref33 = "SELECT * FROM users WHERE refcode='$exp_ref1[0]' or refcode='$exp_ref1[1]' or refcode='$exp_ref1[2]'";
                        $rslusrref33=mysqli_query($link, $qryusrref33);
                        $arrusrref33 =  mysqli_fetch_assoc($rslusrref33);
                        
                        $referred = $referred.$arrusrref33['refcode']."_";
                            }
                          }
}
        // Prepare an insert statement
        $sql = "INSERT INTO users (fname, lname, email, username, password, refcode, referred ) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_fname, $param_lname, $param_email, $param_username, $param_password, $param_refcode, $param_referred );
			
            // Set parameters
			$param_fname = $fname;
			$param_lname = $lname;
            $param_email = $email;
            $param_username = $username;
            $param_password = $password;
            $param_refcode = $refcode;
            $param_referred = $referred;
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
              
require_once "../PHPMailer/PHPMailer.php";
require_once '../PHPMailer/Exception.php';


//PHPMailer Object
$mail = new PHPMailer;

    //From email address and name
        $mail->setFrom($emaila);
   $mail->FromName = $name;
              
 
$mail->addAddress("$email"); //Recipient name is optional

//Address to which recipient will reply

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Welcome Message";
$mail->Body = '
            <div style="background: #fff;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
 
 <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
 
 
 
 <div class="be_user" style="float: left"> <p>Dear: '.$username.'</p> </div> 
 
 <div style="clear: both;"></div> 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <h1>Welcome Message</h1>
 
 </div> </div> 
 
 <div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
 
 Hello welcome to mycoinscape,
 <br/><br/>
 Mycoinscape is the future of investment, invite your family and friends to join, and you will earn bonus.
 <br/><br/>
  Your funds are 100% safe with mycoinscape, we guarantee you a profitable investment.
 <br/><br/>
 Daily withdrawal:  Yes.<br/>
  Deposit withdrawal:  Yes.
 
 </p>
 
 <div class="be_footer">
 <div style="border-bottom: 1px solid #ccc;"></div>
 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <p>
 Copyright ©'.$cy.' '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
     


if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    $msg =  "We have sent a message to your Email";
}
           echo "<script>
           window.location.href='login.php?success';
           </script>";   
            } else{
                $msg = "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);

}

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from forex-premium.com/login/index.phpa/c-c/login-pr/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 06:48:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Login to your Mycoinscape account and start placing trades. Safe and reliable trading provided by Mycoinscape.">
  <meta name="keywords" content="Mycoinscape, Binary Options Trading, Forex Trading, CFD Trading, Online Trading, Bitcoin Trading">
  <meta name="author" content="Mycoinscape">
  <title>Signup</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700"
  rel="stylesheet">
 
<!--End of Tawk.to Script-->
  <link href="https://Breakoutsfx.com/maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/register/app-assets/css/vendors.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/register/app-assets/css/app.css">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/register/app-assets/css/core/menu/menu-types/vertical-content-menu.css">
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/register/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="https://breakoutsfx.com/register/app-assets/css/pages/login-register.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="https://Breakoutsfx.com/assets/css/style.css">
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
        <section class="sflexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-11 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="https://mycoinscape.com/images/22logo.png" alt="logo" style="width: 170px; margin-top: -15px;">
                  </div> <br>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-4 pt-2">
                    <span><strong>
 NEW ACCOUNT</strong></span>
                  </h6>
                </div>
                <div class="card-contents">
                  <div class="card-body">
 

                   	<form class="login100-form validate-form" action="" method="POST">
				<div class="wrap-input100 validate-input m-b-26" data-validate="First Name is required">
						<span class="label-input100">First Name</span>
						<input  class="form-control"  type="text" class="form-control" name="fname" placeholder="Enter First Name">
						<span style="color: red;"><?php echo $fname_err;?></span>
					</div>
					<br>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Last Name is required">
						<span class="label-input100">Last Name</span>
						<input  class="form-control"  type="text" class="form-control"  name="lname" placeholder="Enter Last Name">
						<span style="color: red;"><?php echo $lname_err;?></span>

					</div>
				
					<br>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input  class="form-control" type="text" name="username" placeholder="Enter username">
						<span style="color: red;"><?php echo $username_err;?></span>
					</div>
					<br/>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input  type="email" class="form-control"  name="email" placeholder="Enter Email">
					  <span style="color: red;"><?php echo $email_err;?></span>
					</div>
					<br>


					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input   class="form-control" type="password" name="password" placeholder="Enter password">
						  <span style="color: red;"><?php echo $password_err;?></span>
					</div>

                        <br/>
						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
						<input   class="form-control" type="password" name="cpassword" placeholder="Enter password">
						 <span style="color: red;"><?php echo $cpassword_err;?></span>
					</div>
				 <input type="hidden" name="referred" value="<?php echo $refcode;?>" />
					<hr>
					
									<!--	<div class="wrap-input100" ">
						<span class="label-input100">Upline</span>
						<input class="input100" type="text" name="t12" value="">
						<span class="focus-input100"></span>
					</div>-->
					
</br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn btn btn-sm btn-primary" >
							Create Account
						</button>
						
					</div>
					
				</form>
				
                  </div>
                  
                  <div class="card-footer">
                    <div class="">
                     
                      <p class="float-sm-right text-center m-0"><a href="https://mycoinscape.com/account/login.php" class="card-link text-success">Sign In</a></p>
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
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>

<!-- Mirrored from forex-premium.com/login/index.phpa/c-c/login-pr/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Jan 2021 06:48:32 GMT -->
</html>