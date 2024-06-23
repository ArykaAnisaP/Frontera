<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">List Pesanan </h1>
  <a href="<?= base_url('order/add') ?>" class="ml-auto btn btn-primary">Buat Pesanan</a>
</div>

<?php echo $this->session->flashdata('message'); ?>

<div class="card shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>

            <?php
            if ($this->session->role == 'admin') { ?>
              <th>No</th>
              <th>Nama Customer</th>
              <th>No Telepon</th>
              <th>Gambar</th>
              <th>Hewan Peliharaan</th>
              <th>Paket Grooming</th>
              <th>Layanan Antar Jemput</th>
              <th>Total Harga</th>
              <th>Notes</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            <?php } else { ?>
              <th>No</th>
              <th>Gambar</th>
              <th>No Telepon</th>
              <th>Hewan Peliharaan</th>
              <th>Paket Grooming</th>
              <th>Layanan Antar Jemput</th>
              <th>Total Harga</th>
              <th>Notes</th>
              <th>Status</th>
              <th>Tanggal</th>
            <?php }
            ?>

          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($order as $key) {
            $total = $key->package_grooming_pet_price;
            if ($key->id_delivery_cost != null) {
              $total += (float)$key->delivery_cost_price;
            }

          ?>
            <?php
            if ($this->session->role == 'admin') { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $key->nama_depan, $key->nama_tengah, $key->nama_belakang ?></td>
                <td><?= $key->no_hp ?></td>
                <td><img src="<?= base_url($key->image) ?>" alt="" width="150"></td>
                <td><?= $key->pet_name ?></td>
                <td><?= $key->package_grooming_title ?></td>
                <td><?= $key->delivery_cost_place ?></td>
                <td>Rp.<?= $total ?></td>
                <td><?= $key->notes ?></td>
                <td><?= $key->status ?></td>
                <td><?= date('Y-m-d', strtotime($key->created_at))  ?></td>
                <td>
                  <?php
                  if ($key->status == 'didaftarkan') { ?>
                    <a href="<?= base_url('order/update_order/proses/'.$key->id_order) ?>" class="btn btn-info">Proses</a>
                  <?php } else if ($key->status == 'proses') { ?>
                    <a href="<?= base_url('order/update_order/selesai/'.$key->id_order) ?>" class="btn btn-success">Selesai</a>
                  <?php }
                  ?>
                </td>
              </tr>
            <?php } else { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><img src="<?= base_url($key->image) ?>" alt="" width="150"></td>
                <td><?= $key->no_hp ?></td>
                <td><?= $key->pet_name ?></td>
                <td><?= $key->package_grooming_title ?></td>
                <td><?= $key->delivery_cost_place ?></td>
                <td>Rp.<?= $total ?></td>
                <td><?= $key->notes ?></td>
                <td><?= $key->status ?></td>
                <td><?= date('Y-m-d', strtotime($key->created_at))  ?></td>
              </tr>
            <?php }
            ?>

          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>