<div class="side-bar">
                                            <div class="request-information">
                                            <div class="widget-heading">
                                                <h4>Request Information</h4>
                                            </div>
                                            <div class="search-form">
                                                <form method="post" action="" >
                                                     <?php echo $plugin->ShowMsg(); ?>
                                                <input name="name" type="text" id="txtFName" placeholder="Name*" maxlength="60" />
                                                <span id="reqName" style="color:Red;display:none;"></span>
                                                <?php 
                                                if(isset($_GET['filter']))
                                                {
                                                    ?>
                                                    <input name="sfil" type="hidden" value="<?=$_GET['filter']?>" />
                                                    <?php
                                                }
                                                ?>

                                                <input name="email" type="email" id="txtEmail" placeholder="Email*" maxlength="80" />
                                                <span id="reqemail" style="color:Red;display:none;"></span>
                                                <span id="RegEmail" style="color:Red;display:none;"></span>

                                                <input name="phone" type="text" id="txtMobile" placeholder="Mobile*" maxlength="10" />
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