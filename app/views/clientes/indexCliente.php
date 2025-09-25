<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Pretty Girl Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="/ProyectoFinalG4/app/assets/css/listarcliente.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-scissors icono"></i> Pretty Girl Salon
            </a>
            <a href="routers.php?controller=User&action=index" class="btn btn-rosa">
                    <i class="bi bi-arrow-left me-2"></i> Volver al dashboard
            </a>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container">
        <div class="container-box">
            <div class="d-flex justify-content-between mb-4 align-items-center">
                <h3><i class="bi bi-people-fill icono"></i> Lista de Clientes</h3>
                <a href="routers.php?controller=Cliente&action=crear" class="btn btn-rosa">
                    <i class="bi bi-person-plus-fill me-2"></i> Agregar Cliente
                </a>
            </div>

            <table class="table table-bordered table-hover align-middle text-center">
                <thead>
                    <tr>
                        <th><i class="bi bi-hash"></i> ID</th>
                        <th><i class="bi bi-person-badge-fill"></i> DNI</th>
                        <th><i class="bi bi-person-fill"></i> Nombre Completo</th>
                        <th><i class="bi bi-phone-fill"></i> Celular</th>
                        <th><i class="bi bi-envelope-fill"></i> Email</th>
                        <th><i class="bi bi-calendar-heart-fill"></i> Registro</th>
                        <th><i class="bi bi-gear-fill"></i> Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)) : ?>
                        <?php foreach ($clientes as $c) : ?>
                            <tr>
                                <td><?= $c['id'] ?></td>
                                <td><?= $c['dni'] ?></td>
                                <td><?= $c['fullName'] ?></td>
                                <td><?= $c['phone'] ?></td>
                                <td><?= $c['email'] ?></td> 
                                <td><?= $c['registrationDate'] ?></td>          
                                <td>
                                    <a href="routers.php?controller=Cliente&action=editar&id=<?= $c['id'] ?>" 
                                       class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay clientes registrados aún </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
