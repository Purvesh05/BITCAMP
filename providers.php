<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
include "../includes/db.php";
include "../includes/function.php";
    ?>
<?php
if (isset($_POST['submit'])){
    if(!empty($_POST['need'])){
        foreach($_POST['need'] as $selected){
            $fetch = "SELECT * from provided where `sr.no`= '$selected';";
            $result = mysqli_query($conn,$fetch);

     
            
            

                
// Load Composer's autoloader
require 'vendor/autoload.php';
                


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    /*$mail->SMTPDebug = 2; */                                      // Enable verbose debug output
    $mail->isSMTP(true);                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sihnotifications@gmail.com';                     // SMTP username
    $mail->Password   = 'travisscott';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sihnotifications@gmail.com', 'AASHRAY');
    
    
    while($row = mysqli_fetch_array($result)){
                                    $phone = $row['phone'];
                                    $email_of_helper = $row['email'];
									$date = $row['date'];
									$disc= $row['disc'];
    
    $mail->addAddress($email_of_helper, 'provider');     // Add a recipient

    $body = '<p>please deliver the requirements</p>'." ".$disc ." before ".$date;

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Need for medicine';
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
    }
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 
}
}    
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ESIC</title>
	<meta name="description" content="Ela Admin - HTML5 Admin Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
	<link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
	<link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
	<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
	<link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

	<style>
		#weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }
        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
    </style>
</head>

<body>
	<!-- Left Panel -->
	<aside id="left-panel" class="left-panel">
		<nav class="navbar navbar-expand-sm navbar-default">
			<div id="main-menu" class="main-menu collapse navbar-collapse">
				<ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="firstHistory.php"><i class="menu-icon fa fa-laptop"></i>First History</a>
                    </li>
                    <li>
                        <a href="../SampleAvatar/index.php"><i class="menu-icon fa fa-laptop"></i>Treatment analysis</a>
                    </li>
                    <li class="active">
                        <a href="predict.php"><i class="menu-icon fa fa-laptop"></i>Appointment</a>
                    </li>
                    <li>
                        <a href="providers.php"><i class="menu-icon fa fa-laptop"></i>Select Providers</a>
                    </li>
                    <li>
                        <a href="helpline.php"><i class="menu-icon fa fa-laptop"></i>Help Line numbers</a>
                    </li>
                    <!--
                    <li>
                        <a href="request.php"><i class="menu-icon fa fa-laptop"></i>Request Medicine</a>
                    </li> -->
                </ul>
			</div><!-- /.navbar-collapse -->
		</nav>
	</aside>
	<!-- /#left-panel -->
	<!-- Right Panel -->
	<div id="right-panel" class="right-panel">
		<!-- Header-->
		<header id="header" class="header">
			<div class="top-left">
				<div class="navbar-header">
					<a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
					<a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
					<a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
				</div>
			</div>
			<div class="top-right">
				<div class="header-menu">
					

					<div class="user-area dropdown float-right">
						<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
						</a>

						<div class="user-menu dropdown-menu">
							<a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>


							<a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

							<a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
						</div>
					</div>

				</div>
			</div>
		</header>
		<!-- /#header -->
		<!-- Content -->
		<div class="content">
			<!-- Animated -->
			<div class="animated fadeIn">

				<!-- form -->
				<div class="container">
					<div class="row">
                        <h2>Select helpers</h2>
                        </div><br><br>
						
					<br><br>
					<div class="row">
					<form action="" method="post"> 
						<h2>Name of the providers</h2>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Phone no</th>
									<th>Date of need</th>
									<th>Requirement</th>
									<th>send mail</th>
								
									
								</tr>
							</thead>
							<tbody>
							<?php 
								
				$query = "select * from `provided`";
				$result = mysqli_query($conn,$query);
							$count = 0;
								while($row = mysqli_fetch_array($result)){
									$count = $row['sr.no'];
									$fname = $row['fname'];
									$lname = $row['lname'];
                                    $phone = $row['phone'];
									$date = $row['date'];
									$disc= $row['disc'];
									echo "<tr>";
									echo "<td>$fname $lname</td>";
									echo "<td>$phone</td>";
									echo "<td>$date</td>";
									echo "<td>$disc</td>";
                                    echo "<td><input type='checkbox' class='form-group' name='need[]' value = '" . $count . "'></td>";
                                    echo "</tr>";
    
									
								}
								
							?>
								
							</tbody>
							
						</table>
                       <div class="row">
					<div class="col-lg-12">
                    <input type="submit" class="btn btn-primary" name="submit" value="Send emails">
                        </div>
                    </div>
                        </form>
                        
                        
					</div>
					
					
				</div>
				<!-- form end -->

				<!-- /.content -->
				
				<!-- Footer -->
				<footer class="site-footer">
					<div class="footer-inner bg-white">
						<div class="row">
						</div>
					</div>
				</footer>
				<!-- /.site-footer -->
			</div>
		</div>
	</div>
	
	
	
	
	

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
	<script src="assets/js/main.js"></script>


</body>

</html>