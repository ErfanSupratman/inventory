
                        <?php foreach ($updatebarang as $ca) {?>
                        <form action="<?php echo base_url();?>dashpeje/pindahbarang/<?php echo $ca->IDBARANG?>" method="POST" name="editticket" id="editticket">
                          <div class="row form-row">
                            <div class="col-md-6">
                              <label>Nama Barang</label>
                              <input type="text" value ="<?php echo $ca->NAMABARANG;?>" class="form-control col-md-6"  placeholder="Nama Barang" name="namabarang" readonly>
                          </div>

                          <div class="col-md-6">
                              <label>Kode Barang</label>
                              <?php
                                    foreach($kodebarang as $kode){
                                    if( $kode->IDKODE == $ca->IDKODE){ 
                                        ?>
                                          <input id="idkode" type="hidden" value="<?php echo $kode->IDKODE?>"  class="form-control col-md-6"  name="idkode" >
                                          <input id="kode" type="text" value="<?php echo $kode->KODE?>"  class="form-control col-md-6"  name="kode" >
                                        <?php
                                      }
                                    }?>
                              </div>

                          <div class="col-md-6">
                              <label>Jumlah Barang Sekarang</label>
                              <input type="text" value ="<?php echo $ca->JUMLAHBARANG;?>" class="form-control col-md-6"  placeholder="Jumlah Barang" name="jumlahbarang" readonly>
                          </div>

                          <div class="col-md-6">
                              <label>Jumlah Barang Pindah</label>
                              <input type="text" placeholder="Jumlah Barang Pindah" name="jumlahbarangpindah">
                          </div>
                          <div class="col-md-8">
                              <input id="harga" type="hidden" value ="<?php echo $ca->HARGABARANG;?>"  class="form-control col-md-6" placeholder="Harga Barang dalam Rupiah" name="hargabarang">
                          </div>

                          <div class="col-md-6">
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl2" value ="<?php $datein = $ca->TANGGALMASUK; $newdatein = date('m/d/Y', strtotime($datein));  echo $newdatein?>" type="hidden" class="form-control" name="tanggalmasuk">
                            <!-- <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>  -->
                        </div></div>

                        <div class="col-md-6">
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl3" value="<?php $datein = $ca->TANGGALSPJ; $newdatein = date('m/d/Y', strtotime($datein));  echo $newdatein?>" type="hidden" class="form-control" name="tanggalspj">
                            <!-- <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>  -->
                        </div></div>
                          <div class="col-md-6">
                        <label>Tanggal Pindah:</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl4" type="text" class="form-control" name="tanggalpindah">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div>
                        </div>  
                            <div class="col-md-6">
                              <label>Lokasi Sekarang</label>
                              <?php
                                    foreach($lokasi as $loks){
                                    if( $loks->IDLOKASI == $ca->IDLOKASI){ 
                                        ?>
                                          <input id="lokasibarang" type="text" value="<?php echo $loks->NAMALOKASI?>"  class="form-control col-md-6"  name="lokasibarang" readonly>
                                        <?php
                                      }
                                    }?>
                              </div>
                            
                              <div class="col-md-6">
                              <label>Lokasi Pindah</label>
                              <select id="lokasipindah" style="width:100%" name="lokasipindah">
                                <?php
                                    foreach($lokasiAll as $each){ ?>
                                    <option value="<?= $each['IDLOKASI'] ?>"><?= $each['NAMALOKASI'] ?></option>
                                <?php }?>
                              </select>
                            
                            </div>

                            <div class="col-md-6">
                              <label>Kondisi Barang</label>
                              <select id="kondisibarang" style="width:100%" name="kondisibarang">
                                <?php
                                    foreach($kondisi as $kond){
                                      if($kond->IDKONDISI == $ca->IDKONDISI){ 
                                        ?>
                                          <option selected="selected" value="<?php echo $kond->IDKONDISI?>"><?php echo $kond->NAMAKONDISI?></option>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <option value="<?php echo $kond->IDKONDISI?>"><?php echo $kond->NAMAKONDISI?></option>
                                        <?php

                                      } 
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-6">
                                <input type="hidden" value="<?php echo $ca->MERKBARANG;?>" class="form-control col-md-12" placeholder="Merk" name="namamerk">
                                </div>
                              
                              <div class="col-md-6">
                                <input type="hidden" value="<?php echo $ca->TIPEBARANG;?>" class="form-control col-md-12" placeholder="Tipe Barang" name="tipebarang">
                                </div>
                              
                            <div class="col-md-3">
                            <select style="visibility:hidden;" id="namasumber" style="width:100%" name="namasumber">
                                <?php
                                    foreach($sumberdana as $sumb){
                                      if($sumb->IDSUMBER == $ca->IDSUMBER){ 
                                        ?>
                                          <option selected="selected" value="<?php echo $sumb->IDSUMBER?>"><?php echo $sumb->NAMASUMBER?></option>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <option value="<?php echo $sumb->IDSUMBER?>"><?php echo $sumb->NAMASUMBER?></option>
                                        <?php

                                      } 
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="col-md-12">
                              <textarea style="display:none;" id="txtArea" name="spekbarang" rows="10" cols="70"><?php echo $ca->SPEKBARANG;?></textarea>
                            </div>
                            <!--<div class="col-md-6">
                            <label>Merk:</label>
                              <select id="namamerk" style="width:100%" name="namamerk">
                                <?php
                                    //forloks($merk as $mer){ ?>
                                    <option value="<?php //echo $mer->IDMERK?>"><?php //echo $mer->NAMAMERK?></option>
                                <?php //}?>
                              </select>
                            </div>-->
                                <?php } ?>
                              
                          
                          <div class="row form-row"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" onclick="javascript:window.location.reload()" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div></form>
                        <script type="text/javascript">
                          $(document).ready(function() {
                            $('#tgl2').datepicker();
                            $('#tgl3').datepicker();
                            $('#tgl4').datepicker();
                          });
                          
                        </script>

