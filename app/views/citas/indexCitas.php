<div class="card shadow-lg p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Listado de Citas</h2>
        <a href="index.php?controller=Cita&action=crear" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Nueva Cita
        </a>
    </div>

    <?php if (!empty($citas)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Usuario</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Notas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citas as $cita): ?>
                        <tr>
                            <td><?= htmlspecialchars($cita['id']) ?></td>
                            <td><?= htmlspecialchars($cita['clientId']) ?></td>
                            <td><?= htmlspecialchars($cita['serviceId']) ?></td>
                            <td><?= htmlspecialchars($cita['userId']) ?></td>
                            <td><?= htmlspecialchars($cita['appointmentDateTime']) ?></td>
                            <td>
                                <?php if ($cita['appointmentStatus'] === 'pendiente'): ?>
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                <?php elseif ($cita['appointmentStatus'] === 'completada'): ?>
                                    <span class="badge bg-success">Completada</span>
                                <?php elseif ($cita['appointmentStatus'] === 'cancelado'): ?>
                                    <span class="badge bg-danger">Cancelada</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($cita['appointmentStatus']) ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($cita['notes']) ?></td>
                            <td class="text-center">
                                <a href="index.php?controller=Cita&action=editar&id=<?= $cita['id'] ?>" 
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="index.php?controller=Cita&action=eliminar&id=<?= $cita['id'] ?>" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('¿Seguro que deseas cancelar esta cita?')">
                                    <i class="bi bi-trash"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No hay citas registradas aún.
        </div>
    <?php endif; ?>
</div>
