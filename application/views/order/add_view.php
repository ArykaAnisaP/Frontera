<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Buat Pesanan</h1>
</div>

<div class="card shadow">
  <div class="card-body">
    <form action="<?= base_url('order/save_add') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>
          Paket Grooming
          <button type="button" class="btn btn-info btn-sm" onclick="tambah_pesanan()">+ Tambah Pesanan</button>
        </label>
        <select name="id_package_grooming[]" id="id_package_grooming" class="form-control" onchange="show_pet(this.value, '#id_package_grooming_pet')" required>
          <option value="">--- Pilih Paket Grooming ---</option>
          <?php
          foreach ($package_grooming as $key) { ?>
            <option value="<?= $key->id_package_grooming ?>" <?php if ($key->id_package_grooming == $id_package_grooming) echo 'selected';  ?>><?= $key->title ?></option>
          <?php }
          ?>
        </select>

      </div>
      <div class="form-group">
        <label>Hewan Peliharaan</label>
        <select name="id_package_grooming_pet[]" id="id_package_grooming_pet" class="form-control pet_price" onchange="show_total()" required>
          <option value="">--- Pilih Paket Grooming Terlebih Dahulu ---</option>
        </select>
      </div>
      <div id="div_new_pesanan"></div>

      <div class="form-group">
        <label>Layanan Antar Jemput</label>
        <select name="id_delivery_cost" id="id_delivery_cost" onchange="show_total()" class="form-control">
          <option value="" price="0">Tidak</option>
          <?php
          foreach ($delivery_cost as $key) { ?>
            <option value="<?= $key->id_delivery_cost ?>" price="<?= $key->price ?>"><?= $key->place . ' | Rp.' . $key->price ?></option>
          <?php }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Total</label>
        <input type="text" class="form-control" id="total" readonly value="0">
      </div>
      <div class="form-group">
        <label>Foto Hewan Peliharaan</label>
        <input type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg" required>
      </div>
      <div class="form-group">
        <label>Catatan (Optional)</label>
        <textarea name="notes" class="form-control" id="" cols="30" rows="5"></textarea>
      </div>
      <div class="form-action">
        <a href="<?= base_url('home') ?>" class="btn btn-warning">Batalkan</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
<script>
  var base_url = '<?= base_url() ?>';
  var no_pesanan = 1;
  show_pet();

  function show_pet(id_package_grooming = 'id_package_grooming', p = '#id_package_grooming_pet') {
    $.ajax({
      url: base_url + 'order/get_package_grooming_pet/' + id_package_grooming,
      method: 'GET',
      success: function(data) {
        data = JSON.parse(data)
        var text = '<option>--- Pilih Hewan Peliharaan</option>'
        data.forEach(element => {
          text += `<option price="${element.price}" value="${element.id_package_grooming_pet}">${element.name} | Rp.${element.price}</option>`
        });
        $(p).html(text)
      }
    });
  }

  function show_total() {
    var total = 0

    $('.pet_price').each(function() {
      $(this).html()
      var price = $(this).find('option:selected').attr('price');
      if (price > 0) {
        total += parseInt(price)
      }
    });

    var delivery_cost = document.querySelector("#id_delivery_cost");
    var delivery_price = delivery_cost.options[delivery_cost.selectedIndex].getAttribute('price');
    if (parseFloat(delivery_price) > 0) {
      total += parseFloat(delivery_price)
    }

    $('#total').val(total)

  }

  function tambah_pesanan() {
    ++no_pesanan
    var text = '';
    text += `<hr>`
    text += `<div class="form-group">`
    text += `<label>`
    text += ` Paket Grooming`
    text += ` </label>`
    text += `<select name="id_package_grooming[]" id="id_package_grooming_${no_pesanan}" class="form-control" onchange="show_pet(this.value, '#id_package_grooming_pet_${no_pesanan}')" required>`
    text += $('#id_package_grooming').html()

    text += ` </select>`
    text += ` </div>`
    text += `<div class="form-group">`
    text += `<label>Hewan Peliharaan</label>`
    text += `<select name="id_package_grooming_pet[]" id="id_package_grooming_pet_${no_pesanan}" class="form-control pet_price" onchange="show_total()" required>`
    text += `<option value="">--- Pilih Paket Grooming Terlebih Dahulu ---</option>`
    text += ` </select>`
    text += ` </div>`
    text += `<hr>`
    console.log(text)
    $('#div_new_pesanan').append(text)
  }
</script>