<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="mx-auto max-w-md rounded-3xl border border-slate-200 bg-white p-8 shadow-xl">
    <h2 class="text-2xl font-semibold text-center">Login SI DADO</h2>
    <p class="mt-2 text-center text-sm text-slate-500">Masuk ke panel admin dan operasional stok darah.</p>
    <form method="post" class="mt-6 space-y-4">
      <input type="hidden" name="csrf_token" value="<?php echo e($csrf_token ?? ''); ?>">
      <div>
        <label class="mb-1 block text-sm font-medium">Email</label>
        <input type="email" name="email" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500" required>
      </div>
      <div>
        <label class="mb-1 block text-sm font-medium">Password</label>
        <input type="password" name="password" class="w-full rounded-xl border border-slate-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500" required>
      </div>
      <button class="w-full rounded-xl bg-blood px-4 py-3 font-semibold text-white">Masuk</button>
    </form>
  </div>
</div>
