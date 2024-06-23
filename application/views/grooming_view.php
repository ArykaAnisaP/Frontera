<section style="margin-top: 7em;">
  <div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>Paket Grooming</h2>
      </div>
    </div>
    <div class="row">
      <?php
      $package_grooming = $this->db->get('tb_package_grooming')->result();
      foreach ($package_grooming as $key) { ?>
        <div class="col-md-3 mb-3">
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

<div class="container">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>Kami Melayani Antar-Jemput</h2>
        <img src="<?= base_url() ?>assets/img/AJ.png" alt="" width="350">
      </div>
    </div>
    <div class="row justify-content-center fs-5">
      <div class="col-md-8">
        <p></p>
        <p class="text-center">Area Sarijadi     | Rp.5.000</p>
        <p class="text-center">Area Setia Budi | Rp.10.000</p>
        <p class="text-center">Area Pasteur | Rp.10.000</p>
      </div>
    </div>
  </div>

<script>
  var base_url = "<?= base_url() ?>";
  function order(id_package_grooming){
    window.location.href= base_url+'order/add/'+id_package_grooming
  }
</script>