<?php $dosen=$this->session->userdata('dosen');?>
<ul class="sidebar navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url('home')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('administrasi/akun')?>">
          <i class="fas fa-fw fa-user "></i>
          <span>Administrasi Akun</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('administrasi/dosen')?>">
          <i class="fas fa-fw fa-user "></i>
          <span>Administrasi Dosen</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('administrasi/akun')?>">
          <i class="fas fa-fw fa-user "></i>
          <span>Administrasi Evaluasi Dosen</span></a>
      </li>


  

     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('logout')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>