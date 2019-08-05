<div class="container">

  <div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;">
      <?php 
      if($dosen->photo=="defaultdosen.jpg"){
          $uriphoto="datadosen/default/default.png";
          }
        else{
              $uriphoto="datadosen/$dosen->id_dosen/profile/$dosen->photo";
          }
      ?>
        <img class="card-img-top" src="<?php echo base_url("$uriphoto")?>" alt="Card image cap">
        <div class="card-body">
            <p class="card-text"><?php echo base_url("$uriphoto")?> Some Dosen Photo <?php echo $dosen->photo?> text to build on the card title and make up the bulk of the card's content.</p>
        <form action="<?php echo base_url('dosen/uploadPhoto')?>">
        <!-- <a class="btn btn-sm btn-success" href="">New Photo?</a -->
        <a class="btn btn-sm btn-danger" href="">Delete</a>
        <input type="file" name="photo" class="btn btn-sm btn-success">
        </form>
        </div>
      </div>
    </div>
    <div class="col-8">
      <div class="card">
        <div class="card-body">
            
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#profil">Data Pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pendidikan">Riwayat Pendidikan</a>
                </li >
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#jabatan">Riwayat Jabatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#settings">Riwayat Pangkat</a>
                </li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="profil">
                <hr>
                  <form class="form" action="<?php echo base_url("dosen/edit")?>" method="post" id="registrationForm">

                      <input type="hidden" class="form-control" name="id" id="id_dosen" value="<?php echo $dosen->id_dosen;?>" title="Masukan NUPN">
                      <input type="hidden" class="form-control" name="photo" id="id_dosen" value="<?php echo $dosen->photo;?>" >
                      <input type="hidden" class="form-control" name="jafa" id="id_dosen" value="<?php echo $dosen->JAFA;?>" >
                      <input type="hidden" class="form-control" name="tmtjafa" id="id_dosen" value="<?php echo $dosen->TMT_JAFA;?>" >
                      <input type="hidden" class="form-control" name="angkakredit" id="id_dosen" value="<?php echo $dosen->angka_kredit;?>" >
                      
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>NIPN</h4></label>
                              <input type="text" class="form-control" name="nupn" id="first_name" placeholder="<?php echo $dosen->NIDN_NUPN;?>" value="<?php echo $dosen->NIDN_NUPN;?>" title="Masukan NUPN">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Nama</h4></label>
                              <input type="text" class="form-control" name="nama" id="last_name" placeholder="<?php echo $dosen->nama;?>" value="<?php echo $dosen->nama;?>" title="Masukan Nama">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Tempat Lahir</h4></label>
                              <input type="text" class="form-control" name="tempatlahir" id="phone" placeholder="<?php echo $dosen->tempat_lahir;?>" value="<?php echo $dosen->tempat_lahir;?>" title="Masukan Tempat Lahir">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Tanggal Lahir</h4></label>
                              <input id="datepicker" type="text" class="form-control" name="tanggallahir" id="mobile" placeholder="<?php echo $dosen->tanggal_lahir;?>" value="<?php echo $dosen->tanggal_lahir;?>" title="Masukan Tanggal Lahir">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Gelar Depan</h4></label>
                              <input  type="text" class="form-control" name="gelardepan" id="email" placeholder="<?php echo $dosen->gelar_depan;?>" value="<?php echo $dosen->gelar_depan;?>" title="Masukan Gelar Depan">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Gelar Belakang</h4></label>
                              <input type="text" class="form-control" name="gelarbelakang" id="email" placeholder="<?php echo $dosen->gelar_belakang;?>" value="<?php echo $dosen->gelar_belakang;?>" title="Masukan Gelar Belakang">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Jenis Kelamin</h4></label>
                              <?php 
                              $laki="selected";
                              $wanita="selected";
                              if($dosen->jenis_kelamin!="Laki-laki"){
                                $laki="";
                              }
                              else if($dosen->jenis_kelamin!="Perempuan"){
                                $wanita="";
                              }
                              else{
                                $laki="";
                                $wanita="";
                              }
                              ?>
                              <select name="jeniskelamin" class="custom-select" id="inputGroupSelect02">
                                 <!-- <option selected></option> -->
                                 <option value="1" <?php echo $laki?>>Laki-laki</option>
                                 <option value="2" <?php echo $wanita?>>Perempuan</option>
                                 <!-- <option value="3">Three</option> -->
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                           <div id="tombol" class="col-xs-12">
                                <br>
                              	<!-- <button id="editProfil" class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit</button> -->
                               	<!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                <a class="btn btn-danger" href="<?php echo base_url("profile/#profil")?>">Kembali</a>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="pendidikan">
                <hr>
                  <form class="form" action="<?php echo base_url("dosen/tambahPendidikan")?>" method="post" id="registrationForm">
                      <input type="hidden" class="form-control" name="id_dosen" id="id_dosen" value="<?php echo $dosen->id_dosen;?>" >
                      
                      <div class="form-group">

                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Jenjang</h4></label>
                              <input type="text" class="form-control" name="jenjang" id="jenjang" placeholder="" title="Jenjang">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Perguruan Tinggi</h4></label>
                              <input type="text" class="form-control" name="perguruan_tinggi" id="perguru" placeholder="" title="perguruan tinggi">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Program Studi</h4></label>
                              <input type="text" class="form-control" name="program_studi" id="prodi" placeholder="" title="program didik">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Negara</h4></label>
                              <input type="text" class="form-control" name="negara" id="negara" placeholder="" title="Negara">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Tahun Mulai</h4></label>
                              <input type="text" class="form-control" name="tahun_mulai" id="tahunmulai" placeholder="" title="Tahun Mulai">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Tahun Selesai</h4></label>
                              <input type="text" class="form-control" name="tahun_selesai" id="tahunselesai" placeholder="" title="tahun selesai">
                          </div>
                      </div>

                     <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Gelar</h4></label>
                              <input type="text" class="form-control" name="gelar" id="gelar" placeholder="" title="gelar">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Sumber Dana</h4></label>
                              <input type="text" class="form-control" name="sumberdana" id="sumberdana" placeholder="" title="sumber dana">
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
              
              <hr>
                <!-- <a class="btn btn-lg btn-success" href="">Tambah</a> -->
             </div><!--/tab-pane-->


             <div class="tab-pane" id="jabatan">
            		
               	
                  <hr>
                  <form class="form" action="<?php echo base_url("dosen/editJabatan")?>" method="post" id="formjabatan">
                      <input type="hidden" class="form-control" name="photo" id="id_dosen" value="<?php echo $dosen->photo;?>" >
                      <input type="hidden" class="form-control" name="id" id="id_dosen" value="<?php echo $dosen->id_dosen;?>" title="Masukan NUPN">
                      <input type="hidden" class="form-control" name="nama" id="id_dosen" value="<?php echo $dosen->nama;?>" >
                      <input type="hidden" class="form-control" name="nupn" id="id_dosen" value="<?php echo $dosen->NIDN_NUPN;?>" >
                      <input type="hidden" class="form-control" name="tempatlahir" id="id_dosen" value="<?php echo $dosen->tempat_lahir;?>" >
                      <input type="hidden" class="form-control" name="tanggallahir" id="id_dosen" value="<?php echo $dosen->tanggal_lahir;?>" >
                      <input type="hidden" class="form-control" name="gelardepan" id="id_dosen" value="<?php echo $dosen->gelar_depan;?>" >
                      <input type="hidden" class="form-control" name="gelarbelakang" id="id_dosen" value="<?php echo $dosen->gelar_belakang;?>" >
                      <input type="hidden" class="form-control" name="jeniskelamin" id="id_dosen" value="<?php echo $dosen->jenis_kelamin;?>" >
                    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="jafa"><h4>JAFA</h4></label>
                              <input type="text" class="form-control" name="JAFA" id="first_name" value="<?php echo $dosen->JAFA;?>" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="tmtjafa"><h4>TMT JAFA</h4></label>
                              <input type="text" class="form-control" name="TMTJAFA" id="last_name"  value="<?php echo $dosen->TMT_JAFA;?>"title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="angkakredit"><h4>Angka Kredit</h4></label>
                              <input type="text" class="form-control" name="angkakredit" id="phone"  value="<?php echo $dosen->angka_kredit;?>"title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                <input class="btn btn-success" type="submit" name="btn" value="Simpan" />                                
                                <a class="btn btn-danger" href="<?php echo base_url("profile/#profil")?>">Kembali</a>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        <!-- end of card -->
        </div>

      </div>
    </div>
  </div>

  
</div>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
