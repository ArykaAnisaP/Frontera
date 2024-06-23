<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Ubah Paket Grooming</h1>
</div>

<div class="card shadow">
  <div class="card-body">
    <form action="<?= base_url('package_grooming/save_edit/'.$package_grooming->id_package_grooming) ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control">
      </div>
      <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" required value="<?= $package_grooming->title ?>">
      </div>
      <div class="form-action">
        <a href="<?= base_url('package_grooming') ?>" class="btn btn-warning">Batalkan</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>