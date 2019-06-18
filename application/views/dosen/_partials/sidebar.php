<?php $dosen=$this->session->userdata('dosen');?>
<ul class="sidebar navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('home')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('profile')?>">
          <i class="fas fa-fw fa-user "></i>
          <span>Profile</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Evaluasi Kinerja Dosen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Sasaran Kinerja Pegawai</h6>
          <a class="dropdown-item" href="<?php echo site_url('skp/rancangan')?>">Rancangan Sasaran Kerja</a>
          <a class="dropdown-item" href="<?php echo site_url('skp/evaluasi')?>">Evaluasi Sasaran Kerja</a>
          <a class="dropdown-item" href="<?php echo site_url('skp/hasil')?>">Hasil Evaluasi SKP</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Beban Kerja Dosen</h6>
          <a class="dropdown-item" href="<?php echo site_url('bkd/pendidikan')?>">Bidang Pendidikan</a>
          <a class="dropdown-item" href="<?php echo site_url('bkd/penelitian')?>">Bidang Penelitian</a>
          <a class="dropdown-item" href="<?php echo site_url('bkd/pengabdian')?>">Bidang Pengabdian Masyarakat</a>
          <a class="dropdown-item" href="<?php echo site_url('bkd/penunjang')?>">Penunjang Kegiatan Dosen</a>
          <a class="dropdown-item" href="<?php echo site_url('bkd/kesimpulan')?>">Kesimpulan BKD</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengajuan Kenaikan Jabatan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Kenaikan Jabatan</h6>
          <a class="dropdown-item" href="<?php echo site_url('jabatan/kelengkapan')?>">Pengisian Kelengkapan</a>
          <a class="dropdown-item" href="<?php echo site_url('jabatan/simulasi')?>">Simulasi Penilaian</a>
          <a class="dropdown-item" href="<?php echo site_url('jabatan/pengajuan')?>">Pengajuan</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengajuan Sertifikasi Dosen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Sertifikasi Dosen</h6>
          <a class="dropdown-item" href="<?php echo site_url('serdos/bkdserdos')?>">Pengisian BKD Serdosn</a>
          <a class="dropdown-item" href="<?php echo site_url('serdos/simulasi')?>">Simulasi Pengajuan</a>
          <a class="dropdown-item" href="<?php echo site_url('serdos/pengajuan')?>">Pengajuan</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>

      <?php 
      if($dosen->JAFA=="Kepala Prodi")
      {
        echo "<li class=\"nav-item dropdown\">";
        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"pagesDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
        echo "<i class=\"fas fa-fw fa-folder\"></i>";
        echo "<span>Penilaian Dosen</span>";
        echo "</a>";
        echo "<div class=\"dropdown-menu\" aria-labelledby=\"pagesDropdown\">"; 
        echo "<h6 class=\"dropdown-header\">Penilaian Dosen</h6>";
        $urldaftar=site_url('penilaian/daftar');
        $urlPenilaianSKP=site_url('penilaian/skpbkd');
        $urlperilaku=site_url('penilaian/perilaku');
        echo "<a class=\"dropdown-item\" href=\"$urldaftar\">Daftar Rekapitulasi Dosen</a>";
        echo "<a class=\"dropdown-item\" href=\"$urlPenilaianSKP\">Penilaian SKP</a>";
        echo "<a class=\"dropdown-item\" href=\"$urlperilaku\">Penilaian Perilaku</a>";
        echo "<div class=\"dropdown-divider\"></div>";
        echo "</div>";
        echo "</li>";
      }
      
      
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('logout')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>