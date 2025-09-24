<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretty Girl Salon - Login Cliente</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Tu CSS -->
    <link href="/ProyectoFinalG4/app/assets/css/login.css" rel="stylesheet">
</head>
<body>
<div class="login-container">
    <div class="row g-0">
        <!-- Lado izquierdo -->
        <div class="col-md-6 login-left">
            <img src="/ProyectoFinalG4/app/assets/images/logg1.png" alt="Pretty Girl Logo" class="logo">
            <h2 class="welcome-text">Bienvenido Cliente</h2>
            <p>Ingresa tu DNI para acceder a tus citas y servicios.</p>
            <div class="mt-4">
                <div class="feature d-flex align-items-center mb-3">
                    <i class="bi bi-calendar-check fs-4 me-3"></i>
                    <span>Gestiona tus citas fácilmente</span>
                </div>
                <div class="feature d-flex align-items-center mb-3">
                    <i class="bi bi-people fs-4 me-3"></i>
                    <span>Visualiza tus datos</span>
                </div>
                <div class="feature d-flex align-items-center">
                    <i class="bi bi-graph-up fs-4 me-3"></i>
                    <span>Deja tus reseñas</span>
                </div>
            </div>
        </div>

        <!-- Lado derecho: login -->
        <div class="col-md-6 login-right">
            <h3 class="text-center mb-4" style="color: var(--rosa-oscuro);">Iniciar Sesión</h3>

            <form class="login-form" method="POST" action="index.php?controller=LoginCliente&action=autenticar">
                <div class="mb-3">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingresa tu DNI" required>
                </div>

                <button type="submit" class="btn btn-login">Iniciar Sesión</button>
            </form>

            <div class="text-center mt-3">
                <p>¿No tienes cuenta? 
                    <a href="index.php?controller=Cliente&action=registrarClienteForm" style="color: var(--rosa-oscuro); text-decoration: none;">Regístrate aquí</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
