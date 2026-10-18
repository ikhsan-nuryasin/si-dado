<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
  <h2 class="text-xl font-semibold">Tambah Permintaan</h2>
  <form method="post" class="mt-6 space-y-4">
    <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token ?? ''); ?>">
    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="mb-1 block text-sm font-medium">Nama Rumah Sakit</label>
        <input type="text" class="w-full rounded-xl border border-slate-300 px-4 py-3">
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Golongan Darah</label>
        <select class="w-full rounded-xl border border-slate-300 px-4 py-3">
          <option>A+</option>
          <option>A-</option>
          <option>B+</option>
          <option>B-</option>
          <option>AB+</option>
          <option>AB-</option>
          <option>O+</option>
          <option>O-</option>
        </select>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Jumlah</label>
        <input type="number" class="w-full rounded-xl border border-slate-300 px-4 py-3">
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Prioritas</label>
        <select class="w-full rounded-xl border border-slate-300 px-4 py-3">
          <option>Normal</option>
          <option>Darurat</option>
        </select>
      </div>
    </div>
    <div class="flex gap-3">
      <button class="rounded-lg bg-blood px-4 py-2 text-white">Simpan</button>
      <a href="<?php echo e(url('permintaan')); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Batal</a>
    </div>
  </form>
</div>
