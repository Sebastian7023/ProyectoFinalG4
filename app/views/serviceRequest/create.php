<?php
// app/views/serviceRequest/create.php
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="app/assets/css/createService.css">

<div class="service-form-pink-bg">
    <h2 class="text-center mb-4" style="color:#d63384;font-family:'Playfair Display',serif;">Crear Servicio</h2>
    <form method="POST" class="service-form">
        <label>Nombre:
            <input type="text" name="serviceName" required>
        </label>
        <label>Duración (minutos):
            <input type="number" name="durationMinutes" required>
        </label>
        <label>Precio:
            <input type="number" step="0.01" name="servicePrice" required>
        </label>
        <label>Descripción:
            <textarea name="serviceDescription"></textarea>
        </label>
        <label class="form-check-label mb-3">Disponible:
            <input type="checkbox" name="isAvailable" checked style="margin-left:8px;">
        </label>
        <div class="text-center mt-3">
            <button type="submit">Guardar</button>
            <a href="?controller=ServiceRequest&action=index" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
