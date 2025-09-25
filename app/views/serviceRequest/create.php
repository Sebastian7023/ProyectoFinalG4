<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Servicio - Pretty Girl Beauty Salon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="app/assets/css/serviceRequest.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid py-4">
     
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="?controller=ServiceRequest&action=index" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Volver a servicios
            </a>
            <h1 class="mb-0 flex-grow-1 text-center text-pink">
                <i class="bi bi-plus-circle-fill me-2"></i>Crear Nuevo Servicio
            </h1>
            <div style="width: 180px;"></div> 
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="mb-0">
                            <i class="bi bi-sparkles me-2"></i>Nuevo Servicio de Belleza
                        </h4>
                    </div>
                    <div class="card-body p-4">
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nombre del Servicio</label>
                            <input type="text" name="serviceName" id="serviceName" class="form-control" placeholder="Ej: Corte de cabello" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duración (minutos)</label>
                            <input type="number" name="durationMinutes" id="durationMinutes" class="form-control" placeholder="Ej: 60" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" name="servicePrice" id="servicePrice" class="form-control" placeholder="Ej: 25.00" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="serviceDescription" id="serviceDescription" class="form-control" rows="3" placeholder="Descripción del servicio"></textarea>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="isAvailable" id="isAvailable" class="form-check-input" checked>
                            <label class="form-check-label" for="isAvailable">
                                Servicio disponible
                            </label>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-pink me-3">
                                <i class="bi bi-save me-2"></i> Guardar Servicio
                            </button>
                            <a href="?controller=ServiceRequest&action=index" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>