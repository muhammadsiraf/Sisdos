<hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>NIPN</h4></label>
                              <input type="text" readonly class="form-control" name="nupn" id="first_name" placeholder="<?php echo $dosen->NIDN_NUPN;?>" title="Masukan NUPN">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama</h4></label>
                              <input type="text" readonly class="form-control" name="nama" id="last_name" placeholder="<?php echo $dosen->nama;?>" title="Masukan Nama">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Tempat Lahir</h4></label>
                              <input type="text" readonly class="form-control" name="tempatlahir" id="phone" placeholder="<?php echo $dosen->tempat_lahir;?>" title="Masukan Tempat Lahir">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Tanggal Lahir</h4></label>
                              <input type="text" readonly class="form-control" name="tanggallahir" id="mobile" placeholder="<?php echo $dosen->tanggal_lahir;?>" title="Masukan Tanggal Lahir">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Gelar Depan</h4></label>
                              <input type="text" readonly class="form-control" name="gelardepan" id="email" placeholder="<?php echo $dosen->gelar_depan;?>" title="Masukan Gelar Depan">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Gelar Belakang</h4></label>
                              <input type="text" readonly class="form-control" name="gelarbelakang" id="email" placeholder="<?php echo $dosen->gelar_belakang;?>" title="Masukan Gelar Belakang">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Jenis Kelamin</h4></label>
                              <input type="text" readonly class="form-control" name="jeniskelamin" id="email" placeholder="<?php echo $dosen->jenis_kelamin;?>" title="Masukan Jenis Kelamin">
                          </div>
                      </div>
                      <div class="form-group">
                           <div id="tombol" class="col-xs-12">
                                <br>
                              	<!-- <button id="editProfil" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit</button> -->
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                <a class="btn btn-lg btn-success" href="<?php echo base_url("profile/edit")?>">Edit</a>
                            </div>
                      </div>
              	</form>
              
              <hr>