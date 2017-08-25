<script>
    $(document).ready(function () {
        $("#loginform").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">                      
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login or Register</h4>                
                <?php echo $this->Form->create('User', array('url' => array('action' => 'login', 'controller' => 'Users'), 'type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'loginform', 'class' => 'aa-login-form')); ?>
                <label for="">Username or Email address<span>*</span></label>                
                <?php
                echo $this->Form->input('username', array(
                    'label' => false,
                    'placeholder' => "Enter your Email address",
                    "required",
                    'class' => "required email"
                        )
                );
                ?>
                <label for="">Password<span>*</span></label>
                <?php
                echo $this->Form->input('password', array(
                    'label' => false,
                    'placeholder' => 'Password',
                    "required",
                    'class' => "required"
                        )
                );
                ?>                
                <button class="aa-browse-btn" type="submit">Login</button>
                <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                <p class="aa-lost-password"><a href="<?php echo $this->Url->build('/forgot'); ?>">Lost your password?</a></p>
                <div class="aa-register-now">
                    Don't have an account?<a href="<?php echo $this->Url->build('/register'); ?>">Register now!</a>
                </div>
                <?php echo $this->Form->end(); ?> 
            </div>                        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>   