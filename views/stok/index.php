<div class="flex items-center justify-between mb-6">
  <div>
    <h2 class="text-xl font-semibold">Daftar Stok Darah</h2>
    <p class="text-sm text-slate-500">Pantau ketersediaan darah per fasilitas.</p>
  </div>
  <a href="<?php echo e(url('stok/tambah')); ?>" class="rounded-lg bg-blood px-4 py-2 text-sm font-medium text-white">Tambah Stok</a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Fasilitas</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Golongan</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Rhesus</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Komponen</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Jumlah</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Status</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (!empty($stocks)): ?>
        <?php foreach ($stocks as $stock): ?>
          <tr>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['facility_id']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['blood_group']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['rhesus']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['component']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['quantity']); ?></td>
            <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($stock['status']); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr><td colspan="6" class="px-4 py-8 text-center text-sm text-slate-500">Belum ada data stok.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
