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
<body class="bg-slate-50 text-slate-800">
    <?php include APP_ROOT . '/views/partials/navbar.php'; ?>
    <?php if (!empty($flash = get_flash())): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="rounded-lg border px-4 py-3 <?php echo $flash['type'] === 'success' ? 'bg-green-50 text-green-700 border-green-200' : 'bg-red-50 text-red-700 border-red-200'; ?>">
                <?php echo e($flash['message']); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php include $contentView; ?>
</body>
</html>
