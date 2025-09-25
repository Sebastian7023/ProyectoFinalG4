<div class="card shadow-lg p-4">
    <h2 class="mb-4 text-center">Editar Cita</h2>

    <form action="index.php?controller=Cita&action=actualizar" method="POST">
        <!-- ID oculto -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($cita['id']) ?>">

        <!-- Cliente (solo visible, no editable) -->
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="cliente" 
                   value="<?= htmlspecialchars($cita['cliente']) ?>" disabled>
            <input type="hidden" name="clientId" value="<?= htmlspecialchars($cita['clientId']) ?>">
        </div>

        <!-- Servicio -->
        <div class="mb-3">
            <label for="serviceId" class="form-label">Servicio</label>

            <?php if ($_SESSION['usuario']['rol'] === 'Administrador' || $_SESSION['usuario']['rol'] === 'Estilista'): ?>
                <select class="form-select" id="serviceId" name="serviceId" required>
                    <?php foreach ($servicios as $servicio): ?>
                        <option value="<?= $servicio['id'] ?>" 
                            <?= $servicio['id'] == $cita['serviceId'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($servicio['serviceName']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <input type="hidden" name="serviceId" value="<?= htmlspecialchars($cita['serviceId']) ?>">
                <p><strong><?= htmlspecialchars($cita['servicio']) ?></strong></p>
            <?php endif; ?>
        </div>

        <!-- Estilista -->
        <div class="mb-3">
            <label for="userId" class="form-label">Estilista</label>

            <?php if ($_SESSION['usuario']['rol'] === 'Administrador'): ?>
                <select class="form-select" id="userId" name="userId" required>
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario['id'] ?>" 
                            <?= $usuario['id'] == $cita['userId'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($usuario['fullName']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php else: ?>
                <!-- Estilista asignado no editable -->
                <input type="hidden" name="userId" value="<?= htmlspecialchars($cita['userId']) ?>">
                <p><strong><?= htmlspecialchars($cita['estilista']) ?></strong></p>
            <?php endif; ?>
        </div>

        <!-- Fecha y hora -->
        <div class="mb-3">
            <label for="appointmentDateTime" class="form-label">Fecha y Hora</label>

            <?php if ($_SESSION['usuario']['rol'] === 'Administrador' || $_SESSION['usuario']['rol'] === 'Estilista'): ?>
                <input type="datetime-local" class="form-control" id="appointmentDateTime" 
                       name="appointmentDateTime" 
                       value="<?= date('Y-m-d\TH:i', strtotime($cita['appointmentDateTime'])) ?>" required>
            <?php else: ?>
                <input type="hidden" name="appointmentDateTime" 
                       value="<?= date('Y-m-d\TH:i', strtotime($cita['appointmentDateTime'])) ?>">
                <p><strong><?= date('d/m/Y H:i', strtotime($cita['appointmentDateTime'])) ?></strong></p>
            <?php endif; ?>
        </div>

        <!-- Estado -->
        <div class="mb-3">
            <label for="appointmentStatus" class="form-label">Estado</label>

            <?php if ($_SESSION['usuario']['rol'] === 'Administrador' || $_SESSION['usuario']['rol'] === 'Estilista'): ?>
                <select class="form-select" id="appointmentStatus" name="appointmentStatus" required>
                    <option value="pendiente" <?= $cita['appointmentStatus'] === 'pendiente' ? 'selected' : '' ?>>Pendiente</option>
                    <option value="completada" <?= $cita['appointmentStatus'] === 'completada' ? 'selected' : '' ?>>Completada</option>
                    <option value="cancelado" <?= $cita['appointmentStatus'] === 'cancelado' ? 'selected' : '' ?>>Cancelada</option>
                </select>
            <?php else: ?>
                <input type="hidden" name="appointmentStatus" value="<?= htmlspecialchars($cita['appointmentStatus']) ?>">
                <p><strong><?= ucfirst($cita['appointmentStatus']) ?></strong></p>
            <?php endif; ?>
        </div>

        <!-- Notas -->
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"><?= htmlspecialchars($cita['notes']) ?></textarea>
        </div>

        <!-- Botones -->
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
