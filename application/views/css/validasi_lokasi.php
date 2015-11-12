<script type="text/javascript">
// 		$(document).ready(function() {
//   		// $('#Loading').hide();    
// 			});
//   function check_kodelokasi(){

//       var kodeLoks = $("#kodeId").val();
//         if(kodeLoks.length > 2){
//         //  $('#Loading').show();
//         $.post("<?php echo base_url(); ?>dashboard/check_kodelokasi_oke", {
//             kodeLoks: $('#kodeId').val(),
//           }, function(response){

//           if(response === 'Kodelokasi sudah terdaftar')
//           {
//             alert(response);
//           }
//           else if(response === 'Kodelokasi dapat ditambahkan'){
//             $("#addlokasi").submit();
//           }

//         //   $('#Info').fadeOut();
//         //   $('#Loading').hide();
//         // setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
//         });
//       return false;
//       }
//   }
// function finishAjax(id, response){
 
//   $('#'+id).html(unescape(response));
//   $('#'+id).fadeIn(1000);
// } 
function check_kodelokasi(){var a=$("#kodeId").val();return a.length>2?($.post("<?php echo base_url(); ?>dashboard/check_kodelokasi_oke",{kodeLoks:$("#kodeId").val()},function(a){"Kodelokasi sudah terdaftar"===a?alert(a):"Kodelokasi dapat ditambahkan"===a&&$("#addlokasi").submit()}),!1):void 0}function finishAjax(a,o){$("#"+a).html(unescape(o)),$("#"+a).fadeIn(1e3)}$(document).ready(function(){});
</script>