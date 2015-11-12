                        <?php foreach ($lokasi as $loks) {?>
                            <form action="<?php echo base_url();?>dashboard/updatelokasi/<?php echo $loks->IDLOKASI?>" method="POST" name="adduser" id="adduser">
                              <div class="row form-row">
                                <div class="col-md-12">
                                  <input type="text" value="<?php echo $loks->KODELOKASI?>" class="form-control col-md-6" placeholder="Kode Lokasi" name="kodelokasi">
                                  <input type="text" value="<?php echo $loks->NAMALOKASI?>" class="form-control" placeholder="Nama Lokasi" name="namalokasi">
                                  <select id="Penanggung Jawab" style="width:100%" name="PJ">
                                  <?php
                                    foreach($peje as $pj){
                                      if($pj->IDUSER == $loks->IDUSER){ 
                                        ?>
                                          <option selected="selected" value="<?php echo $pj->IDUSER?>"><?php echo $pj->NAMAUSER?></option>
                                        <?php
                                      }
                                      else{
                                        ?>
                                          <option value="<?php echo $pj->IDUSER?>"><?php echo $pj->NAMAUSER?></option>
                                        <?php

                                      }
                                    }
                                  ?>
                                  </select>                           
                                  <select id="lantai" style="width:100%" name="lantai">
                                  <?php
                                    $ll = $loks->LANTAILOKASI;
                                    echo $ll;
                                    for ($x = 1; $x <= 3; $x++) {
                                        if($x == $ll){?>
                                          <option selected="selected" value="<?php echo $x?>"> Lantai <?php echo $x?></option>
                                          <?php
                                        }
                                        else{?>
                                          <option value="<?php echo $x?>"> Lantai <?php echo $x?></option>
                                          <?php
                                        }
                                    }
                                  ?>
                                  <?php
                          }
                        ?>
                                  </select>
                                </div>
                              </div>
                              <div class="row form-row"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary" name="addlokasi" id="addlokasi" value="addlokasi">Simpan</button>
                              </div>
                              </form>