<div class="container">
  <div class="row login-container column-seperation">  
        <div class="col-md-5 col-md-offset-1">
          <h2>Sign in to <b>SCBD</b>net Portal</h2>
          <p><b>SCBD</b>net Online Customer Portal<br><br><br>
          <b>Phone :</b> 021. 255 25100 | <b>Email : </b><a href="mailto:helpdesk@scbd.net.id">helpdesk@scbd.net.id</a>
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

		 	<!-- Start FORM -->
		 	<!--<form id="login-form" class="login-form" action="index.html" method="post">-->

      <?php 
      $data = array('id' => 'login-form', 'class'=>'login-form');
      echo form_open('login_con/login_form',$data); ?>

		 <div class="row">
		 <div class="form-group col-md-10">
            <label class="form-label">Username</label>
            <div class="controls">
				<div class="input-with-icon  right">                                       
					<i class=""></i>
          <?php $data = array('name'=>'txtusername','class'=>'form-control');
          echo form_input($data); ?>
					<!-- <input type="text" name="txtusername" id="txtusername" class="form-control"> -->                               
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
          <?php $data = array('name'=>'txtpassword','class'=>'form-control');
          echo form_password($data); ?>
					<!-- <input type="password" name="txtpassword" id="txtpassword" class="form-control">-->                            
			</div>-->
            </div>
          </div>
          </div>

		  <div class="row">
          	<div class="control-group  col-md-10">
          
              	<input type="checkbox" id="checkbox1" value="1">
              	<label for="checkbox1">Keep me reminded </label>
            	</div>
          	</div>
          </div>

          <div class="row">
            <div class="col-md-10">
            <?php $attribute = array('class'=>'btn btn-primary btn-cons pull-right','value'=>'Submit');
            echo form_submit($attribute);
            echo form_close();
            ?>
              <!--<button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>-->
            </div>
          </div>

<!--</form>-->
		<!--End FORM-->

    </div>

</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
