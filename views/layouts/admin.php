<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($page_title ?? APP_NAME); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = { theme: { extend: { colors: { blood: '#D62828', medical: '#0B4F6C' } } } };
    </script>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="min-h-screen flex">
        <?php include APP_ROOT . '/views/partials/admin_sidebar.php'; ?>
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold">Dashboard SI DADO</h1>
                    <p class="text-sm text-slate-500">Selamat datang, <?php echo e($_SESSION['user']['name'] ?? 'Admin'); ?></p>
                </div>
                <a href="<?php echo e(url('logout')); ?>" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm hover:bg-slate-50">Logout</a>
            </div>
            <?php if (!empty($flash = get_flash())): ?>
                <div class="mb-4 rounded-lg border px-4 py-3 <?php echo $flash['type'] === 'success' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'; ?>">
                    <?php echo e($flash['message']); ?>
                </div>
            <?php endif; ?>
            <?php include $contentView; ?>
        </div>
    </div>
</body>
</html>
