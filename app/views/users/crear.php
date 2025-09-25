<!-- app/views/users/crear.php-->
 
<body class="admin-theme">
    <div class="container-fluid mt-4 users-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Crear Nuevo Usuario</h2>
                    <a href="index.php?controller=User&action=index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
                    </a>
                </div>

                <div class="alert alert-danger d-none" id="errorAlert">
                    <ul class="mb-0" id="errorList">
                    </ul>
                </div>

                <div class="card user-card">
                    <div class="card-header">
                        Información del Usuario
                    </div>
                    <div class="card-body">
                        <form id="userForm" action="index.php?controller=User&action=guardar" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Nombre Completo *</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="userName" class="form-label">Nombre de Usuario *</label>
                                    <input type="text" class="form-control" id="userName" name="userName" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="userPassword" class="form-label">Contraseña *</label>
                                    <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                                    <div class="form-text">Mínimo 6 caracteres</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rol" class="form-label">Rol *</label>
                                    <select class="form-select" id="rol" name="rol" required>
                                        <option value="">Seleccionar rol</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Estilista">Estilista</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="specialty" class="form-label">Especialidad</label>
                                    <input type="text" class="form-control" id="specialty" name="specialty">
                                    <div class="form-text">Solo para estilistas</div>
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="isActive" name="isActive" checked>
                                <label class="form-check-label" for="isActive">Usuario activo</label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle"></i> Crear Usuario
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>