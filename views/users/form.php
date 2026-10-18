<div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
  <h2 class="text-xl font-semibold">Tambah User</h2>
  <form method="post" class="mt-6 space-y-4">
    <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token ?? ''); ?>">
    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="mb-1 block text-sm font-medium">Nama</label>
        <input type="text" name="name" class="w-full rounded-xl border border-slate-300 px-4 py-3" required>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Email</label>
        <input type="email" name="email" class="w-full rounded-xl border border-slate-300 px-4 py-3" required>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Password</label>
        <input type="password" name="password" class="w-full rounded-xl border border-slate-300 px-4 py-3" required>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Role</label>
        <select name="role_id" class="w-full rounded-xl border border-slate-300 px-4 py-3">
          <?php foreach ($roles as $role): ?>
            <option value="<?php echo (int)$role['id']; ?>"><?php echo e($role['name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="flex gap-3">
      <button class="rounded-lg bg-blood px-4 py-2 text-white">Simpan</button>
      <a href="<?php echo e(url('users')); ?>" class="rounded-lg border border-slate-300 px-4 py-2">Batal</a>
    </div>
  </form>
</div>
