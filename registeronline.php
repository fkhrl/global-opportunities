<?php
session_start();
include('./adminpanel/class/db_Class.php');
$obj = new db_class();
include('./adminpanel/plugin/plugin.php');
$plugin = new cmsPlugin();
$table = 'enquiry';
if (isset($_POST['submit'])) {
    extract($_POST);
    //print_r($_POST);
    //exit();
    if (!empty($name) && !empty($email) && !empty($phone)  && !empty($requirements)) {
        $insert = array('name' => $name, 'email' => $email, 'phone' => $phone,
            'requirements' => $requirements, 'date' => date('Y-m-d'), 'status' => 1);
        if ($obj->insert($table, $insert) == 1) {
             //mail shaiful1408@gmail.com
            $to      = 'shaiful1408@gmail.com';
            $subject = 'Citi new request information';
            $message = 'Name:    '.$name."\r\n";
            $message.= 'Phone:   '.$phone. "\r\n";
            $message.= 'Message: '.$requirements. "\r\n";

            $headers = 'From: Chiti' . "\r\n".
                'Reply-To:'.$email . "\r\n".
                'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
            $plugin->Success("Your message has been sent successfully. Thanks", $obj->filename());
        } else {
            $plugin->Error("Failed", $obj->filename());
        }
    } else {
        $plugin->Error("Fields is Empty", $obj->filename());
    }
}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>
            Registration on line-Global-Opportunities.net
        </title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css" />
        <link rel="icon" href="assets/images/favicon.png" sizes="32x32" type="image/png" />
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
        <link rel="stylesheet" href="assets/css/animate.css" />
        <link rel="stylesheet" href="assets/css/jquery-ui.css" />
        <link rel="stylesheet" href="assets/css/simple-line-icons.css" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/icon-font.css" />
        <link rel="stylesheet" href="assets/css/educa.css" />
        <link rel="stylesheet" href="assets/rs-plugin/css/settings.css" />

        <link href="css/ApplyOnline/css/bootstrap.min.css" rel="stylesheet">
        
<script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>

        <div class="sidebar-menu-container"  id="sidebar-menu-container">

            <div class="sidebar-menu-push">

                <div class="sidebar-menu-overlay"></div>

                <div class="sidebar-menu-inner">

                    <header class="site-header">
                        <?php include('include/header.php'); ?>
                    </header>

                    <div class="page-heading register-heading">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>Register Now</h1>
                                    <span></span>
                                    <div class="page-list">
                                        <ul>
                                            <li class="active"><a href="index.php">Home</a></li>
                                            <li><i class="fa fa-angle-right"></i></li>
                                            <li><a href="#">Register Online</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <section class="contact-form">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="message-form">
                                        <div class="widget-heading">
                                            <h4>Register Now</h4>
                                        </div>

                                        <div class="row" style="padding-left: 35px; padding-right: 35px;">
                                            <br />
                                            <?php echo $plugin->ShowMsg(); ?>
                                            <div class="col-md-12 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                                                <form method="post" action="" id="myform">

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-6">
                                                                <span id="ctl00_ContentPlaceHolder1_lblError" style="color:Red;font-size:14px;font-weight:bold;"></span>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <label for="name">Name</label>
                                                                <input name="name" type="text" id="name" class="form-control" />
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label for="email">Email</label>
                                                                <input name="email" type="text" id="email" class="form-control" />
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label for="phone"> Mobile &amp; Phone:</label>
                                                                <input name="phone" type="text" id="phone" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-6">
                                                                <label for="country">Your Message:</label>
                                                                <textarea name="requirements" rows="4" cols="20" id="requirements" class="form-control"></textarea>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-8 col-sm-6">
                                                                
                                                                <div class="g-recaptcha" data-sitekey="6Lf0fTMUAAAAAKooCcK7-cbrpQquDHn_ngPUT0te" style="width: 50px !important;margin-bottom: 20px;"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-6">

                                                            <button name="submit" type="submit" class="btn  btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                    
                                                </form>

                                            </div>
                                            <!--/.col-md-4-->

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>

                    <!-- <div id="call-to-action">
                        <div class="container">
                            <div class="row">
                                <p>"Education levels the playing field, allowing everyone to compete."</p>
                                <div class="accent-button">
                                    <a href="registeronline.php">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <footer>
                        <?php include_once './include/footer.php'; ?>
                    </footer>

                    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

                </div>

            </div>

            <?php include_once './include/mbl_menu.php'; ?>
        </div>



        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>

        <!-- Google Map Init-->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            function initialize() {
                var mapCanvas = document.getElementById('map');
                var mapOptions = {
                    center: new google.maps.LatLng(44.5403, -78.5463),
                    zoom: 8,
                    scrollwheel: false,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
                var map = new google.maps.Map(mapCanvas, mapOptions)
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        

        <script src="css/ApplyOnline/js/jquery.js"></script>
        <script src="css/ApplyOnline/js/bootstrap.min.js"></script>
        <script src="css/ApplyOnline/js/owl.carousel.min.js"></script>
        <script src="css/ApplyOnline/js/mousescroll.js"></script>
        <script src="css/ApplyOnline/js/smoothscroll.js"></script>
        <script src="css/ApplyOnline/js/jquery.prettyPhoto.js"></script>
        <script src="css/ApplyOnline/js/jquery.isotope.min.js"></script>
        <script src="css/ApplyOnline/js/jquery.inview.min.js"></script>
        <script src="css/ApplyOnline/js/wow.min.js"></script>
        <script src="css/ApplyOnline/js/main.js"></script>

    </body>

</html>