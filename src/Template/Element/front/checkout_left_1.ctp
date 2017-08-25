<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<div class="checkout-left">
    <div class="panel-group" id="accordion">
        <!-- Coupon section -->
        <div class="panel panel-default aa-checkout-coupon">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Have a Coupon?
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                    <!--<input type="submit" value="Apply Coupon" class="aa-browse-btn">-->
                    <button type="button" class="aa-browse-btn">Apply Coupon</button>
                </div>
            </div>
        </div>                                        
        <!-- Billing Details -->
        <div class="panel panel-default aa-checkout-billaddress">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Billing Details
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" id="billing_first_name" name="data[billing][first_name]" placeholder="First Name*" value="<?php echo isset($billing_avail_address->first_name) ? $billing_avail_address->first_name : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[billing][last_name]" placeholder="Last Name*" value="<?php echo isset($billing_avail_address->last_name) ? $billing_avail_address->last_name : ""; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="email" class="required email" name="data[billing][email]" placeholder="Email Address*" value="<?php echo isset($billing_avail_address->email) ? $billing_avail_address->email : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="tel" class="required number" name="data[billing][phone]" placeholder="Phone*" value="<?php echo isset($billing_avail_address->phone) ? $billing_avail_address->phone : ""; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                                <textarea cols="8" class="required" name="data[billing][address]" rows="3" placeholder="Address*"><?php echo isset($billing_avail_address->address) ? $billing_avail_address->address : ""; ?></textarea>
                            </div>                             
                        </div>                            
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[billing][country]" placeholder="Country*" value="<?php echo isset($billing_avail_address->country) ? $billing_avail_address->country : ""; ?>">
                            </div>                             
                        </div>                            
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[billing][apt]" placeholder="Appartment, Suite etc." value="<?php echo isset($billing_avail_address->apt) ? $billing_avail_address->apt : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[billing][city]" placeholder="City / Town*" value="<?php echo isset($billing_avail_address->city) ? $billing_avail_address->city : ""; ?>">
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[billing][district]" placeholder="District*" value="<?php echo isset($billing_avail_address->district) ? $billing_avail_address->district : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required number" name="data[billing][zipcode]" placeholder="Postcode / ZIP*" value="<?php echo isset($billing_avail_address->zipcode) ? $billing_avail_address->zipcode : ""; ?>">
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
        </div>
        <!-- Shipping Address -->
        <div class="panel panel-default aa-checkout-billaddress">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        Shipping Address
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" id="shipping_first_name" name="data[shipping][first_name]" placeholder="First Name*" value="<?php echo isset($shipping_avail_address->first_name) ? $shipping_avail_address->first_name : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[shipping][last_name]" placeholder="Last Name*" value="<?php echo isset($shipping_avail_address->last_name) ? $shipping_avail_address->last_name : ""; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="email" class="required email" name="data[shipping][email]" placeholder="Email Address*" value="<?php echo isset($shipping_avail_address->email) ? $shipping_avail_address->email : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="tel" class="required number" name="data[shipping][phone]" placeholder="Phone*" value="<?php echo isset($shipping_avail_address->phone) ? $shipping_avail_address->phone : ""; ?>">
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                                <textarea cols="8" class="required" name="data[shipping][address]" rows="3" placeholder="Address*" ><?php echo isset($shipping_avail_address->address) ? $shipping_avail_address->address : ""; ?></textarea>
                            </div>                             
                        </div>                            
                    </div>   
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[shipping][country]" placeholder="Country*" value="<?php echo isset($shipping_avail_address->country) ? $shipping_avail_address->country : ""; ?>">
                            </div>                             
                        </div>                            
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[shipping][apt]" placeholder="Appartment, Suite etc." value="<?php echo isset($shipping_avail_address->apt) ? $shipping_avail_address->apt : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[shipping][city]" placeholder="City / Town*" value="<?php echo isset($shipping_avail_address->city) ? $shipping_avail_address->city : ""; ?>">
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required" name="data[shipping][district]" placeholder="District*" value="<?php echo isset($shipping_avail_address->district) ? $shipping_avail_address->district : ""; ?>">
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="aa-checkout-single-bill">
                                <input type="text" class="required number" name="data[shipping][zipcode]" placeholder="Postcode / ZIP*" value="<?php echo isset($shipping_avail_address->zipcode) ? $shipping_avail_address->zipcode : ""; ?>">
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>
</div>