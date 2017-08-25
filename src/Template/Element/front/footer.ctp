<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-top-area">
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>About Us</h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <h3>Main Menu</h3>
                                    <ul class="aa-footer-nav">
                                        <li><a href="<?php echo $this->Url->build('/') ?>">Home</a></li>                                        
                                        <li><a href="<?php echo $this->Url->build('/products') ?>">Our Products</a></li><!-- 
                                        <li><a href="<?php echo $this->Url->build('/aboutus') ?>">About Us</a></li>
                                        <li><a href="<?php echo $this->Url->build('/contact') ?>">Contact Us</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Useful Links</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="<?php echo $this->Url->build('/sellerregister') ?>">Become Seller</a></li>
                                            <li><a href="<?php echo $this->Url->build('/faq') ?>">FAQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <div class="aa-footer-widget">
                                    <div class="aa-footer-widget">
                                        <h3>Contact Us</h3>
                                        <address>
                                            <p> <?php echo $settingsTableData['contact_us_address'] ?></p>
                                            <!--<p><span class="fa fa-phone"></span><?php // echo $settingsTableData['contact_us_phone_number'] ?></p>-->
                                            <p><span class="fa fa-envelope"></span><?php echo $settingsTableData['contact_us_email'] ?></p>
                                        </address>
                                        <div class="aa-footer-social">
                                            <a href="<?php echo $settingsTableData['facebook'] ?>"><span class="fa fa-facebook"></span></a>
                                            <!-- <a href="<?php echo $settingsTableData['twitter'] ?>"><span class="fa fa-twitter"></span></a>
                                            <a href="<?php echo $settingsTableData['google-plus'] ?>"><span class="fa fa-google-plus"></span></a> -->
                                            <a href="<?php echo $settingsTableData['youtube'] ?>"><span class="fa fa-youtube"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-footer-bottom-area">
                        <p>Designed by <a href="<?php echo $settingsTableData['copy_right_link'] ?>"><?php echo $settingsTableData['copy_right'] ?></a></p>
                        <!--                        <div class="aa-footer-payment">
                                                    <span class="fa fa-cc-mastercard"></span>
                                                    <span class="fa fa-cc-visa"></span>
                                                    <span class="fa fa-paypal"></span>
                                                    <span class="fa fa-cc-discover"></span>
                                                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>