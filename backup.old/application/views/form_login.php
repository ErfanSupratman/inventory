<body class="error-body no-top">
<div class = "container">
<div class="row login-container">  
        <div class="col-md-6 col-md-offset-1">
          <h2>Inventory <b>IF</b> -ITS</h2>
          <p><b>Sistem Informasi Inventaris Barang</b> Informatika ITS<br><br><br>
          <!--<b>Phone :</b> 021. 255 25100 | <b>Email : </b><a href="mailto:helpdesk@scbd.net.id">helpdesk@scbd.net.id</a>
      </p>
      <p><b>Sudirman Central Business District | 18 Parc Tower A, 4th Floor</b><br>
      Jl. Jenderal Sudirman Kav. 52-53 | Jakarta Selatan 12190 | Indonesia</p>
          <br>
       <!--<button class="btn btn-block btn-success col-md-8" type="button" data-toggle="modal" data-target="#myModal">
            <span class="pull-left"><i class="icon-twitter"></i></span>
            <span class="bold">Register <i>SCBD</i>net Account</span>
        </button>-->
        </div>
        <div class="col-md-5 "> <br>
     
      <form action="<?php echo base_url();?>index.php/login/login_form" method="post" name="login" id="login">
     <div class="row">
     <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
        <div class="input-with-icon  right">                                       
          <i class=""></i>
          <input type="text" size="40" name="username" value="<?php echo set_value('username');?>" class="form-control"> <?php echo form_error('username');?>                               
        </div>
            </div>
          </div>
          </div>
      <div class="row">
          <div class="form-group col-md-10">
            <label class="form-label">Password</label>
            <span class="help"></span>
            <div class="controls">
        <div class="input-with-icon  right">                                       
          <i class=""></i>
          <input type="password" size="40" name="password" value="<?php echo set_value('password');?>" class="form-control"> <?php echo form_error('password');?>                     
        </div>
            </div>
          </div>
          </div>
      <div class="row">
          <div class="control-group  col-md-10">
            </div>
          </div>
      </div>
          <div class="row">
            <div class="col-md-11">
              <button class="btn btn-primary btn-cons pull-right" name ="login" id="login" value="Login" type="submit">Login</button>
            </div>
          </div>
      </form>
        </div>
        </div>
        </div>