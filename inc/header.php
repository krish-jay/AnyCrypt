<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">

    
<head>

        <!-- ==============================================
        Basic Page Needs
        =============================================== -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->

        <title>AnyCrypt</title>

        <meta name="description" content="Collection of Smart tools which are used to increase the vulnerability of the User's Uploaded Files">
        <meta name="subject" content="It also Provides the Cloud Storage for the Premium users and much more features">
        <meta name="author" content="Krish jay">
         <meta name="theme-color" content="#5900ff" />
        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="shortcut icon" href="assets/images/fav3.png">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- ==============================================
        Vendor Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/slider.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/vendor/icons.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animation.min.css">
        <link rel="stylesheet" href="assets/css/vendor/gallery.min.css">
        <link rel="stylesheet" href="assets/css/vendor/cookie-notice.min.css">

        <!-- ==============================================
        Custom Stylesheet
        =============================================== -->
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/theme-indigo.css">

        <!-- ==============================================
        Theme Settings
        =============================================== -->
        <style>
            :root {
                --header-bg-color: #040402;
                --nav-item-color: #f5f5f5;
                --hero-bg-color: #040402;

                --section-1-bg-color: #040402;
                --section-2-bg-color: #040402;
                --section-3-bg-color: #040402;
                --section-4-bg-color: #040402;
                --section-5-bg-color: #040402;
                --section-6-bg-color: #040402;
                --section-7-bg-color: #111111;
                --section-8-bg-color: #040402;
                 --section-9-bg-color: #111111;
                --footer-bg-color: #111111;
            }
        </style>
        <style type="text/css">
	#blah{
		width: 111px;
		height: 111px; 
		object-fit: cover;

	}
	#blah2{
		width: 111px;
		height: 111px; 
		object-fit: cover;

	}
	@media only screen and (max-width: 600px) {
		#blah{
		width: 100px;
		height: 120px;

	}
	#blah2{
		width: 100px;
		height: 120px;

	}
	}
</style>
    </head>
 <?php 
include 'inc/crypto.php';
include 'inc/db.php';
date_default_timezone_set('Asia/Kolkata');
function dtot($value)
{
  $date1=date("Y-m-d");
  $date1=strtotime($date1);
  $date2=strtotime($value);
$datediff= $date2-$date1;
return round($datediff / (60 * 60 * 24));
}

if (isset($_SESSION['aid'])) {
$session=$_SESSION['aid'];
function specialreq(){
    $sql=mysqli_query($conn,"SELECT * FROM users WHERE id='$session'");
    $s=mysqli_fetch_array($sql);
    $request=$s['request'];
    if($request>0)
    $request=$request-1;
    
    $nsp=mysqli_query($conn,"UPDATE users SET request='$request' WHERE id='$session'");
    return $request;   
}
 }
?>
    <body>
         <!-- Preloader -->
        <div data-timeout="1600" class="odd preloader counter">
            <div data-aos="fade-up" data-aos-delay="200" class="row justify-content-center text-center items">
                <div data-percent="100" class="radial">
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header id="header" class="odd">

            <!-- Navbar navbar navbar-expand-->
            <nav data-aos="zoom-out" data-aos-delay="800" class="navbar navbar-expand navbar-fixed aos-init aos-animate navbar-sticky visible">
                <div class="container header">

                    <!-- Navbar Brand-->
                    <a class="navbar-brand" href="index">
                        Any<i>C</i>rypt <i>(<i class="icon-lock"></i>)</i>
                        <!-- 
                            Custom Logo
                            <img src="assets/images/logo.svg" alt="Leverage">
                        -->
                    </a>
                    
                    <!-- Nav holder -->
                    <div class="ml-auto"></div>

                    <!-- Navbar Items -->
                    <ul class="navbar-nav items">
                        
                        <li class="nav-item">
                            <a href="index" onclick="window.location.href='index'" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a onclick="window.location.href='index#services'" href="#services" class="nav-link">Products <i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropdown">
                                    <a onclick="window.location.href='index#services'" class="nav-link" href="#services">View all </a>
                                    
                                </li>
                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" onclick="window.location.href='krishjay'" class="nav-link smooth-anchor">Contact</a>
                        </li>
                        <?php 
                        if (isset($_SESSION['aid'])) {
		$id=$_SESSION['aid'];
		$a=mysqli_query($conn,"SELECT * FROM users WHERE id='$id'");
		$j=mysqli_fetch_array($a);
		$name=$j['name'];
		echo '<li class="nav-item dropdown">
                            <a href="#" class="nav-link"><b><i class="icon-user" style="color:#5900ff;"></i>&nbsp;</b> '.$name.' <i class="icon-arrow-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item dropdown">
                                    <a data-toggle="modal" data-target="#console" style="color:#fff;" class="nav-link" href="#"><i style="color:#5900ff;" class="icon-screen-desktop"></i> &nbsp; Console</a>
                                    
                                </li>
                                 <li class="nav-item dropdown">
                                    <a data-toggle="modal" data-target="#settings" style="color:#fff;" class="nav-link" href="#"><i style="color:#5900ff;" class="icon-settings"></i> &nbsp; Settings</a>
                                    
                                </li>
                                 <li class="nav-item dropdown">
                                    <a style="color:#fff;" class="nav-link" href="logout"><i style="color:#5900ff;" class="icon-logout"></i>Logout</a>
                                    
                                </li>
                                
                            </ul>
                        </li>';
	}else{
		echo'<li id="session" class="nav-item">
                            <a href="#" data-toggle="modal" data-target="#sign" class="nav-link smooth-anchor">Login</a>
                        </li>';
	}
                        ?>
                    </ul>

                    <!-- Navbar Icons -->
                    <ul class="navbar-nav icons">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        
                    </ul>

                    <!-- Navbar Toggle -->
                    <ul class="navbar-nav toggle">
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
                                <i class="icon-menu m-0"></i>
                            </a>
                        </li>
                    </ul>

                   
                </div>
            </nav>

        </header>
        <?php if(isset($_SESSION['aid'])){
                                            $sess=$_SESSION['aid']; 
                                        }else{
                                            $sess="0";
                                        }
                                        $ip=getenv("REMOTE_ADDR");
                                        ?>