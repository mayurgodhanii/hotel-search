<ul class="aa-head-top-nav-right">
    <?php if ($userAuth['role_id'] == 3) { ?>
        <li><a href="javascript:void(0);">Welcome <?php echo $userAuth['name']; ?></a></li>
        <li><a href="<?php echo $this->Url->build('/my-account') ?>">My Account</a></li>
        <li class="hidden-xs"><a href="<?php echo $this->Url->build('/my-wishlist') ?>">Wishlist</a></li>
        <li class="hidden-xs"><a href="<?php echo $this->Url->build('/my-cart') ?>">My Cart</a></li>
        <li class="hidden-xs"><a href="<?php echo $this->Url->build('/checkout') ?>">Checkout</a></li>
        <li><a href="<?php echo $this->Url->build('/logout'); ?>">Logout</a></li>
    <?php } else { ?>
        <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
        <li><a href="<?php echo $this->Url->build('/register') ?>">Register</a></li>
    <?php } ?>
</ul>