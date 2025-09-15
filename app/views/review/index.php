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

        // Evento para detectar el clic en cualquier estrella
        starContainer.addEventListener('click', function(e) {
            // Asegurarse de que el clic es en una estrella
            if (e.target.tagName === 'I') {
                selectedValue = parseInt(e.target.getAttribute('data-value'));
                ratingInput.value = selectedValue;
                updateStars(selectedValue);
                console.log('Calificación seleccionada:', selectedValue);
                // Aquí puedes añadir más lógica, como enviar una petición AJAX, etc.
            }
        });

        // Evento para efecto al pasar el mouse por encima
        starContainer.addEventListener('mouseover', function(e) {
            if (e.target.tagName === 'I') {
                const hoverValue = parseInt(e.target.getAttribute('data-value'));
                updateStars(hoverValue);
            }
        });

        // Evento para restaurar el estado al salir del contenedor
        starContainer.addEventListener('mouseout', function() {
            updateStars(selectedValue);
        });

        // Inicializar el estado de las estrellas al cargar la página
        updateStars(selectedValue); 
    });
    </script>
</body>
</html>