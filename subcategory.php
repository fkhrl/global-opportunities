<?php
include './include/config.php';
$obj = new db_class();
$subcat = $_GET['filter'];

$sqlcontact = $obj->FlyQuery("SELECT * FROM `contact`");
$subcategorydata = $obj->FlyQuery("SELECT
                                    pd.id,
                                    c.name as catname,
                                    sc.name as subname,
                                    pd.photo,
                                    pd.details
                                    FROM `page_data` as pd
                                    left join category as c on c.id = pd.`category_id`
                                    left join sub_category as sc on sc.id = pd.`subcategory_id`
                                    WHERE `subcategory_id` = '".$subcat."'
                                    order by id desc");
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


            <title><?php echo $cover_photo[0]->title; ?></title>



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
                                        <li><a href="#"><?php echo $subcategorydata[0]->catname; ?></a></li>
                                        <li><i class="fa fa-angle-right"></i></li>
                                        <li><a href="#"><?php echo $cover_photo[0]->title; ?></a></li>
                                        
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
                                                <a href="#"><img src="adminpanel/upload/<?php echo $subcategorydata[0]->photo; ?>" alt="about overview"></a>

                                                
                                                <p align="justify"><?php echo html_entity_decode($subcategorydata[0]->details); ?></p>
                                            </div>


                                            


                                        </div>
                                    </div>
                                        
                                        <div class="col-md-4">
                                        <div class="side-bar">
                                            <div class="search-box">
                                                <input type="text" class="search" name="s" placeholder="Search..." value="">
                                            </div>
                                            <div class="categories">
                                                <div class="widget-heading">
                                                    <h4><?php echo html_entity_decode($subcategorydata[0]->catname); ?></h4>
                                                </div>
                                                <ul>
                                                    <?php
                                                    $subcate = $_GET['filter'];
                                                    $sqlsubcat = $obj->FlyQuery("SELECT id,name FROM `sub_category` WHERE `category_name` IN (SELECT `category_name` FROM `sub_category` WHERE `id`='$subcate')");
                                                    if (!empty($sqlsubcat)) {
                                                        foreach ($sqlsubcat as $sub) {
                                                            ?>
                                                            <li><a href="subcategory.php?filter=<?php echo $sub->id; ?>"><i class="fa fa-angle-right"></i><?php echo $sub->name; ?></a></li>
                                                            <?php
                                                        }
                                                    }
                                                    ?>  
                                                </ul>
                                            </div>



                                           
                                </div>
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