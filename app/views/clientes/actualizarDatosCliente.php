<body class="admin-theme">
    <div class="container-fluid mt-4 users-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Actualizar datos del cliente</h2>
                    <a href="index.php?controller=Cliente&action=verDatos" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                </div>

                <div class="alert alert-danger d-none" id="errorAlert">
                    <ul class="mb-0" id="errorList">
                    </ul>
                </div>

                <div class="card user-card">
                    <div class="card-header">
                        Información del Cliente
                    </div>
                    <div class="card-body">
                        <form id="userForm" action="index.php?controller=Cliente&action=actualizarDatos" method="POST">
                            <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI *</label>
                                    <input type="text" name="dni" id="dni" class="form-control" value="<?= $cliente['dni'] ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Nombre Completo *</label>
                                    <input type="text" name="fullName" id="fullName" class="form-control" value="<?= $cliente['fullName'] ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefono *</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $cliente['phone'] ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo electronico *</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $cliente['email'] ?>">
                                </div>
                            </div>                                   

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-check-circle"></i> Guardar cambios
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