<h1>Administrasi Akun</h1>
<div class="container">
    <div class="row">
        <div class="col-lg">
                <br>
<a href="<?php echo base_url("dosen/view_form_new_akun")?>" class="btn btn-primary">akun baru</a>
<br>
        </div>
    </div>
</div>
<br>
<div class="container">

<?php 

foreach($akun as $akun)
{?>
    <?php $no=$this->uri->segment('3')?>
    <div class="row"> 
        <div class="col-lg">
            <div class="card">
                <h5 class="card-header"><?php echo $akun->username?></h5>
                <div class="card-body">
                    <h5><?php echo "Nama : ".$akun->username?></h5>
                    <h5><?php echo "Password : ".$akun->password?></h5>
                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <a href="<?php echo base_url("")?>" class="btn btn-primary">Edit</a>
                        </div>
                        <div class="col-sm">
                            <a href="<?php echo base_url("auth/delete/$akun->username")?>" class="btn btn-danger">Hapus</a>                 
                        </div>
                    </div>
                    <br>
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
