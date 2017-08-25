<?php if ($type == "payment") { ?>
    <div class="tab-pane <?php echo ($type == 'payment') ? 'active' : ''; ?>" id="payment">   

        <div class="">      
            <div class="box-header with-border">
                <h3 class="box-title">Payments List</h3>
                <a href="<?php echo $this->Url->build(array('action' => 'addpayments', $user['id'])) ?>" class="ajaxviewmodel btn btn-primary pull-right margin-bottom-sm margin-top-sm margin-right-sm" title="Add Payment">Add Payment </a>
            </div><!-- /.box-header -->
            <div class="box-body margin-top-sm">
                <?php echo $this->element('filter_element'); ?> 

                <div class="table-responsive">
                    <table class="table table-bordered table-striped custom-table-data ajax-pagination">
                        <thead>
                            <tr>
                                <th class="sr-number">Sr.</th>
                                <th class="sr-number">ID </th>
                                <th>Payment Type</th>
                                <th>Description</th>
                                <th>Bank Name</th>
                                <th>Date of Payment</th>                                
                                <th>Cheque NO</th>
                                <th>Amount</th>
                                <th class="actions-120">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $page = $this->Paginator->params()['page'];
                            $limit = $this->Paginator->params()['perPage'];

                            $sr = ($page * $limit) - $limit + 1;
                            ?>
                            <?php if (count($payment) > 0) { ?>
                                <?php foreach ($payment as $users) { ?>                                  
                                    <tr id="row-<?php echo $users['id']; ?>">
                                        <td class="sr-number"><?php echo $sr++ ?></td>
                                        <td><?php echo $users['id']; ?></td>
                                        <td><?php echo $users['payment_type']; ?></td>
                                        <td><?php echo $users['description']; ?></td>
                                        <td><?php echo $users['bank_name']; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($users['date_of_payment'])); ?></td>
                                        <td><?php echo $users['cheque_no']; ?></td>
                                        <td><?php echo $users['amount']; ?></td>
                                        <!-- <td class="actions">
                                            <input <?php echo ( $users['active'] == 1) ? "checked" : ""; ?> class="switch activedeactivecheck" type="checkbox" data-type="active-inactive" data-value="<?php echo $users['id']; ?>" />
                                        </td> -->
                                        <td class="actions-120">
                                            <span class="font18">
                                                <a href="<?php echo $this->Url->build(array('action' => 'paymentdetails', $users['id'])) ?>" class="ajaxviewmodel" title="View">
                                                    <i class=" fa fa-fw fa-eye font-size20"></i>
                                                </a>
                                                <a href="<?php echo $this->Url->build(array('action' => 'paymentedit', $users['id'])) ?>" title="Edit" class="ajaxviewmodel">
                                                    <i class="fa fa-pencil-square-o font-size20"></i>
                                                </a>
                                                <a href="<?php echo $this->Url->build(array('action' => 'deletepayment', $users['id'])) ?>" title="Delete Payment" onclick="return confirm('Are you sure you want to delete payment?');">
                                                    <i class="fa fa-trash font-size20"></i>
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
                </div>
                <div id="pagination-div">
                    <div class="total-record">Total Record : <strong><?php echo $this->Paginator->params()['count']; ?></strong></div>
                    <?php echo $this->element('pagination'); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>