<div class="card shadow-lg p-4">
    <h2 class="mb-4 text-center">Crear Nueva Cita</h2>

    <form action="?controller=Cita&action=guardar" method="POST" class="needs-validation" novalidate>

        <!-- Cliente -->
        <div class="mb-3">
            <label for="clientId" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="clientId" name="clientId" 
                   placeholder="Ingrese el nombre del cliente" required>
            <div class="invalid-feedback">Por favor, ingrese el nombre del cliente.</div>
        </div>

        <!-- Servicio -->
        <div class="mb-3">
            <label for="serviceId" class="form-label">Servicio</label>
            <select id="serviceId" name="serviceId" class="form-select" required>
                <option value="">-- Seleccione un servicio --</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?= $servicio['id'] ?>"><?= htmlspecialchars($servicio['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Seleccione un servicio.</div>
        </div>

        <!-- Estilista -->
        <div class="mb-3">
            <label for="userId" class="form-label">Estilista</label>
            <select id="userId" name="userId" class="form-select" required>
                <option value="">-- Seleccione un estilista --</option>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>"><?= htmlspecialchars($usuario['nombre']) ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Seleccione un estilista.</div>
        </div>

        <!-- Fecha y Hora -->
        <div class="mb-3">
            <label for="appointmentDateTime" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="appointmentDateTime" 
                   name="appointmentDateTime" required>
            <div class="invalid-feedback">Seleccione fecha y hora.</div>
        </div>

        <!-- Notas -->
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"
                      placeholder="Agregue notas adicionales"></textarea>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-between">
            <a href="?controller=Cita&action=index" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
