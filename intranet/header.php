<?php
session_start();

require 'admin/db/config.php';

$session_value = session_id();
$enrty_time=time();
$time_check=$enrty_time-60;

$query_del="DELETE FROM i_online WHERE TimeLog < '$time_check'";
$conn->query($query_del);


$check="SELECT * FROM i_online WHERE SessionID='$session_value'";
$result_check = $conn->query($check);

if(mysqli_num_rows($result_check)==0)
{
 
$query_insert="INSERT INTO i_online(SessionID, TimeLog) VALUES ('$session_value','$enrty_time')";
$conn->query($query_insert);

};



$Queryer_logo ="SELECT * FROM  i_logo WHERE ILogoID=1";
$Resulter_logo = $conn->query($Queryer_logo);
$Rower_logo = $Resulter_logo->fetch_assoc();

$Logo_file=$Rower_logo['ILImage'];

$Queryer_footer ="SELECT * FROM  i_footerlogo WHERE IFTRLOGID=1";
$Resulter_footer = $conn->query($Queryer_footer);
$Rower_footer = $Resulter_footer->fetch_assoc();

$footer_file=$Rower_footer['IFImage'];


$Queryer_general ="SELECT * FROM i_general WHERE IGID=1";
$Resulter_general = $conn->query($Queryer_general);
$Rower_general = $Resulter_general->fetch_assoc();

$C_color=$Rower_general['IGColor'];
$C_phone=$Rower_general['IGPhone'];
$C_email=$Rower_general['IGEmail'];
$C_address=$Rower_general['IGAddress'];


$Queryer_about ="SELECT * FROM i_about WHERE IAboutID=1";
$Resulter_about = $conn->query($Queryer_about);
$Rower_general = $Resulter_about->fetch_assoc();


$a_home=$Rower_general['IAHome'];
$a_about=$Rower_general['IAAbout'];


$afb=$Rower_general['IFB'];
$ainsta=$Rower_general['IInsta'];
$alinkedin=$Rower_general['ILinkedIn'];
$atwitter=$Rower_general['ITwitter'];
$ayoutube=$Rower_general['IYoutube'];

$live_query="SELECT * FROM i_online";
$resulter_live = $conn->query($live_query);
$live_count=mysqli_num_rows($resulter_live);

?>





 <!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- ========== Meta Tags ========== -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Internal">

    <!-- ========== Page Title ========== -->
    <title>Internal Website</title>

    <!-- ========== Favicon Icon ========== -->
        <link rel="shortcut icon" href="assets/img//favicon.ico" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/flaticon-set.css" rel="stylesheet" />
    <link href="assets/css/magnific-popup.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" />
    <link href="assets/css/bootsnav.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <link href="assets/css/datatables.min.css" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
 
 <style>
  .marquee {
  background: #EEEEEE;
  width: 800;
  margin: 0 auto;
  overflow: hidden;
  white-space: nowrap;
}

.marquee span {
  display: inline-block;
  font-size: 18px;
  position: relative;
  left: 100%;
  animation: marquee 20s linear infinite;
}
.marquee:hover span {
  animation-play-state: paused;
  color: #002147;
}

.marquee span:nth-child(1) {
  animation-delay: 0s;
}
.marquee span:nth-child(2) {
  animation-delay: 0.8s;
}
.marquee span:nth-child(3) {
  animation-delay: 1.6s;
}
.marquee span:nth-child(4) {
  animation-delay: 2.4s;
}
.marquee span:nth-child(5) {
  animation-delay: 3.2s;
}

@keyframes marquee {
  0%   { left: 100%; }
  100% { left: -100%; }
}



.course-details-area .tab-info .nav-pills li.active a {

background:<?php echo $C_color; ?>;
color: white

}



</style>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false" data-gr-c-s-loaded="true" cz-shortcut-listen="true" onload="Getcontactperson()">

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top 
    ============================================= -->
    <!-- End Header Top -->
    <section class="top-bar-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 logo">
                    <a href="index.php">
                        <img src="uploads/logo-image/<?php echo $Logo_file; ?>" class="logo img-responsive" alt="Logo" width="200" height"103">
                    </a>
                </div>
                 <div class="user-login text-right col-md-7">

                    <a href="mailto:info@internal" target="_top" style="background-color:<?php echo $C_color; ?>">
                        <i class="fas fa-envelope-open"></i> <?php echo $C_email; ?>
                    </a>
                    <a href="#000000000" style="background-color:<?php echo $C_color; ?>">
                        <i class="fas fa-phone"></i> <?php echo $C_phone; ?>
                    </a>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- Header 
    ============================================= -->
   <header id="home">
        <nav class="navbar navbar-default navbar-sticky bootsnav" style="background-color:<?php echo $C_color; ?>">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav" data-in="#" data-out="#">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li>
                            <a href="about.php">About</a>
                        </li>

                        <li>
                            <a href="news.php">News</a>
                        </li>

                        <li>
                            <a href="products.php">Products</a>
                        </li>

                        <li>
                            <a href="service.php">Services</a>
                        </li>
                        
                        <li>
                            <a href="clients.php">Clients</a>
                        </li>

                        <li>
                            <a href="keypersons.php">Key Person</a>
                        </li>

                        

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Circulars & Policies</a>
                            <ul class="dropdown-menu">
                                <li><a href="circulars.php">Circulars</a></li>
                                <li><a href="policies.php">Policies</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="holidays.php">Holidays</a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Gallery</a>
                            <ul class="dropdown-menu">
                                <li><a href="photo-gallery.php">Photo Gallery</a></li>
                                <li><a href="video-gallery.php">Video Gallery</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Downloads</a>
                            <ul class="dropdown-menu">
                                <li><a href="forms.php">Forms</a></li>
                                <li><a href="manual.php">User Manual</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="contact.php">Contact Us</a>
                        </li>


                        
                
                        

              
                    </ul>
                </div>
            </div>
        </nav>
    </header> 