<h1>Halaman Penilaian Dosen</h1>
<h3><?php $semester?></h3>
<br>
<h3><?php $tahun?></h3>
<br>
<h3><?php $iddosen?></h3>

<form action="" method="POST">
    <input type="hidden" name="semester" value="<?php echo $semester;?>">
    <input type="hidden" name="tahun" value="<?php echo $tahun;?>">
    <input type="hidden" name="iddosen" value="<?php echo $iddosen;?>">

    <label for="">Orientasi Layanan</label>
    <input type="text" name="orientasi">
    <br>
    <label for="">Integritas</label>
    <input type="text" name="integritas">
    <br>
    <label for="">Komitmen</label>
    <input type="text" name="komitmen">
    <br>
    <label for="">Disiplin</label>
    <input type="text" name="disiplin">
    <br>
    <label for="">Kerjasama</label>
    <input type="text" name="kerjasama">
    <br>
    <label for="">Kepemimpinan</label>
    <input type="text" name="kepemimpinan">
    <br>
    <input type="submit" class="btn btn-primary" value="simpan">
</form>