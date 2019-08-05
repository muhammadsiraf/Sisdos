<h1>Evaluasi SKP</h1>
<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
<div class="row">
    <div class="col-lg">
    <div class="card">
    <h5 class="card-header">Featured</h5>
    <div class="card-body">
    <form action="<?php echo base_url("skp/evaluasi")?>" method="post">
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
            <option value="2018-2019">2018/2019</option>
            <option value="2017-2018">2017/2018</option>
            <option value="2016-2017">2016/2017</option>
            <option value="2016-2015">2016/2015</option>
          </select>
        </th>

      </tr>
      <tr>
        <th scope="col">Semester</th>
        <th scope="col">
          <select class="form-control form-control-sm" name="semester">
            <option value="ganjil">ganjil</option>
            <option value="genap">genap</option>
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
                $i=1;
                $simpan_all=base_url("SKP/update_eval_skp_banyak");
                // echo form_open_multipart($simpan_all);            
                foreach($dataSKP as $skp){
                    echo "<tr>";
                    echo "<th scope=\"row\">$count</th>";
                    echo "<td>$skp->uraian</td>";
                    echo "<td>$skp->target_jumlah</td>";
                    echo "<td>$skp->target_satuan</td>";
                    echo "<td>$skp->kualitas_mutu</td>";
                    $urlupdate=base_url("SKP/updateEvalSKP");
                    echo form_open_multipart($urlupdate);
                    // echo "<form action=\"$urlupdate\" method=\"POST\">";
                    echo "<input type=\"hidden\" value=\"$skp->id_pskp\" name=\"idpskp$i\">";
                    echo "<td><input name=\"jumlahRealisasi$i\" type=\"text\" class=\"form-control\" id=\"jumlahRealisasi\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->realisasi_jumlah\"></td>";
                    echo "<td><input name=\"kualitasRealisasi$i\" type=\"text\" class=\"form-control\" id=\"kualitasRealisasi\" aria-describedby=\"\" placeholder=\"Kualitas\" value=\"$skp->realisasi_kualitas\"></td>";
                    echo "<td>$skp->waktu_jumlah</td>";
                    echo "<td>$skp->waktu_satuan</td>";
                    echo "<td>";if(!$skp->berkas_bukti_capaian||$skp->berkas_bukti_capaian=="kosong"){
                    echo "<button class=\"btn btn-danger\">upload<input type=\"file\" name=\"fileupload$i\" class=\"custom-file-input\"></button>";
                    }else{
                    $urlberkas=base_url("file/berkas/$skp->berkas_bukti_capaian");
                    echo "<a class=\"btn btn-warning\" href=$urlberkas>view</a><br>";
                    echo "<button class=\"btn btn-primary\">edit<input type=\"file\" name=\"fileupload$i\" class=\"custom-file-input\"></button><br>";
                    }
                    echo "<input class=\"btn btn-success\" type=\"submit\" value=\"update\">
                    </td>";
                    echo "</tr>";
                    echo "</form>";
                    $count++;
                }
                echo "<tr>";
                echo "<th colspan=\"5\" scope=\"row\"></th>";
                echo "<td><input type=\"submit\" class=\"btn btn-success\" value=\"simpan\"></td>";
                echo "</tr>";            
                // echo "</form>";
            }
          ?>
          
        </tbody>

      </table>
             </div>
         </div>
    </div>
    
  </div>
</div>