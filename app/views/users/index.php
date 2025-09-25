<!-- app/views/users/index.php -->

<div class="container-fluid admin-theme users-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-title">Gestión de Usuarios</h2>
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
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= htmlspecialchars($usuario['fullName']) ?></td>
                                    <td><?= htmlspecialchars($usuario['userName']) ?></td>
                                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                                    <td>
                                        <span class="badge bg-<?= $usuario['rol'] === 'Administrador' ? 'primary' : 'success' ?> role-badge">
                                            <?= htmlspecialchars($usuario['rol']) ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($usuario['specialty'] ?? ' ') ?></td>
                                    <td>
                                        <span class="badge bg-<?= $usuario['isActive'] ? 'success' : 'danger' ?>">
                                            <?= $usuario['isActive'] ? 'Activo' : 'Inactivo' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn-group action-buttons">
                                            <a href="index.php?controller=User&action=editar&id=<?= $usuario['id'] ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="index.php?controller=User&action=eliminar&id=<?= $usuario['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('¿Estás seguro de eliminar este usuario?');">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-people display-4 text-muted d-block mb-2"></i>
                                    No hay usuarios registrados
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
            window.location.href = `index.php?controller=User&action=delete&id=${id}`;
        }
    });
}
</script>