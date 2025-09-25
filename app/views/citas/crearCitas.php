<?php
$rol = $_SESSION['usuario']['rol'] ?? 'cliente';
?>

<div class="card shadow-lg p-4">
    <h2 class="mb-4 text-center">Crear Nueva Cita</h2>

    <form action="?controller=Cita&action=guardar" method="POST" class="needs-validation" novalidate>

        <!-- Cliente -->
        <div class="mb-3">
            <label for="clientId" class="form-label">Cliente</label>
            <?php if ($rol === 'Administrador' || $rol === 'Estilista'): ?>
                <select id="clientId" name="clientId" class="form-select" required>
                    <option value="">-- Seleccione un cliente --</option>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?= $cliente['id'] ?>" 
                            <?= isset($_POST['clientId']) && $_POST['clientId'] == $cliente['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cliente['fullName']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">Seleccione un cliente.</div>
            <?php else: ?>
                <input type="text" class="form-control" value="<?= htmlspecialchars($_SESSION['usuario']['fullName']) ?>" readonly>
                <input type="hidden" name="clientId" value="<?= htmlspecialchars($_SESSION['usuario']['id']) ?>">
            <?php endif; ?>
        </div>

        <!-- Servicio -->
        <div class="mb-3">
            <label for="serviceId" class="form-label">Servicio</label>
            <select id="serviceId" name="serviceId" class="form-select" required>
                <option value="">-- Seleccione un servicio --</option>
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?= $servicio['id'] ?>" 
                        <?= isset($_POST['serviceId']) && $_POST['serviceId'] == $servicio['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($servicio['serviceName']) ?>
                    </option>
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
                    <option value="<?= $usuario['id'] ?>" 
                        <?= isset($_POST['userId']) && $_POST['userId'] == $usuario['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($usuario['fullName']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">Seleccione un estilista.</div>
        </div>

        <!-- Fecha y Hora -->
        <div class="mb-3">
            <label for="appointmentDateTime" class="form-label">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="appointmentDateTime" 
                   name="appointmentDateTime" value="<?= $_POST['appointmentDateTime'] ?? '' ?>" required>
            <div class="invalid-feedback">Seleccione fecha y hora.</div>
        </div>

        <!-- Notas -->
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"
                      placeholder="Agregue notas adicionales"><?= htmlspecialchars($_POST['notes'] ?? '') ?></textarea>
        </div>

        <!-- Botones -->
        <div class="d-flex justify-content-between">
            <a href="index.php?controller=Cita&action=index" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Guardar
            </button>
        </div>
    </form>
</div>
