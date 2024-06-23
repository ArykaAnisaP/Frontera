<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Biaya Antar Jemput</h1>
</div>

<div class="card shadow">
  <div class="card-body">
    <form action="<?= base_url('delivery_cost/save_add') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Daerah</label>
        <input type="text" name="place" class="form-control " required>
      </div>
      <div class="form-group">
        <label>Harga</label>
        <input type="number" name="price" class="form-control " required>
      </div>
      <div class="form-action">
        <a href="<?= base_url('delivery_cost') ?>" class="btn btn-warning">Batalkan</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>