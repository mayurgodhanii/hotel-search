<script>
    $(document).ready(function () {
        $("#review_form").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>
<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
?>
<div class="aa-product-review-area">
    <h4><?php echo $reviews->count(); ?> Reviews for <?php echo $product->name; ?></h4> 
    <ul class="aa-review-nav">        
        <?php foreach ($reviews as $review) { ?>
            <li>
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <?php
                            if (!empty($review->user['profile'])) {
                                $image_src = $this->Url->build('/upload/thumb/' . $review->user['profile']);
                            } else {
                                $image_src = $this->Url->build('/img/admin-icon.png');
                            }
                            ?>   
                            <img class="media-object" src="<?php echo $image_src; ?>" alt="<?php echo ucfirst($review->user['name']); ?>">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><strong><?php echo ucfirst($review->user['name']); ?></strong> - <span><?php echo $review->created ?></span></h4>
                        <div class="aa-product-rating">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>                            
                                <span class="fa <?php echo ($review->ratting >= $i) ? "fa fa-star" : "fa-star-o"; ?>"></span>
                            <?php } ?>                            
                        </div>
                        <p><?php echo $review->review ?></p>
                    </div>
                </div>
            </li>
        <?php } ?>        
    </ul>
    <?php if (isset($is_login_user)) { ?>    
        <h4>Add a review</h4>
        <!--        <div class="aa-your-rating">
                    <p>Your Rating</p>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                </div>-->
        <!-- review form -->
        <form id="review_form" class="aa-review-form" method="post" action="<?php echo $this->Url->build(array('controller' => 'products', 'action' => 'addreview')) ?>">        
            <input type="hidden" name="product_id" value="<?php echo $product->id ?>"> 
            <div class="form-group">
                <label for="message">Your Rating</label>
                <div>                    
                    <label class="radio-inline">
                        <input type="radio" name="ratting" checked="" id="inlineRadio1" value="1"> 1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ratting" id="inlineRadio2" value="2"> 2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ratting" id="inlineRadio3" value="3"> 3
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ratting" id="inlineRadio3" value="4"> 4
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="ratting" id="inlineRadio3" value="5"> 5
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="message">Your Review</label>
                <textarea name="review" class="form-control required" rows="3" id="message"></textarea>
            </div>
            <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
        </form>
    <?php } ?>
</div>