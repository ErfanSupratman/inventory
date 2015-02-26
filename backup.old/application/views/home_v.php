
<?php 
	if($level == "1")
	{
		$you = "Administrator";
		$link = "admin";
	}else {
        $you = "Operator";
        $link = "operator";
    }
?>
<body class="error-body no-top">
<div class="container">
<!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <br>
                        <i class="icon-credit-card icon-7x"></i>
                        <h4 id="myModalLabel" class="semi-bold">Login Confirmation</h4>
                        <p class="no-margin">
                        Hello <?php echo $pengguna->userName;?> , now you're logged in as <?php echo "$you"; ?>
                        </p>
                        <br>
                    </div>
                
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="window.location.href='login/logout'">Cancel</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.href='<?php echo($link)?>'">Forward</button>
                        </div>
                 </div>
            </div>
</div>