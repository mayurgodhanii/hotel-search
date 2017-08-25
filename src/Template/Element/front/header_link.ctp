<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
$base_theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">    
        <title><?php echo isset($title) ? $title : $this->fetch('title'); ?> | <?php echo Configure::read('SITE_TITLE'); ?></title>

        <!-- Font awesome -->
        <link href="<?php echo $theme_folder; ?>css/font-awesome.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="<?php echo $theme_folder; ?>css/bootstrap.css" rel="stylesheet">   

        <?php
        echo $this->Html->css("$base_theme_folder/plugins/jquery-ui/jquery-ui.min.css");
        ?>
        <!-- SmartMenus jQuery Bootstrap Addon CSS -->
        <link href="<?php echo $theme_folder; ?>css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <!-- Product view slider -->
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/jquery.simpleLens.css">    
        <!-- slick slider -->
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/slick.css">
        <!-- price picker slider -->
        <link rel="stylesheet" type="text/css" href="<?php echo $theme_folder; ?>css/nouislider.css">
        <!-- Theme color -->
        <link id="switcher" href="<?php echo $theme_folder; ?>css/theme-color/default-theme.css" rel="stylesheet">
        <!-- <link id="switcher" href="<?php echo $theme_folder; ?>css/theme-color/bridge-theme.css" rel="stylesheet"> -->
        <!-- Top Slider CSS -->
        <link href="<?php echo $theme_folder; ?>css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">  
        <!-- Main style sheet -->
        <link href="<?php echo $base_theme_folder; ?>plugins/gritter/css/jquery.gritter.css" rel="stylesheet">    
        <link href="<?php echo $theme_folder; ?>css/style.css" rel="stylesheet">    

        <link href="<?php echo $theme_folder; ?>css/developer.css" rel="stylesheet">    

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo $base_theme_folder; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    </head>
    <body> 