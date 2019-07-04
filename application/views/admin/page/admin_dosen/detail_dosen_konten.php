<h1>Detail Dosen</h1>
<?php echo validation_errors(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                <!-- <h5>Test</h5> -->
                    <!-- <form action="<?php echo base_url("dosen/update_admin");?>" method="post"> -->
                    <?php echo form_open("dosen/update_admin")?>
                    <label for="">Nama:</label>
                    <input type="text" class="form-control" name="nama_dosen" value="<?php echo $dosen->nama?>">
                    <?php echo form_error('nama_dosen', '<div class="alert alert-danger">', '</div>'); ?>
                    <label for="">NUPN</label>
                    <input type="numeric" class="form-control" name="nupn" value="<?php echo $dosen->NIDN_NUPN?>">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dosen->tempat_lahir?>">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" id="datepicker" class="form-control" name="tanggal_lahir" value="<?php echo $dosen->tanggal_lahir?>">
                    <label for="">Gelar Belakang</label>
                    <input type="text" class="form-control" name="gelar_belakang" value="<?php echo $dosen->gelar_belakang?>">
                    <label for="">Gelar Depan</label>
                    <input type="text" class="form-control" name="gelar_depan" value="<?php echo $dosen->gelar_depan?>">
                    <label for="">Jenis Kelamin</label>
                    <!-- <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $dosen->jenis_kelamin?>"> -->
                    <select class="form-control form-control-sm" name="jenis_kelamin">
                            <?php 
                                $men="";
                                $woman="";
                                if($dosen->jenis_kelamin=="Laki-laki")
                                {
                                    $men="selected";
                                }
                                else{
                                    $woman="selected";
                                }
                            ?>
                            <option value="Laki-laki" <?php echo $men?>>Laki Laki</option>
                            <option value="Perempuan" <?php echo $woman?>>Perempuan</option>
                    </select>
                    <label for="">Jabatan</label>
                    <!-- <input type="text" class="form-control" name="jafa" value="<?php echo $dosen->JAFA?>"> -->
                    <select class="form-control form-control-sm" name="jafa">
                            <?php 
                                $asisten="";
                                $lektor="";
                                $lektorkepala="";
                                $kepalaprodi="";
                                $gurubesar="";
                                if($dosen->JAFA=="Dosen")
                                {
                                    $lektor="selected";
                                }
                                else if($dosen->JAFA=="Dosen Kepala"||$dosen->JAFA=="Lektor Kepala"){
                                    $lektorkepala="selected";
                                }
                                else if($dosen->JAFA=="Asisten Ahli"){
                                    $asisten="selected";
                                }
                                else if($dosen->JAFA=="Kepala Prodi"){
                                    $kepalaprodi="selected";
                                }
                                else if($dosen->JAFA=="Guru Besar"){
                                    $gurubesar="selected";
                                }
                            ?>
                            <option value="Asisten Ahli" <?php echo $asisten?>>Asisten Ahli</option>
                            <option value="Lektor" <?php echo $lektor?>>Dosen</option>
                            <option value="Lektor Kepala" <?php echo $lektorkepala?>>Dosen Kepala</option>
                            <option value="Kepala Prodi" <?php echo $kepalaprodi?>>Kepala Prodi</option>
                            <option value="Guru Besar" <?php echo $gurubesar?>>Guru Besar</option>
                    </select>   
                    <label name="Username" for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $dosen->username?>">
                    <label for="">Angka Kredit</label>
                    <input type="text" class="form-control" name="kredit" value="<?php echo $dosen->angka_kredit?>">
                    <?php echo form_error('kredit', '<div class="alert alert-danger">', '</div>'); ?>
                    <label for="">Status</label>
                    <!-- <input type="text" class="form-control" name="status" value="<?php echo $dosen->status?>"> -->
                    <select name="status" class="form-control form-control-sm" id="">
                                <?php
                                    $aktif="";
                                    $non="";

                                    if($dosen->status=="aktif"){
                                        $aktif="selected";
                                    }
                                    else{
                                        $non="selected";
                                    }
                                ?>

                            <option value="aktif" <?php echo $aktif?>>Aktif</option>
                            <option value="tidak aktif" <?php echo $non?>>Tidak Aktif</option>                            
                    </select>
                    <label for="">Ikatan Kerja</label>
                    <input type="text" class="form-control" name="ikatan_kerja" value="<?php echo $dosen->ikatan_kerja?>">
                    <label for="">Pangkat</label>
                    <!-- <input type="text" class="form-control" name="pangkat" value="<?php echo $dosen->pangkat?>"> -->
                    <!-- <h5><?php echo $dosen->pangkat?></h5> -->
                    <select class="form-control form-control-sm" name="pangkat">
                            <?php 
                            // echo "preketek";
                                $gol1="";
                                $gol2="";
                                $gol3="";
                                $gol4="";
                                $gol5="";
                                $gol6="";
                                $gol7="";
                                $gol8="";


                                if($dosen->pangkat=="Gol III/a")
                                {
                                    $gol1="selected";
                                    // echo "masuok eko";
                                }
                                else if($dosen->pangkat=="Gol III/b"){
                                    $gol2="selected";
                                }
                                else if($dosen->pangkat=="Gol III/c"){
                                    $gol3="selected";
                                }
                                else if($dosen->pangkat=="Gol IV/a"){
                                    $gol4="selected";
                                }
                                else if($dosen->pangkat=="Gol IV/b"){
                                    $gol5="selected";
                                }
                                else if($dosen->pangkat=="Gol IV/c"){
                                    $gol6="selected";
                                }
                                else if($dosen->pangkat=="Gol IV/d"){
                                    $gol7="selected";
                                }
                                else if($dosen->pangkat=="Gol IV/e"){
                                    $gol8="selected";
                                }
                            ?>
                            <!-- <option value="Gol III/a" <?php echo $gol1?>>Gol III/a</option> -->
                            <option value="Gol III/b" <?php echo $gol2?>>Gol III/b</option>
                            <option value="Gol III/c" <?php echo $gol3?>>Gol III/c</option>
                            <option value="Gol IV/a" <?php echo $gol4?>>Gol IV/a</option>
                            <option value="Gol IV/b" <?php echo $gol5?>>Gol IV/b</option>
                            <option value="Gol IV/c" <?php echo $gol6?>>Gol IV/c</option>
                            <option value="Gol IV/d" <?php echo $gol7?>>Gol IV/d</option>
                            <option value="Gol IV/e" <?php echo $gol8?>>Gol IV/e</option>
                            
                    </select>  
                    <input type="hidden" value="<?php echo $dosen->id_dosen?>" name="id_dosen">
                    <input type="hidden" value="<?php echo $dosen->TMT_JAFA?>" name="tmt_jafa">
                    <br>
                    <button type="submit" class="btn btn-primary">edit</button>
                    </form>
                    <br>
                    <!-- <h5><?php echo "Nama : ".$dosen->nama?></h5>
                    <h5><?php echo "Tempat Lahir : ".$dosen->tempat_lahir?></h5>
                    <h5><?php echo "Tanggal lahir : ".$dosen->tanggal_lahir?></h5>
                    <h5><?php echo "Gelar Belakang : ".$dosen->gelar_belakang?></h5>
                    <h5><?php echo "Gelar Depan : ".$dosen->gelar_depan?></h5>
                    <h5><?php echo "Jenis Kelamin : ".$dosen->jenis_kelamin?></h5>
                    <h5><?php echo "Jabatan : ".$dosen->JAFA?></h5>
                    <h5><?php echo "Username : ".$dosen->username?></h5> -->
                    <a href="<?php echo  base_url("Dosen/delete/$dosen->id_dosen")?>" class="btn btn-primary">hapus</a>
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