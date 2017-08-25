<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<?php echo $this->element('front/header_link'); ?>

<?php echo $this->element('front/header'); ?>
<!-- / header section -->
<!-- menu -->
<?php echo $this->element('front/navbar'); ?>
<!-- / menu -->
<!-- Start slider -->
<?php echo $this->element('front/slider'); ?>
<!-- / slider -->
<?php echo $this->fetch('content'); ?>
<!-- footer -->  
<?php echo $this->element('front/footer'); ?>
<!-- / footer -->

<!-- Login Modal -->  
<?php echo $this->element('front/login'); ?> 

<?php echo $this->element('front/footer_link'); ?>