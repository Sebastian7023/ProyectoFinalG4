<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/editarCliente.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square"></i> Editar Cliente
                </div>
                <div class="card-body p-4">
                    <form action="index.php?controller=Cliente&action=actualizar" method="POST">
                        <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text" name="dni" id="dni" class="form-control" 
                                   value="<?= $cliente['dni'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="fullName" id="fullName" class="form-control" 
                                   value="<?= $cliente['fullName'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="form-control" 
                                   value="<?= $cliente['phone'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   value="<?= $cliente['email'] ?>">
                        </div>
                        <button type="submit" class="btn btn-pink">
                            <i class="bi bi-save me-1"></i> Actualizar
                        </button>
                        <a href="index.php?controller=Cliente&action=index" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-1"></i> Cancelar
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
