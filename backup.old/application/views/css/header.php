<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Inventaris IF</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url(); ?>assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>


<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
<link href="<?php echo base_url(); ?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- END PLUGIN CSS -->


<style>
.datepicker{z-index:1151;}
</style>

<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
		$(document).ready(function() {
  		$('#Loading').hide();    
			});

		function check_username(){

  		var userId = $("#userId").val();
  			if(userId.length > 2){
    		$('#Loading').show();
    		$.post("<?php echo base_url(); ?>dashboard/check_username_availablity", {
      			userId: $('#userId').val(),
    			}, function(response){
      		$('#Info').fadeOut();
       		$('#Loading').hide();
      	setTimeout("finishAjax('Info', '"+escape(response)+"')", 450);
    		});
    	return false;
  		}
	}

function finishAjax(id, response){
 
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn(1000);
} 
</script> 
<!-- END CSS TEMPLATE -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">