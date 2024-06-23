<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Frontera Pet Grooming - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
            <?php echo $this->session->flashdata('message'); ?>
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="<?= base_url('register/save') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <p>Nama Depan</p>
                  <input type="text" class="form-control form-control-user" placeholder="" name="nama_depan" required>
                </div>
                <div class="form-group">
                <p>Nama Tengah</p>
                  <input type="text" class="form-control form-control-user" placeholder="" name="nama_tengah">
                </div>
                <div class="form-group">
                <p>Nama Belakang</p>
                  <input type="text" class="form-control form-control-user" placeholder="" name="nama_belakang">
                </div>
                <div class="form-group">
                <p>No Telepon</p>
                  <input type="text" class="form-control form-control-user" placeholder="" name="no_hp">
                </div>
                <div class="form-group">
                <p>Alamat (Link URL Maps)</p>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.349201268742!2d107.576632!3d-6.8801444!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1d39669446165365!2sFrontera%20Pet%20Mart%20Sarimanah!5e0!3m2!1sid!2sid!4v1670564564447!5m2!1sid!2sid" width="500" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <p>Contoh : </p>
                  <p>Jl. Cijerokaso no.10 (https://www.google.com/maps/dir/Jl.+Cijerokaso+No.10,+Sarijadi,+Bandung+City...)</p>
                </div>

                <div class="form-group">
                  <textarea class="form-control form-control-user" name="address" cols="30" rows="3" placeholder="" required></textarea>
                </div>
                <div class="form-group">
                <p>Email Address</p>
                  <input type="email" class="form-control form-control-user" placeholder="" name="email" required>
                </div>
                <div class="form-group">
                <p>Password</p>
                  <input type="password" class="form-control form-control-user" placeholder="" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('login') ?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>