<form class="" method="get" id="searchform">                        
    <div class="row table-header-element">
        <div class="col-md-3">
            <div class="input-group search-box">
                <input type="text" placeholder="Search..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : "" ?>" class="form-control" name="q">
                <span class="input-group-btn">
                    <button class="btn btn-flat" id="search-btn" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>                                
        </div>
        <?php if (isset($_GET['q']) && !empty($_GET['q'])) { ?>
            <div class="col-md-6 no-padding">
                <p class="search-result">Search result for <strong>"<?php echo $_GET['q']; ?>"</strong>.  <a class="resetbtn" href="<?php echo $this->Url->build(array('action' => $this->request->action, $data_id)) ?>">Reset</a></p>
            </div>
        <?php } ?>

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
    </div>
</form>
<script>
    $(function () {
        $(".submitform-select").change(function () {
            $("#searchform").submit();
        });
    });
</script>