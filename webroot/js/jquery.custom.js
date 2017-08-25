$(function () {
    $(".orderstatus").bind('click', function (event) {
        event.preventDefault();
        var thisobj = $(this);
        var order_item_id = thisobj.attr("data-id");
        var data_confirm_message = thisobj.attr("data-confirm");
        var data_status = thisobj.attr("data-status");
        var url = thisobj.attr("href");

        bootbox.confirm(data_confirm_message, function (result) {
            if (result == true) {
                url = url + "/" + order_item_id + "/" + data_status;
                window.location = url;
            }
        });
    });

    $("#submit_go").bind('click', function () {
        var this_obj = $(this);
        var status_url = this_obj.attr("data-url");
        var select_value = $('#select_status').val();
        var newArray = [];
        if (select_value != "") {
            $('.checkone:checked').each(function () {
                newArray.push(this.value);
            });
            if (newArray == '') {
                bootbox.alert('Please select atleast one order!');
                return false;
            }
            if (select_value == "Processing") {
                var courier_services = [];
                $.each(newArray, function (key, orderitem_id) {
                    var courier_value = $("#courier_service_" + orderitem_id).val();
                    if (courier_value == "") {
                        bootbox.alert('Please select courier service for selected items.');
                        return false;
                    }
                    courier_services.push(courier_value);
                });
                var post_data = {orders: newArray, courier_services: courier_services, status: select_value};
            } else {
                var post_data = {orders: newArray, status: select_value};
            }

            displayloader();
            $.ajax({
                type: "POST",
                data: post_data,
                url: status_url,
                success: function (data) {
                    $("#product_detail_loader .afterajaxresult").html(data);
                    $("#product_detail_loader .afterajaxresult").show();
                    $("#product_detail_loader .inner-div-loader").hide();
//                    document.location.reload();
                }
            });
        } else {
            bootbox.alert('Please select status.');
        }
    });

    $(".status_tab_order_listing").bind('click', function (event) {
        event.preventDefault();
        var this_obj = $(this);
        var order_url = this_obj.attr("href");
        displayloader();
        window.location = order_url;
    });

    $(".onclickloader").click(function (event) {
        event.preventDefault();
        var this_obj = $(this);
        var url = this_obj.attr("href");       
        displayloader();
        window.location.href = url;
    });

    $(".show_break_down").bind('click', function (event) {
        event.preventDefault();
        var thisobj = $(this);

        var url = thisobj.attr("href");
        var product_selling_price = parseInt($("#product_selling_price").val());

        if (!isNaN(product_selling_price)) {
            $("#break-up-loader").show();
            url = url + "/" + product_selling_price;
            $.ajax({
                url: url,
                context: document.body
            }).done(function (data) {
                $("#break-up-loader").hide();
                $("#price_break_down").html(data);
                $("#price_break_down").append('<div class="col-sm-12"><a href="javascript:void(0);" id="hide_break_down" class="pull-right margin-bottom">Hide Break Down</a></div>');
            });
        }
    });

    $(document).on('keypress', '#product_selling_price', function () {
        $("#price_break_down").html("");
    });

    $(document).on('click', '#hide_break_down', function () {
        $("#price_break_down").html("");
    });

});

