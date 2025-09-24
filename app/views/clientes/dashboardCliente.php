<body class="admin-theme">
    <div class="dashboard-admin">
        <div class="dashboard-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="dashboard-title">
                        <i class="bi bi-gem me-3"></i>Panel de Control de Clientes
                    </h1>
                    <p class="dashboard-subtitle">Bienvenido al dashboard para clientes de PrettyGirl Salon</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="dashboard-stats-badge">
                        <span class="badge bg-pretty-pink">
                            <i class="bi bi-activity me-2"></i>Sistema Activo
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Sección de métricas -->
        <div class="row metrics-row">            
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-success">
                    <div class="metric-icon">
                        <i class="bi bi-scissors"></i>
                    </div>
                    <div class="metric-content">
                        <h3>15</h3>
                        <p>Estilistas Disponibles</p>
                        <span class="metric-trend positive">+8%</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-warning">
                    <div class="metric-icon">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <div class="metric-content">
                        <h3>48</h3>
                        <p>Citas Realizadas</p>
                        <span class="metric-trend positive">+5%</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-info">
                    <div class="metric-icon">
                        <i class="bi bi-star"></i>
                    </div>
                    <div class="metric-content">
                        <h3>5</h3>
                        <p>Reseñas realizadas</p>
                        <span class="metric-trend positive">+2%</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-4">
                <div class="metric-card metric-card-info">
                    <div class="metric-icon">
                        <i class="bi bi-envelope-exclamation"></i>
                    </div>
                    <div class="metric-content">
                        <h3>10</h3>
                        <p>Mensajes</p>
                        <span class="metric-trend positive">3%</span>
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
                    <a href="index.php?controller=Cliente&action=verDatos" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <div class="action-content">
                            <h5>Ver datos del cliente</h5>
                            <p>Podras ver y actualizar tus datos</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                    <a href="index.php?controller=Cita&action=verCitas" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="action-content">
                            <h5>Gestión de citas</h5>
                            <p>Administrar las citas del cliente</p>
                        </div>
                        <div class="action-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                    <a href="?controller=Review&action=verReseña" class="quick-action-item">
                        <div class="action-icon">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <div class="action-content">
                            <h5>Reseñas</h5>
                            <p>Reseña como te fue en tu cita</p>
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
                        <h5>Actividad Reciente</h5>
                        <div class="chart-actions">
                            <button class="btn btn-sm btn-outline-pretty">Ver Todo</button>
                        </div>
                    </div>
                    <div class="chart-content">
                        <div class="activity-timeline">                          
                            <div class="activity-item">
                                <div class="activity-icon primary">
                                    <i class="bi bi-calendar-plus"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Nueva cita agendada</h6>
                                    <p>Corte y color para María López</p>
                                    <span class="activity-time">Hace 15 minutos</span>
                                </div>
                            </div>
                            <div class="activity-item">
                                <div class="activity-icon warning">
                                    <i class="bi bi-star"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Nueva reseña</h6>
                                    <p>5 estrellas para el servicio de Juan</p>
                                    <span class="activity-time">Hace 1 hora</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5>Distribución de Usuarios</h5>
                    </div>
                    <div class="chart-content">
                        <div class="distribution-chart">
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color admin"></span>
                                    Administradores
                                </div>
                                <div class="distribution-value">3</div>
                            </div>
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color stylist"></span>
                                    Estilistas
                                </div>
                                <div class="distribution-value">12</div>
                            </div>
                            <div class="distribution-item">
                                <div class="distribution-label">
                                    <span class="distribution-color client"></span>
                                    Clientes
                                </div>
                                <div class="distribution-value">150+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>