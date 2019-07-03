<h1>Administrasi Akun</h1>
<br>
<a href="<?php echo base_url("dosen/view_form_new_akun")?>" class="btn btn-primary">akun baru</a>
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
                    <h5><?php echo "Tempat Lahir : ".$akun->password?></h5>

                    <a href="" class="btn btn-primary">Detail</a>
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
