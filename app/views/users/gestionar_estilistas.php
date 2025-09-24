<div class="container-fluid admin-theme users-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title">Gestión de Estilistas</h2>
        <a href="index.php?controller=User&action=crear" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nuevo Usuario
        </a>
    </div>

    <div class="card user-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Especialidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($estilistas)): ?>
                            <?php foreach ($estilistas as $estilista): ?>
                                <tr>
                                    <td><?= htmlspecialchars($estilista['fullName']) ?></td>
                                    <td><?= htmlspecialchars($estilista['userName']) ?></td>
                                    <td><?= htmlspecialchars($estilista['email']) ?></td>
                                    <td><?= htmlspecialchars($estilista['rol']) ?></td>
                                    <td><?= htmlspecialchars($estilista['specialty']) ?></td>
                                    <td>
                                        <span class="badge rounded-pill bg-<?= $estilista['isActive'] ? 'success' : 'danger' ?>">
                                            <?= $estilista['isActive'] ? 'Activo' : 'Inactivo' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="index.php?controller=User&action=editar&id=<?= htmlspecialchars($estilista['id']) ?>" class="btn btn-sm btn-info" title="Editar">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="index.php?controller=User&action=<?= $estilista['isActive'] ? 'desactivar' : 'activar' ?>&id=<?= htmlspecialchars($estilista['id']) ?>" class="btn btn-sm btn-<?= $estilista['isActive'] ? 'danger' : 'success' ?>" title="<?= $estilista['isActive'] ? 'Desactivar' : 'Activar' ?>">
                                                <i class="bi bi-<?= $estilista['isActive'] ? 'person-slash' : 'person-check' ?>"></i>
                                            </a>
                                            <button onclick="confirmDelete(<?= htmlspecialchars($estilista['id']) ?>, '<?= htmlspecialchars($estilista['fullName']) ?>')" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-people display-4 text-muted d-block mb-2"></i>
                                    No hay estilistas registrados.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id, name) {
    Swal.fire({
        title: '¿Estás seguro?',
        html: `Vas a eliminar al usuario: <b>${name}</b>.<br>Esta acción no se puede deshacer.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d85a7f',
        cancelButtonColor: '#718096',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `index.php?controller=User&action=eliminar&id=${id}`;
        }
    });
}
</script>