<?php

use Cake\Core\Configure;
use Cake\Routing\Router;
$width=750;
$font_size="13px";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
    </head>
    <body style="padding:0; margin:0; color:#6e6e6e; font-family:Verdana; -webkit-text-size-adjust: none;">
        <table style="background-color: #f6f6f6; width: 100%;">
            <tr>
                <td></td>
                <td width="<?php echo $width; ?>" style="display: block !important;max-width: <?php echo $width; ?>px !important; margin: 0 auto !important;clear: both !important;">
                    <div style=" max-width: <?php echo $width; ?>px;margin: 0 auto;display: block; padding: 20px;">
                        <table style="background-color: #fff; border: 1px solid #e9e9e9; border-radius: 3px;" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="padding: 20px 0px 0px 20px; border-top: 5px solid rgb(217, 41, 118);">
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>">
                                                    <img style="width: 100px;" src="<?php echo Router::url('/', true) . "img/logo.png" ?>" />
                                                </a>   
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="font-family:arial,verdana,sans-serif;font-size:<?php echo $font_size;  ?>;color:rgb(51,102,153);text-decoration:none;font-weight:bold">
                                                    Your <?php echo Configure::read('WEBSITE_URL'); ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL') . "/faq"; ?>" style="font-family:arial,verdana,sans-serif;font-size:<?php echo $font_size;  ?>;color:rgb(51,102,153);text-decoration:none;font-weight:bold">
                                                    FAQs
                                                </a> 	  	
                                            </td>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL') . "/privacy-policy"; ?>" style="font-family:arial,verdana,sans-serif;font-size:<?php echo $font_size;  ?>;color:rgb(51,102,153);text-decoration:none;font-weight:bold">
                                                    Privacy Policy
                                                </a> 	  	
                                            </td>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL') . "/aboutus"; ?>" style="font-family:arial,verdana,sans-serif;font-size:<?php echo $font_size;  ?>;color:rgb(51,102,153);text-decoration:none;font-weight:bold">
                                                    About us
                                                </a> 	  	
                                            </td>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL') . "/contact"; ?>" style="font-family:arial,verdana,sans-serif;font-size:<?php echo $font_size;  ?>;color:rgb(51,102,153);text-decoration:none;font-weight:bold">
                                                    Contact us
                                                </a> 	  	
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="text-align: left; width: 100%; border-bottom: 5px solid rgb(163, 163, 163); padding: 20px 15px 15px; margin: 0px auto;">                               
                                        <tr>
                                            <td style="font-size:<?php echo $font_size;  ?>; border-bottom: 1px solid rgb(163, 163, 163);">
                                                <?php
                                                $content = explode("\n", $content);
                                                foreach ($content as $line):
                                                    echo $line;
                                                endforeach;
                                                ?>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td>
                                                <table style="width: 100%;">
                                                    <td style="font-size:<?php echo $font_size;  ?>;">
                                                        <strong>Shop</strong> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="color: #333;text-decoration: none;">Women</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="color: #333;text-decoration: none;">Men</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="color: #333;text-decoration: none;">Electronics</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="color: #333;text-decoration: none;">Home & Kitchen</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>" style="color: #333;text-decoration: none;">Combo Special</a> <br />
                                                    </td>
                                                    <td style="font-size:<?php echo $font_size;  ?>;">
                                                        <strong>Help</strong> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/faq" style="color: #333;text-decoration: none;">FAQs</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/orders" style="color: #333;text-decoration: none;">Track Orders</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/shipping" style="color: #333;text-decoration: none;">Shipping</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/cancellation" style="color: #333;text-decoration: none;">Cancellation</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/returns" style="color: #333;text-decoration: none;">Returns</a> <br />
                                                    </td>
                                                    <td style="font-size:<?php echo $font_size;  ?>;">
                                                        <strong>Account</strong> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/users/dashboard" style="color: #333;text-decoration: none;">Account Dashboard</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/users/edit" style="color: #333;text-decoration: none;">Account Information</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/users/addressbook" style="color: #333;text-decoration: none;">Address Book</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/orders" style="color: #333;text-decoration: none;">My Orders</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/users/wishlist" style="color: #333;text-decoration: none;">My Wishlist</a> <br />
                                                    </td>
                                                    <td style="font-size:<?php echo $font_size;  ?>;">
                                                        <strong><?php echo Configure::read('SITE_TITLE'); ?></strong> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/aboutus" style="color: #333;text-decoration: none;">About</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/seller/" style="color: #333;text-decoration: none;">Sell with us</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/privacy-policy" style="color: #333;text-decoration: none;">Privacy Policy</a> <br />
                                                        <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>/contact" style="color: #333;text-decoration: none;">Contact Us</a> <br />
                                                    </td>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>   
                            <tr>
                                <td>
                                    <table style="width: 100%; padding: 10px;">
                                        <tr>
                                            <td>
                                                <a href="<?php echo Configure::read('FRONT_WEBSITE_URL'); ?>">
                                                    <img style="width: 100px;" src="<?php echo Router::url('/', true) . "img/logo.png" ?>" />
                                                </a>   
                                            </td>
                                            <td style="font-size:<?php echo $font_size;  ?>; text-align: right;">
                                                <span>Connect with <?php echo Configure::read('SITE_TITLE'); ?> India</span>
                                                <a href="<?php echo Configure::read('FACEBOOK_LINK'); ?>">Facebook</a>
                                                <a href="<?php echo Configure::read('TWITTER_LINK'); ?>">Twitter</a>
                                                <a href="<?php echo Configure::read('GOOGLEPLUS_LINK'); ?>">Google +</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>

