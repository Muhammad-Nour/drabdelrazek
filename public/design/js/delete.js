$('body').on('click', '.delete', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'هل تريد الحذف ؟',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'لا',
    }).then((result) => {
        if (result.isConfirmed) {
            $(this).closest('form').submit();
        }
    })

});


/*
$('body').on('click', '.delete', function(e) {
    e.preventDefault();

    var result = confirm("هل تريد الحذف ؟");

    if (result) {
        $(this).closest('form').submit();
    }

});
*/
