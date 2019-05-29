<h1>Penelitian BKD</h1>
<?php $dosen=$this->session->userdata('dosen');?>
<div class="container">
  <div class=row>
    <div class="col-lg">
      <div class="card">
          <h5 class="card-header"></h5>
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
<div class="container">
    <div class="row">
        <div class="col-lg">  
            <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body">
                <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Uraian Kegiatan</th>
            <th colspan="3" scope="col">Target</th>
            <th colspan="3" scope="col">Realisasi</th>
            <th rowspan="2" scope="col">SKS BKD</th>
            <th rowspan="2" scope="col">Rekomendasi</th>
            <th rowspan="2" scope="col">Dokumen</th>
          </tr>
          <tr>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Kualitas</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Satuan</th>
            <th scope="col">Kualitas</th>


            <!-- <th rowspan="2" scope="col">***</th> -->

          </tr>
        </thead>

        <tbody>
           <?php 
          
          $count=1;
          foreach($dataBKD as $bkd){
              echo "<tr>";
              echo "<th scope=\"row\">$count</th>";
              echo "<td>$bkd->uraian</td>";
              echo "<td>$bkd->target_jumlah</td>";
              echo "<td>$bkd->target_satuan</td>";
              echo "<td>$bkd->kualitas_mutu</td>";
              echo "<td>$bkd->realisasi_jumlah</td>";
              echo "<td>$bkd->target_satuan</td>";
              echo "<td>$bkd->realisasi_kualitas</td>";
              $urlupdate=base_url("/SKP/updateBKD/2");
              echo "<form action=\"$urlupdate\" method=\"POST\">";
              echo "<td><input name=\"sksBKD\" type=\"text\" class=\"form-control\" id=\"jumlahRealisasi\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$bkd->sks_bkd\"></td>";
              echo "<input name=\"idpskp\" type=\"hidden\" class=\"form-control\" id=\"kualitasRealisasi\" aria-describedby=\"\" placeholder=\"Kualitas\" value=\"$bkd->id_pskp\">";
              echo "<td><select class=\"form-control form-control-sm\" name=\"rekomendasi\">";
              
              $selesai="";
              $lanjutkan="";
              $beban="";
              $gagal="";
              $kosong="";

            
              if($bkd->rekomendasi=="selesai"){
                $selesai="selected";
              }
              elseif($bkd->rekomendasi=="lanjutkan"){
                $lanjutkan="selected";
              }
              elseif($bkd->rekomendasi=="beban lebih"){
                $beban="selected";
              }
              elseif($bkd->rekomendasi=="gagal"){
                $gagal="selected";
              }
              else{
                $kosong="selected";
              }
              echo "<option value=\"kosong\" $kosong>kosong</option>";
              echo "<option value=\"lanjutkan\" $lanjutkan>lanjutkan</option>";
              echo "<option value=\"beban lebih\" $beban>beban lebih</option>";
              echo "<option value=\"selesai\" $selesai>selesai</option>";
              echo "<option value=\"gagal\" $gagal>gagal</option>";

              echo "</select></td>";

              echo "<td><button type=\"button\" class=\"btn btn-warning\">Lihat</button>";
              echo "<input type=\"submit\" class=\"btn btn-success\" value=\"update\"></td>";

              echo "</form>";
              echo "</tr>";
              $count++;
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
