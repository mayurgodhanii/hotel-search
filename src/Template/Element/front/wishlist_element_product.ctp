<?php if (isset($is_login_user)) { ?>
    <?php $avail_in_wishlist = isset($my_wishlist_data[$wish_product->id]) ? "1" : "0"; ?>   
    <a data-type="<?php echo $avail_in_wishlist; ?>" class="aa-add-to-cart-btn add-wishlist-product" data-id="<?php echo $wish_product->id; ?>" href="<?php echo $this->Url->build(['controller' => 'products', 'action' => 'wishlist']) ?>">    
        <?php echo ($avail_in_wishlist) ? "Remove from Wishlist" : "Add to Wishlist"; ?>
    </a>
<?php } else { ?> 
    <a data-target="#login-modal" data-toggle="modal">
        Add to Wishlist
    </a>
<?php } ?>   