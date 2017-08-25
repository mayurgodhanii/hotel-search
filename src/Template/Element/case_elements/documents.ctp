<?php
echo $this->Html->script("bootbox.js");
echo $this->Html->script("ajaxpaginator/ajaxpaginate.min.js");
echo $this->Html->css("/js/ajaxpaginator/css/ajaxpagination.css");
?>
<div class="box-header with-border">
    <h3 class="box-title">List Documents</h3>
    <?php if (in_array($is_case_allow, array(1, 2))) { ?>
        <a href="<?php echo $this->Url->build(array('action' => 'adddocument', $case_id)); ?>" class="ajaxviewmodel btn btn-primary pull-right margin-bottom-sm margin-top-sm"> + Add Documents</a>
    <?php } ?>
</div>
<div class="box-body margin-top-sm">
    <?php echo $this->element('filter_element', ['url' => $this->Url->build(['controller' => 'cases', 'action' => 'view', $case_id, $type])]); ?>
    <table class="table table-bordered table-striped custom-table-data ajax-pagination">
        <thead>
            <tr>
                <th class="sr-number"><?php echo $this->Paginator->sort('id', 'Sr.'); ?></th>
                <th>#</th>
                <th><?php echo $this->Paginator->sort('title', 'Title'); ?></th>
                <th><?php echo $this->Paginator->sort('document_name', 'Document Name'); ?></th>
                <th><?php echo $this->Paginator->sort('Comment', 'comment'); ?></th>
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
            <?php if (count($casedocuments) > 0) { ?>
                <?php foreach ($casedocuments as $casedocument) { ?>                                  
                    <tr id="row-<?php echo $casedocument['id']; ?>">
                        <td class="sr-number"><?php echo $i++; ?></td>                                                    
                        <td>
                            <span class="font24">
                                <?php echo $this->General->fileicon($casedocument['document_name']); ?>
                            </span>
                        </td>
                        <td><?php echo!empty($casedocument['title']) ? $casedocument['title'] : "-"; ?></td>
                        <td>
                            <a title="Click here to Download" href="<?php echo $this->Url->build("/upload/documents/" . $casedocument['document_name']); ?>" target="_blank">
                                <?php echo $casedocument['document_name']; ?>
                            </a>
                        </td>
                        <td><?php echo!empty($casedocument['comment']) ? $casedocument['comment'] : "-"; ?></td>   
                        <td><?php echo $this->General->getdate($casedocument['created'], "d-m-Y H:i:s"); ?></td>   
                        <td class="actions">
                            <span class="font18">
                                <a data-value="<?php echo $casedocument['id']; ?>" class="deleterecord" href="javascript:void(0);"  title="Delete">
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
                    var url = "<?php echo $this->Url->build(array('action' => 'deletedocument')) ?>";
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