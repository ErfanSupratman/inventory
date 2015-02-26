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
			<h3>Inventaris</h3>
		</div>
		<!--START TABLE-->
    <div class="row">
                    <div class="col-md-12">
                                <div class="grid simple ">
                                    <div class="grid-title no-border">
                                            <h4><span class="semi-bold"></span></h4>
                                        <div class="tools">
                                            <a href="javascript:;" class="reload"></a>
                                        </div>
                                    </div>
                                    <div class="grid-body no-border">
                                             <button type="button" class="btn btn-primary btn-cons" data-target="#myCatt" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;TAMBAH BARANG</button>
                                             <br>
                                             <table class="table no-more-tables">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" style="width:15%">Nama Barang</th>
                                                        <th class="text-center" style="width:3%">Kode</th>
                                                        <th class="text-center" style="width:3%">Jumlah</th>
                                                        <th class="text-center" style="width:5%">Harga</th>
                                                        <th class="text-center" style="width:5%">Tanggal Masuk</th>
                                                        <th class="text-center" style="width:3%">Kondisi</th>
                                                        <th class="text-center" style="width:5%">Merk</th>
                                                        <th class="text-center" style="width:5%">Sumber Dana</th>
                                                        <th class="text-center" style="width:5%">Lokasi</th>
                                                        <th class="text-center" style="width:5%">Opt.</th>
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
                                              <td class="text-center"><?php echo $ca->KODEBARANG?></td>
                                              <td class="text-center"><?php echo $ca->JUMLAHBARANG?></td>
                                              <td class="text-center"><?php echo $ca->HARGABARANG?></td>
                                              <td class="text-center"><?php echo $ca->TANGGALMASUK?></td>
                                              <td class="text-center"><?php echo $ca->NAMAKONDISI?></td>
                                              <td class="text-center"><?php echo $ca->NAMAMERK?></td>
                                              <td class="text-center"><?php echo $ca->NAMASUMBER?></td>
                                              <td class="text-center"><?php echo $ca->NAMALOKASI?></td>
                                              <td><a href="<?php echo base_url().'assets/data/'.$ca->IDBARANG.'.docx';?>">Download</a> | <a href="<?php echo site_url('dashboard/deletebarang').'/'.$ca->IDBARANG;?>">Delete</a></td> 
                                            </tr>
                                           <?php $no++;}}?>
                                                </tbody>
                                             </table><div class="halaman">Halaman : <?php echo $page;?></div>

                                             </div>
                                        </div>
                                    </div>
                                </div>

    </div>

    <div class="modal fade" id="myCatt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="icon-credit-card icon-7x"></i>
                          <h4 id="myModalLabel" class="semi-bold">Tambah Barang</h4>
                          <p class="no-margin">Formulir penambahan barang</p>
                          <br>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo base_url();?>dashboard/tambahbarang" method="POST" name="addticket" id="addticket">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" class="form-control col-md-6" placeholder="Nama Barang" name="namabarang">
                          </div>

                          <div class="col-md-12">
                              <input type="text" class="form-control col-md-6" placeholder="Kode Barang" name="kodebarang">
                          </div>

                          <div class="col-md-4">
                              <input type="text" class="form-control col-md-6" placeholder="Jumlah Barang" name="jumlahbarang">
                          </div>

                          <div class="col-md-8">
                              <input type="text" class="form-control col-md-6" placeholder="Harga Barang dalam Rupiah" name="hargabarang">
                          </div>

                          <div class="col-md-6">
                        <label>Tanggal Masuk:</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl" type="text" class="form-control" name="tanggalmasuk">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div></div>

                            <div class="col-md-6">
                              <select id="lokasibarang" style="width:100%" name="lokasibarang">
                                <?php
                                    foreach($lokasi as $each){ ?>
                                    <option value="<?= $each['IDLOKASI'] ?>"><?= $each['NAMALOKASI'] ?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <select id="kondisibarang" style="width:100%" name="kondisibarang">
                                <?php
                                    foreach($kondisi as $kond){ ?>
                                    <option value="<?php echo $kond->IDKONDISI?>"><?php echo $kond->NAMAKONDISI?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="col-md-6">
                            <label>Merk:</label>
                              <select id="namamerk" style="width:100%" name="namamerk">
                                <?php
                                    foreach($merk as $mer){ ?>
                                    <option value="<?php echo $mer->IDMERK?>"><?php echo $mer->NAMAMERK?></option>
                                <?php }?>
                              </select>
                            </div>
                            <div class="col-md-6">
                            <label>Sumber Dana:</label>
                            <select id="namasumber" style="width:100%" name="namasumber">
                                <?php
                                    foreach($sumberdana as $sumb){ ?>
                                    <option value="<?php echo $sumb->IDSUMBER?>"><?php echo $sumb->NAMASUMBER?></option>
                                <?php }?>
                              </select>
                            </div>
                          </div>
                          <div class="row form-row"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div></form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> <!-- ENDS MODALS -->


</div>
</div>
</div>
</div>