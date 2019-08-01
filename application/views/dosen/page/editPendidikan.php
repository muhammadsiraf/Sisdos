<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('dosen/_partials/head.php')?>
</head>

<body id="page-top">

  <?php $this->load->view('dosen/_partials/navbar.php')?>
  
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('dosen/_partials/sidebar.php')?>
    

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php $this->load->view('dosen/_partials/breadcrumb.php')?>

        <!-- konten  dashboard -->
        <?php $this->load->view('dosen/page/kontenEditPendidikan.php')?>
        

      <!-- Sticky Footer -->
        <?php $this->load->view('dosen/_partials/footer.php')?>
    

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
