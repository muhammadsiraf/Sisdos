<h1>Halaman Penilaian Dosen</h1>
<div class="container">
<div class="row">
<div class="col-lg">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url("dosen/nilai_perilaku_action")?>" method="POST">
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" name="tahun" value="<?php echo $tahun;?>">
    <input type="hidden" name="iddosen" value="<?php echo $iddosen;?>">

    <label for="">Orientasi Layanan</label>
    <input class="form-control" type="text" name="orientasi">
    <br>
    <label for="">Integritas</label>
    <input class="form-control" type="text" name="integritas">
    <br>
    <label for="">Komitmen</label>
    <input class="form-control" type="text" name="komitmen">
    <br>
    <label for="">Disiplin</label>
    <input class="form-control" type="text" name="disiplin">
    <br>
    <label for="">Kerjasama</label>
    <input class="form-control" type="text" name="kerjasama">
    <br>
    <label for="">Kepemimpinan</label>
    <input class="form-control" type="text" name="kepemimpinan">
    <br>
    <input class="btn btn-primary" type="submit" value="Simpan">

</form>
</div>
</div>
</div>
</div>
</div>
