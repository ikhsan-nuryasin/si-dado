<div class="flex items-center justify-between mb-6">
  <div>
    <h2 class="text-xl font-semibold">Manajemen User</h2>
    <p class="text-sm text-slate-500">Kelola akun dan role pengguna sistem.</p>
  </div>
  <a href="<?php echo e(url('users/tambah')); ?>" class="rounded-lg bg-blood px-4 py-2 text-sm font-medium text-white">Tambah User</a>
</div>

<div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
  <table class="min-w-full divide-y divide-slate-200">
    <thead class="bg-slate-50">
      <tr>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Nama</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Email</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Role</th>
        <th class="px-4 py-3 text-left text-sm font-medium text-slate-600">Status</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php foreach ($users as $user): ?>
        <tr>
          <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($user['name']); ?></td>
          <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($user['email']); ?></td>
          <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($user['role_name']); ?></td>
          <td class="px-4 py-3 text-sm text-slate-700"><?php echo e($user['is_active'] ? 'Aktif' : 'Nonaktif'); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
