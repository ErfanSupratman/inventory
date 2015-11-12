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
			<h3>Lokasi</h3>
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
                            <button type="button" class="btn btn-primary btn-cons" data-target="#addLokasi" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;TAMBAH LOKASI</button>
                                    <table id="tablelokasi" class="table no-more-tables">
                                        <thead>
                                            <tr>
													</div> 
                                                <th style="width:20%">KODE LOKASI</th>
                                                <th style="width:75%">NAMA LOKASI</th>
                                                <th style="width:5%">LANTAI</th>
                                                <th style="width:5%">Penanggung Jawab</th>
                                                <th style="width:5%">NIP PJ</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($lokasi as $lok){ ?>
                                            <tr>
                                              <td><?php echo $lok->KODELOKASI?></td>
                                              <td><?php echo $lok->NAMALOKASI?></td>
                                              <td><?php echo $lok->LANTAILOKASI?></td>
                                              <td><?php echo $lok->NAMAUSER?></td>
                                              <td><?php echo $lok->NIPUSER?></td>
                                              <td><a href="<?php echo base_url(); ?>dashboard/selectlokasi/<?php echo $lok->IDLOKASI;?>" data-target="#editLokasi" data-toggle="modal" >Edit</a> | <a href="<?php echo base_url(); ?>dashboard/deletelokasi/<?php echo $lok->IDLOKASI;?>">Delete</a> </td>
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
                          <button onclick="javascript:window.location.reload()" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Tambah Lokasi</h4>
                          <p class="no-margin">Tambahkan Lokasi</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahlokasi" method="POST" name="addlokasi" id="addlokasi">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control col-md-6" placeholder="Kode Lokasi" name="kodelokasi" id="kodeId" value="" >
                              <!-- <div id="Info"></div></span><span id="Loading"><img src="<?php echo base_url(); ?>assets/img/loading.gif" alt=""/></span>   -->
                              <input type="text" class="form-control" placeholder="Nama Lokasi" name="namalokasi">
                              <select id="Penanggung Jawab" style="width:100%" name="PJ">
                              <?php
                                  foreach($peje as $pj){?> 
                                  <option value="<?php echo $pj->IDUSER?>"><?php echo $pj->NAMAUSER?></option>
                                  <?php
                                  }?>
                                  </select>
                              <select id="lantai" style="width:100%" name="lantai">
                                <option value="1"> Lantai 1</option>
                                <option value="2"> Lantai 2</option>
                                <option value="3"> Lantai 3</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button onclick="javascript:window.location.reload()" type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          <button type="submit" onclick="return check_kodelokasi();" class="btn btn-primary" name="addlokasibtn" id="addlokasibtn" value="addlokasi">Simpan</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->
 <div class="modal fade" id="editLokasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Ubah Lokasi</h4>
                          <p class="no-margin">Mengubah Lokasi</p>
                          <br>
                        </div>
                        <div class="modal-body">

                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->
  </div>
 </div>

<!-- END CONTAINER --> 
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablelokasi').DataTable();
});
</script>