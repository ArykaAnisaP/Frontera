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


  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
</head>

<?php
$user = $this->db->where('id_user', $this->session->id_user)->get('tb_user')->row();
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-solid fa-cat"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Frontera Pet Grooming <sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php
      if ($user->role == 'admin') { ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('order') ?>">
            <span>Pesanan</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('package_grooming') ?>">
            <span>Paket Grooming</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('package_grooming_pet') ?>">
            <span>Harga Grooming</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('pet') ?>">
            <span>Hewan Peliharaan</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('delivery_cost') ?>">
            <span>Biaya Antar Jemput</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('user') ?>">
            <span>User</span></a>
        </li>

      <?php } else { ?>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('home') ?>">
            <span>Home</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('profile') ?>">
            <span>Profil</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url('order') ?>">
            <span>Pesanan</span></a>
        </li>
      <?php }
      ?>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user->nama_depan, $user->nama_tengah, $user->nama_belakang?></span>
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

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php $this->load->view($main_view) ?>

        </div>
        <!-- /.container-fluid -->

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
  

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>