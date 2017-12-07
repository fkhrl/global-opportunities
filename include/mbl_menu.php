<nav class="sidebar-menu slide-from-left">
    <div class="nano">
        <div class="content">
            <nav class="responsive-menu">
                <ul>
                    <li><a href="index.php">Home</a>
                    </li>

                    <?php
                $category = $obj->FlyQuery("SELECT * FROM category order by priority");
                //print_r($category);
                if (!empty($category)) {
                    foreach ($category as $cat) {
                        $category_id = $cat->id;
                        $sqlsubcat = $obj->FlyQuery("SELECT * FROM `sub_category` WHERE `category_name`='$category_id' order by priority");
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
                           $subcat_class = ' class="menu-item-has-children"';
                           $page = '#'; 
                        }
                        ?>

                            <li <?php echo $subcat_class?> ><a href="<?php echo $page; ?>"><?php echo $cat->name; ?></a>
                                <?php
                                if (!empty($sqlsubcat)) {
                                    ?>
                                    <ul class="sub-menu">
                                        <?php
                                        foreach ($sqlsubcat as $subcat) {
                                            ?>
                                            
                                                <li ><a href="./subcategory.php?filter=<?= $subcat->id; ?>"><?php echo $subcat->name; ?></a></li> 
                                            

                                            </li>
                                            <?php
                                            
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    
                </ul>
            </nav>
        </div>
    </div>
</nav>