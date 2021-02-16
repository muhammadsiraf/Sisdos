<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('admin/_partials/head.php')?>
</head>

<body id="page-top">

  <?php $this->load->view('admin/_partials/navbar.php')?>
  
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('admin/_partials/sidebar.php')?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view('admin/_partials/breadcrumb.php')?>

        <!-- konten  dashboard -->
        <?php 
          // $dosen=$this->session->userdata('dosen');
            $this->load->view('admin/page/admin_dosen/administrasi_dosen_konten.php');

        
        ?>

      <!-- Sticky Footer -->
        <?php $this->load->view('admin/_partials/footer.php')?>
    

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
        <?php $this->load->view('admin/_partials/scrolltop.php')?>


  <!-- Logout Modal-->
        <?php $this->load->view('admin/_partials/modal.php')?>
 
  <!-- JavaScript -->
        <?php $this->load->view('admin/_partials/js.php')?>


</body>

</html>
