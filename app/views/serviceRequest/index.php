<?php
// app/views/serviceRequest/index.php
// Listado de servicios
?>
<?php $_SESSION['rol'] = 'admin'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="app/assets/css/serviceRequest.css" rel="stylesheet">

<div class="service-list-pink-bg">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver al inicio
        </a>
        <h1 class="mb-0 flex-grow-1 text-center" style="color:#d63384;font-family:'Playfair Display',serif;">Servicios Registrados</h1>
        <a href="?controller=ServiceRequest&action=create" class="btn btn-pink">Crear nuevo servicio</a>
    </div>
    <div class="table-responsive">
        <table class="service-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Duración (min)</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td><?= $service['id'] ?></td>
                    <td><?= htmlspecialchars($service['serviceName']) ?></td>
                    <td><?= $service['durationMinutes'] ?></td>
                    <td>$<?= $service['servicePrice'] ?></td>
                    <td><?= htmlspecialchars($service['serviceDescription']) ?></td>
                    <td>
                        <?php if ($service['isAvailable']): ?>
                            <span class="badge bg-pink">Sí</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">No</span>
                        <?php endif; ?>
                    </td>
                    <td class="service-actions">
                        <a href="?controller=ServiceRequest&action=edit&id=<?= $service['id'] ?>" class="btn-action-edit">Editar</a>
                        <?php if ($service['isAvailable']): ?>
                            <a href="?controller=ServiceRequest&action=toggleAvailable&id=<?= $service['id'] ?>" class="btn-action-disable" onclick="return confirm('¿Seguro que deseas desactivar este servicio?');">Desactivar</a>
                        <?php else: ?>
                            <a href="?controller=ServiceRequest&action=toggleAvailable&id=<?= $service['id'] ?>" class="btn-action-enable" onclick="return confirm('¿Seguro que deseas activar este servicio?');">Activar</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
