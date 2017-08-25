<script>
    $(document).ready(function () {
        $("#fromfeedback").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });

</script>
<div class="tab-pane active" id="casefeedbacks">   
    <div class="">      
        <div class="box-header with-border">
            <h3 class="box-title">Case FeedBacks</h3>

        </div><!-- /.box-header -->
        <div class="box-body margin-top-sm">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->Form->create("CaseFeedbacks", array('url' => ['controller' => 'cases', 'action' => 'addfeedback', $case_id], 'type' => 'file', 'enctype' => 'multipart/form-data', 'id' => 'fromfeedback', 'class' => 'form-horizontal')); ?>
                    <?php
                    if (isset($case_feedback->id)) {
                        echo $this->Form->input('id', ['type' => 'hidden', 'value' => $case_feedback->id]);
                    }
                    ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Feedbacks *</label>
                            <div class="col-sm-6">                                
                                <?php echo $this->Form->input("feedback", array('value' => isset($case_feedback->feedback) ? $case_feedback->feedback : "", 'label' => false, 'type' => "Textarea", 'div' => false, 'class' => "form-control required")) ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Review *</label>
                            <div class="col-sm-10"> 
                                <?php
                                $checked_input = isset($case_feedback->rating) ? $case_feedback->rating : 1;
                                ?>
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <label class="radio-inline margin-right">
                                        <input type="radio" name="rating" <?php echo ($checked_input == $i) ? "checked" : ""; ?> id="inlineRadio<?php echo $i; ?>" value="<?php echo $i; ?>"> <?php echo $i; ?>
                                    </label>
                                <?php } ?>                                
                            </div>                            
                        </div>  
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-6">
                                <a href="javascript:void(0);" class="btn btn-default" onclick="history.go(-1);">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div><!-- /.box-body -->                    
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>  

        </div>
    </div>
</div>