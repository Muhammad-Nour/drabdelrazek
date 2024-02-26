
<!-- jQuery -->
<script src="{{ asset('design/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('design/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('design/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('design/admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('design/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('design/admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('design/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('design/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('design/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('design/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('design/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('design/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('design/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('design/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('design/admin/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('design/admin/dist/js/pages/dashboard.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('design/admin/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('design/js/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('design/js/sweetalert2.all.min.js') }}"></script>

<script>
    //Initialize Select2 Elements
  $('#select2').select2({search: true})
</script>

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
  $(document).ready(function(){
  $('#add_image').click(function(){
      $('#add_image_form').toggle(500);
  });
});
</script>

<script type="text/javascript">
$(document).ready(function () {
    $("#add").submit(function () {
        $(".btn-style").attr("disabled", true);
        return true;
    });
});
</script>

<script>
    $('.actions-dropdown .dropdown-menu').addClass("dropdown-menu-right");
</script>

<script src="{{ asset('design/js/printThis.js') }}"></script>
<script src="{{ asset('design/js/delete.js') }}"></script>
<script src="{{ asset('design/js/print.js') }}"></script>
<script src="{{ asset('design/js/divjs.js') }}"></script>

