<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <h4 class="fw-bold mb-3"><?php echo isset($facility) ? 'Edit Fasilitas' : 'Tambah Fasilitas'; ?></h4>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token ?? ''); ?>">
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Nama Fasilitas</label><input type="text" name="name" class="form-control" value="<?php echo e($facility['name'] ?? ''); ?>" required></div>
                <div class="col-md-6"><label class="form-label">Jenis</label><input type="text" name="facility_type" class="form-control" value="<?php echo e($facility['facility_type'] ?? ''); ?>" required></div>
                <div class="col-md-12"><label class="form-label">Alamat</label><textarea name="address" class="form-control"><?php echo e($facility['address'] ?? ''); ?></textarea></div>
                <div class="col-md-6"><label class="form-label">Provinsi</label><input type="text" name="province" class="form-control" value="<?php echo e($facility['province'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Kabupaten/Kota</label><input type="text" name="city" class="form-control" value="<?php echo e($facility['city'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Kecamatan</label><input type="text" name="district" class="form-control" value="<?php echo e($facility['district'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Kode Pos</label><input type="text" name="postal_code" class="form-control" value="<?php echo e($facility['postal_code'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Latitude</label><input type="text" name="latitude" class="form-control" value="<?php echo e($facility['latitude'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Longitude</label><input type="text" name="longitude" class="form-control" value="<?php echo e($facility['longitude'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Telepon</label><input type="text" name="phone" class="form-control" value="<?php echo e($facility['phone'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" class="form-control" value="<?php echo e($facility['email'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Website</label><input type="text" name="website" class="form-control" value="<?php echo e($facility['website'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Jam Operasional</label><input type="text" name="operating_hours" class="form-control" value="<?php echo e($facility['operating_hours'] ?? ''); ?>"></div>
                <div class="col-md-6"><label class="form-label">Logo</label><input type="file" name="logo" class="form-control"></div>
                <div class="col-md-6">
                    <label class="form-label">Status Aktif</label>
                    <select name="is_active" class="form-select">
                        <option value="1" <?php echo (($facility['is_active'] ?? 1) == 1) ? 'selected' : ''; ?>>Aktif</option>
                        <option value="0" <?php echo (($facility['is_active'] ?? 1) == 0) ? 'selected' : ''; ?>>Nonaktif</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kerja Sama PMI</label>
                    <select name="is_pmi_partner" class="form-select">
                        <option value="1" <?php echo (($facility['is_pmi_partner'] ?? 1) == 1) ? 'selected' : ''; ?>>Ya</option>
                        <option value="0" <?php echo (($facility['is_pmi_partner'] ?? 1) == 0) ? 'selected' : ''; ?>>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-danger">Simpan</button>
                <a href="<?php echo e(url('fasilitas')); ?>" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
