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
			<h3>Manage case</h3>
		</div>
		<!--START TABLE-->
		<div class="row">
                    <div class="col-md-12">
                    	<!--<button type="button" class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;SUBMIT PROBLEM</button>-->
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                                <h4><span class="semi-bold">New </span>Case</h4>
                                <div class="tools">	<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                  <button type="button" class="btn btn-primary btn-cons" data-target="#myModal" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;SUBMIT NEW CASE</button>
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:10%">Date Opened</th>
                                                <th style="width:10%">Time Opened</th>
                                                <th style="width:10%">Work Site</th>
                                                <th style="width:15%">Client</th>
                                                <th style="width:15%">Category</th>
                                                <th style="width:30%">Detail</th>
                                                <th style="width:5%">Status</th>
                                                <th style="width:4%">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                            foreach($case_list as $prob){ ?>
                                            <tr>
                                              <td class="v-align-middle"><?php echo $prob->caseDateOpened?></td>
                                              <td class="v-align-middle"><?php echo $prob->caseTimeOpened?></td>
                                              <td class="v-align-middle"><?php echo $prob->siteName?></td>
                                              <td class="v-align-middle"><?php echo $prob->clientSiteName?></td> 
                                              <td class="v-align-middle"><?php echo $prob->categoryName?></td>
                                              <td class="v-align-middle"><?php echo $prob->caseDetail?></td>
                                              <td class="v-align-middle"><?php echo $prob->caseStatusCategory?></td>
                                              <td><button class="btn btn-mini btn-success dropdown-toggle btn-demo-space" data-toggle="dropdown">
                                              <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#myProcess" class="proses" data-toggle="modal" data-id="<?php echo $prob->caseId;?>">Process</a></li>
                                                    <li><a href="<?php echo base_url(); ?>operator/updatequeued/<?php echo $prob->caseId;?>">Queue</a></li>
                                                    <li><a href="<?php echo base_url(); ?>operator/deletecase/<?php echo $prob->caseId;?>">Delete</a></li>
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

                <!--START SECOND TABLE -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                            	<h4><span class="semi-bold">On Progress </span>Case</h4>
                                <div class="tools">	<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                  
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:10%">Time Opened</th>
                                                <th style="width:10%">Work Site</th>
                                                <th style="width:10%">Client</th>
                                                <th style="width:10%">Category</th>
                                                <th style="width:20%">Detail</th>
                                                <th style="width:15%">Analyst</th>
                                                <th style="width:25%">Resolution</th>
                                                <th style="width:5%">Status</th>
                                                <th style="width:4%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                            foreach($case_processed as $pross){ ?>
                                            <tr>
                                              <td class="v-align-middle"><?php echo $pross->caseTimeOpened?></td>
                                              <td class="v-align-middle"><?php echo $pross->siteName?></td>
                                              <td class="v-align-middle"><?php echo $pross->clientSiteName?></td>
                                              <td class="v-align-middle"><?php echo $pross->categoryName?></td>
                                              <td class="v-align-middle"><?php echo $pross->caseDetail?></td>
                                              <td class="v-align-middle"><?php echo $pross->caseAnalyst?></td>
                                              <td class="v-align-middle"><?php echo $pross->caseResolution?></td>
                                              <td class="v-align-middle"><?php echo $pross->caseStatusCategory?></td>
                                              <td><button class="btn btn-mini btn-success dropdown-toggle btn-demo-space" data-toggle="dropdown">
                                              <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#myProcess" class="proses" data-toggle="modal" data-id="<?php echo $pross->caseId;?>">Revision</a></li>
                                                    <li><a href="<?php echo base_url(); ?>operator/closecase/<?php echo $pross->caseId;?>">Close</a></li>
                                                    <!--<li><a href="<?php echo base_url(); ?>operator/deletecaseproses/<?php echo $pross->caseId;?>">Delete</a></li>-->
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
                <!--END SECOND TABLE -->

                <!--START THIRD TABLE-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="grid simple ">
                            <div class="grid-title no-border">
                            	<h4><span class="semi-bold">Closed </span>Case</h4>
                                <div class="tools">	<a href="javascript:;" class="collapse"></a>
									<a href="#grid-config" data-toggle="modal" class="config"></a>
									<a href="javascript:;" class="reload"></a>
                                </div>
                            </div>
                            <div class="grid-body no-border">
                                  
                                    <table class="table no-more-tables">
                                        <thead>
                                            <tr>
                                                <th style="width:8%">Date Opened</th>
                                                <th style="width:8%">Time Opened</th>
                                                <th style="width:10%">Work Site</th>
                                                <th style="width:5%">Client</th>
                                                <th style="width:5%">Category</th>
                                                <th style="width:20%">Detail</th>
                                                <th style="width:5%">Analyst</th>
                                                <th style="width:20%">Resolution</th>
                                                <th style="width:10%">Date Closed</th>
                                                <th style="width:10%">Time Closed</th>
                                                <th style="width:5%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php
                                            foreach($case_fix as $fix){ ?>
                                            <tr>
                                              <td class="v-align-middle"><?php echo $fix->caseDateOpened?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseTimeOpened?></td>
                                              <td class="v-align-middle"><?php echo $fix->siteName?></td>
                                              <td class="v-align-middle"><?php echo $fix->clientSiteName?></td>
                                              <td class="v-align-middle"><?php echo $fix->categoryName?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseDetail?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseAnalyst?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseResolution?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseDateClosed?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseTimeClosed?></td>
                                              <td class="v-align-middle"><?php echo $fix->caseStatusCategory?></td>
                                            </tr>
                                           <?php }?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END THIRD TABLE-->

    </div>
    <!--END CONTENT-->

    <!-- START MODALS -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Insert New Case</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>operator/addcase" method="POST" name="addticket" id="addticket">
                          <div class="row form-row">
                            <div class="col-md-8">
                              <select id="siteid" style="width:100%" name="siteid">
                                <?php
                                    foreach($site_list as $each){ ?>
                                    <option value="<?= $each['siteId'] ?>"><?= $each['siteName'] ?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <select id="clientid" style="width:100%" name="clientid">
                                <option value="0">- Pilih -</option>
                              </select>
                            </div>

                            <div class="col-md-8">
                              <select id="categoryid" style="width:100%" name="categoryid">
                                <?php
                                    foreach($category_list as $cat){ ?>
                                    <option value="<?php echo $cat->categoryId?>"><?php echo $cat->categoryName?></option>
                                <?php }?>
                              </select>
                            </div>

                          </div>
                          <div class="row form-row">
                            <div class="col-md-12">
                              <textarea name="problem" class="form-control" placeholder="Masalah yang terjadi" rows="6"></textarea>
                          </div></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div></form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->


                  <!-- START MODALS -->
    <div class="modal fade" id="myProcess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Process Case</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>operator/updateprocess" method="POST" name="addproses" id="addproses">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" name="analis" placeholder="Analyst Name">
                            </div>
                            <div class="col-md-12">
                              <textarea name="resolusi" class="form-control" placeholder="Resolusi" rows="6"></textarea>
                          </div>
                            <input type="text" id="hasil" name="hasil" hidden/>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Process</button>
                        </div></form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->




        <!-- START MODALS -->
    <div class="modal fade" id="myCatt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Insert New Category</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>operator/addcategory" method="POST" name="addcategory" id="addcategory">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" name="category" placeholder="New Category Name">
                            </div>
                          </div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="addcategory" id="addcategory">Save Changes</button>
                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->


        <div class="modal fade" id="upCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Update Category Name</h4>
                          <p class="no-margin">Make sure, you insert the right data</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>operator/updatecategory" method="POST" name="updatecategory" id="updatecategory">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control" name="categ" placeholder="New Category Name">
                            </div>
                            <input type="text" id="nilai" name="nilai" hidden/>
                          </div>
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="addcategory" id="addcategory">Update</button>
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