<h1>Evaluasi SKP</h1>
<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
<div class="row">
    <div class="col-lg">
    <div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
    <form action="">
          <table class="table">
      <thead class="table-bordered">
      <tr>
        <th scope="col">Nama: </th>
        <th scope="col"><?php echo $dosen->nama ?></th>
      </tr>
      <tr>
        <th scope="col">Status BKD:</th>
        <th scope="col">
          <select class="form-control form-control-sm">
            <option>Dosen Tetap</option>
          </select>
        </th>
      </tr>
      <tr>
        <th scope="col">Tahun Akademik:</th>
        <th scope="col">
          <select class="form-control form-control-sm">
            <option>2018/2019</option>
            <option>2017/2018</option>
            <option>2016/2017</option>
            <option>2016/2015</option>
          </select>
        </th>

      </tr>
      <tr>
        <th scope="col">Semester</th>
        <th scope="col">
          <select class="form-control form-control-sm">
            <option>ganjil</option>
            <option>genap</option>
          </select>
        </th>
      </tr>
      </thead>
      </table>
      <button class="btn btn-sm btn-primary">
        Tampil
      </button>
    
    </form>
    </div>
    </div>
    </div>
  </div>
  
  
  <br>

  <div class="row">
    <div class="col-lg">
         <div class="card">
             <h5 class="card-header">Featured</h5>
            <div class="card-body">
                  <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Uraian Kegiatan</th>
            <th colspan="3" scope="col">Target</th>
            <th colspan="2" scope="col">Realisasi</th>
            <th colspan="2" scope="col">Waktu</th>
            <th rowspan="2" scope="col">***</th>

          </tr>
          <tr>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Kualitas</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Kualitas</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>

            <!-- <th rowspan="2" scope="col">***</th> -->

          </tr>
        </thead>

        <tbody>
          <?php 
            $count=1;
            if(ISSET($dataSKP)){
                foreach($dataSKP as $skp){
                // echo "<h3>$count</h3><br>";
                // $count++;
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$skp->uraian</td>";
                echo "<td>$skp->target_jumlah</td>";
                echo "<td>$skp->target_satuan</td>";
                echo "<td>$skp->kualitas_mutu</td>";
                echo "<td><input name=\"jumlahRealisasi\" type=\"text\" class=\"form-control\" id=\"jumlahRealisasi\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->realisasi_jumlah\"></td>";
                echo "<td><input name=\"kualitasRealisasi\" type=\"text\" class=\"form-control\" id=\"kualitasRealisasi\" aria-describedby=\"\" placeholder=\"Kualitas\" value=\"$skp->realisasi_kualitas\"></td>";
                echo "<td>$skp->waktu_jumlah</td>";
                echo "<td>$skp->waktu_satuan</td>";
                echo "<td><button type=\"button\" class=\"btn btn-warning\">Edit</button></td>";
                echo "</tr>";
                $count++;
            }
            }
            
          ?>
          <tr>
            <th colspan="5" scope="row"></th>
            <td><button type="button" class="btn btn-success">Simpan</button></td>
          </tr>
        </tbody>

      </table>
             </div>
         </div>
    </div>
    
  </div>
</div>