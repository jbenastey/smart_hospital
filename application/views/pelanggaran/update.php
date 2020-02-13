<?= form_open( 'pelanggaran/update/'. $pelanggaran['pelanggaran_id'], array('class' => 'form forms-sample','id' =>'formValidation'))?>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Bentuk pelanggaran</label>
                    <select class="form-control" name="bentukpelanggaran">
                      <option <?php if($pelanggaran['pelanggaran_bentuk'] == 'Ringan') echo "selected"?>>Ringan</option>
                      <option <?php if($pelanggaran['pelanggaran_bentuk'] == 'Sedang') echo "selected"?>>Sedang</option>
                      <option <?php if($pelanggaran['pelanggaran_bentuk'] == 'Berat') echo "selected"?>>Berat</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Poin</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input poin" name="poin" value="<?=$pelanggaran['pelanggaran_poin']?>" >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input keterangan" name="keterangan" value=" <?=$pelanggaran['pelanggaran_keterangan']?>">
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup </button>
          <?=form_close()?>
        </div>
        
          
       