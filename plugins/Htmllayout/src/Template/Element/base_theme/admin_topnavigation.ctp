<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="<?php echo $this->Url->build(['controller' => 'Hotels', 'action' => 'index']) ?>" class="navbar-brand"><b>Hotel</b>Booking</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>            
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo $this->Url->build(['controller' => 'Hotels', 'action' => 'index']) ?>">Hotel <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Room Type</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>                    
                </ul>               
            </div>            
        </div>
    </nav>
</header>