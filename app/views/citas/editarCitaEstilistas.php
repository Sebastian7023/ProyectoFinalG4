<div class="container mt-4">
    <h2>Editar Cita</h2>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form action="index.php?controller=Cita&action=actualizarCitaEstilista" method="POST">
        
        <input type="hidden" name="id" value="<?= $cita['id'] ?>">

        <div class="mb-3">
            <label>ID de cita</label>
            <input type="text" class="form-control" value="<?= $cita['id'] ?>" disabled>
        </div>

        <div class="mb-3">
            <label>Cliente</label>
            <select name="clientId" class="form-select">
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?= $cliente['id'] ?>" <?= $cliente['id'] == $cita['clientId'] ? 'selected' : '' ?>>
                        <?= $cliente['fullName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Servicio</label>
            <select name="serviceId" class="form-select">
                <?php foreach ($servicios as $servicio): ?>
                    <option value="<?= $servicio['id'] ?>" <?= $servicio['id'] == $cita['serviceId'] ? 'selected' : '' ?>>
                        <?= $servicio['serviceName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Estilista</label>
            <select name="userId" class="form-select">
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>" <?= $usuario['id'] == $cita['userId'] ? 'selected' : '' ?>>
                        <?= $usuario['fullName'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Fecha y Hora</label>
            <input type="datetime-local" name="appointmentDateTime" class="form-control"
                   value="<?= date('Y-m-d\TH:i', strtotime($cita['appointmentDateTime'])) ?>">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="appointmentStatus" class="form-select">
                <option value="pending" <?= $cita['appointmentStatus'] == 'pending' ? 'selected' : '' ?>>Pendiente</option>
                <option value="confirmed" <?= $cita['appointmentStatus'] == 'confirmed' ? 'selected' : '' ?>>Confirmada</option>
                <option value="completed" <?= $cita['appointmentStatus'] == 'completed' ? 'selected' : '' ?>>Completada</option>
                <option value="cancelled" <?= $cita['appointmentStatus'] == 'cancelled' ? 'selected' : '' ?>>Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Notas</label>
            <textarea name="notes" class="form-control"><?= $cita['notes'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php?controller=Cita&action=verCitasEstilista" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
