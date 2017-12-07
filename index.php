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
            //mail
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

$welcome_content = $obj->FlyQuery("SELECT * FROM welcome_content");
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>
            Home
        </title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="canonical" href="" />
        <meta name="robots" content="index, follow" />
        <meta property="og:title" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />
        <meta property="og:type" content="Website" />
        <meta property="article:author" content=" " />
        <meta property="article:publisher" content=" " />
        <meta property="og:locale" content="en" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta itemprop="title" content="" />
        <meta itemprop=" " />
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
        <link rel="stylesheet" type="text/css" href="assets/slick/slick.css" />
        <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css" />
        <link rel="stylesheet" href="assets/rs-plugin/css/settings.css" />

        <!--[if lt IE 9]>
        
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
            <![endif]-->



<script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <form name="form1" method="post" action="" id="form1">
            <div class="sidebar-menu-container" id="sidebar-menu-container">

                <div class="sidebar-menu-push">

                    <div class="sidebar-menu-overlay"></div>

                    <div class="sidebar-menu-inner">

                        <header class="site-header">
                            <?php include_once './include/header.php'; ?>
                        </header>

                        <div id="search">
                            <button type="button" class="close">×</button>

                        </div>


                        <div class="slider-2">
                            <?php include_once './include/slider.php'; ?>
                        </div>


                        <section>
                            <div class="welcome-intro">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="section-heading">
                                                <h1><?php echo $welcome_content[0]->title; ?></h1>
                                                <span><?php echo $welcome_content[0]->sub_title; ?></span>
                                                <img src="assets/images/line-dec.png" alt="line">
                                                    <p><?php echo html_entity_decode($welcome_content[0]->short_details); ?></p>
                                            </div>
                                            <div class="row">
                                                <?php
                                                $packages = $obj->FlyQuery("SELECT 
                                                                p.id,
                                                                p.name,
                                                                ic.name as icon_name,
                                                                p.details,
                                                                p.link
                                                                FROM package  as p
                                                                Left Join icon_library as ic ON ic.id = p.`icon_id`
                                                                 order by p.id desc limit 4");
                                                
                                                    foreach ($packages as $package):
                                                        ?>
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="service-item">
                                                                <i class="<?php echo $package->icon_name; ?>"></i>
                                                                <h4><?php echo $package->name; ?></h4>
                                                                <div class="line-dec"></div>
                                                                <p><?php echo html_entity_decode($package->details); ?>
                                                                     <a href="<?php echo $package->link ?>">Read More</a> 
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        
                                                    endforeach;
                                                
                                                ?>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="request-information">
                                            <div class="widget-heading">
                                                <h4>Request Information</h4>
                                            </div>
                                            <div class="search-form">
                                                <form method="post" action="">
                                                     <?php echo $plugin->ShowMsg(); ?>
                                                <input name="name" type="text" id="txtFName" placeholder="Name*" maxlength="60" />
                                                <span id="reqName" style="color:Red;display:none;"></span>


                                                <input name="email" type="email" id="txtEmail" placeholder="Email*" maxlength="80" />
                                                <span id="reqemail" style="color:Red;display:none;"></span>
                                                <span id="RegEmail" style="color:Red;display:none;"></span>

                                                <input name="phone" type="text" id="txtMobile" placeholder="Mobile*" maxlength="15" />
                                                <span id="ReqMobile" style="color:Red;display:none;"></span>
                                                <span id="ragMobile" style="color:Red;display:none;"></span>
                                            
                                                <textarea name="requirements" style="background-color: #00356C; color: white"  rows="4" cols="38" placeholder="Your Message..." id="requirements"></textarea>
                                                <style type="text/css">
                                                      .request-information .search-form .select select, .request-information .search-form textarea { padding: 0 10px;
                                                            height: 100px;
                                                            border: 1px solid #fff;
                                                            font-family: Roboto, sans-serif;
                                                            font-size: 12px;
                                                            color: #fff;
                                                            margin-bottom: 10px;
                                                            width: 100%;
                                                            cursor: pointer;
                                                            outline: 0;
                                                        }
                                                    .rc-anchor-normal {
                                                            width: 289px !important;
                                                        }
                                                    .g-recaptcha{
                                                        margin-top: 5px;
                                                        width: 100px!important;
                                                    }
                                                    .rc-anchor-normal {
                                                        height: 74px;
                                                        width: 287px!important;
                                                    }
                                                </style>
                                                <div class="g-recaptcha" data-sitekey="6Lf0fTMUAAAAAKooCcK7-cbrpQquDHn_ngPUT0te" style="width: 50px !important;;"></div><br>
                                                <div class="accent-button" style="cursor:pointer;">
                                                    <input type="submit" name="submit" value="Submit" style="color:White;background-color:#F5A425;" />
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        

                        <footer>
                            <?php include_once './include/footer.php'; ?>




                        </footer>


                        <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

                        </div>

                        </div>

                        <?php include_once './include/mbl_menu.php'; ?>

                        </div>
                        </form>


                        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->


                        <!-- Google Code for Remarketing Tag -->
                        <!--------------------------------------------------
                        Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
                        --------------------------------------------------->
                        <script type="text/javascript">
                            /* <![CDATA[ */
                            var google_conversion_id = 935292637;
                            var google_custom_params = window.google_tag_params;
                            var google_remarketing_only = true;
                            /* ]]> */
                        </script>
                        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                        </script>
                        <noscript>
                            <div style="display:inline;">
                                <img height="0" width="0" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/935292637/?guid=ON&amp;script=0" />
                            </div>
                        </noscript>




                        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
                        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

                        <script src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
                        <script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
                        <script type="text/javascript" src="assets/js/plugins.js"></script>
                        <script type="text/javascript" src="assets/js/custom.js"></script>
                        <script type="text/javascript" src="assets/slick/slick.min.js"></script>





                        <script type="text/javascript">
                            $(document).on('ready', function () {
                                $(".regular").slick({
                                    dots: true,
                                    infinite: true,
                                    slidesToShow: 3,
                                    slidesToScroll: 3

                                });
                                $(".center").slick({
                                    dots: true,
                                    infinite: true,
                                    centerMode: true,
                                    slidesToShow: 3,
                                    slidesToScroll: 3

                                });
                                $(".variable").slick({
                                    dots: true,
                                    infinite: true,
                                    variableWidth: true,

                                });
                            });

                            $('.autoplay').slick({
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                autoplay: true,
                                autoplaySpeed: 2000,
                                responsive: [{
                                        breakpoint: 768,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 3
                                        }
                                    }, {
                                        breakpoint: 480,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '40px',
                                            slidesToShow: 1
                                        }
                                    }]
                            });
                        </script>

                        <!--Start of Tawk.to Script-->
                        <!--                                                            <script type="text/javascript">
                            var Tawk_API = Tawk_API || {},
                                    Tawk_LoadStart = new Date();
                            (function () {
                                var s1 = document.createElement("script"),
                                        s0 = document.getElementsByTagName("script")[0];
                                s1.async = true;
                                s1.src = 'https://embed.tawk.to/570f97690e1f1fbb3c7aab61/default';
                                s1.charset = 'UTF-8';
                                s1.setAttribute('crossorigin', '*');
                                s0.parentNode.insertBefore(s1, s0);
                            })();
                        </script>-->
                        <!--End of Tawk.to Script-->



                        </body>


                        </html>