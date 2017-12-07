<?php
session_start();
include './include/config.php';
$obj = new db_class();
$filter = $_GET['filter'];
$sqlcontact = $obj->FlyQuery("SELECT * FROM `contact`");

include('./adminpanel/plugin/plugin.php');
$plugin = new cmsPlugin();
$table = 'enquiry';
if (isset($_POST['submit'])) {
    extract($_POST);
    //print_r($_POST);
    //exit();
    $linkRedirect='';

    if(isset($_POST['sfil']))
    {
        $linkRedirect="?filter=".$_POST['sfil'];
    }
    if (!empty($name) && !empty($email) && !empty($phone)  && !empty($requirements)) {

        

       

        $insert = array('name' => $name, 'email' => $email, 'phone' => $phone,
            'requirements' => $requirements, 'date' => date('Y-m-d'), 'status' => 1);
        if ($obj->insert($table, $insert) == 1) {
            $plugin->Success("Your message has been sent successfully. Thanks", $obj->filename().$linkRedirect);
        } else {
            $plugin->Error("Failed", $obj->filename().$linkRedirect);
        }
    } else {
        $plugin->Error("Fields is Empty", $obj->filename().$linkRedirect);
    }
}
$cover_photo = $obj->FlyQuery("SELECT * FROM `cover_photo` WHERE `category_id` = '".$filter."' ORDER BY id DESC ");

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /><title>
	Contact Us
</title><meta name="description" content="xyz" /><meta name="keywords" content="xyz" /><meta name="robots" content="index, follow" /><meta property="og:title" content="xyz" /><meta property="og:site_name" content="xyz" /><meta property="og:url" content="xyz" /><meta property="og:description" content="xyz" /><meta property="article:author" content=" " /><meta property="article:publisher" content=" " /><meta property="og:locale" content="en" /><meta name="twitter:title" content="xyz" /><meta name="twitter:description" content="xyz." /><meta itemprop="title" content="xyz" /><meta itemprop="description" content="xyz" /><link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" /><link href="https://fonts.googleapis.com/css?family=Roboto:400,300,500,700" rel="stylesheet" type="text/css" /><link rel="icon" href="assets/images/favicon.png" sizes="32x32" type="image/png" /><link rel="stylesheet" href="assets/css/bootstrap.css" /><link rel="stylesheet" href="assets/css/animate.css" /><link rel="stylesheet" href="assets/css/jquery-ui.css" /><link rel="stylesheet" href="assets/css/simple-line-icons.css" /><link rel="stylesheet" href="assets/css/font-awesome.min.css" /><link rel="stylesheet" href="assets/css/icon-font.css" /><link rel="stylesheet" href="assets/css/educa.css" /><link rel="stylesheet" href="assets/rs-plugin/css/settings.css" />

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	

		<div class="sidebar-menu-container" id="sidebar-menu-container">

			<div class="sidebar-menu-push">

				<div class="sidebar-menu-overlay"></div>

				<div class="sidebar-menu-inner">

					<header class="site-header">
						<?php include_once("include/header.php"); ?>
					</header>

					<div id="search">
						<button type="button" class="close">×</button>
						<form>
							<input type="search" value="" placeholder="type keyword(s) here" />
							<button type="submit" class="btn btn-primary"><span>Search</span></button>
						</form>
					</div>
						<style type="text/css">
                        
                        .director-heading {
                            background-image: url(adminpanel/upload/<?php echo $cover_photo[0]->photo; ?>)
                        }
                    </style>
                <div class="page-heading director-heading">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?php echo $cover_photo[0]->title; ?></h1>
                                <span></span>
                                <div class="page-list">
                                    <ul>
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li><a href="#"><?php echo $cover_photo[0]->title; ?></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

					<section class="contact-info">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="contact-content">
										<div class="contact-item">
											<i class="fa fa-map-marker"></i>
											<h4>Corporate Office</h4>
											<p><?php echo html_entity_decode($site_basic_info[0]->address); ?></p>
										</div>
										<div class="contact-item">
											<i class="fa fa-envelope-o"></i>
											<h4>Email Info</h4>
											<p><?php echo $site_basic_info[0]->email ?><br><br></p>
										</div>
										<div class="contact-item last-contact">
											<i class="fa fa-phone"></i>
											<h4>Toll Free Number</h4>
											<p><?php echo $site_basic_info[0]->phone_number ?><br><br></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<section class="contact-form">
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<div class="location-contact">
										<div class="widget-heading">
											<h4>Google Maps</h4>
										</div>
										
                                            <div class="content-map">
                                            <div id="map"></div>
                                        </div>
                                    </div>
						            </div>
						            <div class="col-md-4">
						            	<div class="message-form">
						            		<div class="widget-heading">
						            			<h4>Contact Us</h4>
						            		</div>
						            		<div class="message-content">
						            			<div class="row">
						            				<form method="post" action="">
						            				<div class="col-md-12">
															 <?php echo $plugin->ShowMsg(); ?>
						            					<input name="name" type="text" id="txtFName" placeholder="Name*" maxlength="60" />
						            					<span id="reqName" style="color:Red;display:none;"></span>

						            				</div>
						            				<div class="col-md-12">

						            					<input name="email" type="text" id="txtEmail" placeholder="Email*" maxlength="80" />
						            					<span id="reqemail" style="color:Red;display:none;"></span>
						            					<span id="RegEmail" style="color:Red;display:none;"></span>

						            				</div>
						            				<div class="col-md-12">

						            					<input name="phone" type="text" id="txtMobile" placeholder="Mobile*" maxlength="10" />
						            					<span id="ReqMobile" style="color:Red;display:none;"></span>
						            					<span id="ragMobile" style="color:Red;display:none;"></span>
						            				</div>
						            				<div class="col-md-12">

						            					<textarea name="requirements" rows="4" cols="38" placeholder="Your Message..." id="requirements"></textarea>
                                                
						            				</div>
						            				<div class="col-md-12">
						            				<div class="g-recaptcha" data-sitekey="6Lf0fTMUAAAAAKooCcK7-cbrpQquDHn_ngPUT0te" style="width: 50px !important;margin-bottom: 20px;"></div>
						            			</div>
						            			<div class="accent-button">

						            				<input type="submit" name="Btnsubmit" value="Submit" id="Btnsubmit" name="Submit" style="color:White;background-color:#00356C;" />
						            			</div>
												</form>
						            		</div>
						            	</div>
						            </div>
						        </div>
						    </div>
						</section>

                     <!--<div id="call-to-action">
                        	<div class="container">
                        		<div class="row">
                        			<p>"The true purpose of education is to teach a man to carry himself triumphant to the sunset."</p>
                        			<div class="accent-button">
                        				<a href="registeronline.php">Register Now</a>
                        			</div>
                        		</div>
                        	</div>
                        </div>-->

                        <footer>
                        	<?php include_once './include/footer.php'; ?>
                        </footer>


                        <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

                    </div>

                </div>

                <?php include_once './include/mbl_menu.php'; ?>

            </div>



</form>

<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript" src="assets/js/plugins.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>

<!-- Google Map Init-->

<script>
      function initMap() {
        var uluru = {lat: 23.7609626, lng: 90.3537559};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5UvvRJHrdqhJYLL7KvqCG61W88gA79uw&callback=initMap">
    </script>


</body>
</html>
