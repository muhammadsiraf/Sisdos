<h1>Penilaian Perilaku Dosen </h1>


<?php $dosen=$this->session->userdata('dosen')?>


<div class="container">
<div class="row">
<div class="col-lg">
<div class="card">
<div class="card-body">
  pilih semester dan tahun
  <form action="<?php echo base_url("penilaian/perilaku")?>" method="POST">
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
            <th  scope="col">Jabatan</th>
            <th  scope="col">Kredit</th>
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
                echo "<th scope=\"row\">$dosbaw->JAFA</th>";
                echo "<th scope=\"row\">$dosbaw->angka_kredit</th>";
                $nilai_url=base_url("penilaian/perilaku/$semester/$tahun/$dosbaw->id_dosen");
                $edit_url=base_url("penilaian/perilaku/edit/$semester/$tahun/$dosbaw->id_dosen");
                $cek=0;
                foreach($dosensudah as $sudah)
                {
                  if($sudah->id_dosen==$dosbaw->id_dosen){
                    $cek=1;
                  }
                }
                if($cek==1){
                  echo "<th scope=\"row\"><a href=\"$edit_url\" class=\"btn btn-success\">edit</a> <button class=\"btn btn-danger\" disabled>sudah</button></th>";
                }
                else{
                  echo "<th scope=\"row\"><a href=\"$nilai_url\" class=\"btn btn-primary\">Nilai</a></th>";
                }
                echo "</tr>";
                $count++;
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