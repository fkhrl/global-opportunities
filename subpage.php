<?php
include './include/config.php';
$obj = new db_class();
$subcat = $_GET['filter'];

$sqlcontact = $obj->FlyQuery("SELECT * FROM `contact`");
$subcategorydata = $obj->FlyQuery("SELECT 
                                    p.id,
                                    p.name,
                                    ic.name as icon_name,
                                    p.details
                                    FROM package  as p
                                    Left Join icon_library as ic ON ic.id = p.`icon_id`
                                    where p.id='".$subcat."'");
// print_r($subcategorydata);
// exit();

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
            $plugin->Success("Your message has been sent successfully. Thanks", $obj->filename().$linkRedirect);
        } else {
            $plugin->Error("Failed", $obj->filename().$linkRedirect);
        }
    } else {
        $plugin->Error("Fields is Empty", $obj->filename().$linkRedirect);
    }
}

$cover_photo = $obj->FlyQuery("SELECT * FROM `cover_photo` WHERE `subcategory_id` = '".$subcat."' ORDER BY id DESC ");
if (!empty($subcategorydata)) {
    ?>
    <!DOCTYPE html>
    <!--[if IE 9]>
    <html class="ie ie9" lang="en-US">
    <![endif]-->
    <html lang="en-US">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


            <title><?php echo $subcategorydata[0]->name; ?></title>



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


        </head>
        <body>

            <div class="sidebar-menu-container"  id="sidebar-menu-container">

                <div class="sidebar-menu-push">

                    <div class="sidebar-menu-overlay"></div>

                    <div class="sidebar-menu-inner">

                        <header class="site-header">
                            <?php include './include/header.php'; ?>
                        </header>

                        
                        <style type="text/css">
                        
                        .director-heading {
                            background-image: url(assets/images/university-background.jpg)
                        }
                    </style>
                <div class="page-heading director-heading">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1><?php echo $subcategorydata[0]->name; ?></h1>
                                <span></span>
                                <div class="page-list">
                                    <ul>
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li><a href="#">Package</a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li><a href="#"><?php echo $subcategorydata[0]->name; ?></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                        <section class="classic-news">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="classic-posts">
                                            <div class="classic-item">
                                                
                                                
                                                <p align="justify"><?php echo html_entity_decode($subcategorydata[0]->details); ?></p>
                                            </div>


                                            


                                        </div>
                                    </div>
                                        
                                    <div class="col-md-4">
                                        <?php include 'include/sidebar_search.php';?>    
                                    </div>
                            </div>
                        </section>

                        <!-- <div id="call-to-action">
                            <div class="container">
                                <div class="row">
                                    <p>"Alone we are smart. Together we are brilliant."</p>
                                    <div class="accent-button">
                                        <a href="registeronline.php">Register Now</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <footer>
    <?php include './include/footer.php'; ?>
                        </footer>


                        <a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

                    </div>

                </div>

                <?php include_once './include/mbl_menu.php'; ?>

            </div>


    <?php
} else {
    ?>
            <script>
                alert("No Data Found");
                document.location.href = "index.php";
            </script>
    <?php
}
?>

        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script src="assets/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <script type="text/javascript" src="assets/js/plugins.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
 
    </body>
</html>