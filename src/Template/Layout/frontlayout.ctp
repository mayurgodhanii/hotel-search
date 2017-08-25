<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/assets/');
$base_theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Keywords" content="<?php echo isset($meta_keywords) ? $meta_keywords : $this->fetch('title'); ?>"/>        
        <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : $this->fetch('title'); ?>">
        <meta name="author" content="Mayur Godhani">

        <!-- Favicons Icon -->
        <link rel="icon" href="<?php echo $this->Url->build("/favicon.png"); ?>" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo $this->Url->build("/favicon.png"); ?>" type="image/x-icon" />
        <title><?php echo isset($title) ? $title : $this->fetch('title'); ?> | <?php echo Configure::read('SITE_TITLE'); ?></title>

        <!-- Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS Style -->
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/bootstrap.min.css">
        <?php
        echo $this->Html->css("$base_theme_folder/plugins/jquery-ui/jquery-ui.min.css");
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/font-awesome.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/simple-line-icons.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/owl.theme.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/jquery.bxslider.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/jquery.mobile-menu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/style.css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/revslider.css">
        <link href="<?php echo $base_theme_folder; ?>plugins/gritter/css/jquery.gritter.css" rel="stylesheet">  
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/developer.css">        
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/shopsyshop.css">
        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,600,500,700,800' rel='stylesheet' type='text/css'>

        <?php echo $this->element("tracking_code/google_analytics"); ?>        
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.min.js"></script> 

    </head>

    <body class="cms-index-index cms-home-page">
        <div id="page"> 
            <!-- Header -->
            <?php echo $this->element('frontlayout/header'); ?>
            <!-- end header --> 

            <!-- Navigation -->
            <?php echo $this->element('frontlayout/navbar'); ?>

            <!-- end nav --> 

            <?php echo $this->fetch('content'); ?>

            <!-- Brand Logo -->
            <?php // echo $this->element('frontlayout/brand'); ?>

            <!-- our features -->
            <?php echo $this->element('frontlayout/ourfeatures'); ?>
            <!-- Footer -->
            <?php echo $this->element('frontlayout/footer'); ?>
        </div>
        <!-- End Footer --> 

        <!-- mobile menu -->
        <?php echo $this->element('frontlayout/mobile_navbar'); ?>

        <?php echo $this->element('frontlayout/login'); ?>
        <?php echo $this->element('frontlayout/registration'); ?>
        <?php echo $this->element('frontlayout/forgotpassword'); ?>
        <!-- JavaScript --> 

        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/bootstrap.min.js"></script> 
        <?php
        echo $this->Html->script("$base_theme_folder/plugins/jquery-ui/jquery-ui.min.js");
        echo $this->Html->script("$base_theme_folder/plugins/gritter/js/jquery.gritter.min.js");
        echo $this->Html->script("$base_theme_folder/plugins/jquery-validate/jquery.validate.min.js");
        echo $this->Html->script("$base_theme_folder/plugins/jquery-validate/additional-methods.min.js");
        ?>
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/revslider.js"></script> 
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/common.js"></script> 

        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/owl.carousel.min.js"></script> 
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.mobile-menu.min.js"></script> 
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/cloud-zoom.js"></script>
        <script type="text/javascript" src="<?php echo $theme_folder; ?>js/script_1.js"></script> 
        <?php echo $this->Html->script("$theme_folder/plugins/tinymce/tinymce.min.js"); ?>
        <?php $flash_message = strip_tags(trim($this->Flash->render())); ?>
        <?php if (!empty($flash_message)) { ?>
            <script>
                /*
                 * For Notification with alert.
                 * glitterCallAlert("Title","Message","HideSpeed","SlowSpeed","NotificationClassName");
                 * E.g glitterCallAlert("Notification :","Mayur GOdhani",5000,500,"my-sticky-class");                
                 */
                $(document).ready(function () {
                    glitterCallAlert("Notification :", '<?php echo $flash_message; ?>');
                });
            </script> 
        <?php } ?> 
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
        <script>
            jQuery(document).ready(function () {
                $(document).on('click', '.ajaxviewmodel', function (event) {
                    var tmp_html = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body"><p class="ajaxloader text-center"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom margin-top text-center"></i></p></div></div></div>';
                    event.preventDefault();
                    var link = $(this).attr("href");
                    $('#myModal').modal('show');
                    $("#myModal").html(tmp_html);
                    $.ajax({
                        url: link,
                        success: function (data) {
                            $(".ajaxloader").hide();
                            $("#myModal").html(data);
                        }
                    });
                });
                $(document).tooltip({
                    track: true
                });
            });
        </script>

        <?php if (!$is_login_user) { ?>
            <script>
                jQuery(document).ready(function () {
                    var social_url = "<?php echo $this->Url->build(['controller' => 'users', 'action' => 'socialloginlink']) ?>";
                    $.ajax({
                        url: social_url
                    }).done(function (data) {
                        var social_data = JSON.parse(data);
                        $(".facebook_login_link").attr('href', social_data.fb_login_url);
                        $(".google_login_link").attr('href', social_data.google_login_url);
                    });
                });
            </script>
        <?php } ?>
        <div id="product_detail_loader">
            <div class="inner-div-loader">
                <i class="fa fa-spinner fa-spin fa-3x" aria-hidden="true"></i>
                <label>Loading...</label>
            </div>
        </div>
    </body>
</html>
