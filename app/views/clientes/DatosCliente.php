<body class="admin-theme">
    <div class="container-fluid mt-4 users-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Datos del Cliente</h2>
                    <a href="index.php?controller=Cliente&action=dashboardCliente" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver
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
                        <form id="userForm">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="dni" class="form-label">DNI *</label>
                                    <input type="text" class="form-control" value="<?= $cliente['dni'] ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Nombre Completo *</label>
                                    <input type="text" class="form-control" value="<?= $cliente['fullName'] ?>" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefono *</label>
                                    <input type="text" class="form-control" value="<?= $cliente['phone'] ?>" disabled>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Correo electronico *</label>
                                    <input type="text" class="form-control" value="<?= $cliente['email'] ?>" disabled>
                                </div>
                            </div>                                   

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-warning"
                                    onclick="window.location.href='index.php?controller=Cliente&action=editarDatos'">
                                    <i class="bi bi-pencil-square"></i> Editar
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