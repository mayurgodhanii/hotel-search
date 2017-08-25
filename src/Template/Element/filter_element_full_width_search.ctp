<form class="" method="get" id="searchform">                        
    <div class="row table-header-element">
        <div class="col-md-12">
            <div class="input-group search-box">
                <input type="text" placeholder="Search..." value="<?php echo isset($_GET['q']) ? $_GET['q'] : "" ?>" class="form-control" name="q">
                <span class="input-group-btn">
                    <button class="btn btn-flat" id="search-btn" type="submit"><i class="fa fa-search"></i></button>
                </span>
            </div>                                
        </div>
        <?php if (isset($_GET['q']) && !empty($_GET['q'])) { ?>
            <div class="col-md-6 padding-top">
                <p class="search-result">Search result for <strong>"<?php echo $_GET['q']; ?>"</strong>.  
                    <a class="resetbtn" href="<?php echo (isset($url) ? $url : $this->Url->build(array('action' => $this->request->action))); ?>">Reset</a>
                </p>
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