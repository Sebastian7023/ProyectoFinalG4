<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrettyGirl Salon - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/ProyectoFinalG4_1/app/assets/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <h2>PrettyGirl Salon</h2>
            <p class="text-muted">Sistema de gestión</p>
        </div>

        <?php if (isset($_SESSION['error_login'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error_login'] ?>
                <?php unset($_SESSION['error_login']); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?controller=Login&action=autenticar" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required 
                       value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="userPassword" name="userPassword" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
            </button>
        </form>

        <div class="mt-3 text-center">
            <small class="text-muted">¿Problemas para iniciar sesión? <a href="debug.php">Ver debug</a></small>
        </div>
    </div>
</body>
</html>