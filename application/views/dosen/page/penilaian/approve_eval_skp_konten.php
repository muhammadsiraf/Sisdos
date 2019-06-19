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
            if(ISSET($data_skp)){
                foreach($data_skp as $skp){
                // echo "<h3>$count</h3><br>";
                // $count++;
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$skp->uraian</td>";
                echo "<td>$skp->target_jumlah</td>";
                echo "<td>$skp->target_satuan</td>";
                echo "<td>$skp->kualitas_mutu</td>";
                $urlapprove=base_url("SKP/eval_approval");
                echo form_open_multipart($urlapprove);
                // echo "<form action=\"$urlupdate\" method=\"POST\">";
                echo "<input type=\"hidden\" value=\"$skp->id_pskp\" name=\"idpskp\">";
                echo "<input type=\"hidden\" value=\"$id_tridharma\" name=\"id_tridharma\">";
                echo "<td>$skp->realisasi_jumlah</td>";
                echo "<td>$skp->realisasi_kualitas</td>";
                echo "<td>$skp->waktu_jumlah</td>";
                echo "<td>$skp->waktu_satuan</td>";
                echo "<td>";if(!$skp->berkas_bukti_capaian||$skp->berkas_bukti_capaian=="kosong"){
                  echo "<button class=\"btn btn-danger\" disabled>Kosong</button>";
                }else{
                  $urlberkas=base_url("file/berkas/$skp->berkas_bukti_capaian");
                  echo "<a class=\"btn btn-warning\" href=$urlberkas>view</a><br>";
                //   echo "<button class=\"btn btn-primary\">edit<input type=\"file\" name=\"fileupload\" class=\"custom-file-input\"></button><br>";
                }
                if($skp->approval==0){
                    echo "<input class=\"btn btn-success\" type=\"submit\" value=\"setujui\">
                     </td>";
                }else{
                    echo "<button class=\"btn btn-success\" disabled>Sudah Disetujui</button>
                </td>";
                }
                
                echo "</tr>";
                echo "</form>";
                $count++;
            }
            }
            
          ?>
          <tr>
            <th colspan="5" scope="row"></th>
            <?php 
            
            if($approval==1)
            {
                echo "<td><button class=\"btn btn-success\" disabled>Hasil Evaluasi Sudah Disetujui</button></td>";
            }
            else{
            ?>
            <form action="<?php echo base_url("dosen/setuju_eval_skp")?>" method="post">
            <input type="hidden" name="id_tridharma" value="<?php echo $id_tridharma;?>">
            <td><button type="submit" class="btn btn-success">Setujui Hasil Evaluasi</button></td>
            </form>
            <?php
            }
            ?>
          </tr>
        </tbody>

      </table>
             </div>
         </div>
    </div>