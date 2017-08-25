<?php
echo $this->Html->script("bootbox.js");
echo $this->Html->script("ajaxpaginator/ajaxpaginate.min.js");
echo $this->Html->css("/js/ajaxpaginator/css/ajaxpagination.css");
?>
<div class="box-header with-border">
    <h3 class="box-title">List Payment Details</h3>
    <a href="<?php echo $this->Url->build(array('action' => 'addpayments', $case_id)); ?>" class="ajaxviewmodel btn btn-primary pull-right margin-bottom-sm margin-top-sm"> + Add Payment</a>
</div>
<div class="box-body margin-top-sm">
    <?php echo $this->element('filter_element', ['url' => $this->Url->build(['controller' => 'cases', 'action' => 'view', $case_id, $type])]); ?>
    <table class="table table-bordered table-striped custom-table-data ajax-pagination">
        <thead>
            <tr>
                <th class="sr-number">Sr.</th>
                <th class="sr-number">ID </th>
                <th>Date of Payment</th>
                <th>Payment Type</th>                
                <th>Amount</th>
                <th>Description</th>
                <th class="actions-120">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $page = $this->Paginator->params()['page'];
            $limit = $this->Paginator->params()['perPage'];

            $sr = ($page * $limit) - $limit + 1;
            ?>
            <?php if (count($case_payments) > 0) { ?>
                <?php foreach ($case_payments as $case_payment) { ?>                                  
                    <tr id="row-<?php echo $case_payment['id']; ?>">
                        <td class="sr-number"><?php echo $sr++ ?></td>
                        <td><?php echo "#" . $case_payment['id']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($case_payment['date_of_payment'])); ?></td>
                        <td><?php echo strtoupper($case_payment['payment_type']); ?></td>
                        <td><?php echo $case_payment['amount']; ?></td>
                        <td>
                            <?php
                            echo $case_payment['description'];
                            if (!empty($case_payment['bank_name'])) {
                                echo "<br />Bank Name: " . $case_payment['bank_name'];
                            }
                            if (!empty($case_payment['cheque_no'])) {
                                echo "<br />Cheque No: " . $case_payment['cheque_no'];
                            }
                            ?>
                        </td>                    
                        <td class="actions-120">
                            <span class="font18">
                                <a href="<?php echo $this->Url->build(array('action' => 'editpayment', $case_payment['id'])) ?>" title="Edit" class="ajaxviewmodel">
                                    <i class="fa fa-pencil-square-o font-size20"></i>
                                </a>
                                <a data-value="<?php echo $case_payment['id']; ?>" class="deleterecord" href="javascript:void(0);"  title="Delete">
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
                    var url = "<?php echo $this->Url->build(array('action' => 'deletepayment')) ?>";
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