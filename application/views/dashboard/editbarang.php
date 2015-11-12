
                        <?php foreach ($updatebarang as $ca) {?>
                        <form action="<?php echo base_url();?>dashboard/editbarang/<?php echo $ca->IDBARANG?>" method="POST" name="editticket" id="editticket">
                          <div class="row form-row">
                          <div class="col-md-12">
                              <label>Nama Barang</label>
                              <input type="text" value ="<?php echo $ca->NAMABARANG;?>" class="form-control col-md-6" placeholder="Nama Barang" name="namabarang">
                          </div>

                          <div class="col-md-6">
                              <label>Kode Barang</label>
                              <select id="idkode" style="width:100%" name="idkode">
                                <?php
                                    foreach($kodebarang as $kode){
                                    if( $kode->IDKODE == $ca->IDKODE){
                                        ?>
                                          <option selected="selected" value="<?php echo $kode->IDKODE?>"><?php echo $kode->KODE?></option>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <option value="<?php echo $kode->IDKODE?>"><?php echo $kode->KODE?></option>
                                        <?php

                                      } 
                                    }
                                ?>
                              </select>
                              </div>

                          <div class="col-md-4">
                              <label>Jumlah Barang</label>
                              <input type="text" value ="<?php echo $ca->JUMLAHBARANG;?>" placeholder="Jumlah Barang" name="jumlahbarang">
                          </div>

                          <div class="col-md-8">
                              <label>Harga Barang</label>
                              <input id="idharga1" type="text" value ="<?php echo $ca->HARGABARANG;?>" name="hargabarang" class="number">
                          </div>

                          <div class="col-md-6">
                        <label>Tanggal Masuk:</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl2" value ="<?php $datein = $ca->TANGGALMASUK; $newdatein = date('m/d/Y', strtotime($datein));  echo $newdatein?>" type="text" class="form-control" name="tanggalmasuk">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div></div>

                              <div class="col-md-6">
                        <label>Tanggal SPJ:</label>
                        <div class="input-append success date col-md-12 col-lg-8 no-padding">
                          <input id="tgl3" value ="<?php $datein = $ca->TANGGALSPJ; $newdatein = date('m/d/Y', strtotime($datein));  echo $newdatein?>" type="text" class="form-control" name="tanggalspj">
                            <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span> 
                        </div></div>

                            <div class="col-md-6">
                              <label>Lokasi Barang</label>
                              <select id="lokasibarang" style="width:100%" name="lokasibarang">
                                <?php
                                    foreach($lokasi as $loks){
                                      if( $loks['IDLOKASI'] == $ca->IDLOKASI){ 
                                        ?>
                                          <option selected="selected" value="<?= $loks['IDLOKASI'] ?>"><?= $loks['NAMALOKASI'] ?></option>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <option value="<?= $loks['IDLOKASI'] ?>"><?= $loks['NAMALOKASI'] ?></option>
                                        <?php

                                      } 
                                    }
                                ?>
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
                            <!--<div class="col-md-6">
                            <label>Merk:</label>
                              <select id="namamerk" style="width:100%" name="namamerk">
                                <?php
                                    //foreach($merk as $mer){ ?>
                                    <option value="<?php //echo $mer->IDMERK?>"><?php //echo $mer->NAMAMERK?></option>
                                <?php //}?>
                              </select>
                            </div>-->
                            
                            <div class="col-md-6">
                                <label>Merek Barang</label>
                                <input type="text" value="<?php echo $ca->MERKBARANG;?>" class="form-control col-md-12" placeholder="Merk" name="namamerk">
                                </div>
                              
                              <div class="col-md-6">
                                <label>Type Barang</label>
                                <input type="text" value="<?php echo $ca->TIPEBARANG;?>" class="form-control col-md-12" placeholder="Tipe Barang" name="tipebarang">
                                </div>
                              
                            <div class="col-md-3">
                            <label>Sumber Dana:</label>
                            <select id="namasumber" style="width:100%" name="namasumber">
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
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-12">
                              <label>Spesifikasi Barang</label>
                              <textarea id="txtArea" name="spekbarang" rows="10" cols="70"><?php echo $ca->SPEKBARANG;?></textarea>
                            </div>
                          </div>
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
                            $('#idharga1').mask('000 000 000 000 000,00', {reverse: true});
                          });

                        </script>

