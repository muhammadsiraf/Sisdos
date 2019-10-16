<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
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
                $namaid="form$count";
                $uriEdit=base_url("/SKP/editSKP/");
                echo "<form action=\"$uriEdit\" id=\"$namaid\" method=\"POST\">";
                echo "<input name=\"idpskp\" type=\"hidden\" value=\"$skp->id_pskp\">";
                echo "<td><input name=\"jumlahTarget\" type=\"number\" class=\"form-control\" id=\"jumlahTarget\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->target_jumlah\" style=\"width: 100px;\"></td>";
                echo "<td><input name=\"satuanTarget\" type=\"text\" class=\"form-control\" id=\"satuanTarget\" aria-describedby=\"\" placeholder=\"Satuan\" value=\"$skp->target_satuan\" style=\"width: 100px;\"></td>";
                echo "<td><input name=\"kualitasMutu\" type=\"number\" class=\"form-control\" id=\"kualitasMutu\" aria-describedby=\"\" placeholder=\"Mutu\" value=\"$skp->kualitas_mutu\" style=\"width: 100px;\" min=\"0\" max=\"100\" ></td>";
                echo "<td><input name=\"jumlahWaktu\" type=\"number\" class=\"form-control\" id=\"jumlahWaktu\" aria-describedby=\"\" placeholder=\"Jumlah\" value=\"$skp->waktu_jumlah\" style=\"width: 100px;\"></td>";
                echo "<td><input name=\"satuanWaktu\" type=\"text\" class=\"form-control\" id=\"satuanWaktu\" aria-describedby=\"\" placeholder=\"Satuan\" value=\"$skp->waktu_satuan\" style=\"width: 100px;\"></td>";
                $urldelete=base_url("/SKP/deleteSKP/$skp->id_pskp");             
                $urlupdate=base_url("/SKP/editSKP/");  
                echo "<td><a class=\"btn btn-danger\"href=\"$urldelete\">X</a>||<input class=\"btn btn-primary\" type=\"submit\" value=\"update\"></td>";
                echo " </tr>";
                echo "</form>";
                $count++;
            }
            }
            
          ?>
          <tr>
            <th colspan="3" scope="row"></th>
            <?php if(!ISSET($idtridharma)){
              $idtridharma=null;
              $urlkirim=base_url("SKP/newTridharma?tahunajar=$tahunajar&&semester=$semester");
                echo "<td><a class=\"btn btn-primary\" href=\"$urlkirim\">Tambah</a></td>";
              }
              else{
                $urlkirim=base_url("skp/tambah/$idtridharma");
                echo "<td><a class=\"btn btn-primary\" href=\"$urlkirim\")\">Tambah</a></td>";
              }
            ?>
  
            <td><input href="javascript:void(0);" type="submit" class="btn btn-success" id="nar" value="simpan"/></td>
          </tr>
        
        <!-- </form> -->
        </tbody>

      </table>
             </div>
         </div>
    </div>
    
  </div>
</div>

<script>

function masook(){
  alert("Masuk Pak De");
}    

function submitForms(){
        var i;
        var panjang=<?php Print($count); ?>;
        
        for (i=1;i<panjang;i++){
            var namaform="form"+i;
            document.getElementById(namaform).submit();
            return true;
        }
        document.location.reload(true);
}

$(document).ready(function(){
 
    $("#nar").click(function(){
        submitForms();
    })

});
</script>