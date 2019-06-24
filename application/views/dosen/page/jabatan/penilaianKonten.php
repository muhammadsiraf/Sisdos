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
<form action="<?php echo base_url("jabatan/simulasi")?>" method="post">
<div class="form-group">
<h3><label for="label">Jabatan Yang Dituju: </label></h3>
<select class="custom-select my-1 mr-sm-2" name="jabatan_tujuan" id="inlineFormCustomSelectPref">
    <option selected>Pilih...</option>
    <option value="iii/b">Asisten Ahli Gol III/b</option>
    <option value="iii/c">Lektor Gol III/c</option>
    <option value="iii/d">Lektor Gol III/d</option>
    <option value="iv/a">Lektor Kepala Gol IV/a</option>
    <option value="iv/b">Lektor Kepala Gol IV/b</option>
    <option value="iv/c">Lektor Kepala Gol IV/c</option>
    <option value="iv/d">Guru Besar Gol IV/d</option>
    <option value="iv/e">Guru Besar  Gol IV/e</option>
</select>
<button type="submit" class="btn btn-primary">Simulasikan</button>
</div>
</form>
</div>
</div>
</div>
</div>
<br>
<?php 

    if (isset($data_simulasi)){?>
        <div class="row">
            <div class="col-lg">
            <div class="card">
            <h4 class="card-header">Hasil Simulasi </h4>
            <div class="card-body">
                <h5>Angka Kredit yang dibutuhkan ialah</h5>
                <h5>Pelaksanaan Pendidikan : <?php if($data_simulasi['pendidikan']<0){ $pend=abs($data_simulasi['pendidikan']); echo "lebih $pend";}else{echo $data_simulasi['pendidikan'];}?></h5>
                <h5>Pelaksanaan Penelitian : <?php if($data_simulasi['penelitian']<0){ $pend=abs($data_simulasi['penelitian']); echo "lebih $pend";}else{echo $data_simulasi['penelitian'];}?></h5>
                <h5>Pelaksanaan Pengabdian : <?php if($data_simulasi['pengabdian']<0){ $pend=abs($data_simulasi['pengabdian']); echo "lebih $pend";}else{echo $data_simulasi['pengabdian'];}?></h5>
                <h5>Pelaksanaan Penunjang : <?php if($data_simulasi['penunjang']<0){ $pend=abs($data_simulasi['penunjang']); echo "lebih $pend";}else{echo $data_simulasi['penunjang'];}?></h5>

            </div>
            </div>
            </div>
            </div>
        </div>

    <?php 
    }

?>


<br>