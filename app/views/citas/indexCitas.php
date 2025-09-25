<?php
$rol = $_SESSION['usuario']['rol'] ?? 'cliente';
?>

<div class="card shadow-lg p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Listado de Citas</h2>

        <div>
            <!-- Botón Volver al Dashboard -->
            <a href="index.php?controller=User&action=index" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left"></i> Volver al Dashboard
            </a>

            <!-- Botón Crear Cita visible para todos -->
            <a href="index.php?controller=Cita&action=crear" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Crear Cita
            </a>
        </div>
    </div>

    <?php if (!empty($citas)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Servicio</th>
                        <th>Estilista</th>
                        <th>Fecha y Hora</th>
                        <th>Estado</th>
                        <th>Notas</th>
                        <?php if ($rol !== 'cliente'): ?>
                            <th>Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($citas as $cita): ?>
                        <tr>
                            <td><?= htmlspecialchars($cita['id']) ?></td>
                            <td><?= htmlspecialchars($cita['cliente'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($cita['servicio'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($cita['estilista'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($cita['appointmentDateTime']) ?></td>
                            <td class="text-center">
                                <?php
                                $status = strtolower($cita['appointmentStatus'] ?? '');
                                if ($status === 'pendiente') {
                                    echo '<span class="badge bg-warning text-dark">Pendiente</span>';
                                } elseif ($status === 'completada' || $status === 'confirmed') {
                                    echo '<span class="badge bg-success">Completada</span>';
                                } elseif ($status === 'cancelado' || $status === 'canceled') {
                                    echo '<span class="badge bg-danger">Cancelada</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">' . htmlspecialchars($cita['appointmentStatus']) . '</span>';
                                }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($cita['notes'] ?? '-') ?></td>

                            <?php if ($rol !== 'cliente'): ?>
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
                            <?php endif; ?>
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
