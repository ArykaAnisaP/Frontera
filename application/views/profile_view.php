<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>
<?php echo $this->session->flashdata('message'); ?>
<div class="card shadow">
  <div class="card-body">
    <form action="<?= base_url('profile/save') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Avatar</label>
        <input type="file" name="avatar" class="form-control" accept="image/x-png,image/gif,image/jpeg" >
      </div>
      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="name" class="form-control" required value="<?= $user->nama_depan, $user->nama_tengah, $user->nama_belakang ?>">
      </div>
      <div class="form-group">
        <label>No Telepon</label>
        <input type="text" name="name" class="form-control" required value="<?= $user->no_hp ?>">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="address" class="form-control" id="" cols="30" rows="10"><?= $user->address ?></textarea>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" readonly value="<?= $user->email ?>">
      </div>
      <div class="form-action">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>