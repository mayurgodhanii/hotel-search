<?php
echo $this->Html->script("jquery.infinitescroll.min");
?>
<div class="tab-pane active" id="timeline">     
    <div class="box-header with-border">
        <h3 class="box-title">Activity Timeline</h3>        
    </div>
    <div class="box-body margin-top-sm">
        <?php echo $this->element('filter_element_full_width_search', ['url' => $this->Url->build(['controller' => 'cases', 'action' => 'view', $case_id, $type])]); ?>
        <ul class="timeline timeline-inverse" id="view_designation">
            <?php
            foreach ($date_wise_activities as $date => $date_wise_activity) {
                $time_lable_color = $this->General->getRandomColor(date("d", strtotime($date)));
                ?>
                <li class="time-label designation_row">
                    <span class="<?php echo $time_lable_color; ?>">
                        <?php echo date("d M,Y", strtotime($date)) . "" ?>
                    </span>
                </li>
                <?php foreach ($date_wise_activity as $activity) { ?>
                    <?php
                    $activity_type = $activity->activity_type;
                    $fa_icon = $this->General->FaIconForActivity($activity_type);
                    $activity_color = $this->General->ActivityColor($activity_type);
                    ?>
                    <li class="designation_row">
                        <i class="fa <?php echo $fa_icon; ?> <?php echo $activity_color; ?>"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $this->Time->timeAgoInWords($activity->created); ?></span>
                            <h3 class="timeline-header"><?php echo ucfirst(strtolower($activity->activity_type)); ?></h3>
                            <div class="timeline-body">
                                <?php echo $activity->description; ?>
                            </div>                       
                        </div>
                    </li>
                <?php } ?>    
                <?php echo $this->Paginator->next(''); ?>
            <?php } ?>        
        </ul>   
    </div>
</div>

<script>
    $(function () {
        var $container = $('#view_designation');
        $container.infinitescroll({
            navSelector: '.next', // selector for the paged navigation 
            nextSelector: '.next a', // selector for the NEXT link (to page 2)
            itemSelector: '.designation_row', // selector for all items you'll retrieve
            debug: true,
            dataType: 'html',
            loading: {
                img: "<?php echo $this->Url->build('/img/loading.gif'); ?>",
                finishedMsg: "",
                msgText: "",
                speed: 'fast',
                start: undefined
            }
        });
    });
</script>