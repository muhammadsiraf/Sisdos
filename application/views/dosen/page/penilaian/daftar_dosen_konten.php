<h1>Daftar Dosen</h1>

<?php $dosen=$this->session->userdata('dosen')?>

<div class="container">
<div class="row">
<div class="col-lg">
<div class="card">
<div class="card-body">
  pilih semester dan tahun
  <form action="<?php echo base_url("penilaian/daftar")?>" method="POST">
    <label for="">Semester: </label>
    <select name="semester" id="">
      <option value="genap">Genap</option>
      <option value="ganjil">Ganjil</option>      
    </select>
    <br>
    <label for="">Tahun Ajaran: </label>
    <select name="tahun" id="">
      <option value="2018-2019">2018/2019</option>
      <option value="2017-2018">2017/2018</option>
      <option value="2016-2017">2016/2017</option>      
      <option value="2015-2016">2015/2016</option>      
      <option value="2014-2015">2014/2015</option>      
    </select>
    <br>
    <input class="btn btn-primary" type="submit" value="Tampilkan">
  </form>
</div>
</div>
</div>


<div class="row">
<div class="col-lg">
<div class="card">
<div class="card-body">

 <table class="table">
        <thead class="thead-dark">
          <tr>
            <th  scope="col">No</th>
            <th  scope="col">NIDN</th>
            <th  scope="col">Nama Dosen </th>
            <th  scope="col">Status</th>
            <th  scope="col">Ikatan Kerja</th>
            <th  scope="col">Jabatan</th>
            <th  scope="col">Kredit</th>
            <th  scope="col">Nilai SKP</th>
            <th  scope="col">Nilai Perilaku</th>
            <th  scope="col">Total Nilai</th>
            <th  scope="col">Kategori</th>
            <th  scope="col">***</th>
          </tr>
        </thead>

        <tbody>
         
        
        <?php
            $count=1;
            foreach($dosen_bawahan as $dosbaw){
                if($dosbaw->username!=$dosen->username){
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<th scope=\"row\">$dosbaw->NIDN_NUPN</th>";
                echo "<th scope=\"row\">$dosbaw->nama</th>";
                echo "<th scope=\"row\">$dosbaw->status</th>";
                echo "<th scope=\"row\">$dosbaw->ikatan_kerja</th>";
                echo "<th scope=\"row\">$dosbaw->JAFA</th>";
                echo "<th scope=\"row\">$dosbaw->angka_kredit</th>";
                $cek=0;
                foreach($nilai_dosen as $nilai){
                  if($nilai->id_dosen==$dosbaw->id_dosen){
                    
                    echo "<th scope=\"row\">$nilai->persentase_skp</th>";
                    echo "<th scope=\"row\">$nilai->nilai_perilaku</th>";
                    echo "<th scope=\"row\">$nilai->total_nilai</th>";
                    echo "<th scope=\"row\">Kategori</th>";
                    $cek++;
                  }
                }
                if($cek==0){
                    echo "<th scope=\"row\">0</th>";
                    echo "<th scope=\"row\">0</th>";
                    echo "<th scope=\"row\">0</th>";
                    // echo "<th scope=\"row\">Kosong</th>";
                    echo "<th scope=\"row\">Belum Mengisi</th>";
                    
                }
                ?>
                <th scope="row">
                <form action="<?php echo base_url("skp/view_hasil_skp_dosen/$dosbaw->id_dosen");?>" method="POST">
                  <input type="hidden" value="<?php echo $semester?>" name="semester">
                  <input type="hidden" value="<?php echo $tahun?>" name="tahun">
                  <!-- <input type="hidden" value="<?php echo $dosbaw->id_dosen?>" name="id_dosen"> -->
                  <input type="submit" value="detail" class="btn btn-primary">
                </form>
                </th>
                <!-- <a href="" class="btn btn-primary">detail</a></th>"; -->
                </tr>
                <?php $count++;
                }
            }
        ?>
        </tbody>
      </table>

</div>
</div>
</div>
</div>
</div>

