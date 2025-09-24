<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deja tu Reseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/ProyectoFinalG4/app/assets/css/review.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 section-title text-center">Deja tu Reseña</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="index.php?controller=Review&action=guardar" method="POST">
                    <div class="mb-3">
                        <label for="appointmentId" class="form-label">Número de cita</label>
                        <input type="number" min="0" class="form-control" id="appointmentId" name="appointmentId" required>
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
                        <div id="rating-stars">
                            <i class="bi bi-star bi-star-fill text-warning" data-value="1"></i>
                            <i class="bi bi-star bi-star-fill text-warning" data-value="2"></i>
                            <i class="bi bi-star bi-star-fill text-warning" data-value="3"></i>
                            <i class="bi bi-star bi-star-fill text-warning" data-value="4"></i>
                            <i class="bi bi-star bi-star-fill text-warning" data-value="5"></i>
                        </div>
                        <input type="hidden" id="rating-value" name="ratingValue" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea class="form-control" id="comentario" name="reviewComment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Reseña</button>
                    <a href="index.php?controler=Home&action=index" id="review-btn" class="bi bi-door-closed-fill"> 
                        Cancelar Reseña
                    </a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const starContainer = document.getElementById('rating-stars');
            const stars = starContainer.querySelectorAll('.bi-star, .bi-star-fill');
            const ratingInput = document.getElementById('rating-value');
            let selectedValue = 0;

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
</html>