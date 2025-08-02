<?php
$title = "Editar Usuario";
ob_start();
?>
<h1 class="mb-4">Editar Usuario</h1>
<?php if (!empty($error)) : ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" action="edit.php" class="card p-4 shadow-sm">
    <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
