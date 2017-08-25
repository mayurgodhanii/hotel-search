<form class="" method="get" id="searchform">                        
    <div class="row table-header-element">
        <div class="col-md-3">
            <input type="text" placeholder="Search..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : "" ?>" class="form-control" name="q">

        </div>
        <div class="col-md-3">
            <?php echo $this->Form->input("status", array('value' => isset($_GET['status']) ? $_GET['status'] : "", 'name' => 'status', 'options' => $statuses, 'empty' => 'Select Status', 'label' => false, 'div' => false, 'class' => "form-control")); ?>             
        </div>
        <div class="col-md-3">
            <button class="btn btn-flat btn-primary" id="search-btn" type="submit"><i class="fa fa-search"></i></button>
        </div>
        <div class="col-md-3 pull-right">
            <span class="select-span">entries</span>                                
            <span class="select-limit">
                <?php
                echo $this->Form->input('limit', array(
                    'value' => (isset($_GET['limit']) ? $_GET['limit'] : ""),
                    'type' => 'select',
                    'options' => array(10 => 10, 25 => 25, 50 => 50, 100 => 100),
                    'class' => 'form-control submitform-select',
                    'style' => 'width: 100%;',
                    'label' => FALSE,
                    'div' => FALSE,
                    'id' => 'selectlimit'
                ));
                ?>
            </span>
            <span class="select-span">Show</span>                                
        </div> 
        <?php if (isset($_GET['q']) && !empty($_GET['q'])) { ?>
            <div class="col-md-12">
                <p class="search-result">Search result for <strong>"<?php echo $_GET['q']; ?>"</strong>.  <a class="resetbtn" href="<?php echo $this->Url->build(array('action' => $this->request->action)) ?>">Reset</a></p>
            </div>
        <?php } elseif (isset($_GET['status']) && !empty($_GET['status'])) { ?>        
            <div class="col-md-12">
                <p class="search-result">Search result for <strong>"<?php echo $_GET['status']; ?>"</strong>.  <a class="resetbtn" href="<?php echo $this->Url->build(array('action' => $this->request->action)) ?>">Reset</a></p>
            </div>
        <?php } ?>
    </div>
</form>
<script>
    $(function () {
        $(".submitform-select").change(function () {
            $("#searchform").submit();
        });
    });
</script>