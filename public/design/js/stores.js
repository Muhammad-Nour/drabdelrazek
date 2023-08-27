//list all items
$('.show-items-list').on('click', function(e) {
    e.preventDefault();
    var url = $(this).data('url');
    var method = $(this).data('method');

    $.ajax({
      url: url,
      method: method,
      success: function(data) {
        $('.items-list-div').empty();
        $('.items-list-div').append(data);
      }
    });

});//end of list items
