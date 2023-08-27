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

        <td class="quantity-price">1</td>

        <td><input type="text" name="lot_number[]" class="form-control input-sm lot-number"  value="" required autocomplete="off"></td>
        <td><input type="date" name="expiration[]" class="form-control input-sm expiration"  value="" required autocomplete="off"></td>
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


    //change product quantity
    $('body').on('keyup change', '.quantity', function() {

        var quantity = parseFloat($(this).val());
        var price =  parseFloat( $(this).closest('tr').find('.price').val() );

        $(this).closest('tr').find('.quantity-price').html(quantity * price);

        calculateTotal();

    });//end of product quantity change


    //change product price
    $('body').on('keyup change', '.price', function() {

        var quantity = parseFloat( $(this).closest('tr').find('.quantity').val() );
        var price =   parseFloat($(this).val());

        $(this).closest('tr').find('.quantity-price').html(quantity * price);

        calculateTotal();

    });//end of product price change


    //calculate the total
    function calculateTotal() {

        var total_price = 0;
        //purchase-price
        $('.quantity-price').each(function(index) {
            total_price += parseFloat($(this).html());
        });//end of purchase-price

        $('.total-price').html(total_price);

    }//end of calculate total


     //list all purchase products
     $('.balancing-products').on('click', function(e) {

        e.preventDefault();
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
          url: url,
          method: method,
          success: function(data) {

            $('.balancings-details-div').empty();
            $('.balancings-details-div').append(data);
          }
        });

        });//end of purchase products click

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
