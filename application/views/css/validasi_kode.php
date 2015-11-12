<script type="text/javascript">
		$(document).ready(function() {
  		// $('#Loading').hide();    
			});
  function check_kode(){

      var kode = $("#kodebarangId").val();
        if(kode){
        //  $('#Loading').show();
        $.post("<?php echo base_url(); ?>dashboard/checkkode", {
            kode: $('#kodebarangId').val(),
          }, function(response){

          if(response === 'Kode sudah terdaftar')
          {
            alert(response);
          }
          else if(response === 'Kode dapat ditambahkan'){
            $("#addkode").submit();
          }

        });
      return false;
      }
  }
function finishAjax(id, response){
 
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 
</script>