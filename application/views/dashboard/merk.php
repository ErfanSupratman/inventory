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
			<h3>Tipe / Merk</h3>
		</div><br>
    <!--START TABLE-->
    <div class="col-md-6">
		<!--<div class="row">-->
                    <div class="col-md-12">
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold"></h4>
                                <div class="tools">
									<a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                            <button type="button" class="btn btn-primary btn-cons" data-target="#addLokasi" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;TAMBAH MERK</button>
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
													</div> 
                                                <th style="width:20%">NAMA MERK</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($merk as $mer){ ?>
                                            <tr>
                                              <td><?php echo $mer->NAMAMERK?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    <!--</div>-->
                </div>
                <!--END TABLE-->
                </div>

    </div>
    <!--END CONTENT-->

    
                  <!-- START MODALS -->
    <div class="modal fade" id="addLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Tambah Merk</h4>
                          <p class="no-margin">Tambahkan Merk</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahmerk" method="POST" name="addmerk" id="addmerk">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control col-md-6" placeholder="Nama Merk" name="namamerk">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          <button type="submit" class="btn btn-primary" name="addmerk" id="addmerk" value="addmerk">Simpan</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->

  </div>
 </div>
<!-- END CONTAINER --> 