<div class="flex items-center justify-between mb-6">
  <div>
    <h2 class="text-xl font-semibold">Daftar Fasilitas Kesehatan</h2>
    <p class="text-sm text-slate-500">Kelola fasilitas yang terhubung dengan PMI.</p>
  </div>
  <a href="<?php echo e(url('fasilitas/tambah')); ?>" class="rounded-lg bg-blood px-4 py-2 text-sm font-medium text-white">Tambah Fasilitas</a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Nama</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Jenis</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Kota</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Status</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (!empty($facilities)): ?>
        <?php foreach ($facilities as $facility): ?>
          <tr>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($facility['name']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($facility['facility_type']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($facility['city']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($facility['is_active'] ? 'Aktif' : 'Nonaktif'); ?></td>
            <td class="px-4 py-3 text-sm">
              <a href="<?php echo e(url('fasilitas/edit/' . (int)$facility['id'])); ?>" class="mr-2 text-medical">Edit</a>
              <a href="<?php echo e(url('fasilitas/delete/' . (int)$facility['id'])); ?>" class="text-red-600" onclick="return confirm('Hapus fasilitas ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="5" class="px-4 py-8 text-center text-sm text-slate-500">Belum ada data fasilitas.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
