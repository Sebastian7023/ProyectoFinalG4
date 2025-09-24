<div class="container py-5">
    <h1 class="mb-4 text-center">Deja tu Reseña</h1>

    <?php if (!empty($citasCompletadas)): ?>
        <form action="index.php?controller=Review&action=subirReseña" method="POST">
            <div class="mb-3">
                <label for="appointmentId" class="form-label">Seleccionar cita completada</label>
                <select name="appointmentId" id="appointmentId" class="form-select" required>
                    <option value="">-- Selecciona una cita --</option>
                    <?php foreach($citasCompletadas as $cita): ?>
                        <option value="<?= $cita['id'] ?>">
                            <?= $cita['serviceName'] ?> — <?= $cita['appointmentDateTime'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Calificación</label>
                <div id="rating-stars">
                    <?php for($i=1; $i<=5; $i++): ?>
                        <i class="bi bi-star" data-value="<?= $i ?>"></i>
                    <?php endfor; ?>
                </div>
                <input type="hidden" id="rating-value" name="ratingValue" value="0">
            </div>

            <div class="mb-3">
                <label for="reviewComment" class="form-label">Comentario</label>
                <textarea name="reviewComment" id="reviewComment" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">Enviar Reseña</button>
        </form>
    <?php else: ?>
        <p class="text-center">No tienes citas completadas para dejar reseña.</p>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const starContainer = document.getElementById('rating-stars');
    const stars = starContainer.querySelectorAll('i');
    const ratingInput = document.getElementById('rating-value');
    let selectedValue = 0;

    function updateStars(value) {
        stars.forEach(star => {
            star.classList.toggle('bi-star-fill', star.getAttribute('data-value') <= value);
            star.classList.toggle('bi-star', star.getAttribute('data-value') > value);
        });
    }

    starContainer.addEventListener('click', function(e) {
        if (e.target.tagName === 'I') {
            selectedValue = parseInt(e.target.getAttribute('data-value'));
            ratingInput.value = selectedValue;
            updateStars(selectedValue);
        }
    });

    starContainer.addEventListener('mouseover', function(e) {
        if (e.target.tagName === 'I') {
            updateStars(parseInt(e.target.getAttribute('data-value')));
        }
    });

    starContainer.addEventListener('mouseout', function() {
        updateStars(selectedValue);
    });
});
</script>
