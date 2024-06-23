<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Hewan Peliharaan</h1>
  <a href="<?= base_url('pet/add') ?>" class="ml-auto btn btn-primary">Tambah</a>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="card shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Hewan Peliharaan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($pet as $key) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $key->name ?></td>
              <td>
                <a href="<?= base_url('pet/edit/'.$key->id_pet) ?>" class="btn btn-info">Ubah</a>
                <a href="<?= base_url('pet/delete/'.$key->id_pet) ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>