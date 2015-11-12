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
                            </div>
                            <div class="grid-body no-border">
                              <h4><span class="semi-bold">Penanggung Jawab</span></h4>
                              <button type="button" class="btn btn-primary btn-cons" data-target="#addUser" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Tambah Penanggung Jawab</button>
                              <br/>
                              <h4><span class="semi-bold">Petugas Inventaris Jurusan </span></h4>
                              <table id="tableuser" class="table no-more-tables">            
                                <thead>
                                  <tr>
                                      <th class="text-left" style="width:50%">Nama Petugas Jurusan</th>
                                      <th class="text-left" style="width:30%">NIP</th>
                                      <th class="text-left" style="width:20%">Action</th>
                                  </tr>
                                </thead>
                                <?php foreach ($petugas as $pet) {?>
                                <tbody>
                                  <tr>
                                    <td class="text-left" style="width:50%"><?php echo $pet->NAMAUSER;?></td>
                                    <td class="text-left" style="width:30%"><?php echo $pet->NIPUSER;?></td>
                                    <td class="text-left" style="width:20%"><a href="" data-target="#editPetugas" data-toggle="modal">Ubah</a></td> 
                                <?php
                                }?>
                                  </tr>
                                </tbody>
                            </table> 
                            <br/>
                            <h4><span class="semi-bold">Sekretaris Jurusan</span></h4>
                            <table class="table no-more-tables">            
                                <thead>
                                  <tr>
                                      <th class="text-left" style="width:50%">Sekretaris Jurusan</th>
                                      <th class="text-left" style="width:30%">NIP</th>
                                      <th class="text-left" style="width:20%">Action</th>
                                  </tr>
                                </thead>
                                <?php foreach ($sekjur as $sj) {?>
                                <tbody>
                                  <tr>
                                    <td class="text-left" style="width:50%"><?php echo $sj->NAMAUSER;?></td>
                                    <td class="text-left" style="width:30%"><?php echo $sj->NIPUSER;?></td>
                                    <td class="text-left" style="width:20%"><a href="" data-target="#editSekjur" data-toggle="modal">Ubah</a></td> 
                                <?php
                                }?>
                                  </tr>
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
                <!--END TABLE-->

    </div>
    <!--END CONTENT-->

    <!-- START MODALS -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <br>
            <i class="icon-credit-card icon-7x"></i>
            <h4 id="myModalLabel" class="semi-bold">Tambah Penanggungjawab</h4>
            <p class="no-margin">Form tambah penanggungjawab baru</p>
            <br>
          </div>
          <div class="modal-body">
          <form action="<?php echo base_url();?>dashboard/tambahpeje" method="POST" name="adduser" id="adduser">
            <div class="row form-row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Nama Penanggung Jawab " name="namauser" id="namauserId" value="">
                <input type="text" class="form-control" placeholder="NIP Penanggung Jawab" name="nipuser" id="nipuserId" value="">
                <input type="text" class="form-control" placeholder="Username" name="username" id="userId" value="" >
                <!-- <div id="Info"></div></span><span id="Loading"><img src="<?php echo base_url(); ?>assets/img/loading.gif" alt="" /></span> -->
                <input type="password" class="form-control" placeholder="Password" name="pwd" >
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" onclick="return check_username();" class="btn btn-primary" name="adduserbtn" id="adduserbtn" value="adduser">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div> <!-- ENDS MODALS -->

    <div class="modal fade" id="editPetugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <br>
            <i class="icon-credit-card icon-7x"></i>
            <h4 id="myModalLabel" class="semi-bold">Ubah Petugas Inventaris</h4>
            <p class="no-margin">Form Ubah Petugas Inventaris Baru</p>
            <br>
          </div>
          <div class="modal-body">
          <?php foreach ($petugas as $pet) {?>
          <form action="<?php echo base_url();?>dashboard/editpetugas/<?php echo $pet->IDUSER?>" method="POST" name="adduser" id="adduser">
            <div class="row form-row">
              <div class="col-md-12">
                <select id="iduser" style="width:100%" name="iduser">
                  <option selected="selected" value="<?php echo $pet->IDUSER?>"><?php echo $pet->NAMAUSER?></option>
                  <?php foreach ($karyawan as $kar) {?>
                  <option value="<?php echo $kar->IDUSER?>"><?php echo $kar->NAMAUSER?></option>
                  <?php
                  }?>
                </select>
              </div>
              <?php
              }?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="adduser" id="adduser" value="adduser">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div> <!-- ENDS MODALS -->

    <div class="modal fade" id="editSekjur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <br>
            <i class="icon-credit-card icon-7x"></i>
            <h4 id="myModalLabel" class="semi-bold">Ubah Petugas Inventaris</h4>
            <p class="no-margin">Form Ubah Petugas Inventaris Baru</p>
            <br>
          </div>
          <div class="modal-body">
          <?php foreach ($sekjur as $pet) {?>
          <form action="<?php echo base_url();?>dashboard/editsekjur/<?php echo $pet->IDUSER?>" method="POST" name="adduser" id="adduser">
            <div class="row form-row">
              <div class="col-md-12">
                <select id="iduser" style="width:100%" name="iduser">
                  <option selected="selected" value="<?php echo $pet->IDUSER?>"><?php echo $pet->NAMAUSER?></option>
                  <?php foreach ($dosen as $dos) {?>
                  <option value="<?php echo $dos->IDUSER?>"><?php echo $dos->NAMAUSER?></option>
                  <?php
                  }
                  ?>
                </select> 
              </div>
              <?php
              }?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="adduser" id="adduser" value="adduser">Save changes</button>
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
