<?php
echo $this->Html->script("bootbox.js");
echo $this->Html->script("ajaxpaginator/ajaxpaginate.min.js");
echo $this->Html->css("/js/ajaxpaginator/css/ajaxpagination.css");
?>
<div class="box-header with-border">
    <h3 class="box-title">List Tasks</h3>
    <?php if (in_array($is_case_allow, array(1, 2))) { ?>
        <a href="<?php echo $this->Url->build(array('action' => 'addtask', $case_id)); ?>" class="ajaxviewmodel btn btn-primary pull-right margin-bottom-sm margin-top-sm"> + Add Task</a>
    <?php } ?>
</div>
<div class="box-body margin-top-sm">
    <?php echo $this->element('filter_element', ['url' => $this->Url->build(['controller' => 'cases', 'action' => 'view', $case_id, $type])]); ?>
    <table class="table table-bordered table-striped custom-table-data ajax-pagination">
        <thead>
            <tr>
                <th class="sr-number">Sr.</th>
                <th class="sr-number">ID </th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>                
                <th>Duration</th>
                <th>Status</th>
                <th class="actions-120">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $page = $this->Paginator->params()['page'];
            $limit = $this->Paginator->params()['perPage'];

            $sr = ($page * $limit) - $limit + 1;
            ?>
            <?php if (count($case_tasks) > 0) { ?>
                <?php foreach ($case_tasks as $case_task) { ?>                                  
                    <tr id="row-<?php echo $case_task['id']; ?>">
                        <td class="sr-number"><?php echo $sr++ ?></td>
                        <td><?php echo "#" . $case_task['id']; ?></td>
                        <td>
                            <?php if (in_array($is_case_allow, array(1, 2))) { ?>
                                <a href="<?php echo $this->Url->build(array('action' => 'updatetaskemp', $case_task['id'])) ?>" class="ajaxviewmodel pull-right" title="Assign to Other">
                                    <?php echo $case_task->user->name . "(#" . $case_task->user->id . ")"; ?> <i class="fa fa-pencil-square-o font-size20"></i>
                                </a>
                            <?php } else { ?>
                                <a class="pull-right">
                                    <?php echo $case_task->user->name . "(#" . $case_task->user->id . ")"; ?>
                                </a>
                            <?php } ?>
                        </td>
                        <td><?php echo $case_task['title']; ?></td>
                        <td><?php
                            $str = $case_task->description;
                            echo (strlen($str) >= 100) ? substr($str, 0, 100) . "..." : $str;
                            ?>
                        </td>
                        <td><?php echo $case_task['duration']; ?></td>
                        <td> 
                                <?php if (in_array($is_case_allow, array(1, 2))) { ?>
                                <a href="<?php echo $this->Url->build(array('action' => 'updatetaskstatus', $case_task['id'])) ?>" class="ajaxviewmodel pull-right" title="Change Status">
                                <?php echo strtoupper($case_task->status); ?> <i class="fa fa-pencil-square-o font-size20"></i>
                                </a> 
                                <?php } else { ?>
                                <a class="pull-right">
                                <?php echo strtoupper($case_task->status); ?> 
                                </a> 
        <?php } ?>
                        </td>
                        <td class="actions-120">
                            <span class="font18">
                                <a href="<?php echo $this->Url->build(array('action' => 'viewtask', $case_task['id'])) ?>" title="View">
                                    <i class="fa fa-eye font-size20" ></i>
                                </a>
        <?php if (in_array($is_case_allow, array(1, 2))) { ?>
                                    <a href="<?php echo $this->Url->build(array('action' => 'edittask', $case_task['id'])) ?>" title="Edit" class="ajaxviewmodel">
                                        <i class="fa fa-pencil-square-o font-size20"></i>
                                    </a>
                                    <a data-value="<?php echo $case_task['id']; ?>" class="deleterecord" href="javascript:void(0);"  title="Delete">
                                        <i class="fa fa-trash-o font-size20"></i>
                                    </a> 
        <?php } ?>

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
                    var url = "<?php echo $this->Url->build(array('action' => 'deletetask')) ?>";
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