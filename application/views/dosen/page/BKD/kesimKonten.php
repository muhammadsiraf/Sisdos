<h1>kesimpulan BKD</h1>
<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
  <div class=row>
    <div class="col-lg">
      <div class="card">
          <h5 class="card-header"></h5>
          <div class="card-body">
        <form action="<?php echo base_url("bkd/kesimpulan")?>" method="post">
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
        <h5 class="card-header"></h5>
        <div class="card-body">
        <table class="table">
        <thead class="thead-dark">
          <tr>
            <th rowspan="2" scope="col">No</th>
            <th rowspan="2" scope="col">Keterangan</th>
            <th rowspan="2" scope="col">Syarat</th>
            <th rowspan="2" scope="col">Kinerja (SKS)</th>
            <th rowspan="2" scope="col">Kesimpulan</th>

          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Pendidikan</td>
            <td>Tidak Boleh Kosong</td>
            <td><?php echo $sum_pendidikan?></td>
            <td><?php echo $syarat_bkd[0] ?></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Penelitian</td>
            <td>Tidak Boleh Kosong</td>
            <td><?php echo $sum_penelitian?></td>
            <td><?php echo $syarat_bkd[1] ?></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Pengabdian</td>
            <td>Tidak Boleh Kosong</td>
            <td><?php echo $sum_pengabdian?></td>
            <td><?php echo $syarat_bkd[2] ?></td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Pendidikan + Penelitian</td>
            <td>Min. 9 SKS></td>
            <td><?php echo $sum_pend_penel?></td>
            <td><?php echo $syarat_bkd[3] ?></td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Pengabdian + Penunjang</td>
            <td>Min. 3 SKS</td>
            <td><?php echo $sum_pengab_penun?></td>
            <td><?php echo $syarat_bkd[4] ?></td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Total Kinerja </td>
            <td>Min 12 SKS Max 16 SKS</td>
            <td><?php echo $sum_total?></td>
            <td><?php echo $syarat_bkd[5] ?></td>
          </tr>
        </tbody>
          <tr>
            <th scope="row">KESIMPULAN</th>
            <td colspan="3" ><?php echo $syarat_bkd[6] ?></td>
          </tr>
      </table>
        </div>
        </div>
        </div>
    </div>
</div>
 