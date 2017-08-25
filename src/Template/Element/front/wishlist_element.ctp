<?php if (isset($is_login_user)) { ?>
    <?php $avail_in_wishlist = isset($my_wishlist_data[$wish_product->id]) ? "1" : "0"; ?>
    <a data-type="<?php echo $avail_in_wishlist; ?>" class="add-wishlist" data-id="<?php echo $wish_product->id; ?>" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'wishlist']) ?>">
        <span class="fa <?php echo ($avail_in_wishlist) ? "fa-heart" : "fa-heart-o"; ?>"></span>
    </a>
<?php } else { ?> 
    <a data-target="#login-modal" data-toggle="modal">
        <span class="fa fa-heart-o"></span>
    </a>
<?php } ?>   