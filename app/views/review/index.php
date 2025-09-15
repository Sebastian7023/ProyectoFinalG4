<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deja tu Reseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/home.css" rel="stylesheet">
    <link href="../../assets/css/review.css" rel="stylesheet"> </head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 section-title text-center">Deja tu Reseña</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="servicio" class="form-label">Servicio recibido</label>
                        <select class="form-select" id="servicio" required>
                            <option value="">Selecciona un servicio</option>
                            <option value="corte">Corte de Cabello</option>
                            <option value="color">Coloración</option>
                            <option value="maquillaje">Maquillaje</option>
                            <option value="manicura">Manicura & Pedicura</option>
                            <option value="facial">Tratamiento Facial</option>
                            <option value="spa">Spa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Calificación</label>
                        <div>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            <i class="bi bi-star text-warning"></i>
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea class="form-control" id="comentario" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Reseña</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>