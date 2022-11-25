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
        $uprofit = round($row1['profit'],2);
        $refcode = $row1['refcode'];
       
        

    

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


                             
                      $sql= "SELECT * FROM investment WHERE email='$email' ORDER BY id DESC ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
			      $is_yes = 1;
				  while($row = mysqli_fetch_assoc($result)){   
					  
					 $pdate = $row['pdate'];
					 $duration = $row['duration'];
 $increase = $row['increase'];
 $usd = $row['usd'];
  $uid = $row['id'];
					 
$date = $row['pdate'];
$payday = $row['payday'];
$lprofit = $row['lprofit'];

$paypackage = new DateTime($payday);
 $payday = $paypackage->format('Y/m/d');

			
			if(isset($row['pdate']) &&  $row['pdate'] != '0' && isset($row['duration'])  && isset($row['increase'])  && isset($row['usd']) ){
			    
			    if($row['activate'] == 0){
			        $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $days=0;
			    }else{
			        
			    
         
          $endpackage = new DateTime($pdate);
          $endpackage->modify( '+ '.$duration. 'day');
 $Date2 = $endpackage->format('Y/m/d');
 $current=date("Y/m/d");

 $diff = abs(strtotime($Date2) - strtotime($current));
 $one = 1;

          $date3 = new DateTime($Date2);
           $date3->modify( '+'. $one.'day');
           $date4 = $date3->format('Y/m/d');

  $days=floor($diff / (60*60*24));
 
 
$daily = $duration - $days;

 $one = 1;
$f = date('Y-m-d', strtotime($Date2 . ' + '. $one.'day'));




if(isset($days) && $days == 0 || $Date2 == (date("Y/m/d")) || (date("Y/m/d")) >= $Date2  ){
    
    
    $percentage = ($increase/100) * $duration * $usd;
    $allprofit = $percentage - $lprofit;
       $pp =   $allprofit;   
       $ppr = $pp + $usd;
    
	$_SESSION['pprofit'] = $percentage;
	 $sql = "UPDATE users SET walletbalance = walletbalance + $ppr, profit = profit + $pp  WHERE email='$email'";
	 
	  $sql13 = "UPDATE investment SET activate = '0', profit = '$percentage', payday = '$current'  WHERE email='$email' AND id = '$uid'";
	 
	 
  if(mysqli_query($link, $sql)){
	mysqli_query($link, $sql13);
	
	$percentage = $pp = 0;
	
		$Date2 = 0;
	$current = 0;
	$duration = 0;

	$days = 'package completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
	$days = 0;

	$current = 0;
	$duration = 0;

  }
}else{
    
    if($payday == $current){
        
    }else{
        
    $percentage = ($increase/100) * $daily * $usd;
    
    $allprofit = $percentage - $lprofit;
    
     $sql131 = "UPDATE investment SET profit = '$percentage', payday = '$current', lprofit = '$percentage' WHERE email='$email' AND id = '$uid'";
      $sql21 = "UPDATE users SET walletbalance = walletbalance + $allprofit, profit = profit + $allprofit  WHERE email='$email'";
     
     mysqli_query($link, $sql131);
     mysqli_query($link, $sql21);
    }
     

}





     
$add="days";
			}    
 }
}
}

	


$sql211= "SELECT SUM(usd) as total_value FROM btc WHERE type = 'Withdrawal' AND email= '$email' and status= 'approved'";
$result211 = mysqli_query($link,$sql211);
$row11 = mysqli_fetch_assoc($result211);
if($row11['total_value'] != ""){
$wbtc1 = round($row11['total_value'],2);
}else{
$wbtc1 = 0;
}

 $sql1 = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result) > 0){

        $row1 = mysqli_fetch_assoc($result);
        $ubalance = round($row1['walletbalance'],2);
        $uprofit = round($row1['profit'],2);
    }




?>
<!doctype html>
            <html lang="en">
                <head>
                    <meta charset="utf-8" />
                    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

                    <title>Dashboard Mycoinscape</title>

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
                                      <li class="active">
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
                                        <a class="navbar-brand" href="#">Dashboard</a>
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
                                                    <p class="hidden-lg hidden-md">Dashboard</p>
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
                                                <div class="col-md-4">
                                                    <div class="card">

                                                        <div class="header">
                                                            <h4 class="title">Wallet Balance</h4>
                                                            <p class="category" >current available balance</p>
                                                        </div>
                                                        <div class="content" style="text-align: center">
                                                            <h1>$<?php echo $ubalance;?></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="card" >

                                                        <div class="header">
                                                            <h4 class="title">Total Earnings</h4>
                                                            <p class="category">total earnings</p>
                                                        </div>
                                                        <div class="content" style="text-align: center">
                                                            <h1>$<?php echo $uprofit;?></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="card">

                                                        <div class="header">
                                                            <h4 class="title">Total Withdrawn</h4>
                                                            <p class="category">total earnings withdrawn</p>
                                                        </div>
                                                        <div class="content" style="text-align: center">
                                                            <h1>$<?php echo $wbtc1;?></h1>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                             <div class="row">
                                             
          </br>
                                            
                                                <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <p>Referral Link</p>
                                                                    <input type="text" class="form-control" value="https://mycoinscape.com?ref=<?php echo $refcode;?>" id="myInputs" readonly>
                                                                    <button onclick="myFunctions()" class="btn btn-info btn-fill"> Copy Referral Link </button>
                                                                    <script>
                                                                    function myFunctions() {
                                                                    var copyText = document.getElementById("myInputs");
                                                                    copyText.select();
                                                                    document.execCommand("copy");
                                                                    alert("Copied referral link: " + copyText.value);
                                                                    }
                                                                    </script>
                                                                </div>
                                                             
                                                            </div>
                                               
                                                          
                                                      
                                             
                                            </div>
                                            
                              <br>
                               <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">

                                                <!-- Trading View Widget BEGIN -->
                                                <div class="tradingview-widget-container">
                                                    <div id="tradingview_c3b97" style="height:500px"></div>
                                                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                                                    <script type="text/javascript">
                                                        new TradingView.widget(
                                                                {
                                                                    "autosize": true,
                                                                    "symbol": "NASDAQ:AAPL",
                                                                    "timezone": "Etc/UTC",
                                                                    "theme": "light",
                                                                    "style": "1",
                                                                    "locale": "en",
                                                                    "toolbar_bg": "#f1f3f6",
                                                                    "enable_publishing": false,
                                                                    "withdateranges": true,
                                                                    "range": "ytd",
                                                                    "hide_side_toolbar": false,
                                                                    "allow_symbol_change": true,
                                                                    "details": true,
                                                                    "hotlist": true,
                                                                    "calendar": true,
                                                                    "news": [
                                                                        "stocktwits",
                                                                        "headlines"
                                                                    ],
                                                                    "container_id": "tradingview_c3b97"
                                                                }
                                                        );
                                                    </script>
                                                </div>
                                                <!-- Trading View Widget END -->

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
            