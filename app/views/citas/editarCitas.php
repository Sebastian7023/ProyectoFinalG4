<div class="card shadow-lg p-4">
    <h2 class="mb-4 text-center">Editar Cita</h2>

    <form action="index.php?controller=Cita&action=actualizar" method="POST">
        <!-- ID oculto -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($cita['id']) ?>">

        <div class="mb-3">
            <label for="clientId" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="clientId" name="clientId" 
                   value="<?= htmlspecialchars($cita['clientId']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="serviceId" class="form-label">Servicio</label>
            <input type="text" class="form-control" id="serviceId" name="serviceId" 
                   value="<?= htmlspecialchars($cita['serviceId']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="userId" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="userId" name="userId" 
                   value="<?= htmlspecialchars($cita['userId']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="appointmentDateTime" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="appointmentDateTime" 
                   name="appointmentDateTime" 
                   value="<?= htmlspecialchars($cita['appointmentDateTime']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"><?= htmlspecialchars($cita['notes']) ?></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="index.php?controller=Cita&action=index" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Actualizar Cita
            </button>
        </div>
    </form>
</div>
