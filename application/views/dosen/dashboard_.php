<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('dosen/partials/header.php')?>
</head>

<body id="page-top">

  <?php $this->load->view('dosen/partials/navbar.php')?>
  
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('dosen/partials/sidebar.php')?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- konten  dashboard -->
        <?php 
          $dosen=$this->session->userdata('dosen');

          if($dosen->JAFA=="Kepala Prodi")
          {
            $this->load->view('dosen/konten_dashboard_asesor.php');
          }
          else{
            $this->load->view('dosen/kontendashboard.php');
          }
        ?>

      <!-- Sticky Footer -->
        <?php $this->load->view('dosen/partials/footer.php')?>
    

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
        <?php $this->load->view('dosen/_partials/scrolltop.php')?>


  <!-- Logout Modal-->
        <?php $this->load->view('dosen/_partials/modal.php')?>
 
  <!-- JavaScript -->
        <?php $this->load->view('dosen/_partials/js.php')?>


</body>

</html>
