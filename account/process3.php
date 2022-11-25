<?php


session_start();




include "../db.php";
include "../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if(isset($_SESSION['email'])){

    $email = $link->real_escape_string($_SESSION['email']);

    $sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result) > 0){

        $row1 = mysqli_fetch_assoc($result);
        $uprofit = round($row1['profit'],2);
        $referred = $row1['referred'];
        $username = $row1['username'];
       
        

    

    }else{
  
  
        header("location: ../login.php");
        }
}else{
    header('location: ../login.php');
    die();
}



if(isset($_POST['submit'])){

        $pname = $link->real_escape_string($_POST["pname"]);
         $amount = $link->real_escape_string($_POST["amount"]);
          $currency = $link->real_escape_string($_POST["currency"]);

        $sql12 = "SELECT * FROM package1 WHERE pname = '$pname' LIMIT 1";
    $result2 = mysqli_query($link, $sql12);
    if(mysqli_num_rows($result2) > 0){

        $row12 = mysqli_fetch_assoc($result2);
        $uincrease = $row12['increase'];
        $uduration = $row12['duration'];
        $ufrom = $row12['froms'];
        $uto = $row12['tos'];

    }
    
     $sql121 = "SELECT * FROM wallet WHERE name = '$currency' LIMIT 1";
    $result21 = mysqli_query($link, $sql121);
    if(mysqli_num_rows($result21) > 0){

        $row121 = mysqli_fetch_assoc($result21);
        $address = $row121['address'];

    }else{
        echo "
        <script> 
        alert('Inavlid currency selected!');
        window.location.href='packages.php';
        </script>;
        ";  
        
    }

    if($amount < $ufrom || $amount > $uto){

        echo "
        <script> 
        alert('Minimum amount for the selected plan is $".$ufrom." and maximum amount is $".$uto."');
        window.location.href='packages.php';
        </script>;
        ";

    }
     



}elseif(isset($_POST['send'])){


    

        if (empty($_POST["amount"])) {
            $msg= "Amount is required";
          } else {
            $uamount = $link->real_escape_string($_POST["amount"]);
           
          }
          if (empty($_POST["pname"])) {
            $msg= "Package name is required";
          } else {
            $upname = $link->real_escape_string($_POST["pname"]);
           
          }
          
            $ucurrency = $link->real_escape_string($_POST["currency"]);
         
           
           
      
            
       
        if(empty($msg)){
            $tnx = uniqid('tnx');
            $sql = "INSERT INTO btc (account,usd,cointype,email,status,tnxid,type,referred)
            VALUES ('$upname','$uamount','$ucurrency','$email','pending','$tnx','Deposit','$referred')";
            
            if (mysqli_query($link, $sql)) {
            
              include_once "../PHPMailer/PHPMailer.php";
              require_once '../PHPMailer/Exception.php';
            
              $mail= new PHPMailer();
              $mail->setFrom($emaila);
               $mail->FromName = $name;
              $mail->addAddress($email);
              $mail->Subject = "Deposit Alert!";
              $mail->isHTML(true);
              $mail->Body = '
           <div style="background: #fff;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
 
 <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
 
 
 
 <div class="be_user" style="float: left"> <p>Dear: '.$username.'</p> </div> 
 
 <div style="clear: both;"></div> 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <h1>Deposit Alert</h1>
 
 </div> </div> 
 
 <div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
 
 Your deposit of '.$uamount.' USD worth of '.$ucurrency.' is currently under review, your transaction ID is '.$tnx.' , your investment will be activated once your deposit is confirmed.
 
 </p>
 
 <div class="be_footer">
 <div style="border-bottom: 1px solid #ccc;"></div>
 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <p>
 Copyright ©'.$cy.' '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
     
            
            
            
              if($mail->send()){
            
                             
            
              }
            
             echo "<script>
                
                alert('Your deposit of ".$uamount." USD worth of ".$ucurrency." is currently under reviews, your transaction ID is ".$tnx." , your balance will be credited and your investment will be activated once your deposit is confirmed. ');
                window.location.href='history.php';
                </script>";
            
            
            
            
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }
    
        }
       
    
    



}else{

    header("location: packages.php");
}


    
    

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Process Payment Mycoinscape</title>

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
            <div class="sidebar">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

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
                         <li>
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
                            <a class="navbar-brand" href="#">Deposit</a>
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
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-dashboard"></i>
                                        <p class="hidden-lg hidden-md">Wallet</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="profile.php">
                                        <p>Account</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                                              

                                   
                            <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                <div class="content">

                                <p style="text-align: center;">
                                                    <b><?php echo $pname;?> Payment Process</b></p>
                                               
                                                <div class="row">
                                             
          </br>
                                            <?php 
                                            if($currency == "Perfect Money"){
                                                $addr = "Account ID";
                                                $crypt ="amount";
                                            }else{
                                                
                                                $addr = "Address";
                                                $crypt ="crypto";
                                            }
                                            ?>
                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <p>Make payment of <b>$<?php echo $amount;?></b> to the below <?php echo $currency;?> <?php echo $addr;?></p>
                                                                    <input type="text" class="form-control" value="<?php echo $address;?>" id="myInputs" readonly>
                                                                    <button onclick="myFunctions()" class="btn btn-info btn-fill"> Copy <?php echo $currency." ".$addr;?> </button>
                                                                    <script>
                                                                    function myFunctions() {
                                                                    var copyText = document.getElementById("myInputs");
                                                                    copyText.select();
                                                                    document.execCommand("copy");
                                                                    alert("Copied the <?php echo $addr;?>: " + copyText.value);
                                                                    }
                                                                    </script>
                                                                </div>
                                                                 <?php 
                                            if($currency == "Perfect Money"){
                                            }else{
                                                ?>
                                                                 <div class="form-group">
                                                                    <p>QR CODE </p>
                                                                 <img src="https://chart.googleapis.com/chart?chs=225x225&chld=L|2&cht=qr&chl=<?php echo $address;?>" alt="" class="img-fluid">
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                <form action="process3.php" method="post">
                                               <input type="hidden" value="<?php echo $pname;?>" name="pname" />
                                                                                              <input type="hidden" value="<?php echo $amount;?>" name="amount" />
                                                                                                  <input type="hidden" value="<?php echo $currency;?>" name="currency" />
                                                           
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                           <p>Send the <?php echo $crypt;?> to the copied <?php echo $addr;?>, click the deposited button after sending, do not click the button without sending the funds, your deposit will be approved after confirmation.</p>
        <button type="submit" name="send" class="btn btn-info btn-fill pull-left">Deposited</button>
                                                                </div>
                                                            </div>
                                                      
                                                            <hr/>

                                                            
        

        
                                                
                                            </form>
                                            </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            <center></center>
                          
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
