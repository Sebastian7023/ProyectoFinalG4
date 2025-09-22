<!-- app/views/users/editar.php-->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Editar Usuario</h2>
            <a href="index.php?controller=User&action=index" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>

        <?php if (isset($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php unset($_SESSION['errors']); ?>
        <?php endif; ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="index.php?controller=User&action=actualizar" method="POST">
                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fullName" class="form-label">Nombre Completo *</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" 
                                   value="<?= $_SESSION['form_data']['fullName'] ?? $usuario['fullName'] ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userName" class="form-label">Nombre de Usuario *</label>
                            <input type="text" class="form-control" id="userName" name="userName" 
                                   value="<?= $_SESSION['form_data']['userName'] ?? $usuario['userName'] ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= $_SESSION['form_data']['email'] ?? $usuario['email'] ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="userPassword" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="userPassword" name="userPassword">
                            <div class="form-text">Dejar en blanco para mantener la actual</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="rol" class="form-label">Rol *</label>
                            <select class="form-select" id="rol" name="rol" required>
                                <option value="administrador" <?= ($_SESSION['form_data']['rol'] ?? $usuario['rol']) === 'administrador' ? 'selected' : '' ?>>Administrador</option>
                                <option value="estilista" <?= ($_SESSION['form_data']['rol'] ?? $usuario['rol']) === 'estilista' ? 'selected' : '' ?>>Estilista</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="specialty" class="form-label">Especialidad</label>
                            <input type="text" class="form-control" id="specialty" name="specialty" 
                                   value="<?= $_SESSION['form_data']['specialty'] ?? $usuario['specialty'] ?>">
                            <div class="form-text">Solo para estilistas</div>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="isActive" name="isActive" 
                               <?= ($_SESSION['form_data']['isActive'] ?? $usuario['isActive']) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="isActive">Usuario activo</label>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Actualizar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php unset($_SESSION['form_data']); ?>