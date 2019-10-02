<div class="container">
    <div class="card">
        <div class="card-body">
            <?php
                if(isset($edit)){
                   $url_tambah= base_url("Dosen/edit_pangkat/$id_pangkat");
                   echo "<form action=\"$url_tambah\" method=\"POST\">"; 
                   echo "<div class=\"form-group\">";
                   echo "<h5>Pangkat</h5>";
                   echo "<select class=\"custom-select\"  name=\"pangkat\">" ;                      
                   echo "<option selected>Choose...</option>";
                   echo "<option value=\"0\">Penata Muda(Gol. III/a)</option>";
                   echo "<option value=\"1\">Penata Muda Tk. I(Gol. III/b)</option>";
                   echo "<option value=\"2\">Penata(Gol. III/c)</option>";
                   echo "<option value=\"3\">Penata Tk. I(Gol. III/d)</option>";
                   echo "<option value=\"4\">Pembina(Gol. IV/a)</option>";
                   echo "<option value=\"5\">Pembina Tk. I(Gol. IV/b)</option>";
                   echo "<option value=\"6\">Pembina Utama Muda(Gol. IV/c)</option>"; 
                   echo "<option value=\"7\">Pembina Utama Madya(Gol. IV/d)</option>";
                   echo "<option value=\"8\">Pembina Utama(Gol. IV/e)</option>";
                   echo "</select>";
                   echo "<input type=\"hidden\" name=\"id_dosen\" value=\"<?php echo $dosen->id_dosen?>\">";
                   echo "</div>";
                   echo "<br>";
                   echo "<button type=\"submit\" class=\"btn btn-success\">ubah</button>";
                   echo "</div>";
                   echo "</form>";
                }
                else{
                   echo "<h5>Form isian pangkat baru</h5>"; 
                   echo "$dosen->id_dosen";
                   $url_tambah= base_url("Dosen/tambah_pangkat");
                   echo "<form action=\"$url_tambah\" method=\"POST\">"; 
                   echo "<div class=\"form-group\">";
                   echo "<h5>Pangkat</h5>";
                   echo "<select class=\"custom-select\"  name=\"pangkat\">" ;                      
                   echo "<option selected>Choose...</option>";
                   echo "<option value=\"0\">Penata Muda(Gol. III/a)</option>";
                   echo "<option value=\"1\">Penata Muda Tk. I(Gol. III/b)</option>";
                   echo "<option value=\"2\">Penata(Gol. III/c)</option>";
                   echo "<option value=\"3\">Penata Tk. I(Gol. III/d)</option>";
                   echo "<option value=\"4\">Pembina(Gol. IV/a)</option>";
                   echo "<option value=\"5\">Pembina Tk. I(Gol. IV/b)</option>";
                   echo "<option value=\"6\">Pembina Utama Muda(Gol. IV/c)</option>"; 
                   echo "<option value=\"7\">Pembina Utama Madya(Gol. IV/d)</option>";
                   echo "<option value=\"8\">Pembina Utama(Gol. IV/e)</option>";
                   echo "</select>";
                   echo "<input type=\"hidden\" name=\"id_dosen\" value=\"$dosen->id_dosen\">";
                   echo "</div>";
                   echo "<br>";
                   echo "<button type=\"submit\" class=\"btn btn-success\">tambah</button>";
                   echo "</div>";
                   echo "</form>";
                }
            ?>
            
        </div>
    </div>
</div>