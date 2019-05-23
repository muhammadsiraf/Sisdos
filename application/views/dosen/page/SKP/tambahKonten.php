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
                     <form class="form-horizontal">
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
        <form action="">
          <?php 
          $count=1;
            if(ISSET($pendidikan)){
              foreach ($pendidikan as $pend) {
                // echo "$count.<br>";
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$pend->nama</td>";
                // echo "<td colspan=\"4\" ><button type=\"button\" class=\"btn btn-success\">V</button></td>";
                echo "<td>";
                echo "<label class=\"btn btn-success\">";
                echo "<input class=\"btn btn-success\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"yes\">";
                echo "V";
                echo "</label>";
                echo "</td>";
                echo "<tr>";
                $count++;
              }
            }

          ?>
        </form>         
        </tbody>

      </table>
                       
                    </form>
                </div>
                
                <div class="tab-pane" id="penelitian">
                     <form class="form-horizontal">
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
           <form action="">
          <?php 
          $count=1;
            if(ISSET($penelitian)){
              foreach ($penelitian as $pen) {
                // echo "$count.<br>";
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$pen->nama</td>";
                // echo "<td colspan=\"4\" ><button type=\"button\" class=\"btn btn-success\">V</button></td>";
                echo "<td>";
                echo "<label class=\"btn btn-success\">";
                echo "<input class=\"btn btn-success\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"yes\">";
                echo "V";
                echo "</label>";
                echo "</td>";
                echo "<tr>";
                $count++;
              }
            }

          ?>
        </form>         
        </tbody>

      </table>
                       
                    </form>
                </div>
              
                <div class="tab-pane" id="pengabdian">
                    <form class="form-horizontal">
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
          <form action="">
          <?php 
          $count=1;
            if(ISSET($pengabdian)){
              foreach ($pengabdian as $peng) {
                // echo "$count.<br>";
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$peng->nama</td>";
                // echo "<td colspan=\"4\" ><button type=\"button\" class=\"btn btn-success\">V</button></td>";
                echo "<td>";
                echo "<label class=\"btn btn-success\">";
                echo "<input class=\"btn btn-success\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"yes\">";
                echo "V";
                echo "</label>";
                echo "</td>";
                echo "<tr>";
                $count++;
              }
            }

          ?>
        </form>         
        </tbody>

      </table>
                       
                    </form>
                
                </div>
              
                <div class="tab-pane" id="penunjang">
                     <form class="form-horizontal">
                        
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Item Kegiatan</th>
            <th rowspan="2" colspan="4" scope="col">***</th>

          </tr>
        </thead>

        <tbody>
          <form action="">
          <?php 
          $count=1;
            if(ISSET($penunjang)){
              foreach ($penunjang as $penun) {
                // echo "$count.<br>";
                echo "<tr>";
                echo "<th scope=\"row\">$count</th>";
                echo "<td>$penun->nama</td>";
                // echo "<td colspan=\"4\" ><button type=\"button\" class=\"btn btn-success\">V</button></td>";
                echo "<td>";
                echo "<label class=\"btn btn-success\">";
                echo "<input class=\"btn btn-success\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"yes\">";
                echo "V";
                echo "</label>";
                echo "</td>";
                echo "<tr>";
                $count++;
              }
            }

          ?>
        </form>         
        </tbody>

      </table>
                       
                    </form>         
                </div>
              

              </div>

             </div>
         </div>
    </div>
    
  </div>
</div>