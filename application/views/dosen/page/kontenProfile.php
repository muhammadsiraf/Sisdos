<div class="container">

  <div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;">
      <?php 
      if($dosen->photo=="defaultdosen.jpg"){
          $uriphoto="datadosen/default/default.png";
          }
        else{
              $uriphoto="datadosen/profile/$dosen->photo";
          }
      ?>
        <img class="card-img-top" src="<?php echo base_url("$uriphoto")?>" alt="Card image cap">
        <div class="card-body">
            <!-- <p class="card-text"><?php echo base_url("$uriphoto")?> Some Dosen Photo  text to build on the card title and make up the bulk of the card's content.</p> -->
        <?php echo form_open_multipart('Dosen/uploadPhoto');?>

            <input type="file" name="foto_dosen" size="20" />

            <br /><br />

            <input type="submit" value="upload" />

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
                    <a class="nav-link" data-toggle="tab" href="#pangkat">Riwayat Pangkat</a>
                </li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="profil">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>NUPN</h4></label>
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
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="pendidikan">
               
               <h2></h2>
               
               <hr>
               <div class="container">
                         <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Jenjang</th>
                            <th scope="col">Perguruan Tinggi</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Negara</th>
                            <th scope="col">Tahun Mulai</th>
                            <th scope="col">Tahun Selesai</th>
                            <th scope="col">Gelar</th>
                            <th scope="col">Sumber Dana</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num=1;foreach ($pendidikan as $pend) {
                            echo '<tr>';
                                $url_delete=base_url("Dosen/hapusPendidikan/$pend->id_pendidikan");
                                $url_edit=base_url("Dosen/editPendidikan/$pend->id_pendidikan");
                                echo "<th scope=\"row\">$num</th>";
                                echo '<td>'.$pend->jenjang.'</td>';
                                echo '<td>'.$pend->perguruan_tinggi.'</td>';
                                echo '<td>'.$pend->program_studi.'</td>';
                                echo '<td>'.$pend->negara.'</td>';
                                echo '<td>'.$pend->tahun_mulai.'</td>';
                                echo '<td>'.$pend->tahun_selesai.'</td>';
                                echo '<td>'.$pend->gelar.'</td>';
                                echo '<td>'.$pend->sumber_dana.'</td>';
                                echo "<td><a href=$url_delete class=\"btn btn-danger\">X</a></td>";
                                echo "<td><a href=$url_edit class=\"btn btn-success\">Edit</a></td>";                                
                            echo '</tr>';
                            $num++;
                        } 
                        ?>
                    </tbody>
                </table>
                <a class="btn btn-lg btn-success" href="<?php echo base_url("profile/edit")?>">Tambah</a>
               </div>
                
             </div><!--/tab-pane-->


             <div class="tab-pane" id="jabatan">
            		
               	
                  <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="jafa"><h4>JAFA</h4></label>
                              <input type="text" readonly class="form-control" name="first_name" id="first_name" placeholder="<?php echo $dosen->JAFA?>" title="enter your first name if any.">
                          </div>
                      </div>
                      <!-- <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="tmtjafa"><h4>TMT JAFA</h4></label>
                              <input type="date" readonly class="form-control" name="last_name" id="last_name" placeholder="<?php echo $dosen->TMT_JAFA?>" title="enter your last name if any.">
                          </div>
                      </div> -->
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="angkakredit"><h4>Angka Kredit</h4></label>
                              <input type="text" readonly class="form-control" name="phone" id="phone" placeholder="<?php echo $dosen->angka_kredit?>" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                               	<!--<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>-->
                                <a class="btn btn-lg btn-success pull-right" href="<?php echo base_url("profile/edit")?>">Edit</a>
                            </div>
                      </div>
              	</form>
              </div>
               
                
              <div class="tab-pane" id="pangkat">
            		
               	
                  <hr>
                  <h6>pangkat</h6>
                  <a href="<?php echo base_url("Dosen/tambah_pangkat")?>" class="btn btn-primary">tambah</a>
                  <!-- <button class="btn btn-primary">tambah</button> -->
                  <?php
                    foreach($pangkat as $pang){
                        $url_edit=base_url("Dosen/edit_pangkat/$pang->id_riwayat_pangkat");
                        $url_hapus=base_url("Dosen/hapus_pangkat/$pang->id_riwayat_pangkat");
                        echo "<br><h4>1. $pang->golongan_nama</h4>";
                        echo "<a href=\"$url_hapus\" class=\"btn btn-danger\">X</a>";
                        echo "<a href=\"$url_edit\" class=\"btn btn-primary\">edit</a>";
                    }
                  ?>
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
