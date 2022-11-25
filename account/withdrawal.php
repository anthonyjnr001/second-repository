<?php


session_start();




include "../db.php";
include "../config.php";

$msg = "";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$date = date('Y-m-d H:i:s');

if(isset($_SESSION['email'])){

    $email = $link->real_escape_string($_SESSION['email']);

    $sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result) > 0){

        $row1 = mysqli_fetch_assoc($result);
        $ubalance = round($row1['walletbalance'],2);
        $uprofit = round($row1['profit'],2);
        $username = $row1['username'];
       
        

    

    }else{
  
  
        header("location: ../login.php");
        }
}else{
    header('location: ../login.php');
    die();
}


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
      
      if(isset($_POST['send'])) {

   if (empty($_POST["amount"])) {
       $msg= "Amount is required";
     } else {
       $amount = $link->real_escape_string($_POST["amount"]);
      
     }
     if (empty($_POST["currency"])) {
       $msg= "Currency is required";
     } else {
       $mode = $link->real_escape_string($_POST["currency"]);
      
     }
     if (empty($_POST["wallet"])) {
      $msg= "Wallet address is required.";
    } else {
      $wallet = $link->real_escape_string($_POST["wallet"]);
     
    }

   

     if ($amount <= $ubalance) {
       
     }else{
         $msg= "Insufficient Fund!";
     }
     if ($amount < 7) {
        $msg= "Minimum withdrawal is $7!";
     }else{
        
     }


 

   
  
   if(empty($msg)){

   $sqlu = "UPDATE users SET walletbalance = walletbalance - '$amount' WHERE email = '$email'";
       if(mysqli_query($link, $sqlu)){
          
         
           $sqlu11 = "INSERT INTO btc (usd, email, account, mode, status, type, date) VALUES ('$amount', '$email', '$wallet', '$mode', 'pending', 'Withdrawal', '$date') ";
           if(mysqli_query($link, $sqlu11)){
               
               if($mode == "Perfect Money"){
                   $show = "account";
               }else{
                  $show = "wallet address"; 
               }
               	
		include_once "../PHPMailer/PHPMailer.php";
    require_once '../PHPMailer/Exception.php';
    
    $mail= new PHPMailer();
     $mail->setFrom($emaila);
   $mail->FromName = $name;
    $mail->addAddress($email, $username);
    $mail->Subject = "Withdrawal Request ";
    $mail->isHTML(true);
    $mail->Body = '
    
    
  <div style="background: #fff;width: 100%;height: 100%; font-family: sans-serif; font-weight: 100;" class="be_container"> 
 
 <div style="background:#fff;max-width: 600px;margin: 0px auto;padding: 30px;"class="be_inner_containr"> <div class="be_header">
 
 
 
 <div class="be_user" style="float: left"> <p>Dear: '.$usernamewtc.'</p> </div> 
 
 <div style="clear: both;"></div> 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <h1>Withdrawal Request</h1>
 
 </div> </div> 
 
 <div class="be_body" style="padding: 20px;"> <p style="line-height: 25px; color:#000;"> 
 
Your withdrawal request of amount $'.$amount.' has been sent to your '.$show.'.
 
 </p>
 
 <div class="be_footer">
 <div style="border-bottom: 1px solid #ccc;"></div>
 
 
 <div class="be_bluebar" style="background: #fff; padding: 20px; color: #000;margin-top: 10px;">
 
 <p>
 Copyright ©'.$cy.' '.$name.'. </p> <div class="be_logo" style=" width:60px;height:40px;float: right;"> </div> </div> </div> </div></div>';
     
    
    if($mail->send()){
  
      
    }
                echo "<script>
               alert('Your withdrawal has been sent successfully.\n
All withdrawals are processed in maximum 12 hours.\n
Thanks for choosing Mycoinscape');
               </script> ";
               $msg = "Your withdrawal has been sent successfully. 
All withdrawals are processed in maximum 12 hours.<br/>
Thanks for choosing Mycoinscape";
               
               
           }
          
   }

   }
  

}
      
      $sql1wth = "SELECT * FROM btc WHERE email = '$email' AND type = 'Deposit' AND status = 'approved'";
$resultwth = mysqli_query($link, $sql1wth);
if(mysqli_num_rows($resultwth) > 0){
while($row1wth = mysqli_fetch_assoc($resultwth)){

   if($row1wth['cointype'] == "Bitcoin"){
      $btcbal = 1;
   }else{
      $btcbal = 0;
   }
   if($row1wth['cointype'] == "Ethereum"){
      $ethbal = 1;
   }else{
      $ethbal = 0;
   }
   if($row1wth['cointype'] == "Bitcoin Cash"){
      $bitcashbal = 1;
   }else{
      $bitcashbal = 0;
   }
   if($row1wth['cointype'] == "BNB"){
      $bnbbal = 1;
   }else{
      $bnbbal = 0;
   }
   if($row1wth['cointype'] == "Smartchain BNB"){
      $smtbnbbal = 1;
   }else{
      $smtbnbbal = 0;
   }
   if($row1wth['cointype'] == "Litecoin"){
      $ltcbal = 1;
   }else{
      $ltcbal = 0;
   }
   if($row1wth['cointype'] == "Tron TRX"){
      $tronbal = 1;
   }else{
      $tronbal = 0;
   }
   if($row1wth['cointype'] == "Casmos ATOM"){
      $casbal = 1;
   }else{
      $casbal = 0;
   }
   if($row1wth['cointype'] == "Dash"){
      $dashbal = 1;
   }else{
      $dashbal = 0;
   }
   if($row1wth['cointype'] == "Zcash"){
      $zcashbal = 1;
   }else{
      $zcashbal = 0;
   }
   
   if($row1wth['cointype'] == "Waves"){
      $wavebal = 1;
   }else{
      $wavebal = 0;
   }
   if($row1wth['cointype'] == "Solana SOL"){
      $solanabal = 1;
   }else{
      $solanabal = 0;
   }
   if($row1wth['cointype'] == "Dogecoin"){
      $dogebal = 1;
   }else{
      $dogebal = 0;
   }
   if($row1wth['cointype'] == "Shiba INU ERC20"){
      $shibabal = 1;
   }else{
      $shibabal = 0;
   }
   if($row1wth['cointype'] == "Tether TRC20"){
      $tetherbal = 1;
   }else{
      $tetherbal = 0;
   }
   if($row1wth['cointype'] == "Tether ERC20"){
      $tetherercbal = 1;
   }else{
      $tetherercbal = 0;
   }
    if($row1wth['cointype'] == "Tether BEP20"){
      $tetherbepbal = 1;
   }else{
      $tetherbepbal = 0;
   }
   
   if($row1wth['cointype'] == "Cardano ADA"){
      $cardanobal = 1;
   }else{
      $cardanobal = 0;
   }
   if($row1wth['cointype'] == "Perfect Money"){
      $perfectbal = 1;
   }else{
      $perfectbal = 0;
   }
   
  
}
}

$sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result) > 0){

        $row1 = mysqli_fetch_assoc($result);
        $ubalance = round($row1['walletbalance'],2);
    }

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Withdrawal Mycoinscape</title>

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
                        <li class="active">
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
                            <a class="navbar-brand" href="#">Withdrawal</a>
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
                                        <p class="hidden-lg hidden-md">Withdrawal</p>
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
                                                    <b>Withdrawal</b></p>
                                               <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card">

                                                        <div class="header">
                                                            <h4 class="title">Wallet Balance</h4>
                                                            <p class="category">current available balance</p>
                                                        </div>
                                                        <div class="content" style="text-align: center">
                                                            <h1>$<?php echo $ubalance;?></h1>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="row">
                                             
          </br>
                                            
                                               <?php if($msg != "") echo "<div style='padding:20px;background-color:#dce8f7;color:black'> $msg</div class='btn btn-success'>" ."</br>";  ?>
                                                <form method="post">
                                        
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Amount ($)</label>
                                                                   <input type="double" name="amount" class="form-control" required />
                                                                   
                                                                </div>
                                                            </div>
                                                            
                                                                  <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Select currency</label>
                                                                   <select name="currency" class="form-control" required>
                                       <?php 
                                       
                                         $sql1wth = "SELECT * FROM btc WHERE email = '$email' AND type = 'Deposit' AND status = 'approved'";
$resultwth = mysqli_query($link, $sql1wth);
if(mysqli_num_rows($resultwth) > 0){
while($row1wth = mysqli_fetch_assoc($resultwth)){

   if($row1wth['cointype'] == "Bitcoin"){
      $btcbal = 1;
   }else{
      $btcbal = 0;
   }
   if($row1wth['cointype'] == "Ethereum"){
      $ethbal = 1;
   }else{
      $ethbal = 0;
   }
   if($row1wth['cointype'] == "Bitcoin Cash"){
      $bitcashbal = 1;
   }else{
      $bitcashbal = 0;
   }
   if($row1wth['cointype'] == "BNB"){
      $bnbbal = 1;
   }else{
      $bnbbal = 0;
   }
   if($row1wth['cointype'] == "Smartchain BNB"){
      $smtbnbbal = 1;
   }else{
      $smtbnbbal = 0;
   }
   if($row1wth['cointype'] == "Litecoin"){
      $ltcbal = 1;
   }else{
      $ltcbal = 0;
   }
   if($row1wth['cointype'] == "Tron TRX"){
      $tronbal = 1;
   }else{
      $tronbal = 0;
   }
   if($row1wth['cointype'] == "Casmos ATOM"){
      $casbal = 1;
   }else{
      $casbal = 0;
   }
   if($row1wth['cointype'] == "Dash"){
      $dashbal = 1;
   }else{
      $dashbal = 0;
   }
   if($row1wth['cointype'] == "Zcash"){
      $zcashbal = 1;
   }else{
      $zcashbal = 0;
   }
   
   if($row1wth['cointype'] == "Waves"){
      $wavebal = 1;
   }else{
      $wavebal = 0;
   }
   if($row1wth['cointype'] == "Solana SOL"){
      $solanabal = 1;
   }else{
      $solanabal = 0;
   }
   if($row1wth['cointype'] == "Dogecoin"){
      $dogebal = 1;
   }else{
      $dogebal = 0;
   }
   if($row1wth['cointype'] == "Shiba INU ERC20"){
      $shibabal = 1;
   }else{
      $shibabal = 0;
   }
   if($row1wth['cointype'] == "Tether TRC20"){
      $tetherbal = 1;
   }else{
      $tetherbal = 0;
   }
   if($row1wth['cointype'] == "Tether ERC20"){
      $tetherercbal = 1;
   }else{
      $tetherercbal = 0;
   }
    if($row1wth['cointype'] == "Tether BEP20"){
      $tetherbepbal = 1;
   }else{
      $tetherbepbal = 0;
   }
   
   if($row1wth['cointype'] == "Cardano ADA"){
      $cardanobal = 1;
   }else{
      $cardanobal = 0;
   }
   if($row1wth['cointype'] == "Perfect Money"){
      $perfectbal = 1;
   }else{
      $perfectbal = 0;
   }
   
                                      
  if($btcbal == 0){
   
 }else{
   echo "<option value='Bitcoin'> Bitcoin</option>";
 } 
 if($ethbal == 0){
  
 }else{
   echo "<option value='Ethereum'> Ethereum</option>";
 } 
  if($bitcashbal == 0){
   
 }else{
   echo "<option value='Bitcoin Cash'> Bitcoin Cash</option>";
 } 
  if($bnbbal == 0){
  
 }else{
   echo "<option value='BNB'> BNB</option>";
 } 
  if($smtbnbbal == 0){
  
 }else{
   echo "<option value='Smartchain BNB'>Smartchain BNB</option>";
 } 
  if($ltcbal == 0){
  
 }else{
   echo "<option value='Litecoin'>Litecoin</option>";
 } 
  if($tronbal == 0){
    
 }else{
   echo "<option value='Tron TRX'>Tron TRX</option>";
 } 
  if($casbal == 0){
    
 }else{
   echo "<option value='Casmos ATOM'>Casmos ATOM</option>";
 } 
  if($dashbal == 0){
  
 }else{
   echo "<option value='Dash'>Dash</option>";
 }
 
  if($zcashbal == 0){
  
 }else{
   echo "<option value='Zcash'>Zcash</option>";
 }
 
  if($wavebal == 0){
  
 }else{
   echo "<option value='Waves'>Waves</option>";
 }
  if($solanabal == 0){
  
 }else{
   echo "<option value='Solana SOL'>Solana SOL</option>";
 }
  if($dogebal == 0){
  
 }else{
   echo "<option value='Dogecoin'>Dogecoin</option>";
 }
 
 
  if($shibabal == 0){
  
 }else{
   echo "<option value='Shiba INU ERC20'>Shiba INU ERC20</option>";
 }
  if($tetherbal == 0){
  
 }else{
   echo "<option value='Tether TRC20'>Tether TRC20</option>";
 }
  if($tetherercbal == 0){
  
 }else{
   echo "<option value='Tether ERC20'>Tether ERC20</option>";
 }
  if($tetherbepbal == 0){
  
 }else{
   echo "<option value='Tether BEP20'>Tether BEP20</option>";
 }
   if($cardanobal == 0){
  
 }else{
   echo "<option value='Cardano ADA'>Cardano ADA</option>";
 }
   if($perfectbal == 0){
  
 }else{
   echo "<option value='Perfect Money'>Perfect Money</option>";
 }

 }}?>
                                                                   </select>
                                                                   
                                                                </div>
                                                            </div>
                                                                  <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label> Wallet/Account Address</label>
                                                                        <input type="text" name="wallet" class="form-control" required />
                                                                   
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
        <button type="submit" name="send" class="btn btn-info btn-fill pull-right">Withdraw</button>
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
