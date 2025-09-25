<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reseña (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/review.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 section-title text-center">Editar Reseña (Admin)</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="index.php?controller=Review&action=actualizarRespuesta" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($review['id'] ?? ''); ?>">

                    <div class="mb-3">
                        <label for="appointmentId" class="form-label">Número de cita</label>
                        <input type="number" class="form-control" id="appointmentId" value="<?php echo htmlspecialchars($review['appointmentId'] ?? ''); ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Calificación</label>
                        <div id="rating-stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="bi bi-star<?php echo ($i <= ($review['ratingValue'] ?? 0)) ? '-fill' : ''; ?> <?php echo ($i <= ($review['ratingValue'] ?? 0)) ? 'text-warning' : ''; ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="reviewComment" class="form-label">Comentario del usuario</label>
                        <textarea class="form-control" id="reviewComment" rows="4" readonly><?php echo htmlspecialchars($review['reviewComment'] ?? ''); ?></textarea>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label for="response" class="form-label">Respuesta del Administrador</label>
                        <textarea class="form-control" id="response" name="response" rows="4"><?php echo htmlspecialchars($review['response'] ?? ''); ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Actualizar Respuesta</button>
                    <a href="index.php" class="review-btn bi bi-door-closed-fill"> 
                        Cancelar Edición
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>