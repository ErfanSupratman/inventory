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
    <?php foreach ($namalokasi as $loks) {?>	
      <h3>Inventaris <?php echo $loks->NAMALOKASI;?></h3>
    <?php
    }
    ?>
   </div>
   <!--START TABLE-->
   <div class="row">
    <div class="col-md-14">
      <div class="grid simple">
        <div class="grid-body no-border">
          <br> 
          <a  href="<?php echo site_url('dashpeje/downpdf').'/'.$idlokasi;?>"><button type="button" class="btn btn-primary btn-cons" ><i class="fa fa-check"></i>&nbsp;Cetak</button>                                         
</a>
          <br>
          </div>
          <div class="grid-body no-border">
            <table id="tableruangan" class="table no-more-tables">
              <thead>
                <tr>
                    <th class="text-center" style="width:15%">Nama Barang</th>
                    <th class="text-center" style="width:3%">Kode</th>
                    <th class="text-center" style="width:3%">Jumlah</th>
                    <th class="text-center" style="width:5%">Harga</th>
                    <th class="text-center" style="width:5%">Tanggal Masuk</th>
                    <th class="text-center" style="width:5%">Tanggal SPJ</th>
                    <th class="text-center" style="width:3%">Kondisi</th>
                    <th class="text-center" style="width:5%">Merk</th>
                    <!-- <th class="text-center" style="width:5%">Type</th> -->
                    <th class="text-center" style="width:5%">Sumber Dana</th>
                    <th class="text-center" style="width:5%">Lokasi</th>
                    <th class="text-center" style="width:5%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if(empty($barang)){
                  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
                }else{
                $no = 1;
                foreach($barang as $ca){ ?>
                <tr>
                  <td class="text-center"><?php echo $ca->NAMABARANG?></td>
                  <td class="text-center"><?php echo $ca->KODE?></td>
                  <td class="text-center"><?php echo $ca->JUMLAHBARANG?></td>
                  <td class="text-center"><?php echo $ca->HARGABARANG?></td>
                  <td class="text-center"><?php echo $ca->TANGGALMASUK?></td>
                  <td class="text-center"><?php echo $ca->TANGGALSPJ?></td>
                  <td class="text-center"><?php echo $ca->NAMAKONDISI?></td>
                  <td class="text-center"><?php echo $ca->MERKBARANG?></td>
                  <!-- <td class="text-center"><?php echo $ca->TIPEBARANG?></td> -->
                  <td class="text-center"><?php echo $ca->NAMASUMBER?></td>
                  <td class="text-center"><?php echo $ca->NAMALOKASI?></td>
                  <td><a onclick="javascript:window.location.reload()" href="<?php echo base_url().'assets/data/'.$ca->IDBARANG.'.doc';?>">Stiker</a> | <a href="<?php echo base_url(); ?>dashpeje/selectbarangpindah/<?php echo $ca->IDBARANG;?>" data-target="#myPindah" data-toggle="modal">Pindah barang</a></td> 
                </tr>
                <?php $no++;}}?>
              </tbody>
            </table>

        </div>
      </div>
    </div>
  </div>
<!-- ubah barang MODALS -->                 
 <div class="modal fade" id="myEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Ubah Barang</h4>
                          <p class="no-margin">Formulir perubahan barang</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        
                        </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->
</div>

 <div class="modal fade" id="myPindah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Pindah Barang</h4>
                          <p class="no-margin">Formulir perpindahan barang</p>
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
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tableruangan').DataTable();
});
</script>