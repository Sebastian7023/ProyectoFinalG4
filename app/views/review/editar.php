<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/css/home.css" rel="stylesheet">
    <link href="../../assets/css/review.css" rel="stylesheet">
    <style>
                /* Estilos para el botón flotante de reseña */
.review-btn {
    position: fixed;
    top: 800px; /* Posiciona el botón a 20px del borde superior */
    right: 40px; /* Posiciona el botón a 170px del borde derecho */
    background-color: var(--rosa-oscuro);
    color: white;
    border-radius: 50px;
    padding: 10px 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    z-index: 1000;
}

.review-btn:hover {
    background-color: var(--rosa-medio);
    transform: scale(1.05);
}

.review-btn:active {
    transform: translateY(0) scale(1);
    box-shadow: 0 4px 15px rgba(233, 30, 99, 0.4);
}
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 section-title text-center">Editar Reseña</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="index.php?controller=Review&action=actualizarValoracion" method="POST">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($review['id'] ?? ''); ?>">

                    <div class="mb-3">
                        <label for="appointmentId" class="form-label">Número de cita</label>
                        <input type="number" min="0" class="form-control" id="appointmentId" name="appointmentId" value="<?php echo htmlspecialchars($review['appointmentId'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Calificación</label>
                        <div id="rating-stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="bi bi-star<?php echo ($i <= ($review['ratingValue'] ?? 0)) ? '-fill' : ''; ?>" data-value="<?php echo $i; ?>"></i>
                            <?php endfor; ?>
                        </div>
                        <input type="hidden" id="rating-value" name="ratingValue" value="<?php echo htmlspecialchars($review['ratingValue'] ?? 0); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="reviewComment" class="form-label">Comentario</label>
                        <textarea class="form-control" id="reviewComment" name="reviewComment" rows="4" required><?php echo htmlspecialchars($review['reviewComment'] ?? ''); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Actualizar Reseña</button>
                    <a href="index.php" class="review-btn bi bi-door-closed-fill"> 
                        Cancelar Edición
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const starContainer = document.getElementById('rating-stars');
            const stars = starContainer.querySelectorAll('i');
            const ratingInput = document.getElementById('rating-value');
            let selectedValue = parseInt(ratingInput.value) || 0;

            function updateStars(value) {
                stars.forEach(star => {
                    const starValue = parseInt(star.getAttribute('data-value'));
                    if (starValue <= value) {
                        star.classList.remove('bi-star');
                        star.classList.add('bi-star-fill');
                        star.classList.add('text-warning');
                    } else {
                        star.classList.remove('bi-star-fill');
                        star.classList.remove('text-warning');
                        star.classList.add('bi-star');
                    }
                });
            }

            starContainer.addEventListener('click', function(e) {
                if (e.target.tagName === 'I') {
                    selectedValue = parseInt(e.target.getAttribute('data-value'));
                    ratingInput.value = selectedValue;
                    updateStars(selectedValue);
                    console.log('Calificación seleccionada:', selectedValue);
                }
            });

            starContainer.addEventListener('mouseover', function(e) {
                if (e.target.tagName === 'I') {
                    const hoverValue = parseInt(e.target.getAttribute('data-value'));
                    updateStars(hoverValue);
                }
            });

            starContainer.addEventListener('mouseout', function() {
                updateStars(selectedValue);
            });

            updateStars(selectedValue);
        });
    </script>
</body>
</html>