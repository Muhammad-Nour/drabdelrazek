<script type="text/javascript">

	$('.country-select').on('change', function() {
    var country_id = $(this).val();
    var method = "get";
    var url = $(this).data('url');
    $.ajax({
        url: url,
        method: method,
        data:{country_id:country_id},
        success: function(data) {
            $('.state-select').empty();
            $('.state-select').append(data);
        }
    })

});

</script>


<script>
    //Initialize Select2 Elements
  $('#select2').select2({search: true})
</script>


<script src="{{asset('design-site/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('design-site/js/app.min.js')}}"></script>
<script src="{{asset('design-site/js/vscustom-carousel.min.js')}}"></script>
<script src="{{asset('design-site/js/ajax-mail.js')}}"></script>
<script src="{{asset('design-site/js/main.js')}}"></script>

<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH89B75W"
height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


