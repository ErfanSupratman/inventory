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
                                <div class="tools"> <a href="javascript:;" class="collapse"></a>
                  <a href="#grid-config" data-toggle="modal" class="config"></a>
                  <a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                  <button type="button" class="btn btn-primary btn-cons" data-target="#addUser" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;ADD USER</button>
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:85%">Name</th>
                                                <th style="width:15%">Opt.</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                    <?php
                                                if(empty($user_list)){
                                                  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
                                                }else{
                                                $no = 1;
                                            foreach($user_list as $ul){ ?>
                                            <tr>
                                              <td class="text-center"><?php echo $ul->NAMAUSER?></td>
                                              <td><a href="<?php echo site_url('dashboard/deleteuser').'/'.$ul->IDUSERS;?>">Delete</a></td> 
                                            </tr>
                                           <?php $no++;}}?>
                                                </tbody>
                                             </table><div class="halaman">Halaman :</div>
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
                          <h4 id="myModalLabel" class="semi-bold">Tambah Pengguna</h4>
                          <p class="no-margin">Form tambah pengguna baru</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahuser" method="POST" name="adduser" id="adduser">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="New Username" name="username" id="userId" value="" onblur="return check_username();">
                              <div id="Info"></div></span><span id="Loading"><img src="<?php echo base_url(); ?>assets/img/loading.gif" alt="" /></span>
                              <input type="password" class="form-control" placeholder="Password" name="pwd" >
                              </select>
                            </div>
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
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->

  </div>
 </div>
<!-- END CONTAINER -->