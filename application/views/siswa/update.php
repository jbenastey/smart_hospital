<div class="col-md-12">
<div class="card card-primary">
  <div class="card-header">
                <h3 class="card-title">Ubah Data Siswa</h3>
              </div>
  <div class="card-body">
<?= form_open( 'siswa/update/'. $siswa['siswa_nisn'], array('class' => 'form forms-sample','id' =>'formValidation'))?>
          <div class="form-group">
                    <label for="exampleInputEmail1">NISN</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Input NISN"  value="<?=$siswa['siswa_nisn']?>" name="nisn" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama" value="<?=$siswa['siswa_nama']?>" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat" value="<?=$siswa['siswa_alamat']?>" name="alamat">
                  </div>
                  <div class="form-group">
                    <label>Jurusan</label>
                    <select class="form-control" name="Jurusan">
                      <option <?php if($siswa['siswa_jurusan'] == 'Teknik Elektronika') echo "selected";?>>Teknik Elektronika</option>
                      <option <?php if($siswa['siswa_jurusan'] == 'Teknik Geomatika') echo "selected";?>>Teknik Geomatika</option>
                      <option <?php if($siswa['siswa_jurusan'] == 'Teknik Informatika') echo "selected";?>>Teknik Informatika</option>
                      <option <?php if($siswa['siswa_jurusan'] == 'Teknik Kendaraan ringan') echo "selected";?>>Teknik Kendaraan ringan</option>
                      <option <?php if($siswa['siswa_jurusan'] == 'Teknik dan bisnis sepeda motor') echo "selected";?>>Teknik dan bisnis sepeda motor</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="Kelas">
                      <option <?php if($siswa['siswa_kelas'] == '10') echo "selected";?>>10</option>
                      <option <?php if($siswa['siswa_kelas'] == '11') echo "selected";?>>11</option>
                      <option <?php if($siswa['siswa_kelas'] == '12') echo "selected";?>>12</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="Agama">
                      <option <?php if($siswa['siswa_agama'] == 'Islam') echo "selected";?>>Islam</option>
                      <option <?php if($siswa['siswa_agama'] == 'Kristen') echo "selected";?>>Kristen</option>
                      <option <?php if($siswa['siswa_agama'] == 'Hindu') echo "selected";?>>Hindu</option>
                      <option <?php if($siswa['siswa_agama'] == 'Budha') echo "selected";?>>Budha</option>
                      <option <?php if($siswa['siswa_agama'] == 'Katholik') echo "selected";?>>Katholik</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Jenis kelamin</label>
                    <select class="form-control" name="jeniskelamin">
                      <option <?php if($siswa['siswa_jenis_kelamin'] == 'Laki-Laki') echo "selected";?>>Laki-Laki</option>
                      <option <?php if($siswa['siswa_jenis_kelamin'] == 'Perempuan') echo "selected";?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Orang Tua</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Nama orang tua" name="namaorangtua" value="<?=$siswa['siswa_orang_tua']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat orang tua</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input Alamat orang tua" name="alamatortu" value="<?=$siswa['siswa_alamat_ortu']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Hp</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Input No hp orang tua" name="hportu" value="<?=$siswa['siswa_nohp_ortu']?>">
                  </div>
        
        <!-- footer modal -->
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup </button>
        <?=form_close()?>
        </div>

      </div>
    </div>
  </div>
</div>