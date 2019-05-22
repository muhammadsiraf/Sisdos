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
            <tr>
            <th scope="row">A</th>
            <td>Studi lanjut Tingkat Doktor (S3)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">B</th>
            <td>Studi lanjut Tingkat Doktor (S2)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Melaksankan Perkuliahan</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>Membimbing Seminar</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">3</th>
            <td>Membimbing KKN, PKN, PKL</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">4</th>
            <td>Membimbing dan Ikut Membimbing dalam Menghasilkan disertasi, tesis, skripsi dan laporan akhir studi</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">5</th>
            <td>Bertugas Sebagai Penguji pada Ujian Akhir</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          <tr>
            <th colspan="3" scope="row"></th>
            <td><button type="button" class="btn btn-primary">Simpan</button><button type="button" class="btn btn-danger">Batal</button></td>
            <td></td>
          </tr>
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
            <tr>
            <th scope="row">A</th>
            <td>Studi lanjut Tingkat Doktor (S3)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">B</th>
            <td>Studi lanjut Tingkat Doktor (S2)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Melaksankan Perkuliahan</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>Membimbing Seminar</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">3</th>
            <td>Membimbing KKN, PKN, PKL</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">4</th>
            <td>Membimbing dan Ikut Membimbing dalam Menghasilkan disertasi, tesis, skripsi dan laporan akhir studi</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">5</th>
            <td>Bertugas Sebagai Penguji pada Ujian Akhir</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          <tr>
            <th colspan="3" scope="row"></th>
            <td><button type="button" class="btn btn-primary">Simpan</button><button type="button" class="btn btn-danger">Batal</button></td>
            <td></td>
          </tr>
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
            <tr>
            <th scope="row">A</th>
            <td>Studi lanjut Tingkat Doktor (S3)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">B</th>
            <td>Studi lanjut Tingkat Doktor (S2)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Melaksankan Perkuliahan</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>Membimbing Seminar</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">3</th>
            <td>Membimbing KKN, PKN, PKL</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">4</th>
            <td>Membimbing dan Ikut Membimbing dalam Menghasilkan disertasi, tesis, skripsi dan laporan akhir studi</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">5</th>
            <td>Bertugas Sebagai Penguji pada Ujian Akhir</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          <tr>
            <th colspan="3" scope="row"></th>
            <td><button type="button" class="btn btn-primary">Simpan</button><button type="button" class="btn btn-danger">Batal</button></td>
            <td></td>
          </tr>
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
            <tr>
            <th scope="row">A</th>
            <td>Studi lanjut Tingkat Doktor (S3)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">B</th>
            <td>Studi lanjut Tingkat Doktor (S2)</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Melaksankan Perkuliahan</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr>
           <tr>
            <th scope="row">2</th>
            <td>Membimbing Seminar</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">3</th>
            <td>Membimbing KKN, PKN, PKL</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">4</th>
            <td>Membimbing dan Ikut Membimbing dalam Menghasilkan disertasi, tesis, skripsi dan laporan akhir studi</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          </tr> <tr>
            <th scope="row">5</th>
            <td>Bertugas Sebagai Penguji pada Ujian Akhir</td>
            <td colspan="4" ><button type="button" class="btn btn-success">V</button></td>
          <tr>
            <th colspan="3" scope="row"></th>
            <td><button type="button" class="btn btn-primary">Simpan</button><button type="button" class="btn btn-danger">Batal</button></td>
            <td></td>
          </tr>
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