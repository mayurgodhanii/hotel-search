<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<div class="aa-cartbox">
    <a class="aa-cart-link" href="#">
        <span class="fa fa-shopping-basket"></span>
        <span class="aa-cart-title">SHOPPING CART</span>
        <!--<span class="aa-cart-notify">2</span>-->
    </a>
    <div class="aa-cartbox-summary">
        <ul id="cart_list_ul">
            <?php if (isset($header_cart_products) && $header_cart_products->count()) { ?>
                <?php foreach ($header_cart_products as $header_cart_product) { ?>
                    <?php $product = $header_cart_product['Products']; ?>
                    <li id="remove-cart-item-<?php echo $header_cart_product->id; ?>">
                        <a class="aa-cartbox-img" href="<?php echo $this->Url->build(array('controller' => 'products', 'action' => 'details', $product['slug'])) ?>">
                            <img src="<?php echo $this->Url->build('/upload/products/thumb/' . $product['image']) ?>" alt="<?php echo $product['name'] ?>">
                        </a>
                        <div class="aa-cartbox-info">
                            <h4>
                                <a href="#"><?php echo $product['name'] ?></a>
                            </h4>
                            <p>
                                <?php echo $header_cart_product->qty; ?> x Rs <?php echo $product['price'] ?>
                            </p>
                        </div>
                        <a class="aa-remove-product remove_item_from_cart" data-id="<?php echo $header_cart_product->id; ?>" href="<?php echo $this->Url->build(['controller' => 'orders', 'action' => 'removecartitem', $header_cart_product->id]) ?>"><span class="fa fa-times"></span></a>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <li>Cart is empty</li>
            <?php } ?>
            <!--            <li>
                            <a class="aa-cartbox-img" href="#"><img src="<?php echo $theme_folder; ?>img/woman-small-2.jpg" alt="img"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>
                            <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                        </li>
                        <li>
                            <a class="aa-cartbox-img" href="#"><img src="<?php echo $theme_folder; ?>img/woman-small-1.jpg" alt="img"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="#">Product Name</a></h4>
                                <p>1 x $250</p>
                            </div>
                            <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                        </li>                    
                        <li>
                            <span class="aa-cartbox-total-title">
                                Total
                            </span>
                            <span class="aa-cartbox-total-price">
                                $500
                            </span>
                        </li>-->

        </ul>
        <!--<a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>-->
    </div>
</div>