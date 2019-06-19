<h1>Approve Konten</h1>
<div class="row">
<div class="col-lg">
<div class="card">
 <h5 class="card-header">Rancangan SKP</h5>
<div class="card-body">

                   <?php 
                    if(isset($idtridharma)){
                        $url_evaluasi_skp=base_url("penilaian/skpbkd/approval-evaluasi/$idtridharma");
                        echo "<a href=\"$url_evaluasi_skp\" class=\"btn btn-success\">Lihat Evaluasi</a>";
                    }
                 ?>
            
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
        <!-- <form action=""> -->
          <?php 
            $count=1;
            if(ISSET($dataSKP)){
                foreach($dataSKP as $skp){
                // echo "<h3>$count</h3><br>";
                // $count++;

                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$skp->uraian</td>";
                // $namaid="form$count";
                // $uriEdit=base_url("/SKP/editSKP/");
                // echo "<form action=\"$uriEdit\" id=\"$namaid\" method=\"POST\">";
                // echo "<input name=\"idpskp\" type=\"hidden\" value=\"$skp->id_pskp\">";
                echo "<td>$skp->target_jumlah</td>";
                echo "<td>$skp->target_satuan</td>";
                echo "<td>$skp->kualitas_mutu</td>";
                echo "<td>$skp->waktu_jumlah</td>";
                echo "<td>$skp->waktu_satuan</td>";
              
                $count++;
            }
            }
            
          ?>
          <tr>
            <th colspan="3" scope="row"></th>
            <form action="<?php echo base_url("dosen/setuju_skp")?>" method="post">
            <input type="hidden" name="id_tridharma" value="<?php if(isset($idtridharma)){echo $idtridharma;}else{$idtridharma=null;} ?>">
            <?php
                if(isset($approval)){
                  if($approval==1){
                    echo "<td><button class=\"btn btn-primary\" disabled>sudah</button></td>";

                }
                else{      
                    echo "<td><button type=\"submit\" class=\"btn btn-success\" >setujui</button></td>";
                }
                }
                else{
                    echo "<div class=\"alert alert-warning\" role=\"alert\">
  Yang bersangkutan belum melakukan penyusunan rancangan SKP.
</div>";
                    echo "<td><button type=\"submit\" class=\"btn btn-danger\" disabled >Belum Menyusun SKP</button></td>";
                }

                
            ?>
            </form>
          </tr>
        
        <!-- </form> -->
        </tbody>

      </table>
             </div>
         </div>
    </div>
    
  </div>