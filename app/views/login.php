<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pretty Girl Salon - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
        rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <div class="row g-0">
            <div class="col-md-6 login-left">
                <img src="/app/assets/images/logg1.png" alt="Pretty Girl Logo" class="logo">
                <h2 class="welcome-text">Bienvenida al Sistema</h2>
                <p>Accede a tu cuenta para gestionar citas, clientes y servicios de nuestro salón de belleza.</p>
                <div class="mt-4">
                    <div class="feature d-flex align-items-center mb-3">
                        <i class="bi bi-calendar-check fs-4 me-3"></i>
                        <span>Gestiona citas y reservas</span>
                    </div>
                    <div class="feature d-flex align-items-center mb-3">
                        <i class="bi bi-people fs-4 me-3"></i>
                        <span>Administra clientes y estilistas</span>
                    </div>
                    <div class="feature d-flex align-items-center">
                        <i class="bi bi-graph-up fs-4 me-3"></i>
                        <span>Visualiza reportes y estadísticas</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 login-right">
                <h3 class="text-center mb-4" style="color: var(--rosa-oscuro);">Iniciar Sesión</h3>

                <div class="user-type-selector">
                    <button class="user-type-btn active" id="adminBtn">Administrador</button>
                    <button class="user-type-btn" id="stylistBtn">Estilista</button>
                </div>
                <form class="login-form" id="loginForm" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="tu@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña"
                            required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recordarme</label>
                        <a href="#" class="float-end"
                            style="color: var(--rosa-oscuro); text-decoration: none;">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="btn btn-login">Iniciar Sesión</button>
                </form>

                <div class="text-center">
                    <p>¿No tienes una cuenta? <a href="#"
                            style="color: var(--rosa-oscuro); text-decoration: none;">Contacta al administrador</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const adminBtn = document.getElementById('adminBtn');
            const stylistBtn = document.getElementById('stylistBtn');
            const loginForm = document.getElementById('loginForm');

            // Manejar el cambio entre administrador y estilista
            adminBtn.addEventListener('click', function() {
                adminBtn.classList.add('active');
                stylistBtn.classList.remove('active');
            });

            stylistBtn.addEventListener('click', function() {
                stylistBtn.classList.add('active');
                adminBtn.classList.remove('active');
            });

            // Manejar el envío del formulario
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const userType = adminBtn.classList.contains('active') ? 'Administrador' : 'Estilista';
                loginForm.action = "index.php?controller=User&action=index";
                window.location.href = loginForm.action;
                /*                 Aquí iría la lógica de autenticación
                                console.log('Tipo de usuario:', userType);
                                console.log('Email:', email);
                                console.log('Contraseña:', password);
                                
                                Simulación de inicio de sesión exitoso
                                alert(`Inicio de sesión exitoso como ${userType === 'Administrador' ? 'Administrador' : 'Estilista'}`);
                                
                                Redirección (simulada)
                                window.location.href = "dashboard.php"; */
            });
        });
    </script>
</body>

</html>