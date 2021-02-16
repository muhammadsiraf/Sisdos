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
              
              <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#pendidikan">Pendidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#penelitian">Penelitian</a>
                </li >
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#pengabdian">Pelaksanaan Pengabdian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#penunjang">Penunjang Kegiatan</a>
                </li>
              </ul>

              <div class="tab-content">
                
                <div class="tab-pane active" id="pendidikan">
                     <!-- <form class="form-horizontal"> -->
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
          <?php 
          $count=1;
            if(ISSET($pendidikan)){
              // echo "EKO masuk seleksi pendidikan";
              foreach ($pendidikan as $pend) {
                // echo "$count.<br>";
                if($triPendidikan!=null){
                    //  echo "EKO masuk ke seleksi tripendidikan tidak NULL<br>";
                     $cek=0;
                     for ($i=0; $i < count($triPendidikan); $i++) { 
                      //  $tes=$triPendidikan[$i]->jenis_uraian_skp;
                      //  echo "PEND : $pend->id_jenis_uraian == ARRAY :$tes  <br>";
                       if($pend->id_jenis_uraian==$triPendidikan[$i]->jenis_uraian_skp){
                          $cek++;
                       }
                     }

                    //  echo "JUMLAH SAMA: $cek<br>";
                     if($cek==0){
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$pend->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$pend->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                     }
                }else{
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$pend->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$pend->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;
                }
               
                }
            }

          ?>
                
        </tbody>

      </table>
                       
                    <!-- </form> -->
                </div>
                
                <div class="tab-pane" id="penelitian">
                     <!-- <form class="form-horizontal"> -->
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
           <!-- <form action=""> -->
           <?php 
          $count=1;
            if(ISSET($penelitian)){
              // echo "EKO masuk seleksi pendidikan";
              foreach ($penelitian as $pen) {
                // echo "$count.<br>";
                if($triPenelitian!=null){
                    //  echo "EKO masuk ke seleksi tripendidikan tidak NULL<br>";
                     $cek=0;
                     for ($i=0; $i < count($triPenelitian); $i++) { 
                      //  $tes=$triPendidikan[$i]->jenis_uraian_skp;
                      //  echo "PEND : $pend->id_jenis_uraian == ARRAY :$tes  <br>";
                       if($pen->id_jenis_uraian==$triPenelitian[$i]->jenis_uraian_skp){
                          $cek++;
                       }
                     }

                    //  echo "JUMLAH SAMA: $cek<br>";
                     if($cek==0){
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$pen->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$pen->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                     }
                }else{
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$pen->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$pen->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                }

               
                }
            }

          ?>
         
        <!-- </form>          -->
        </tbody>

      </table>
                       
                    <!-- </form> -->
                </div>
              
                <div class="tab-pane" id="pengabdian">
                    <!-- <form class="form-horizontal"> -->
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
          <!-- <form action=""> -->
          <?php 
          $count=1;
            if(ISSET($pengabdian)){
              // echo "EKO masuk seleksi pendidikan";
              foreach ($pengabdian as $peng) {
                // echo "$count.<br>";
                if($triPengabdian!=null){
                    //  echo "EKO masuk ke seleksi tripendidikan tidak NULL<br>";
                     $cek=0;
                     for ($i=0; $i < count($triPengabdian); $i++) { 
                      //  $tes=$triPendidikan[$i]->jenis_uraian_skp;
                      //  echo "PEND : $pend->id_jenis_uraian == ARRAY :$tes  <br>";
                       if($peng->id_jenis_uraian==$triPengabdian[$i]->jenis_uraian_skp){
                          $cek++;
                       }
                     }

                    //  echo "JUMLAH SAMA: $cek<br>";
                     if($cek==0){
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$peng->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$peng->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                     }
                }else{
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$peng->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$peng->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                }

               
                }
            }

          ?>
        <!-- </form>          -->
        </tbody>

      </table>
                       
                    <!-- </form> -->
                
                </div>
              
                <div class="tab-pane" id="penunjang">
                     <!-- <form class="form-horizontal"> -->
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
          <!-- <form action=""> -->
           <?php 
          $count=1;
            if(ISSET($penunjang)){
              // echo "EKO masuk seleksi pendidikan";
              foreach ($penunjang as $penun) {
                // echo "$count.<br>";
                if($triPenunjang!=null){
                    //  echo "EKO masuk ke seleksi tripendidikan tidak NULL<br>";
                     $cek=0;
                     for ($i=0; $i < count($triPenunjang); $i++) { 
                      //  $tes=$triPendidikan[$i]->jenis_uraian_skp;
                      //  echo "PEND : $pend->id_jenis_uraian == ARRAY :$tes  <br>";
                       if($penun->id_jenis_uraian==$triPenunjang[$i]->jenis_uraian_skp){
                          $cek++;
                       }
                     }

                    //  echo "JUMLAH SAMA: $cek<br>";
                     if($cek==0){
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$penun->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$penun->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\">";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                     }
                }else{
                        echo "<tr>";
                        echo "<th scope=\"row\">$count</th>";
                        echo "<td>$penun->nama</td>";
                        echo "<td>";
                        $urlkirim=base_url("/SKP/tambahSKP/");
                        echo "<form action=\"$urlkirim\" method=\"POST\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"idtridharma\" value=\"$idtridharma\">";
                        echo "<input class=\"text\" type=\"hidden\" id=\"inlineCheckbox1\" name=\"id_uraian\" value=\"$penun->id_jenis_uraian\">";
                        echo "<input class=\"btn btn-success\" type=\"submit\" id=\"inlineCheckbox1\" value=\"tambah\"  >";
                        echo "</form>";
                        echo "</td>";
                        echo "<tr>";
                        $count++;      
                }

               
                }
            }

          ?>
         
        <!-- </form>          -->
        </tbody>

      </table>
                       
                    <!-- </form>          -->
                </div>
              

              </div>

             </div>
         </div>
    </div>
    
  </div>
</div>