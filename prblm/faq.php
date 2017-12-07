<?php
session_start();
include './include/config.php';
$obj = new db_class();

$faq_title = $obj->FlyQuery("SELECT * FROM faq_title ORDER BY id desc limit 1");
$filter = $_GET['filter'];
$sqlfaq = $obj->FlyQuery("SELECT * FROM `faq`");
$cover_photo = $obj->FlyQuery("SELECT * FROM `cover_photo` WHERE `category_id` = '".$filter."' ORDER BY id DESC ");

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
?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <title>faq </title>

        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

        <link rel="icon" href="assets/images/favicon.png" sizes="32x32" type="image/png">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/icon-font.css">
        <link rel="stylesheet" href="assets/css/educa.css">

        <link rel="stylesheet" href="assets/rs-plugin/css/settings.css">

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
                        <?php include './include/header.php';?>
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

                    <section class="single-course">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="single-item">		
                                        <div class="row">		
                                            <div class="col-md-12">
                                                <div class="item course-item">
                                                    <div class="up-content">
                                                        <h2><?php echo $faq_title[0]->name; ?></h2>

                                                    </div>

                                                </div>
                                                <div class="accordions">
                                                    <div class="accordion">
                                                        <?php
                                                            if(!empty($sqlfaq)){
                                                                $i=1;
                                                                foreach ($sqlfaq as $faq):
                                                                    
                                                                        $dd='class="accordion-section-title second-accordion-section-title"';
                                                                    
                                                        ?>
                                                        <div class="accordion-section">
                                                            <a <?php echo $dd; ?> href="#accordion-<?php echo $i;?>">
                                                                <span class="first-icon"><i class="fa fa-play-circle-o"></i></span>
                                                                <span><?php echo html_entity_decode($faq->name); ?> </span>
                                                                <h6><span id="<?php echo $i;?>" class="second-icon"><i class="fa fa-sort-desc"></i></span></h6>
                                                            </a>
                                                            <div id="accordion-<?php echo $i;?>" class="accordion-section-content">
                                                                <p align="justify"><?php echo html_entity_decode($faq->details); ?></p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $i++;
                                                    endforeach;
                                                            }
                                                        ?>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php include("include/sidebar_search.php")?>
                                </div>
                            </div>
                        </div>
                    </section>

             <!--<div id="call-to-action">
                        <div class="container">
                            <div class="row">
                                <p>Establishing lasting peace is the work of education."</p>
                                <div class="accent-button">
                                    <a href="registeronline.php">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>-->

                    <footer>
                        <?php include './include/footer.php';?>
                    </footer>


                    <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

                </div>

            </div>

            <?php include("include/mbl_menu.php") ?>

        </div>
 


        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>

    </body>
</html>