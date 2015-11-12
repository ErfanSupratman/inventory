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
			<h3>Sumber Dana</h3>
		</div><br>
    <!--START TABLE-->
    <div class="col-md-12">
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
                            <button type="button" class="btn btn-primary btn-cons" data-target="#addSite" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;TAMBAH SUMBER DANA</button>
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
													</div> 
                                                <th style="width:20%">KODE SUMBER</th>
                                                <th style="width:75%">NAMA SUMBER DANA</th>
                                                <th style="width:5%">OPERASI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($sumber as $sum){ ?>
                                            <tr>
                                              <td><?php echo $sum->KODESUMBER?></td>
                                              <td><?php echo $sum->NAMASUMBER?></td>
                                              <td><button class="btn btn-mini btn-success dropdown-toggle btn-demo-space" data-toggle="dropdown">
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu">
                                                      <li><a href="#upCet" class="ambil" data-toggle="modal" data-id="<?php //echo $site->siteId;?>">Update</a></li>
                                                      <li><a href="<?php //echo base_url(); ?>dashboard/deletesumber/<?php //echo $sum->IDSUMBER;?>">Hapus</a></li>
                                                  </ul>
                                              </td>
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
    <div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Tambah Sumber Dana</h4>
                          <p class="no-margin">Tambahkan Sumber Dana</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahsumber" method="POST" name="addsumber" id="addsumber">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Kode Sumber Dana" name="kodesumber">
                              <input type="text" class="form-control" placeholder="Nama Sumber Dana" name="namasumber">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          <button type="submit" class="btn btn-primary" name="addsumber" id="addsumber" value="addsumber">Simpan</button>
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