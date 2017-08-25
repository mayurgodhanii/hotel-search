<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<!-- wpf loader Two -->
<div id="wpf-loader-two">          
    <div class="wpf-loader-two-inner">
        <span>Loading</span>
    </div>
</div> 
<!-- / wpf loader Two -->       
<!-- SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
<!-- END SCROLL TOP BUTTON -->


<!-- Start header section -->
<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-top-area">
                        <!-- start header top left -->
                        <div class="aa-header-top-left">                                                                        
                            <!-- start cellphone -->
<!--                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-phone"></span><?php // echo $settingsTableData['contact_us_phone_number'] ?></p>                                
                            </div>-->
                            <div class="cellphone hidden-xs">
                                <p><span class="fa fa-envelope"></span><?php echo $settingsTableData['contact_us_email'] ?></p>                                
                            </div>
                            <!-- / cellphone -->
                        </div>
                        <!-- / header top left -->
                        <div class="aa-header-top-right">
                            <?php echo $this->element('front/top_navbar'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-header-bottom-area">
                        <!-- logo  -->
                        <div class="aa-logo">
                            <!-- Text based logo -->
<!--                            <a href="<?php // echo $this->Url->build('/'); ?>">
                                <span class="fa fa-shopping-cart"></span>
                                <p>Gift<strong>Karo</strong> <span>Your Shopping Partner</span></p>
                            </a>-->
                            <!-- img based logo -->
                             <a href="<?php echo $this->Url->build('/'); ?>"><img src="<?php echo $theme_folder; ?>img/logo.png" alt="logo img"></a> 
                        </div>
                        <!-- / logo  -->
                        <!-- cart box -->
                        <?php echo $this->element('front/cart'); ?>
                        <!-- / cart box -->
                        <!-- search box -->
                        <div class="aa-search-box">
                            <form action="">
                                <input type="text" name="" id="" placeholder="Search here..">
                                <button type="submit"><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                        <!-- / search box -->             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / header bottom  -->
</header>