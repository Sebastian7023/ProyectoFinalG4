<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Panel de Administración' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="app/assets/css/layout.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="?controller=Dashboard&action=index">
                <img src="app/assets/images/iso2.png" alt="Logo" style="height:6rem;">
                <span class="fw-bold" style="font-family: 'Playfair Display', serif; font-size: 1.8rem;"></span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=Dashboard&action=index">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=Estilista&action=listar">Estilistas</a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center ms-3">
                    <span class="navbar-text me-3">
                        Bienvenido, <?= $_SESSION['usuario'] ?? 'Invitado' ?>
                    </span>
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <a href="?controller=Auth&action=logout" class="btn btn-outline-danger">Cerrar Sesión</a>
                    <?php else: ?>
                        <a href="?controller=Auth&action=login" class="btn btn-primary">Iniciar Sesión</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php 
        if (isset($vista) && file_exists($vista)) {
            include $vista;
        } else {
            echo "<div class='alert alert-danger'>Vista no encontrada</div>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>