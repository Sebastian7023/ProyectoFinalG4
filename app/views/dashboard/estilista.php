<!--Panel del Estilista-->
<body class="stylist-theme">
    <div class="dashboard-stylist">
        <div class="dashboard-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="dashboard-title">
                        <i class="bi bi-scissors me-3"></i>Panel de Estilista
                    </h1>
                    <p class="dashboard-subtitle">Bienvenido, aquí puedes gestionar tus citas y clientes.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="dashboard-stats-badge">
                        <span class="badge bg-stylist-green">
                            <i class="bi bi-person-circle me-2"></i>Estilista
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row metrics-row">
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-primary">
                    <div class="metric-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="metric-content">
                        <h3>8</h3>
                        <p>Citas para Hoy</p>
                        <span class="metric-trend positive">+2</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-success">
                    <div class="metric-icon">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div class="metric-content">
                        <h3>5</h3>
                        <p>Clientes Atendidos</p>
                        <span class="metric-trend positive">Hoy</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-warning">
                    <div class="metric-icon">
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="metric-content">
                        <h3>4.9</h3>
                        <p>Mi Calificación</p>
                        <span class="metric-trend positive">+0.1</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-info">
                    <div class="metric-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="metric-content">
                        <h3>$320</h3>
                        <p>Ingresos del Día</p>
                        <span class="metric-trend positive">Estimado</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row quick-actions-row">
            <div class="col-12">
                <div class="section-header">
                    <h4><i class="bi bi-lightning me-2"></i>Acciones Rápidas</h4>
                </div>
                <div class="quick-actions-grid">
                    <a href="index.php?controller=Cita&action=agendarCitaEstilista" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-calendar-plus"></i>
                        </div>
                        <div class="action-content">
                            <h5>Agendar Cita</h5>
                            <p>Crear nueva cita para un cliente</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                    <a href="index.php?controller=Cita&action=verCitasEstilista" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-calendar-week"></i>
                        </div>
                        <div class="action-content">
                            <h5>Mis Citas</h5>
                            <p>Ver y gestionar mis próximas citas</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                    <a href="index.php?controller=Cliente&action=verClientesEstilista" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="action-content">
                            <h5>Gestión de Clientes</h5>
                            <p>Ver mis clientes y su historial</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                    <a href="#" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                        <div class="action-content">
                            <h5>Mensajes</h5>
                            <p>Revisar mensajes y notificaciones</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row charts-row">
            <div class="col-lg-8 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5>Mi Actividad Reciente</h5>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-pretty">Ver Todas</button>
                        </div>
                    </div>
                    <div class="chart-content">
                        <div class="activity-timeline">
                            <div class="activity-item">
                                <div class="activity-icon success">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Cita completada</h6>
                                    <p>Corte para Camila González</p>
                                    <span class="activity-time">Hace 5 minutos</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon warning">
                                    <i class="bi bi-calendar-x"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Cita cancelada</h6>
                                    <p>Color para Luis Pérez</p>
                                    <span class="activity-time">Hace 30 minutos</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon info">
                                    <i class="bi bi-star"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Nueva reseña</h6>
                                    <p>4 estrellas por el servicio de corte</p>
                                    <span class="activity-time">Hace 2 horas</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5>Mis Servicios Más Populares</h5>
                    </div>
                    <div class="chart-content">
                        <div class="distribution-chart">
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color cut"></span>
                                    Corte
                                </div>
                                <div class="distribution-value">45%</div>
                            </div>
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color color"></span>
                                    Color
                                </div>
                                <div class="distribution-value">30%</div>
                            </div>
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color styling"></span>
                                    Peinado
                                </div>
                                <div class="distribution-value">25%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>