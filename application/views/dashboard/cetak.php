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
    <h3>Cetak</h3>
   </div>
   <!--START TABLE-->
   <div class="row">
    <div class="col-md-12">
      <div class="grid simple">
        <div class="grid-title no-border">
          <form method="POST" action="<?php echo site_url('dashboard/downPDF')?>">
          <select id="ruangan" name="ruangan" class="controls">
          <?php foreach ($data as $key => $value): ?>
              <option value="<?php echo $value->IDLOKASI?>"><?php echo $value->NAMALOKASI?></option>
          <?php endforeach ?>
          </select>
          <button class="btn" type="submit">Cetak</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>
</div>