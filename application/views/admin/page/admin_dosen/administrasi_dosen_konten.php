<h1>Administrasi Dosen</h1>


<div class="container">

<?php 

foreach($dosen as $dosen)
{?>
    <?php $no=$this->uri->segment('3')?>
    <div class="row"> 
        <div class="col-lg">
            <div class="card">
                <h5 class="card-header"><?php echo $dosen->nama?></h5>
                <div class="card-body">
                    <h5><?php echo "Nama : ".$dosen->nama?></h5>
                    <h5><?php echo "Tempat Lahir : ".$dosen->tempat_lahir?></h5>
                    <h5><?php echo "Tanggal lahir : ".$dosen->tanggal_lahir?></h5>
                    <h5><?php echo "Gelar Belakang : ".$dosen->gelar_belakang?></h5>
                    <h5><?php echo "Gelar Depan : ".$dosen->gelar_depan?></h5>
                    <h5><?php echo "Jenis Kelamin : ".$dosen->jenis_kelamin?></h5>
                    <h5><?php echo "Jabatan : ".$dosen->JAFA?></h5>
                    <h5><?php echo "Username : ".$dosen->username?></h5>
                    <a href="<?php echo base_url("administrasi/dosen/detail/$dosen->id_dosen/")?>" class="btn btn-primary">Detail</a>
                </div>
            </div> 
        </div>
    </div>
    <br>
<?php    
}

?>

<div class="row">
    <div class="col">
        <?php echo $this->pagination->create_links()?>
    </div>
</div>
</div>
