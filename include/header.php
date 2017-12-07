<?php
$site_basic_info = $obj->FlyQuery("SELECT * FROM site_basic_info Order by id DESC limit 1");

?>
<div id="main-header" class="main-header header-sticky">
    <div class="inner-header container clearfix">
        <div class="logo">
            <a href="index.php"><img src="adminpanel/upload/<?php echo $site_basic_info[0]->photo; ?>" alt="Logo" width="200" height="100"></a>
        </div>
        <div class="header-right-toggle pull-right hidden-md hidden-lg">
            <a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
        </div>
        <div class="header-info hidden-sm hidden-xs"> 
            <ul>
                <li><i class="fa fa-phone"></i>Toll Free <?php echo $site_basic_info[0]->phone_number; ?></li>
                <li><i class="fa fa-envelope-o"></i><?php echo $site_basic_info[0]->email; ?></li>
                <li><a href="registeronline.php">Enquiry Form</a></li>
            </ul>
        </div>
        <nav class="main-navigation text-left hidden-xn hidden-sn">
            <ul>
                <li><a href="index.php">Home</a> </li>
                <?php
                $category = $obj->FlyQuery("SELECT * FROM category order by `priority` asc limit 4");
                //print_r($category);
                if (!empty($category)) {
                    foreach ($category as $cat) {
                        $category_id = $cat->id;
                        
                        if ($cat->name=="Faq") {
                             $subcat_class = 'class=""';
                             $page = "faq.php?filter=" . $cat->id;
                        }elseif ($cat->name=="About Us") {
                            $subcat_class = 'class=""';
                            $page = "about.php?filter=" . $cat->id;
                        }elseif ($cat->name=="Contact") {
                            $subcat_class = 'class=""';
                            $page = "contact.php?filter=" . $cat->id;
                        }else{
                           $subcat_class = ' class="has-submenu"';
                           $page = '#'; 
                        }
                        ?>
                        <li><a href="<?= $page; ?>"<?php echo $subcat_class; ?>> <?php echo $cat->name; ?></a>
                            <?php
                            $sqlsubcat = $obj->FlyQuery("SELECT * FROM `sub_category` WHERE `category_name`='$category_id' order by `priority`");
                                if (!empty($sqlsubcat)) {
                            ?>
                                <ul class="sub-menu">
                                    <?php
                                    foreach ($sqlsubcat as $subcat) {
                                        
                                        ?>
                                            <li><a href="./subcategory.php?filter=<?= $subcat->id; ?>" ><?php echo $subcat->name; ?></a>
                                            <?php
                                            }
                                           ?> 
                                                
                                                
                                        </li>  
                                       
                                </ul>
                                <?php
                            }
                            ?>
                        </li>
                        <?php
                    }
                }
                ?>
                <!-- <li><a href="contact.php?filters=1";> Contact</a> -->
                <li><a href="#search"><!--<i class="fa fa-search">--></i></a></li>
            </ul>
        </nav>
    </div>
</div>