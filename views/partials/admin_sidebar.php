<aside class="w-72 bg-slate-900 text-slate-100 min-h-screen p-6">
  <div class="mb-8">
    <h2 class="text-xl font-semibold">SI DADO Admin</h2>
    <p class="text-sm text-slate-400">Panel Pengelolaan</p>
  </div>
  <nav class="space-y-2">
    <a href="<?php echo e(url('dashboard')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Dashboard</a>
    <a href="<?php echo e(url('users')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">User</a>
    <a href="<?php echo e(url('fasilitas')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Fasilitas</a>
    <a href="<?php echo e(url('master/provinsi')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Master Wilayah</a>
    <a href="<?php echo e(url('stok')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Stok Darah</a>
    <a href="<?php echo e(url('permintaan')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Permintaan</a>
    <a href="<?php echo e(url('distribusi')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Distribusi</a>
    <a href="<?php echo e(url('laporan')); ?>" class="block rounded-lg px-3 py-2 hover:bg-slate-800">Laporan</a>
    <a href="<?php echo e(url('logout')); ?>" class="block rounded-lg px-3 py-2 text-red-300 hover:bg-slate-800">Logout</a>
  </nav>
</aside>
