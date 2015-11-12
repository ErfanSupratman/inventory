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
    <h3>Barang Masuk</h3>
   </div>
   <!--START TABLE-->
   <div class="row">
    <div class="col-md-14">
      <div class="grid simple">
        <div class="grid-body no-border">
          </div>
          <div class="grid-body no-border">
            <table id="tablepeje" class="table no-more-tables">
              <!-- <thead>
                <tr>
                    <th class="text-center" style="width:15%">Nama Barang</th>
                    <th class="text-center" style="width:3%">Kode</th>
                    <th class="text-center" style="width:3%">Jumlah</th>
                    <th class="text-center" style="width:5%">Harga</th>
                    <th class="text-center" style="width:5%">Tanggal Masuk</th>
                    <th class="text-center" style="width:5%">Tanggal SPJ</th>
                    <th class="text-center" style="width:3%">Kondisi</th>
                    <th class="text-center" style="width:5%">Merk</th>
                    <th class="text-center" style="width:5%">Type</th>
                    <th class="text-center" style="width:5%">Sumber Dana</th>
                    <th class="text-center" style="width:5%">Lokasi</th>
                    <th class="text-center" style="width:5%">Terima</th>
                </tr>
              </thead> -->
              <tbody>
                <?php
                if(empty($barang)){
                  echo "<tr><td colspan=\"6\">Tidak ada barang masuk</td></tr>";
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
                  <td><a href="<?php echo base_url(); ?>dashpeje/terimabarang/<?php echo $ca->IDBARANG;?>">Terima Barang</a></td>
                </tr>
                <?php $no++;}}?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablepeje').DataTable();
});
</script>