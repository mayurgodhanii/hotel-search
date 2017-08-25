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
                        Shipping Details
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="row">
                        <?php foreach ($user_avail_addresses as $address_key => $user_avail_address) { ?>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>                                        
                                        <input type="radio" value="<?php echo $user_avail_address->id; ?>" class="address_radio" name="select_address" <?php echo ($user_avail_address->selected == 1) ? "checked" : ""; ?> />
                                        <h4 class="address-title"><?php echo $user_avail_address->full_name; ?></h4>
                                        <p>
                                            <?php echo $user_avail_address->address1 ?> <br />
                                            <?php echo!empty($user_avail_address->address2) ? $user_avail_address->address2 . "<br />" : ""; ?>
                                            <?php echo $user_avail_address->city ?>,
                                            <?php echo $user_avail_address->state ?>,
                                            <?php echo $user_avail_address->zipcode ?> <br />
                                            <?php echo $user_avail_address->country ?>                                                                        
                                        </p>
                                    </label>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Add a new address</h3>
                        </div>
                    </div>
                    <?php echo $this->Form->create('UserAddresses', array('url' => ['controller' => 'users', 'action' => 'storeaddress'], 'type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'checout_add_address', 'class' => 'form-horizontal')); ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full name: </label>
                            <?php echo $this->Form->input("full_name", array('placeholder' => 'Full Name', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile number:</label>
                            <?php echo $this->Form->input("phone", array('placeholder' => 'Mobile number', 'label' => false, 'div' => false, 'class' => "form-control number required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pincode: </label>
                            <?php echo $this->Form->input("zipcode", array('placeholder' => 'Pincode', 'label' => false, 'div' => false, 'class' => "form-control number required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Address Line 1: <br /><small>(or company name) </small></label>
                            <?php echo $this->Form->input("address1", array('placeholder' => 'Address Line 1', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Address Line 2: <br /><small>(optional) </small></label>
                            <?php echo $this->Form->input("address2", array('placeholder' => 'Address Line 2', 'label' => false, 'div' => false, 'class' => "form-control")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Landmark: <br /><small>(optional) </small></label>
                            <?php echo $this->Form->input("landmark", array('placeholder' => 'Landmark', 'label' => false, 'div' => false, 'class' => "form-control")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Town/City: </label>
                            <?php echo $this->Form->input("city", array('placeholder' => 'Town/City', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">State: </label>
                            <?php echo $this->Form->input("state", array('placeholder' => 'State', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Country: </label>
                            <?php echo $this->Form->input("country", array('placeholder' => 'Country', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address Type: </label>
                            <?php echo $this->Form->input("type", array('options' => ['home' => 'Home', 'office' => 'Office'], 'placeholder' => 'Address Type', 'label' => false, 'div' => false, 'class' => "form-control required")); ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="aa-browse-btn pull-right" value="Add New Address" />
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
        <!-- Shipping Address -->        
    </div>
</div>