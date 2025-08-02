<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : 'Mi App' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <?php
        if (!empty($_SESSION['user_id'])): ?>
            <div class="mb-4 text-end">
                <a href="../../public/logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
            </div>
        <?php endif; ?>
        <?php if (!empty($content)) echo $content; ?>
    </div>
</body>

</html>