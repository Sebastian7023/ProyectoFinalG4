<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reseñas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/review.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 section-title text-center">Reseñas Realizadas</h1>

        <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <label for="appointmentSelect" class="form-label mb-0">Seleccionar cita</label>
                <a href="index.php?controller=Review&action=dejaReseña" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Dejar Reseña
                </a>
            </div>
            <select id="appointmentSelect" class="form-select mt-2">
                <?php foreach($citas as $cita): ?>
                    <option value="<?= $cita['id'] ?>"><?= $cita['id'] ?> - <?= $cita['serviceName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php if ($citaSeleccionada): ?>
            <div class="card">
                <div class="card-header">
                    <h4>Detalles de la reseña</h4>
                </div>
                <div class="card-body">
                    <p><strong>Servicio:</strong> <?= $citaSeleccionada['serviceName'] ?></p>
                    <p><strong>Fecha de cita:</strong> <?= $citaSeleccionada['appointmentDateTime'] ?></p>
                    <p><strong>Calificación:</strong>
                        <span id="rating-stars">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <i class="bi <?= $i <= $citaSeleccionada['ratingValue'] ? 'bi-star-fill text-warning' : 'bi-star' ?>" data-value="<?= $i ?>"></i>
                            <?php endfor; ?>
                        </span>
                        <input type="hidden" id="rating-value" value="<?= $citaSeleccionada['ratingValue'] ?>">
                    </p>
                    <p><strong>Comentario:</strong></p>
                    <textarea class="form-control" readonly><?= $citaSeleccionada['reviewComment'] ?></textarea>
                </div>
            </div>
        <?php else: ?>
            <p>No hay reseñas seleccionadas.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ratingInput = document.getElementById('rating-value');
            const starContainer = document.getElementById('rating-stars');

            // Colorear estrellas según rating actual
            if (ratingInput && starContainer) {
                const value = parseInt(ratingInput.value) || 0;
                const stars = starContainer.querySelectorAll('i');

                stars.forEach(star => {
                    const starValue = parseInt(star.getAttribute('data-value'));
                    if (starValue <= value) {
                        star.classList.remove('bi-star');
                        star.classList.add('bi-star-fill', 'text-warning');
                    } else {
                        star.classList.remove('bi-star-fill', 'text-warning');
                        star.classList.add('bi-star');
                    }
                });
            }

            // Manejar cambio de cita en el select
            const select = document.getElementById('appointmentSelect');
            if (select) {
                select.addEventListener('change', function() {
                    const citaId = this.value;
                    window.location.href = `index.php?controller=Review&action=verReseña&id=${citaId}`;
                });
            }
        });
    </script>


</body>
</html>
