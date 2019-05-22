<h1>kesimpulan BKD</h1>
<?php $dosen=$this->session->userdata('dosen')?>
<div class="container">
 <div class="row">
        <div class="col-lg">
        <div class="card">
        <h5 class="card-header"></h5>
        <div class="card-body">
          <table class="table">
      <thead class="thead-bordered">
      <tr>
        <th scope="col">Nama: </th>
        <th scope="col"><?php echo $dosen->nama?></th>
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
          <select class="form-control form-control-sm">
            <option>2018/2019 || Genap</option>
          </select>
        </th>

      </tr>
      </thead>
      </table>
        </div>
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
            <td>11.00</td>
            <td>M</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Penelitian</td>
            <td>Tidak Boleh Kosong</td>
            <td>2.00</td>
            <td>M</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Pengabdian</td>
            <td>Tidak Boleh Kosong</td>
            <td>1.00</td>
            <td>M</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Pendidikan + Penelitian</td>
            <td>Min. 9 SKS></td>
            <td>13</td>
            <td>M</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Pengabdian + Penunjang</td>
            <td>Min. 3 SKS</td>
            <td>3</td>
            <td>M</td>
          </tr>
          <tr>
            <th scope="row">6</th>
            <td>Total Kinerja </td>
            <td>Min 12 SKS Max 16 SKS</td>
            <td>16</td>
            <td>M</td>
          </tr>
        </tbody>
          <tr>
            <th scope="row">KESIMPULAN</th>
            <td colspan="3" >Memenuhi Syarat</td>
          </tr>
      </table>
        </div>
        </div>
        </div>
    </div>
</div>
 