<div class="container">
    <div class="card">
        <h1>Ubah Data Pendidikan</h1>
        <!-- <?php echo $pendidikan->id_dosen?> -->
        <form action="<?php echo base_url("Dosen/editPendidikan/$pendidikan->id_pendidikan")?>" method="POST">
                <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Jenjang</h4></label>
                              <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="" title="Jenjang" value="<?php echo $pendidikan->jenjang?>" required>
                              <input type="hidden" class="form-control" name="id_pendidikan" id="jenjang" placeholder="" title="Jenjang" value="<?php echo $pendidikan->id_pendidikan?>" required>
                              <input type="hidden" class="form-control" name="id_dosen" id="jenjang" placeholder="" title="Jenjang" value="<?php echo $pendidikan->id_dosen?>" required>

                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Perguruan Tinggi</h4></label>
                              <input type="text" class="form-control" name="perguruan_tinggi" id="perguru" placeholder="" title="perguruan tinggi" value="<?php echo $pendidikan->perguruan_tinggi?>" required>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Program Studi</h4></label>
                              <input type="text" class="form-control" name="program_studi" id="prodi" placeholder="" title="program didik" value="<?php echo $pendidikan->program_studi?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Negara</h4></label>
                              <input type="text" class="form-control" name="negara" id="negara" placeholder="" title="Negara" value="<?php echo $pendidikan->negara?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Tahun Mulai</h4></label>
                              <input type="text" class="form-control" name="tahun_mulai" id="tahunmulai" placeholder="" title="Tahun Mulai" value="<?php echo $pendidikan->tahun_mulai?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Tahun Selesai</h4></label>
                              <input type="text" class="form-control" name="tahun_selesai" id="tahunselesai" placeholder="" title="tahun selesai" value="<?php echo $pendidikan->tahun_selesai?>"required>
                          </div>
                      </div>

                     <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Gelar</h4></label>
                              <input type="text" class="form-control" name="gelar" id="gelar" placeholder="" title="gelar" value="<?php echo $pendidikan->gelar?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Sumber Dana</h4></label>
                              <input type="text" class="form-control" name="sumberdana" id="sumberdana" placeholder="" title="sumber dana" value="<?php echo $pendidikan->sumber_dana?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                           <div id="tombol" class="col-xs-12">
                                <br>
                              	<!-- <button id="editProfil" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit</button> -->
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                <a class="btn  btn-danger" href="<?php echo base_url("profile/#pendidikan")?>">Kembali</a>
                            </div>
                      </div>
        </form>

    </div>
</div>