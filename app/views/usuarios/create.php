<?php
$title = "Agregar Usuario";
ob_start();
?>
<h1 class="mb-4">Agregar Usuario</h1>
<?php if (!empty($error)) : ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" action="add.php" class="card p-4 shadow-sm">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" required
            value="<?= isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '' ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Ingrese su email" required
            value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese una contraseña" required>
            <button type="button" class="btn btn-outline-secondary" tabindex="-1" onclick="togglePassword()">
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </button>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="index.php" class="btn btn-secondary">Volver</a>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?>


<script>
    function togglePassword() {
        const pwd = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        } else {
            pwd.type = 'password';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        }
    }
</script>