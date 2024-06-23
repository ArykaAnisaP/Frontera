<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Ubah Hewan Peliharaan</h1>
</div>

<div class="card shadow">
  <div class="card-body">
    <form action="<?= base_url('pet/save_edit/'.$pet->id_pet) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Hewan Peliharaan</label>
        <input type="text" name="name" class="form-control" required value="<?= $pet->name ?>">
      </div>
      <div class="form-action">
        <a href="<?= base_url('pet') ?>" class="btn btn-warning">Batalkan</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>