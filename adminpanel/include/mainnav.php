<div id="menu" class="hidden-print hidden-xs">
    <div class="sidebar sidebar-inverse">
        <div class="sidebarMenuWrapper" style="top:0px !important;">
            <ul class="list-unstyled">
                <li><a href="index.php"><i class=" icon-projector-screen-line"></i><span>Dashboard</span></a></li>
                <!--                <li class="hasSubmenu">
                                    <a href="#" data-target="#menu-style" data-toggle="collapse"><i class="icon-compose"></i><span>Menu &amp; Navbar</span></a>
                                    <ul class="collapse" id="menu-style">
                                        <li><a href=""><span class="pull-right badge badge-primary"><i class="fa fa-check"></i></span>Sidebar Menu Dark</a></li>
                                        <li><a href="">Sidebar Menu Light</a></li>
                                        <li><a href="">Top Menu Dark</a></li>
                                        <li><a href="">Top Menu Light</a></li>
                                        <li><a href=""><span class="pull-right badge badge-primary"><i class="fa fa-check"></i></span>Top Menu Primary</a></li>
                                    </ul>
                                </li>-->

                <!-- <li><a href="setting.php"><i class="icon-cogs"></i><span> Setting</span></a></li>

                <?php
                $sqlpage = $obj->FlyQuery("SELECT * FROM page_info ORDER BY page_name ASC");
                if (!empty($sqlpage))
                    foreach ($sqlpage as $page):
                        ?>
                        <li><a href="<?php echo $page->page_name; ?>"><i class="fa fa-folder-o"></i><span> <?php echo $page->menu_name; ?></span></a></li> 
                                    <?php
                                endforeach;
                            ?>

 -->

                   <li><a href="site_basic_info.php"><i class="icon-settings-wheel-fill"></i><span>Site Settings</span></a></li>
                <li class="hasSubmenu">
                    <a href="#" data-target="#Menu" data-toggle="collapse"><i class="icon-compose"></i><span>Menu </span></a>
                    <ul class="collapse " id="Menu">
                        <li><a href="category.php"><i class="icon-ticket"></i><span>Main Menu</span></a></li>
                        <li><a href="sub_category.php"><i class="icon-bulleted-list"></i><span>Sub Category</span></a></li>
                    </ul>
                </li>
                <li><a href="page_data.php"><i class="icon-ticket"></i><span>Page Data</span></a></li>
                <li class="hasSubmenu">
                    <a href="#" data-target="#Page" data-toggle="collapse"><i class="icon-compose"></i><span>Home Page</span></a>
                    <ul class="collapse " id="Page">
                        <li><a href="welcome_content.php.php"><i class="icon-ticket"></i><span>Welcome Content</span></a></li>
                        <li><a href="icon_library.php"><i class="icon-ticket"></i><span>Icon Library</span></a></li>
                        <li><a href="package.php"><i class="icon-bulleted-list"></i><span>Package</span></a></li>
                    </ul>
                </li>
                <li><a href="cover_photo.php"><i class=" fa fa-check-square-o"></i><span>Page Cover Photo</span></a></li>
                <li><a href="slider.php"><i class="fa  fa-indent"></i><span>Add Slider</span></a></li>
                <li><a href="about_us.php"><i class="fa  fa-indent"></i><span>About Page</span></a></li>
                
                <li class="hasSubmenu">
                    <a href="#" data-target="#faq" data-toggle="collapse"><i class="icon-compose"></i><span>Add Faq </span></a>
                    <ul class="collapse " id="faq">
                        <li><a href="faq_title.php"><i class="icon-ticket"></i><span>Add Faq Title</span></a></li>
                        <li><a href="faq.php"><i class="icon-ticket"></i><span>Add Faq Content</span></a></li>
                    </ul>
                </li>
                <li class="hasSubmenu">
                    <a href="#" data-target="#enquiry" data-toggle="collapse"><i class="icon-compose"></i><span>Add Enquiry </span></a>
                    <ul class="collapse " id="enquiry">
                        <li><a href="enquiry.php"><i class="icon-ticket"></i><span>Add Enquiry</span></a></li>
                        <li><a href="enquiry_data.php"><i class="icon-ticket"></i><span>Enquiry List</span></a></li>
                    </ul>
                </li>
                <li><a href="footer_info.php"><i class=" fa fa-check-square-o"></i><span>Footer Info </span></a></li>
                
            </ul>
        </div>
    </div>
</div>