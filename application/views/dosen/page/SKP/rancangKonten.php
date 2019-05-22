<h1>Rancangan SKP </h1>
<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
  <div class="row">
    <div class="col-lg">
    <div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
    <form action="<?php echo base_url("skp/rancangan")?>" method="post">
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
          <select class="form-control form-control-sm" name="tahunajar">
            <option value="2018/2019">2018/2019</option>
            <option value="2017/2018">2017/2018</option>
            <option value="2016/2017">2016/2017</option>
            <option value="2016/2015">2016/2015</option>
          </select>
        </th>

      </tr>
      <tr>
        <th scope="col">Semester</th>
        <th scope="col">
          <select class="form-control form-control-sm" name="semester">
            <option value="ganjil">ganjil</option>
            <option value="genap" >genap</option>
          </select>
        </th>
      </tr>
      </thead>
      </table>
      <button type=submit class="btn btn-sm btn-primary">
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
            <th colspan="2" scope="col">Target</th>
            <th rowspan="2" scope="col">Kualitas Mutu </th>
            <th colspan="2" scope="col">Waktu</th>
            <th rowspan="2" scope="col">***</th>

          </tr>
          <tr>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <!-- <th rowspan="2" scope="col">***</th> -->

          </tr>
        </thead>

        <tbody>
        <form action="">
          <?php 
            $count=1;
            if(ISSET($dataSKP)){
                foreach($dataSKP as $skp){
                // echo "<h3>$count</h3><br>";
                // $count++;
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$skp->uraian</td>";
                echo "<td><input name=\"jumlahTarget\" type=\"text\" class=\"form-control\" id=\"jumlahTarget\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->target_jumlah\"></td>";
                echo "<td><input name=\"satuanTarget\" type=\"text\" class=\"form-control\" id=\"satuanTarget\" aria-describedby=\"\" placeholder=\"Satuan\" value=\"$skp->target_satuan\"></td>";
                echo "<td><input name=\"kualitasMutu\" type=\"text\" class=\"form-control\" id=\"kualitasMutu\" aria-describedby=\"\" placeholder=\"Mutu\" value=\"$skp->kualitas_mutu\"></td>";
                echo "<td><input name=\"jumlahWaktu\" type=\"text\" class=\"form-control\" id=\"jumlahWaktu\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->waktu_jumlah\"></td>";
                echo "<td><input name=\"satuanWaktu\" type=\"text\" class=\"form-control\" id=\"satuanWaktu\" aria-describedby=\"\" placeholder=\"Satuan\" value=\"$skp->waktu_satuan\"></td>";
                echo "<td><button type=\"button\" class=\"btn btn-danger\">X</button></td>";
                echo " </tr>";
                $count++;
            }
            }
            
          ?>
          <tr>
            <th colspan="3" scope="row"></th>
            <td><button type="button" class="btn btn-primary">Tambah Sasaran</button></td>
            <td><button type="button" class="btn btn-success">Simpan</button></td>
          </tr>
        
        </form>
        </tbody>

      </table>
             </div>
         </div>
    </div>
    
  </div>
</div>