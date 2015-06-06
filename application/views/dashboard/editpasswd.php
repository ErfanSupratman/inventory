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
			<h3>User Panel</h3>
		</div>
		<!--START TABLE-->
		<div class="row">
                    <div class="col-md-12">
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold">Panel </span>User</h4>
                                <div class="tools">	<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                            <?php foreach ($lokasi as $loks) {?>
                                  <form action="<?php echo base_url();?>dashboard/updatelokasi/<?php echo $loks->IDLOKASI?>" method="POST" name="adduser" id="adduser">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" value ="<?php echo $loks->KODELOKASI ;?>" class="form-control col-md-6" placeholder="Kode Lokasi" name="kodelokasi">
                              <input type="text" value ="<?php echo $loks->NAMALOKASI ;?>" class="form-control" placeholder="Nama Lokasi" name="namalokasi">
                              <input type="text" value ="<?php echo $loks->PJ ;?>" class="form-control" placeholder="Penanggung Jawab" name="PJ">
                              <input type="text" value ="<?php echo $loks->NIP_PJ ;?>" class="form-control" placeholder="NIP Penanggung Jawab" name="NIP_PJ">
                              <select id="lantai" style="width:100%" name="lantai">
                                <option value="1"> Lantai 1</option>
                                <option value="2"> Lantai 2</option>
                                <option value="3"> Lantai 3</option>
                              </select><?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" name="adduser" id="adduser" value="adduser">Save changes</button>
                        </div>
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TABLE-->

    </div>
    <!--END CONTENT-->
  </div>
 </div>
<!-- END CONTAINER -->