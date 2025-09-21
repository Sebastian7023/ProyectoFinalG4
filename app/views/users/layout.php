<!-- app/views/users/layout.php-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrettyGirl Beauty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">    
    <link href="app/assets/images/iso1.png" rel="icon" type="image/x-icon" sizes="32x32">
    <link href="app/assets/css/layout.css" rel="stylesheet">
    <link href="app/assets/css/admin.css" rel="stylesheet">
    <link href="app/assets/css/user.css" rel="stylesheet">
</head>

<body class="admin-theme">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=Home&action=index">
                <img src="app/assets/images/iso1.png" alt="Logo" height="60">
                <span class="ms-2 d-none d-lg-inline">PrettyGirl Salon</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?controller=User&action=index">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] === 'Administrador'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=User&action=gestionarUsuarios">
                                <i class="bi bi-people-fill"></i> Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Cita&action=index">
                                <i class="bi bi-calendar-check-fill"></i> Citas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Cliente&action=index">
                                <i class="bi bi-person-lines-fill"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Review&action=index">
                                <i class="bi bi-chat-square-text-fill"></i> Reseñas
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex align-items-center ms-auto">
                    <span class="navbar-text me-3">
                        <i class="bi bi-person-circle me-1"></i>
                        Bienvenido, **<?= htmlspecialchars($_SESSION['usuario']['fullName'] ?? 'Invitado') ?>**
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <span class="badge bg-pretty-pink ms-2"><?= ucfirst($_SESSION['usuario']['rol']) ?></span>
                        <?php endif; ?>
                    </span>
                    <a href="index.php?controller=Login&action=cerrar_sesion" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right me-1"></i>Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-4 users-container">
        <?php include $vista; ?>
    </div>
    </body>
</html>
</html>