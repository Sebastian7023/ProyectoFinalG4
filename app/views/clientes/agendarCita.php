<body class="admin-theme">
    <div class="container mt-4">
        <h2>Agendar Cita</h2>

        <form action="index.php?controller=Cita&action=guardarCita" method="POST">
            <input type="hidden" name="clientId" value="<?= $_SESSION['cliente']['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Servicio</label>
                <select name="serviceId" class="form-select" required>
                    <option value="">Seleccione un servicio</option>
                    <?php foreach ($servicios as $servicio): ?>
                        <option value="<?= $servicio['id'] ?>"><?= $servicio['serviceName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Estilista</label>
                <select name="userId" class="form-select" required>
                    <option value="">Seleccione un estilista</option>
                    <?php foreach ($estilistas as $estilista): ?>
                        <option value="<?= $estilista['id'] ?>"><?= $estilista['fullName'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Fecha y Hora</label>
                <input type="datetime-local" name="appointmentDateTime" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Notas</label>
                <textarea name="notes" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Agendar Cita</button>
            <a href="index.php?controller=Cita&action=verCitas" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
