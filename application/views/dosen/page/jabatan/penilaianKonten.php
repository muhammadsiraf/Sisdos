<h1>Simulasi Penilaian</h1>
<?php $dosen=$this->session->userdata('dosen');?>
<div class="container">
<div class="row">
<div class="col-lg">

<div class="card">
<h3 class="card-header">Status</h3>
<div class="card-body">
<h2>Jabatan Anda Sekarang: <?php echo $dosen->JAFA?></h2>
<h2>Golongan : <?php echo $dosen->pangkat?></h2>
<h3>Kredit Kumulatif Anda : <?php echo $total_kredit?></h3>
<h3>Kredit Kumulatif Pendidikan : <?php echo $kredit_pendidikan?></h3>
<h3>Kredit Kumulatif Penelitian  : <?php echo $kredit_penelitian?></h3>
<h3>Kredit Kumulatif Pengabdian : <?php echo $kredit_pengabdian?></h3>
<h3>Kredit Kumulatif Penunjang  : <?php echo $kredit_penunjang?></h3>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg">
<div class="card">
<div class="card-body">
<h3>Simulasikan perhitungan kredit kenaikan jabatan</h3> 
<form action="">
<div class="form-group">
<h3><label for="label">Jabatan Yang Dituju: </label></h3>
<select class="custom-select my-1 mr-sm-2" nama="jabatan" id="inlineFormCustomSelectPref">
    <option selected>Pilih...</option>
    <option value="1">Asisten Ahli Gol III/b</option>
    <option value="2">Lektor Gol III/c</option>
    <option value="3">Lektor Gol III/d</option>
    <option value="4">Lektor Kepala Gol IV/a</option>
    <option value="5">Lektor Kepala Gol IV/b</option>
    <option value="6">Lektor Kepala Gol IV/c</option>
    <option value="6">Guru Besar Gol IV/d</option>
    <option value="6">Guru Besar  Gol IV/e</option>
</select>
<button type="submit" class="btn btn-primary">Simulasikan</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<br>