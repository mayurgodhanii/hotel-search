<?php
echo $this->Html->script("bootbox.js");
echo $this->Html->script("ajaxpaginator/ajaxpaginate.min.js");
echo $this->Html->css("/js/ajaxpaginator/css/ajaxpagination.css");
?>
<div class="box-header with-border">
    <h3 class="box-title">List Payment Milestone</h3>
    <a href="<?php echo $this->Url->build(array('action' => 'addmilestone', $case_id)); ?>" class="ajaxviewmodel btn btn-primary pull-right margin-bottom-sm margin-top-sm"> + Add Payment Milestone</a>
</div>
<div class="box-body margin-top-sm">
    <?php echo $this->element('filter_element', ['url' => $this->Url->build(['controller' => 'cases', 'action' => 'view', $case_id, $type])]); ?>
    <table class="table table-bordered table-striped custom-table-data ajax-pagination">
        <thead>
            <tr>
                <th class="sr-number"><?php echo $this->Paginator->sort('id', 'Sr.'); ?></th>
                <th>#</th>
                <th><?php echo $this->Paginator->sort('milestone_date', 'Milestone Date'); ?></th>
                <th><?php echo $this->Paginator->sort('amount', 'Amount'); ?></th>
                <th><?php echo $this->Paginator->sort('comment', 'Comment'); ?></th>
                <th><?php echo $this->Paginator->sort('Created', 'created'); ?></th>
                <th class="actions"><?php echo $this->Paginator->sort('action', 'Action'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $page = $this->Paginator->params()['page'];
            $limit = $this->Paginator->params()['perPage'];

            $i = ($page * $limit) - $limit + 1;
            ?>
            <?php if (count($casemilestones) > 0) { ?>
                <?php foreach ($casemilestones as $casemilestone) { ?>                                  
                    <tr id="row-<?php echo $casemilestone['id']; ?>">
                        <td class="sr-number"><?php echo $i++; ?></td>
                        <td><?php echo "#" . $casemilestone['id']; ?></td>
                        <td><?php echo $this->General->getdate($casemilestone['milestone_date'], "Y-m-d"); ?></td>   
                        <td><?php echo!empty($casemilestone['amount']) ? $casemilestone['amount'] : "-"; ?></td>
                        <td><?php echo!empty($casemilestone['comment']) ? $casemilestone['comment'] : "-"; ?></td>
                        <td><?php echo $this->General->getdate($casemilestone['created'], "Y-m-d"); ?></td>   
                        <td class="actions">
                            <span class="font18">
                                <a href="<?php echo $this->Url->build(array('action' => 'editmilestone', $casemilestone['id'])) ?>" title="Edit" class="ajaxviewmodel">
                                    <i class="fa fa-pencil-square-o font-size20"></i>
                                </a>
                                <a data-value="<?php echo $casemilestone['id']; ?>" class="deleterecord" href="javascript:void(0);"  title="Delete">
                                    <i class="fa fa-trash-o font-size20"></i>
                                </a> 
                            </span>
                        </td>
                    </tr>
                <?php } ?>                            
            <?php } else { ?>      
                <tr>
                    <td colspan="17">No records found.</td>                                            
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div id="pagination-div">
        <div class="total-record">Total Record : <strong><?php echo $this->Paginator->params()['count']; ?></strong></div>
        <?php echo $this->element('pagination'); ?>
    </div>
</div>

<script>
    $(function () {
        $('.ajax-pagination').cakephpPagination({
            paginateDivId: "pagination-div",
            afterSuccess: function () {
                initializemethods();
            }
        });
        initializemethods();
    });

    function initializemethods() {
        $('.deleterecord').bind('click', function () {
            var id = $(this).attr("data-value");
            bootbox.confirm("Are you sure want to delete this record?", function (result) {
                if (result == true) {
                    var url = "<?php echo $this->Url->build(array('action' => 'deletemilestone')) ?>";
                    url = url + "/" + id;
                    $.ajax({
                        url: url
                    }).done(function (data) {
                        $("#row-" + id).remove();
                        glitterCallAlert("Notification : ", data);
                    });
                }
            });
        });
    }
</script>