<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="card shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($user as $key) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $key->nama_depan, $key->nama_tengah, $key->nama_belakang ?></td>
              <td><?= $key->no_hp ?></td>
              <td><?= $key->address ?></td>
              <td><?= $key->email ?></td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>