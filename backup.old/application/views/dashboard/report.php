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
			<h3>Report</h3>
		</div>
		<!--START TABLE-->
    <!-- BEGIN DATEPICKER CONTROLS-->
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Create<span class="semi-bold"> Report</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border">
            <form action="<?php echo base_url();?>admin/createrepport" method="POST" name="addrepport" id="addrepport">
                <div class="row form-row">
                    <div class="col-md-10">
                        <select id="siteid" style="width:100%" name="siteid">
                        <?php
                          foreach($site_list as $each){ ?>
                          <option value="<?= $each['siteId'] ?>"><?= $each['siteName'] ?></option>
                          <?php }?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Start :</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl" type="text" class="form-control" name="start">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div>
                    </div>
                    <div class="col-md-6"><label>to:</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl1" type="text" class="form-control" name="end">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div>
                    </div>
                </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div></form>
    </div>
    <!--END CONTENT-->
  </div>
 </div></div></div>
<!-- END CONTAINER --> 