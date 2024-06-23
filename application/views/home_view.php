<div class="container text-center mb-5" style="margin-top: 7em;">
  <img src="<?= base_url('assets/img/HomePG.png') ?>" width="1000">
</div>
<hr>

<div class="container">
  <div class="text-center mb-3">
    <h2>TENTANG KAMI</h2>
  </div>
  <div class="text-center">
    Frontera Pet Grooming merupakan jasa grooming didaerah Sarijadi (Jl. Sarimanah No.22) Bandung, yang menyediakan kebutuhan hewan peliharaan grooming. Apa itu grooming hewan ? Grooming ialah serangkaian proses perawatan yang dilakukan terhadap hewan agar terjaga kebersihan dan kesehatan tubuh mereka, terutama kulit. Grooming tidak boleh dilakukan secara sembarangan agar mendapatkan hasil yang sempurna dan hewan peliharaan tetap merasa nyaman. Contact Us : 0812-3454-8797
  </div>
</div>

<section class="bestseller">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <p></p>
        <h2>Kenapa Harus Menggunakan Grooming Frontera ?</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body bg-primary">
            <h5 class="card-title text-center text-white">Pengerjaan Profesional</h5>
            <h6 class="card-title text-center text-white">Frontera Pet Grooming memiliki SOP dalam pengerjaan grooming setiap hewannya. SOP ini berfungsi untuk memastikan bahwa setiap hasil grooming hewan peliharaan anda hasilnya memuaskan dan nyaman.</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body bg-warning-light">
            <h5 class="card-title text-center text-white">Berpengalaman</h5>
            <h6 class="card-title text-center text-white">Setiap groomer selalu melewati masa training untuk memastikan bahwa mereka siap terjun ke lapangan. Kami tidak pernah menyerahkan hewan peliharaan Anda dengan personil yang tidak berpengalaman.</h6>
          </div>
        </div>
      </div>
      <div class="col">
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body bg-warning-light">
            <h5 class="card-title text-center text-white">Produk Aman</h5>
            <h6 class="card-title text-center text-white"> Setiap produk yang digunakan oleh setiap tim groomer Frontera merupakan produk yang 100% aman bagi hewan peliharaan Anda. Kami hanya menggunakan produk khusus hewan dan kami memiliki dokter hewan sebagai supervise tim – tim groomer.</h6>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-4">
        <div class="card">
          <div class="card-body bg-primary">
            <h5 class="card-title text-center text-white">Tim Penyayang Binatang </h5>
            <h6 class="card-title text-center text-white">Diperlukan groomer yang sayang dengan hewan karena proses grooming ini seringkali membuat hewan stress dan berontak. Sehingga diperlukan groomer yang sabar dan telaten agar hewan bisa tetap nyaman selama proses berlangsung.</h6>
          </div>
        </div>
      </div>

    </div>
</section>
<hr class="my-4">

<section>
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>BEST SELLER</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $best_seller = $this->db->limit(3)->get('tb_package_grooming')->result();
      foreach ($best_seller as $key) { ?>
        <div class="col-md-4 mb-3">
          <div class="card" onclick="order(<?= $key->id_package_grooming ?>)">
            <img src="<?= base_url($key->image) ?>" class="card-img-top" alt="<?= $key->title ?>">
            <div class="card-body">
              <h5 class="card-title text-center"><?= $key->title ?></h5>
              <?php
              $pets = $this->db
                ->where('id_package_grooming', $key->id_package_grooming)
                ->join('tb_pet', 'tb_pet.id_pet = tb_package_grooming_pet.id_pet')
                ->get('tb_package_grooming_pet')->result();
              foreach ($pets as $pet) { ?>
                <h6 class="card-title text-center"><?= $pet->name . ' Rp.' . $pet->price ?></h6>
              <?php }
              ?>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </div>
  </div>
</section>
<hr class="my-4">

<script>
  var base_url = "<?= base_url() ?>";
  function order(id_package_grooming){
    window.location.href= base_url+'order/add/'+id_package_grooming
  }
</script>