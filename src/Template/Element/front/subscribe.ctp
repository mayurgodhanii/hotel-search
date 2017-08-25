<script>
    $(document).ready(function () {
        $("#subscribe_form").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>
<!-- Subscribe section -->
<section id="aa-subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-subscribe-area">
                    <h3>Subscribe our newsletter </h3>
                    <p></p>
                    <form id="subscribe_form" method="post" action="<?php echo $this->Url->build('/subscribe'); ?>" class="aa-subscribe-form">
                        <input type="email" class="required email" name="subscribe_email" placeholder="Enter your Email">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Subscribe section -->
