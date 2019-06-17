<h1>Persetujuan SKP dan Evaluasi SKP Online Dosen</h1>

<h3>Daftar Dosen: </h3>

<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
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
                echo "<th scope=\"row\"><a href=\"\" class=\"btn btn-primary\">Lihat/Evaluasi</a></th>";
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