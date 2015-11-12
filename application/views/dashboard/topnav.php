<div class="header navbar navbar-inverse "> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="navbar-inner">
  <div class="header-seperation"> 
    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">  
     <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>     
    </ul>
      <!-- BEGIN LOGO -->
      <a href="dashboard"><img src="<?php echo base_url(); ?>assets/images/logo.png" class="logo" alt=""  data-src="<?php echo base_url(); ?>assets/images/logo.png" width="106" height="21"/></a>
      <!-- END LOGO --> 
      <ul class="nav pull-right notifcation-center">  
        <li class="dropdown" id="header_task_bar"> <a href="dashboard" class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
    <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <div class="iconset top-chat-white "></div> </a> </li>        
      </ul>
      </div>
      <!-- END RESPONSIVE MENU TOGGLER --> 
      <div class="header-quick-nav" > 
      <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="pull-left"> 
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
            <div class="iconset top-menu-toggle-dark"></div>
            </a> </li>
        </ul>
        <ul class="nav quick-section">
          <li class="quicklinks"> <a href="#" class="" >
            <div class="iconset top-reload" onclick="window.location.reload()"></div>
            </a> </li>
      </ul>
      <ul class="nav quick-section">
          <li class="quicklinks"></li>
      </ul>
        

    </div>
   <!-- END TOP NAVIGATION MENU -->
   <!-- BEGIN CHAT TOGGLER -->
      <div class="pull-right"> 
    <div class="chat-toggler">  
        <!--<a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">-->
          <div class="user-details"> 
            <div class="username">
              <span class="badge badge-important"></span>            
            </div>            
          </div> 
          <div class="iconset "></div>
        </a>          
      </div>

      <ul class="nav quick-section ">
        <li>
           <div class="user-details"> 
            <div class="username">
              <span class="badge badge-important bg-green">Welcome <?php echo $user?></span>            
            </div>            
          </div> 
        </li>
        <li class="quicklinks"> 
          <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">            
            <div class="iconset top-settings-dark "></div>  
          </a>
          <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                  <li class="divider"></li>
                  <li><a href="" data-target="#Edit" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Ubah Password</a></li>                
                  <li><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Keluar</a></li>
                  
          </ul>
        </li> 
      </ul>
      </div>
     <!-- END CHAT TOGGLER -->

      </div> 
      <!-- END TOP NAVIGATION MENU --> 
   
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <br>
        <i class="icon-credit-card icon-7x"></i>
        <h4 id="myModalLabel" class="semi-bold">Ubah Password</h4>
        <p class="no-margin">Formulir Perubahan Password</p>
        <br>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url();?>dashboard/updatepassword" method="POST" name="uppass" id="uppass">
        <div class="row form-row">
          <div class="col-md-12">
            <input type="text" value="<?php echo $user?> " class="form-control" name="username" readonly>
            <input type="password" class="form-control" placeholder="Password Baru" name="pwd" >
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="adduser" id="adduser" value="adduser">Save changes</button>
      </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
  </div> <!-- ENDS MODALS -->
</div>