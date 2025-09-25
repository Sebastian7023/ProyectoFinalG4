<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Registrados - Pretty Girl Beauty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="app/assets/css/serviceRequest.css" rel="stylesheet">
</head>
<body>
    <?php $_SESSION['rol'] = 'admin'; ?>
    
    <div class="container-fluid py-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="index.php?controller=User&action=index" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Volver al dashboard
            </a>
            <h1 class="mb-0 flex-grow-1 text-center text-pink">
                <i class="bi bi-scissors me-2"></i>Administrar Servicios
            </h1>
            <a href="?controller=ServiceRequest&action=create" class="btn btn-pink">
                <i class="bi bi-plus-circle me-1"></i> Crear nuevo servicio
            </a>
        </div>

       
        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-list-ul me-2"></i>Lista de Servicios
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-pink">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Duración</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Estado</th>
                                <th scope="col" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                            <tr>
                                <td class="fw-bold text-muted"><?= $service['id'] ?></td>
                                <td class="fw-semibold"><?= htmlspecialchars($service['serviceName']) ?></td>
                                <td>
                                    <i class="bi bi-clock me-1"></i><?= $service['durationMinutes'] ?> min
                                </td>
                                <td class="fw-bold text-success">
                                    S/ <?= number_format($service['servicePrice'], 2) ?>
                                </td>
                                <td class="text-truncate" style="max-width: 200px;" title="<?= htmlspecialchars($service['serviceDescription']) ?>">
                                    <?= htmlspecialchars(substr($service['serviceDescription'], 0, 50)) ?>
                                    <?= strlen($service['serviceDescription']) > 50 ? '...' : '' ?>
                                </td>
                                <td>
                                    <?php if ($service['isAvailable']): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle me-1"></i>Disponible
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle me-1"></i>No disponible
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="?controller=ServiceRequest&action=edit&id=<?= $service['id'] ?>" 
                                           class="btn btn-outline-primary btn-sm" title="Editar servicio">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <?php if ($service['isAvailable']): ?>
                                            <a href="?controller=ServiceRequest&action=toggleAvailable&id=<?= $service['id'] ?>" 
                                               class="btn btn-outline-warning btn-sm" 
                                               onclick="return confirm('¿Seguro que deseas desactivar este servicio?');"
                                               title="Desactivar servicio">
                                                <i class="bi bi-toggle-on"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="?controller=ServiceRequest&action=toggleAvailable&id=<?= $service['id'] ?>" 
                                               class="btn btn-outline-success btn-sm" 
                                               onclick="return confirm('¿Seguro que deseas activar este servicio?');"
                                               title="Activar servicio">
                                                <i class="bi bi-toggle-off"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <?php if (empty($services)): ?>
        <div class="empty-state">
            <i class="bi bi-heart display-1"></i>
            <h3 class="text-pink mt-3" style="font-family: 'Dancing Script', cursive; font-size: 2rem;">No hay servicios registrados</h3>
            <p style="color: #d63384; opacity: 0.8; font-weight: 500;">¡Comienza creando tu primer servicio de belleza!</p>
            <a href="?controller=ServiceRequest&action=create" class="btn btn-pink mt-3">
                <i class="bi bi-plus-circle me-2"></i> Crear primer servicio
            </a>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>