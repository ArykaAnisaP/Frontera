<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Paket Grooming</h1>
  <a href="<?= base_url('package_grooming/add') ?>" class="ml-auto btn btn-primary">Tambah</a>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="card shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($package_grooming as $key) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td> <img src="<?= base_url($key->image) ?>" alt="" srcset="" width="50"> </td>
              <td><?= $key->title ?></td>
              <td>
                <a href="<?= base_url('package_grooming/edit/'.$key->id_package_grooming) ?>" class="btn btn-info">Ubah</a>
                <a href="<?= base_url('package_grooming/delete/'.$key->id_package_grooming) ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>