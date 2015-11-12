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
			<h3>Kode Barang</h3>
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
                            <button type="button" class="btn btn-primary btn-cons" data-target="#addkode" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;TAMBAH KODE BARANG</button>
                                    <table id="tablekode" class="table no-more-tables">
                                        <thead>
                                            <tr>
													</div> 
                                                <th style="width:20%">KODE</th>
                                                <th style="width:75%">NAMA KODE</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach($kode as $kod){ ?>
                                            <tr>
                                              <td><?php echo $kod->KODE?></td>
                                              <td><?php echo $kod->NAMAKODE?></td>
                                              <td><a href="<?php echo base_url(); ?>dashboard/selectkode/<?php echo $kod->IDKODE;?>" data-target="#editkode" data-toggle="modal" >Edit</a> | <a href="<?php echo base_url(); ?>dashboard/deletekode/<?php echo $kod->IDKODE;?>">Delete</a> </td>
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
    <div class="modal fade" id="addkode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button onclick="javascript:window.location.reload()" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Tambah kode</h4>
                          <p class="no-margin">Tambahkan kode</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahkode" method="POST" name="addkode" id="addkode">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control col-md-6" placeholder="Kode Barang" name="kodebarang" id="kodebarangId" value="" >
                              <input type="text" class="form-control" placeholder="Nama Kode" name="namakode">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button onclick="javascript:window.location.reload()" type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          <button type="submit"  onclick="return check_kode();" class="btn btn-primary" name="addkodebtn" id="addkodebtn" value="addkode">Simpan</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->
  
 <div class="modal fade" id="editkode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Ubah kode</h4>
                          <p class="no-margin">Mengubah kode</p>
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
    $('#tablekode').DataTable();
});
</script>