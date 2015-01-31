<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
      </div>
    </div>
    <div class="clearfix"></div>

    <!--START CONTENT-->
    <div class="content">  
		<div class="page-title">	
			<h3>Change Password</h3>
		</div>
		<!--START TABLE-->
		<div class="row">
<div class="col-md-6">
        <div class="grid simple">
        <div class="grid-title no-border">
        <h4>Change <span class="semi-bold">Password</span></h4>
        <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
        </div>
        <div class="grid-body no-border">
        <form action="<?php echo base_url();?>admin/updatepass" method="POST" name="cpass" id="cpass">
        <div class="form-group">
        <label class="form-label">New Password</label>
        <span class="help"></span>
        <div class="input-with-icon  right">
        <i class=""></i>
        <input type="password" name="formpassword" id="formpassword" class="form-control">
        </div>
        </div>
        <div class="form-group">
        <label class="form-label">Type New Password Again</label>
        <div class="input-with-icon  right">
        <i class=""></i>
        <input type="password" name="passwordvalidate" id="passwordvalidate" class="form-control">
        </div>
        </div>
        <div class="form-actions">
        <div class="pull-right">
        <button type="submit" class="btn btn-success btn-cons"><i class="icon-ok"></i>Submit</button>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>
  </div>
  </div>
 </div>
<!-- END CONTAINER --> 