<div class="fullwidthbanner-container">
                                <div class="fullwidthbanner">
                                    <ul>
                                        <?php
                                            $slider = $obj->FlyQuery("SELECT * FROM slider order by id desc");
                                            if(!empty($slider)){
                                                foreach ($slider as $slider_photo):
                                        ?>
                                        <li class="first-slide" data-transition="fade" data-slotamount="10" data-masterspeed="300">
                                            <img src="adminpanel/upload/<?php echo $slider_photo->photo; ?>" alt="Slider Photo" border="0" data-fullwidthcentering="on">
                                        </li>
                                        <?php
                                    endforeach;
                                            }
                                        ?>

                                    </ul>
                                </div>
                            </div>