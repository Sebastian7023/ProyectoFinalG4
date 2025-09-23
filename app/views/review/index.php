<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deja tu Reseña</title>
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

.review-btn i {
    font-size: 1.2rem;
    margin-right: 8px;
}
 
.review-btn:active {
    transform: translateY(0) scale(1);
    box-shadow: 0 4px 15px rgba(233, 30, 99, 0.4);
}
    </style>
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
                            <i class="bi bi-star" data-value="1"></i>
                            <i class="bi bi-star" data-value="2"></i>
                            <i class="bi bi-star" data-value="3"></i>
                            <i class="bi bi-star" data-value="4"></i>
                            <i class="bi bi-star" data-value="5"></i>
                        </div>
                        <input type="hidden" id="rating-value" name="ratingValue" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="comentario" class="form-label">Comentario</label>
                        <textarea class="form-control" id="comentario" name="reviewComment" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Reseña</button>
                    <a href="http://localhost/ProyectoFinalG4/" class="review-btn bi bi-door-closed-fill "> 
                        Cancelar Reseña
                    </a>
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