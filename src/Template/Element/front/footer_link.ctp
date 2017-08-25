<?php

use Cake\Core\Configure;

$theme_folder = $this->Url->build('/General/');
$base_theme_folder = $this->Url->build('/htmllayout/base_theme/');
?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo $theme_folder; ?>js/bootstrap.js"></script>  
<?php
echo $this->Html->script("$base_theme_folder/plugins/jquery-ui/jquery-ui.min.js");
echo $this->Html->script("$base_theme_folder/plugins/gritter/js/jquery.gritter.min.js");
echo $this->Html->script("$base_theme_folder/plugins/jquery-validate/jquery.validate.min.js");
echo $this->Html->script("$base_theme_folder/plugins/jquery-validate/additional-methods.min.js");
?>
<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.smartmenus.js"></script>
<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.smartmenus.bootstrap.js"></script>  
<!-- To Slider JS -->
<!-- Product view slider -->
<?php if ($action_name == "index" && $controller_name == "Dashboards") { ?>
    <script src="<?php echo $theme_folder; ?>js/sequence.js"></script>
    <script src="<?php echo $theme_folder; ?>js/sequence-theme.modern-slide-in.js"></script>  
<?php } ?>
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.simpleGallery.js"></script>
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/jquery.simpleLens.js"></script>
<!-- slick slider -->
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/slick.js"></script>
<!-- Price picker slider -->
<script type="text/javascript" src="<?php echo $theme_folder; ?>js/nouislider.js"></script>
<!-- Custom js -->
<script src="<?php echo $theme_folder; ?>js/custom.js"></script> 
<?php $flash_message = strip_tags(trim($this->Flash->render()));
?>
<?php if (!empty($flash_message)) { ?>
    <script>
        /*
         * For Notification with alert.
         * glitterCallAlert("Title","Message","HideSpeed","SlowSpeed","NotificationClassName");
         * E.g glitterCallAlert("Notification :","Mayur GOdhani",5000,500,"my-sticky-class");                
         */
        $(document).ready(function () {
            glitterCallAlert("Notification :", '<?php echo $flash_message; ?>');
        });
    </script> 
<?php } ?> 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script>
    jQuery(document).ready(function () {
        $(document).on('click', '.ajaxviewmodel', function (event) {
            var tmp_html = '<div class="modal-dialog"><div class="modal-content"><div class="modal-body"><p class="ajaxloader text-center"><i class="fa fa-refresh fa-spin fa-3x fa-fw margin-bottom margin-top text-center"></i></p></div></div></div>';
            event.preventDefault();
            var link = $(this).attr("href");
            $('#myModal').modal('show');
            $("#myModal").html(tmp_html);
            $.ajax({
                url: link,
                success: function (data) {
                    $(".ajaxloader").hide();
                    $("#myModal").html(data);
                }
            });
        });
        $(document).tooltip({
            track: true
        });
    });
</script>
</body>
</html>