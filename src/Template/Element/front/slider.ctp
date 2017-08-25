<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<?php if ($action_name == "index" && $controller_name == "Dashboards") { ?>
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="<?php echo $theme_folder; ?>img/slider/1.jpg" alt="Gift Collection" />
                            </div>
                            <div class="seq-title">
                                <!--<span data-seq>Save Up to 75% Off</span>-->                
                                <h2 data-seq>Gift Collection</h2>                
                                <p data-seq></p>
                                <a data-seq href="<?php echo $this->Url->build('/products'); ?>" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="<?php echo $theme_folder; ?>img/slider/2.jpg" alt="Plaque Collection" />
                            </div>
                            <div class="seq-title">
                                <!--<span data-seq>Save Up to 40% Off</span>-->                
                                <h2 data-seq>Plaque Collection</h2>                
                                <p data-seq></p>
                                <a data-seq href="<?php echo $this->Url->build('/plaque'); ?>" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                                <img data-seq src="<?php echo $theme_folder; ?>img/slider/3.jpg" alt="Memories Frame Collection" />
                            </div>
                            <div class="seq-title">
                                <!--<span data-seq>Save Up to 75% Off</span>-->                
                                <h2 data-seq>Frame Collection</h2>                
                                <p data-seq></p>
                                <a data-seq href="<?php echo $this->Url->build('/memories-frame'); ?>" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                            </div>
                        </li>
                        <!-- single slide item -->           
                        <li>
                            <div class="seq-model">
                                <img data-seq src="<?php echo $theme_folder; ?>img/slider/4.jpg" alt="Couple Mug Collection" />
                            </div>
                            <div class="seq-title">
                                <span data-seq>Save Up to 75% Off</span>                
                                <h2 data-seq>Couple Mug Collection</h2>                
                                <p data-seq></p>
                                <a data-seq href="<?php echo $this->Url->build('/couple-mug'); ?>" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                            </div>
                        </li>
                        <!-- single slide item -->  
                        <!--                        <li>
                                                    <div class="seq-model">
                                                        <img data-seq src="<?php // echo $theme_folder;  ?>img/slider/5.jpg" alt="Male Female slide img" />
                                                    </div>
                                                    <div class="seq-title">
                                                        <span data-seq>Save Up to 50% Off</span>                
                                                        <h2 data-seq>Best Collection</h2>                
                                                        <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                                                        <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                                                    </div>
                                                </li>                   -->
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section id="aa-catg-head-banner">
        <img src="<?php echo $theme_folder; ?>/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2><?php echo isset($page_header) ? $page_header : "" ?></h2>
                    <ol class="breadcrumb">
                        <?php if (isset($breadcrumb)) { ?>
                            <?php foreach ($breadcrumb as $breadcrumb_item) { ?>
                                <li class="<?php echo isset($breadcrumb_item['class']) ? $breadcrumb_item['class'] : ""; ?>">
                                    <?php if (isset($breadcrumb_item['link'])) { ?>
                                        <a href="<?php echo $this->Url->build($breadcrumb_item['link']); ?>"><?php echo $breadcrumb_item['title']; ?></a>
                                    <?php } else { ?>
                                        <?php echo $breadcrumb_item['title']; ?>
                                    <?php } ?>        
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>
<?php } ?>