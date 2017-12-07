<?php
$footer_info = $obj->FlyQuery("SELECT * FROM footer_info Order by id DESC limit 1");
$site_basic_info = $obj->FlyQuery("SELECT * FROM site_basic_info Order by id DESC limit 1");
?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="footer-widget">
                <div class="educa-info">
                    <img src="adminpanel/upload/<?php echo $footer_info[0]->footer_logo; ?>" alt="">
                    <div class="line-dec"></div>
                    <p><?php echo html_entity_decode($footer_info[0]->details); ?></p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="footer-widget">
                <div class="featured-links">
                    <h2>Important Links</h2>
                    <div class="line-dec"></div>
                 <ul>
                        <?php
                        $category = $obj->FlyQuery("SELECT * FROM category order by id ASC limit 4");
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
                        <li style="width: 100px;"><a href="<?= $page; ?>"><?php echo $cat->name; ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <!-- <ul>
                        <li><a href="university-visit.php">University visits</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="videos.php">Videos</a></li>
                        <li><a href="contact.php">Our Branches</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="footer-widget">
                <div class="university-address">
                    <h2>Head Office</h2>
                    <div class="line-dec"></div>
                    <ul>
                    <!--<li><i class="fa fa-home" style="margin-bottom:45px;"></i><?php echo html_entity_decode($site_basic_info[0]->address); ?></li>-->
                        <li><i class="fa fa-phone"></i>Phone: <?php echo html_entity_decode($site_basic_info[0]->phone_number); ?></li>
                        <li><i class="fa fa-envelope-o"></i><?php echo html_entity_decode($site_basic_info[0]->email); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="col-md-3">
            <div class="footer-widget">
                <div class="newsletters">
                    <h2>Barcode</h2>
                    <div class="line-dec"></div>
                    <<img src="adminpanel/upload/<?php echo $footer_info[0]->barcode; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="copyright-menu">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright-text">
                            <p>@ Copyright <?php echo date("Y");?> <?php echo $site_basic_info[0]->site_name; ?>. All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu">
                            <ul>
                                <li><a rel="nofollow" href="<?php echo $site_basic_info[0]->facebook_link; ?>" target="_blank"><img src="assets/images/facebook.png" alt="facebook"></a></li>
                                <li><a rel="nofollow" href="<?php echo $site_basic_info[0]->twitter_link; ?>" target="_blank"><img src="assets/images/twitter.png" alt="twitter"></a></li>
                                <li><a rel="nofollow" href="<?php echo $site_basic_info[0]->google_plus_link; ?>" target="_blank"><img src="assets/images/googleplus.png" alt="google plus"></a></li>
                                <li><a rel="nofollow" href="<?php echo $site_basic_info[0]->youtube_link; ?>" target="_blank"><img src="assets/images/youtube.png" alt="youtube"></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>