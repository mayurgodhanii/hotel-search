
<section id="menu">
    <div class="container">
        <div class="menu-area">
            <!-- Navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>          
                </div>
                <div class="navbar-collapse collapse">
                    <!-- Left nav -->
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo $this->Url->build('/'); ?>">Home</a></li>
                        <?php foreach ($menu_categories as $menu_category) { ?>
                            <li><a href="<?php echo $this->Url->build('/' . $menu_category->slug); ?>"><?php echo $menu_category->name; ?></a></li>    
                        <?php } ?>      <!--                  
                        <li><a href="<?php echo $this->Url->build('/contact'); ?>">Contact</a></li> -->
<!--                        <li><a href="#">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">                
                                <li><a href="product.html">Shop Page</a></li>
                                <li><a href="product-detail.html">Shop Single</a></li>                
                                <li><a href="404.html">404 Page</a></li>                
                            </ul>
                        </li>-->
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>       
    </div>
</section>