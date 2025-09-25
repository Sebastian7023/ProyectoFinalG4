<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Ver citas del estilista</h2>
        <a href="index.php?controller=User&action=index" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <div class="mb-3">
        <label for="citaSelect" class="form-label">Seleccionar cita</label>
        <select id="citaSelect" class="form-select">
            <?php foreach($citas as $cita): ?>
                <option value="<?= $cita['id'] ?>" 
                    <?= isset($citaSeleccionada) && $citaSeleccionada['id'] == $cita['id'] ? 'selected' : '' ?>>
                    <?= $cita['id'] ?> - <?= $cita['servicioNombre'] ?> (<?= $cita['appointmentDateTime'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if ($citaSeleccionada): ?>
    <form>
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <input type="text" class="form-control" value="<?= $citaSeleccionada['clienteNombre'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Servicio</label>
            <input type="text" class="form-control" value="<?= $citaSeleccionada['servicioNombre'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Estilista</label>
            <input type="text" class="form-control" value="<?= $citaSeleccionada['usuarioNombre'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha y Hora</label>
            <input type="text" class="form-control" value="<?= $citaSeleccionada['appointmentDateTime'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" class="form-control" value="<?= $citaSeleccionada['appointmentStatus'] ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Notas</label>
            <textarea class="form-control" readonly><?= $citaSeleccionada['notes'] ?></textarea>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="index.php?controller=Cita&action=editarCitaEstilista&id=<?= $cita['id'] ?>" class="btn btn-outline-primary">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <button type="button" class="btn btn-danger" onclick="confirmarCancelar(<?= $citaSeleccionada['id'] ?>)">
                <i class="bi bi-x-circle"></i> Cancelar cita
            </button>
        </div>
    </form>
    <?php else: ?>
        <p>No tienes citas registradas.</p>
    <?php endif; ?>
</div>

<script>
document.getElementById('citaSelect').addEventListener('change', function() {
    const citaId = this.value;
    window.location.href = `index.php?controller=Cita&action=verCitasEstilista&id=${citaId}`;
});

function confirmarCancelar(id) {
    if (confirm("¿Estás seguro que quieres cancelar esta cita?")) {
        window.location = "index.php?controller=Cita&action=cancelarCitaEstilista&id=" + id;
    }
}
</script>