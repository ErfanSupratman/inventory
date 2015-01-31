<script type="text/javascript">
	$(document).ready(function() {
		$('#clientid').prop('disabled', true);
		$('#siteid').change(function() {
			//alert(1);
			$("#clientid option").each(function() {
				$(this).remove();
			});
			var val = this.value;
			//alert(val);
			if (val == 0) {
				//alert(1);
				$('#clientid').prop('disabled', true);
				return;
			}
			$('#clientid').prop('disabled', false);
			$.get('<?php echo site_url("operator/getclientbysite");?>' + '/' + val, function(data) {
				//$('#clientid').append('<option></option>');
				$.each(data, function(key, value) {
					$('#clientid').append('<option value="'+value.clientSiteId+'">'+value.clientSiteName+'</option>');
				});
			}, 'json');
		});
	});
</script>