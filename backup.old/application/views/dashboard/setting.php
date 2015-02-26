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
			<h3>Setting Page</h3>
		</div>
		<!--START TABLE-->
    <!-- BEGIN DATEPICKER CONTROLS-->
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>Site<span class="semi-bold"> Title</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body no-border">
            <form action="<?php echo base_url();?>admin/submitsetting" method="POST" name="addtitle" id="addrepport">
                <div class="row form-row">
                    <div class="col-md-12">
                        <input id="tgl" type="text" class="form-control" name="title" placeholder="Title here, HTML tag alowed">
                    </div>
                    <div class="col-md-12">
                        <input id="tgl" type="text" class="form-control" name="slogan" placeholder="Slogan here, HTML tag alowed">
                    </div>
                    <div class="col-md-12">
                        <input id="tgl" type="text" class="form-control" name="contact" placeholder="Contact form e.g: Phone : 021. 255 25100 | Email : helpdesk@scbd.net.id">
                    </div>
                    <div class="col-md-12">
                        <input id="tgl" type="text" class="form-control" name="address1" placeholder="Address 1 e.g: Sudirman Central Business District | 18 Parc Tower A, 4th Floor">
                    </div>
                    <div class="col-md-12">
                        <input id="tgl" type="text" class="form-control" name="address2" placeholder="Address 2 e.g: Phone : Jl. Jenderal Sudirman Kav. 52-53 | Jakarta Selatan 12190 | Indonesia">
                    </div>
                </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
    <!--END CONTENT-->
  </div>
 </div></div></div>
<!-- END CONTAINER --> 