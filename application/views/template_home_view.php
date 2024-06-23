<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Frontera Pet Grooming - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
  <style>
    * {
      color: black;
    }
  </style>
</head>

<?php
if ($this->session->logged_in == true) {
  $user = $this->db->where('id_user', $this->session->id_user)->get('tb_user')->row();
}
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-dark bg-primary topbar mb-4 fixed-top">
          <div class="container">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <a class="navbar-brand" href="http://localhost/millennials_cafe/admin/admin.php?halaman=menu">Frontera Pet Grooming</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>



            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - User Information -->
              <li class="nav-item">
                <a href="<?= base_url('home') ?>" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('home/grooming') ?>" class="nav-link">Grooming</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('home/help') ?>" class="nav-link">Help</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('home/order') ?>" class="nav-link">Order</a>
              </li>
              <?php
              if ($this->session->logged_in == true) { ?>
                <li class="nav-item dropdown no-arrow">

                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white"><?= $user->nama_depan, $user->nama_tengah, $user->nama_belakang ?></span>
                    <?php
                    if ($user->avatar == '') {
                      $avatar = base_url('assets/img/undraw_profile.svg');
                    } else {
                      $avatar = base_url($user->avatar);
                    }
                    ?>
                    <img class="img-profile rounded-circle" src="<?= $avatar ?>">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= base_url('profile') ?>">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="<?= base_url('login/logout') ?>">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              <?php } else { ?>
                <li class="nav-item">
                  <span class="nav-link">
                    <a href="<?= base_url('login') ?>" class="btn btn-warning bg-warning-light">Login</a>
                  </span>
                </li>
              <?php }
              ?>
            </ul>
          </div>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        <!-- /.container-fluid -->
        <?php $this->load->view($main_view) ?>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Frontera Pet Grooming</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>