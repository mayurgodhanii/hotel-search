<form class="" method="get" id="searchform">                        
    <div class="row table-header-element">
        <div class="col-md-2">
            <div class="input-group search-box">
                <input type="text" placeholder="Search..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : "" ?>" class="form-control" name="q">
                <span class="input-group-btn">
                    <button class="btn btn-flat" id="search-btn" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>                                
        </div>
        <div class="col-md-2">            
            <input type="text" id="product_from" name="from_date" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ""; ?>" class="form-control filter-input-text" placeholder="From Date" />                        
        </div>
        <div class="col-md-2">                        
            <input type="text" id="product_to" name="to_date" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : ""; ?>" class="form-control filter-input-text" placeholder="To Date" />                        
        </div>
        <div class="col-md-1">                        
            <input type="submit" class="form-control btn btn-primary" value="Go" />              
            <?php if (isset($_GET['q'])) { ?>
                <a href="<?php echo $this->Url->build(array('action' => $this->request->action)) ?>">Reset</a>
            <?php } ?>
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
    </div>
    <?php if (isset($_GET['q']) && !empty($_GET['q'])) { ?>     
    <div class="row">
            <div class="col-md-6">
                <p class="search-result">Search result for <strong>"<?php echo $_GET['q']; ?>"</strong>.  <a class="resetbtn" href="<?php echo $this->Url->build(array('action' => $this->request->action)) ?>">Reset</a></p>
            </div>        
        </div>
    <?php } ?>
</form>
<script>
    $(function () {
        $(".submitform-select").change(function () {
            $("#searchform").submit();
        });

        $("#product_from").datepicker({
            numberOfMonths: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            onSelect: function (selected) {
                $("#product_to").datepicker("option", "minDate", selected)
            }
        });
        $("#product_to").datepicker({
            numberOfMonths: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            onSelect: function (selected) {
                $("#product_from").datepicker("option", "maxDate", selected)
            }
        });
    });
</script>