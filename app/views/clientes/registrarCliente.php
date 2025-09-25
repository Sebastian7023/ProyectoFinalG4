<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/crearCliente.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-person-plus-fill"></i> Registrar Cliente
                </div>
                <div class="card-body p-4">
                    <form action="index.php?controller=Cliente&action=registrar" method="POST">
                        <div class="mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control" placeholder="Ej: 12345678" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Nombre del cliente" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Ej: 987654321">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com">
                        </div>
                        <button type="submit" class="btn btn-pink">
                            <i class="bi bi-save me-1"></i> Guardar
                        </button>
                        <a href="index.php?controller=LoginCliente&action=login" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>