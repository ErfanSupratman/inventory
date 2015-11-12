                        <?php foreach ($kode as $kod) {?>
                        <form action="<?php echo base_url();?>dashboard/updatekode/<?php echo $kod->IDKODE?>" method="POST" name="addkode" id="addkode">
                          <div class="row form-row">
                            <div class="col-md-12">
                              <input type="text" value ="<?php echo $kod->KODE ;?>" class="form-control col-md-6" placeholder="Kode Barang" name="kodebarang" id="kodebarangId" >
                              <input type="text" value ="<?php echo $kod->NAMAKODE ;?>" class="form-control" placeholder="Nama Kode" name="namakode">
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button onclick="javascript:window.location.reload()" type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                          <button type="submit" class="btn btn-primary" name="addkodebtn" id="addkodebtn" value="addkode">Simpan</button>
                        </div>
                        </form>