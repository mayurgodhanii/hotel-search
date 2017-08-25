<script>
    $(document).ready(function () {
        $("#formadd").validate({
            errorClass: 'error m-error',
            errorElement: 'small'
        });
    });
</script>

<section class="content-header">
    <h1>Hotel<small></small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hotel</li>
    </ol>
</section>
<section class="content">    
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Search Hotel</h3>
                </div><!-- /.box-header -->
                <form id="formadd" class="form-horizontal" action="<?php echo $this->Url->build(['controller' => 'hotels', 'action' => 'index']); ?>">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Hotel Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo isset($_GET['hotel_name']) ? $_GET['hotel_name'] : "" ?>" placeholder="Hotel Name" type="text" name="hotel_name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo isset($_GET['city']) ? $_GET['city'] : "" ?>" placeholder="City" type="text" name="city">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">From Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : "" ?>" id="from_date" placeholder="From Date" type="text" name="from_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">To Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : "" ?>" id="to_date" placeholder="To Date" type="text" name="to_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Price range</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="amount" class="form-control" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        <input type="hidden" id="min_price" name="min_price" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : "" ?>">
                                        <input type="hidden" id="max_price" name="max_price" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : "" ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <div id="slider-range"></div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">       
                                        <a href="<?php echo $this->Url->build(['controller' => 'Hotels', 'action' => 'index']) ?>" class="btn btn-default">Reset</a>
                                        <button type="submit" class="btn btn-primary">Search Hotel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </form>

                <?php if ($is_hotel) { ?>
                    <div class="box-header">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Search Results</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-striped custom-table-data ajax-pagination">
                            <thead>
                                <tr>
                                    <th class="sr-number">Sr</th>
                                    <th width="60%">Hotel Name</th>
                                    <th>Price</th>
                                    <th>City</th>
                                    <th>Book Hotel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($hotels)) { ?>
                                    <?php foreach ($hotels as $hotel_key => $hotel) { ?>
                                        <tr>
                                            <td>#<?php echo $hotel_key + 1; ?></td>
                                            <td><?php echo $hotel['name'] ?></td>
                                            <td><?php echo $hotel['price'] ?></td>
                                            <td><?php echo $hotel['city'] ?></td>       
                                            <td>                                                
                                                <a data-toggle="modal" data-target="#hotel_model_<?php echo $hotel_key ?>" class="btn btn-primary btn-sm">Availability</a>
                                                <div class="modal fade" id="hotel_model_<?php echo $hotel_key ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel">Hotel Availability</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table">
                                                                    <tr>
                                                                        <th>From</th>
                                                                        <th>To</th>
                                                                        <th>#</th>
                                                                    </tr>
                                                                    <?php foreach ($hotel['availibility'] as $availibility) { ?>
                                                                        <tr>
                                                                            <td><?php echo $availibility['from'] ?></td>
                                                                            <td><?php echo $availibility['to'] ?></td>
                                                                            <td><a href="#" class="btn btn-primary btn-sm">Book Now</a></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                <?php } ?>
            </div><!-- /.box -->
        </div>
    </div>   
</section><!-- /.content -->

<script>
    $(function () {
        var min_price = "<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : 0 ?>";
        var max_price = "<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : 200 ?>";
        $("#min_price").val(min_price);
        $("#max_price").val(max_price);
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 200,
            values: [min_price, max_price],
            slide: function (event, ui) {
                $("#amount").val(ui.values[ 0 ] + " - " + ui.values[ 1 ]);
                $("#min_price").val(ui.values[ 0 ]);
                $("#max_price").val(ui.values[ 1 ]);
            }
        });
        $("#amount").val($("#slider-range").slider("values", 0) + " - " + $("#slider-range").slider("values", 1));
    });
</script>
<script>
    $(function () {
        $('form#formadd').submit(function () {
            if ($(this).valid()) {
                displayloader();
                $(this).find('button[type=submit]').prop('disabled', true);
            }
        });

        $("#from_date").datepicker({
            numberOfMonths: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            onSelect: function (selected) {
                $("#to_date").datepicker("option", "minDate", selected)
            }
        });
        $("#to_date").datepicker({
            numberOfMonths: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            onSelect: function (selected) {
                $("#from_date").datepicker("option", "maxDate", selected)
            }
        });
    });
</script>