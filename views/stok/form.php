<div class="card shadow-sm border-0 rounded-4">
    <div class="card-body">
        <h4 class="fw-bold mb-3">Tambah Stok Darah</h4>
        <form method="post">
            <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token ?? ''); ?>">
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">ID Fasilitas</label><input type="number" name="facility_id" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Golongan Darah</label><input type="text" name="blood_group" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Rhesus</label><input type="text" name="rhesus" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Komponen</label><input type="text" name="component" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Jumlah Kantong</label><input type="number" name="quantity" class="form-control" required></div>
                <div class="col-md-6"><label class="form-label">Tanggal Kadaluarsa</label><input type="date" name="expiry_date" class="form-control"></div>
                <div class="col-md-6"><label class="form-label">Status</label><input type="text" name="status" class="form-control" value="Tersedia"></div>
                <div class="col-md-6"><label class="form-label">Sumber Data</label><input type="text" name="source" class="form-control" value="Manual"></div>
            </div>
            <div class="mt-4">
                <button class="btn btn-danger">Simpan</button>
                <a href="<?php echo e(url('stok')); ?>" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
