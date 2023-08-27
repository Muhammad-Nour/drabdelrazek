//add product btn
$('body').on('click', '.add-purchases-btn', function (e) {

    e.preventDefault();
    var name = $(this).data('name');
    var id = $(this).data('id');
    var unit = $(this).data('unit');
    var price = $(this).data('price');

    var html =
    `<tr>
        <td>${name}</td>
        <td>${unit}</td>
        <input type="hidden" name="product_id[]" value="${id}">
        <td><input type="text" name="quantity[]" class="form-control input-sm quantity"  value="1" required autocomplete="off"></td>
        <td><input type="text" name="price[]" class="form-control input-sm price"  value="1" required autocomplete="off"></td>
        <td><input type="text" name="discount_percent_product[]" class="form-control input-sm discount-percent-product"  value="0" required autocomplete="off"></td>
        <td><input type="text" name="discount_product[]" class="form-control input-sm discount-product"  value="0" required autocomplete="off"></td>
        <td class="net-price-product">1</td>
        <td class="quantity-price">1</td>

        <td><input type="text" name="lot_number[]" class="form-control input-sm lot-number"  value="" required autocomplete="off"></td>
        <td><input type="date" name="expiration[]" class="form-control input-sm expiration"  value="" required autocomplete="off"></td>
        <td><input type="text" name="sale_price[]" class="form-control input-sm sale-price"  value="${price}" required autocomplete="off"></td>
        <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
    </tr>`;

    $('.products-list').append(html);

    //to calculate total price
    calculateTotal();
});

//remove product btn
$('body').on('click', '.remove-product-btn', function(e) {

    e.preventDefault();
    var id = $(this).data('id');

    $(this).closest('tr').remove();
    $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

    //to calculate total price
    calculateTotal();

});//end of remove product btn


    //get supplier prev amount
    $('.supplier').on('change', function() {

        var supplier = $(this).val();
        var url = $(this).data('url');

        var method = "get";
        $.ajax({
            url: url,
            method: method,
            data:{value:supplier},
            success: function(data) {
                $('.prev-amount').html(data);

                calculateTotal();
            }
        })
    });
    //end get supplier prev amount

    //change type
    $('.type').on('change', function() {

        calculateTotal();
    });//end of type change

    //change product quantity
    $('body').on('keyup change', '.quantity', function() {

        var quantity = parseFloat($(this).val());
        var price =  parseFloat( $(this).closest('tr').find('.price').val() );

        $(this).closest('tr').find('.quantity-price').html(quantity * price);

        var discount_percent =  parseFloat( $(this).closest('tr').find('.discount-percent-product').val() );
        var discount_cut =  parseFloat( $(this).closest('tr').find('.discount-product').val() );

        var discount = 0;
        if(discount_percent > 0){
            var discount = (discount_percent / 100) * total_price;
        }
        else if(discount_cut > 0){
            var discount = discount_cut;
        }

        var net_price = price - discount;
        $(this).closest('tr').find('.net-price-product').html(net_price);

        calculateTotal();

    });//end of product quantity change


    //change product price
    $('body').on('keyup change', '.price', function() {

        var quantity = parseFloat( $(this).closest('tr').find('.quantity').val() );
        var price =   parseFloat($(this).val());
        $(this).closest('tr').find('.quantity-price').html(quantity * price);

        var discount_percent =  parseFloat( $(this).closest('tr').find('.discount-percent-product').val() );
        var discount_cut =  parseFloat( $(this).closest('tr').find('.discount-product').val() );

        var discount = 0;
        if(discount_percent > 0){
            var discount = (discount_percent / 100) * total_price;
        }
        else if(discount_cut > 0){
            var discount = discount_cut;
        }

        var net_price = price - discount;
        $(this).closest('tr').find('.net-price-product').html(net_price);

        calculateTotal();

    });//end of product price change

    //change discount-percent-product
    $('body').on('keyup change', '.discount-percent-product', function() {

        var price =  parseFloat( $(this).closest('tr').find('.price').val() );
        var discount =  ( parseFloat($(this).val()) / 100 ) * price;
        var net_price = price - discount;

        $(this).closest('tr').find('.net-price-product').html(net_price);
        var quantity = parseFloat( $(this).closest('tr').find('.quantity').val() );

        $(this).closest('tr').find('.quantity-price').html(quantity * net_price);

        calculateTotal();

    });//end of discount-percent-product

    //change discount-percent-product
    $('body').on('keyup change', '.discount-product', function() {

        var price =  parseFloat( $(this).closest('tr').find('.price').val() );
        var discount =  parseFloat($(this).val()) ;
        var net_price = price - discount;
        $(this).closest('tr').find('.net-price-product').html(net_price);

        var quantity = parseFloat( $(this).closest('tr').find('.quantity').val() );

        $(this).closest('tr').find('.quantity-price').html(quantity * net_price);

        calculateTotal();

    });//end of discount-percent-product

    //change discount
    $('.discount-percent').on('keyup change', function() {
        calculateTotal();
    });//end of discount

    //change discount
    $('.discount').on('keyup change', function() {
        calculateTotal();
    });//end of discount

    //change vat
    $('.vat').on('keyup change', function() {
        calculateTotal();
    });//end of vat

    //change payment
    $('.payment').on('keyup change', function() {

        calculateTotal();
    });//end of payment change

    //change shipping_cost
    $('.shipping-cost').on('keyup', function() {

        calculateTotal();
    });//end of shipping_cost change


    //calculate the total
    function calculateTotal() {

    var total_price = 0;
    //purchase-price
    $('.quantity-price').each(function(index) {
        total_price += parseFloat($(this).html());
    });//end of purchase-price

    $('.total-price').html(total_price);

    var discount_percent =  parseFloat($('.discount-percent').val());
    var discount_cut =  parseFloat($('.discount').val());

    var discount = 0;
    if(discount_percent > 0){
        var discount = (discount_percent / 100) * total_price;
    }
    else if(discount_cut > 0){
        var discount = discount_cut;
    }

    var net = total_price - discount;
    $('.net-price').html(net);

    var vat =  (parseFloat($('.vat').val()) / 100);
    var vatValue = net * vat;

    $('.vat-value').html(vatValue);

    var total = net + vatValue;
    $('.total').html(total);

    var payment =  parseFloat($('.payment').val());
    var remain = total - payment;
    $('.remain').html(remain);

    var shippingCost =  parseFloat($('.shipping-cost').val());
    var quantity = 0;
    //quantity
    $('.quantity').each(function(index) {
        quantity += parseFloat($(this).val());
    });//end of quantity

    extraCost = (shippingCost + vatValue - discount) / quantity;
    $('.extra-cost').text(extraCost);

}//end of calculate total

    //list all purchase products
    $('.purchase-products').on('click', function(e) {

        e.preventDefault();
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
          url: url,
          method: method,
          success: function(data) {

            $('.purchases-details-div').empty();
            $('.purchases-details-div').append(data);
          }
        });

        });//end of purchase products click



//get client contract
$('.client').on('change', function() {
    var client = $(this).val();
    var method = "get";
    var url2 = $(this).data('url2');
    $.ajax({
        url: url2,
        method: method,
        data:{value:client},
        success: function(data) {
            $('#contracts').empty();
            $('#contracts').append(data);
            //$('#contracts').prop('required',true);
        }
    })

});//end get client contract


// add new product
$('#newProductForm').on('submit', function(e){
    e.preventDefault();
    $('#newProductForm .btn').attr('disabled','true');

    var form_data = $(this).serialize();
    var action = $(this).data('action');
    var method = $(this).data('method');

    $.ajax({
        url: action,
        method: method,
        data: form_data,

        success: function(data) {
            $('#tableNewProducts').append(data);

            $('.ajax-msg').removeClass('text-danger').addClass('text-success');
            $('.ajax-msg').text('تم الاضافة بنجاح.');

            $('#newProductForm .btn').removeAttr('disabled');
        },
        error: function(){
            $('.ajax-msg').removeClass('text-success').addClass('text-danger');
            $('.ajax-msg').text('حدث خطأ أثناء الاضافة.');

            $('#newProductForm .btn').removeAttr('disabled');
        }
    });

});
//end add new product


// add new supplier
$('#newSupplierForm').on('submit', function(e){
    e.preventDefault();
    $('#newSupplierForm .btn').attr('disabled','true');

    var form_data = $(this).serialize();
    var action = $(this).data('action');
    var method = $(this).data('method');

    $.ajax({
        url: action,
        method: method,
        data: form_data,

        success: function(data) {
           // alert(data);
            $('#selectSupplier').append(data);

            $('.ajax-msg').removeClass('text-danger').addClass('text-success');
            $('.ajax-msg').text('تم الاضافة بنجاح.');

            $('#newSupplierForm .btn').removeAttr('disabled');
        },
        error: function(){
            $('.ajax-msg').removeClass('text-success').addClass('text-danger');
            $('.ajax-msg').text('حدث خطأ أثناء الاضافة.');

            $('#newSupplierForm .btn').removeAttr('disabled');
        }
    });

});
//end add new supplier

