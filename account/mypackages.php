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
        $ubalance = round($row1['balance'],2);
        $uprofit = round($row1['profit'],2);
       
        

    

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

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>My Investment - Mycoinscape</title>

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
                        <li class="active">
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
                            <a class="navbar-brand" href="#">My Investment</a>
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
                                        <p class="hidden-lg hidden-md">My Investment</p>
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
                                                    <b>My Investment</b></p>
                                               
                                          <div class="row">
                                <div class="col-md-12">
                                    <div class="card ">
                                        <div class="header">
                                            <h4 class="title">My Investment</h4>
                                            
                                        </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                        <thead>
                                        <th>Daily Profit</th>
							<th>Total Profit</th>
              <th>Activation Date</th>
              <th>End Date</th>
							<th>Days To End</th>
							<th>Amount Invested</th>
							<th>Status</th>
                                        </thead>
                                            <tbody>
                                            <?php 
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





 
 


?>

<?php


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
if(isset($_SESSION['pprofit'])){

  $profit = $_SESSION['pprofit'];
}else{
  //session_destroy($_SESSION['pprofit']);
  $profit = "";
}
 



$sql40= "SELECT * FROM investment WHERE email='$email' AND id = '$uid'";
			  $result40 = mysqli_fetch_assoc(mysqli_query($link,$sql40));
			  $percentage = $result40['profit'];
   

if(isset($result40['activate']) &&  $result40['activate']== '1'){
	
	$mim = 1;
	$sec = 'Active &nbsp;&nbsp;<i style="background-color:green;color:#fff; font-size:20px;" class="fa  fa-refresh" ></i>';

}else{
    $mim = 0;
$sec ='Completed &nbsp;&nbsp;<i style="color:green; font-size:20px;" class="fa  fa-check" ></i>';
}
		?>
                                            <tr class="primary">

                                            <td><?php echo $row['increase'];?>%</td>
							<td>$<?php echo $percentage;?></td>
							<td><?php echo $date;?></td>
							<td><?php echo $Date2;?></td>
								<td><?php echo $days;?></td>
							<td>$<?php echo $usd;?></td>
							<td><?php echo $sec ;?></td>


						</tr>
                        <?php
 }
			  }else{
                  $is_yes = 0;
              }
			  ?>
                                            </tbody>
                                        </table>

                                    </div>
                                               <?php if($is_yes==0){ echo " <center><b>You have no investment.</b></center><br>";} ?>                                </div>
                                </div>
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
