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
          <span>Administrasi Dosen</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        
        </div>
      </li>

  

     
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('logout')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>