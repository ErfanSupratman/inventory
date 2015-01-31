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
                                  <button type="button" class="btn btn-primary btn-cons" data-target="#addUser" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;ADD USER</button>
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:15%">Name</th>
                                                <th style="width:15%">Email</th>
                                                <th style="width:6%">Ext.</th>
                                                <th style="width:20%">Desktop Number</th>
                                                <th style="width:10%">Desktop Type </th>
                                                <th style="width:20%">Company</th>
                                                <th style="width:5%">Privilege Level</th>
                                                <th style="width:5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <tr>
                                            <?php
                                            foreach($user_list as $user){ ?>
                                            <tr>
                                              <td><?php echo $user->userName?></td>
                                              <td><?php echo $user->userEmail?></td>
                                              <td><?php echo $user->userTelp?></td>
                                              <td><?php echo $user->userNoDesktop?></td>
                                              <td><?php echo $user->userTypeDesktop?></td>
                                              <td><?php echo $user->userCompany?></td>
                                              <td><?php echo $user->privilegeStatus?></td>
                                              <td><button class="btn btn-mini btn-success dropdown-toggle btn-demo-space" data-toggle="dropdown">
                                                  <span class="caret"></span></button>
                                                  <ul class="dropdown-menu">
                                                      <li><a href="#updUser" class="ambil" data-toggle="modal" data-id="<?php echo $user->userId;?>">Update</a></li>
                                                      <li><a href="<?php echo base_url(); ?>admin/deleteuser/<?php echo $user->userId;?>">Delete</a></li>
                                                  </ul>
                                                  </td>
                                            </tr>
                                           <?php }?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END TABLE-->

                <!--START THIRD TABLE-->
                <div class="col-md-6">                  
                        <div class="row">
                                <div class="grid simple ">
                                    <div class="grid-title no-border">
                                            <h4>Level <span class="semi-bold">Privilege</span></h4>
                                        <div class="tools"> <a href="javascript:;" class="collapse"></a>
                                            <a href="#grid-config" data-toggle="modal" class="config"></a>
                                            <a href="javascript:;" class="reload"></a>
                                        </div>
                                    </div>
                                    <div class="grid-body no-border">
                                             <h3>Privilege  <span class="semi-bold">Level</span></h3>
                                             <br>
                                             <table class="table table-bordered no-more-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:32%">Level</th>
                                                        <th class="text-center" style="width:12%">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                            foreach($level_list as $priv){ ?>
                                            <tr>
                                              <td><?php echo $priv->privilegeStatus?></td>
                                              <td><?php echo $priv->TotalPrivilegeUser?></td>
                                            </tr>
                                           <?php }?>
                                                </tbody>
                                             </table>
                                    </div>
                                </div>
                <!--END THIRD TABLE-->

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
                          <h4 id="myModalLabel" class="semi-bold">Add New User</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>admin/adduser_to_db" method="POST" name="adduser" id="adduser">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="New Username" name="userId" id="userId" value="" onblur="return check_username();">
                              <div id="Info"></div></span><span id="Loading"><img src="<?php echo base_url(); ?>assets/img/loading.gif" alt="" /></span>
                              <input type="text" class="form-control" placeholder="Complete Name" name="completename" >
                              <input type="text" class="form-control" placeholder="Email" name="email">
                              <input type="text" class="form-control" placeholder="Phone Ext." name="phone">
                              <input type="text" class="form-control" placeholder="Desktop no." name="desktop">
                              <input type="text" class="form-control" placeholder="Desktop type" name="type">
                              <input type="text" class="form-control" placeholder="Company" name="company">
                              <select id="level" style="width:100%" name="level">
                  
                                <?php
                                    foreach($priv_list as $list){ ?>
                                    <option value="<?php echo $list->privilegeId?>"><?php echo $list->privilegeStatus?></option>
                                <?php }?>

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


    <!-- START MODALS -->
    <div class="modal fade" id="updUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Add New User</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>admin/updateuser" method="POST" name="adduser" id="adduser">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" placeholder="Complete Name" name="completename" >
                              <input type="text" class="form-control" placeholder="Email" name="email">
                              <input type="text" class="form-control" placeholder="Phone Ext." name="phone">
                              <input type="text" class="form-control" placeholder="Desktop no." name="desktop">
                              <input type="text" class="form-control" placeholder="Desktop type" name="type">
                              <input type="text" class="form-control" placeholder="Company" name="company">
                              <select id="level" style="width:100%" name="level">
                  
                                <?php
                                    foreach($priv_list as $list){ ?>
                                    <option value="<?php echo $list->privilegeId?>"><?php echo $list->privilegeStatus?></option>
                                <?php }?>

                              </select>
                            </div>
                            <input type="text" id="nilai" name="nilai" hidden/>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="adduser" id="adduser" value="adduser">Update</button>
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