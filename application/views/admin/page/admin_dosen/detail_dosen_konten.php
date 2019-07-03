<h1>Detail Dosen</h1>
<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo base_url("dosen/update_admin");?>" method="post">
                    <label for="">Nama:</label>
                    <input type="text" class="form-control" name="nama_dosen" value="<?php echo $dosen->nama?>">
                    <label for="">NUPN</label>
                    <input type="text" class="form-control" name="nupn" value="<?php echo $dosen->NIDN_NUPN?>">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $dosen->tempat_lahir?>">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" class="form-control" name="tanggal_lahir" value="<?php echo $dosen->tanggal_lahir?>">
                    <label for="">Gelar Belakang</label>
                    <input type="text" class="form-control" name="gelar_belakang" value="<?php echo $dosen->gelar_belakang?>">
                    <label for="">Gelar Depan</label>
                    <input type="text" class="form-control" name="gelar_depan" value="<?php echo $dosen->gelar_depan?>">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $dosen->jenis_kelamin?>">
                    <label for="">Jabatan</label>
                    <input type="text" class="form-control" name="jafa" value="<?php echo $dosen->JAFA?>">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $dosen->username?>">
                    <label for="">Angka Kredit</label>
                    <input type="text" class="form-control" name="kredit" value="<?php echo $dosen->angka_kredit?>">
                    <label for="">Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $dosen->status?>">
                    <label for="">Ikatan Kerja</label>
                    <input type="text" class="form-control" name="ikatan_kerja" value="<?php echo $dosen->ikatan_kerja?>">
                    <label for="">Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" value="<?php echo $dosen->pangkat?>">
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