<script type="text/javascript">
// 		$(document).ready(function() {
//   		// $('#Loading').hide();    
// 			});

// 		function check_username(){

//   		var userName = $("#userId").val();
//   			if(userName.length > 2){
//     		// $('#Loading').show();
//     		$.post("<?php echo base_url(); ?>dashboard/check_username_availablity", {
//       			userName: $('#userId').val(),
//     			}, function(response){
            
//             if(response === 'Username sudah digunakan')
//           {
//             alert(response);
//           }
//           else if(response === 'Username tersedia'){
//             $("#adduser").submit();
//           }
//       	// 	$('#Info').fadeOut();
//        // 		$('#Loading').hide();
//       	// setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
//     		});
//     	return false;
//   		}
// 	}
  
// function finishAjax(id, response){
 
//   $('#'+id).html(unescape(response));
//   $('#'+id).fadeIn(1000);
// } 
function check_username(){var e=$("#userId").val();return e.length>2?($.post("<?php echo base_url(); ?>dashboard/check_username_availablity",{userName:$("#userId").val()},function(e){"Username sudah digunakan"===e?alert(e):"Username tersedia"===e&&$("#adduser").submit()}),!1):void 0}function finishAjax(e,a){$("#"+e).html(unescape(a)),$("#"+e).fadeIn(1e3)}$(document).ready(function(){});
</script>