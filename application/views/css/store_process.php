<script type="text/javascript">
$(document).on("click", ".proses", function () {
     var myProsesId = $(this).data('id');
     $("#hasil").val( myProsesId );
});
</script>

<script type="text/javascript">
$(document).on("click", ".ambil", function () {
     var myProsesId = $(this).data('id');
     $("#nilai").val( myProsesId );
});
</script>