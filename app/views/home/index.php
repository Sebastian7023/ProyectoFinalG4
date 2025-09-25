<!--//app/views/home/index.php-->
<!--Home Page-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link href="app/assets/css/home.css" rel="stylesheet">

<body>
    <!-- Botón flotante para login de administradores/estilistas -->

    <a href="/ProyectoFinalG4/app/views/login.php" class="admin-login-btn" title="Acceso administradores y estilistas">
        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
    </a>

    <!-- Botón para añadir reseñas - FUERA de la sección de testimonios -->
    <a href="index.php?controller=Review&action=index" class="review-btn" title="Añadir reseña">
        <i class="bi bi-chat-square-text"></i>
        <span>Dejar Reseña</span>
    </a>

    <!-- Hero Section -->
    <section class="hero-section" id="inicio">
        <div class="container-fluid text-center text-white">
            <p class="lead mb-4">Tu belleza es nuestra prioridad. Experimenta el lujo y la excelencia en cada visita.</p>
            <a href="#servicios" class="btn btn-dark btn-lg me-2">Nuestros Servicios</a>
            <a href="index.php?controller=LoginCliente&action=login" class="btn btn-outline-light btn-lg">Reservar Ahora</a>
        </div>
    </section>


    <!-- Servicios -->
    <section id="servicios" class="py-5 bg-light">
        <div class="container-fluid py-5">
            <h2 class="section-title">Nuestros Servicios</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-scissors"></i>
                        </div>
                        <h4>Cortes de Cabello</h4>
                        <p>Estilos modernos y clásicos que realzan tu belleza natural.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-palette"></i>
                        </div>
                        <h4>Coloración</h4>
                        <p>Técnicas de coloración profesionales para un look radiante.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-brush"></i>
                        </div>
                        <h4>Maquillaje</h4>
                        <p>Maquillaje profesional para ocasiones especiales o diario.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-hand-index-thumb"></i>
                        </div>
                        <h4>Manicura & Pedicura</h4>
                        <p>Cuidado especializado para uñas perfectas.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-star"></i>
                        </div>
                        <h4>Tratamientos Faciales</h4>
                        <p>Rejuvenecimiento y cuidado facial profesional.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card service-card">
                        <div class="service-icon">
                            <i class="bi bi-flower1"></i>
                        </div>
                        <h4>Servicios de Spa</h4>
                        <p>Relajación y bienestar integral para cuerpo y mente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Estadísticas
    <section class="py-5 bg-white">
        <div class="container-fluid py-5">
            <div class="row text-center">
                <div class="col-md-3">
                    <h2 class="text-primary">500+</h2>
                    <p>Clientes Satisfechos</p>
                </div>
                <div class="col-md-3">
                    <h2 class="text-primary">20+</h2>
                    <p>Estilistas Expertos</p>
                </div>
                <div class="col-md-3">
                    <h2 class="text-primary">15+</h2>
                    <p>Años de Experiencia</p>
                </div>
                <div class="col-md-3">
                    <h2 class="text-primary">100%</h2>
                    <p>Clientes Satisfechos</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Galería -->
    <section id="galeria" class="py-5 bg-light">
        <div class="container-fluid py-5">
            <h2 class="section-title">Nuestra Galería</h2>
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="app/assets/images/salon.png" class="img-fluid" alt="Salón de belleza">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="app/assets/images/cortes.png" class="img-fluid" alt="Corte de pelo">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://solecester.com/wp-content/webp-express/webp-images/uploads/2020/03/curso-de-iniciacion-al-maquillaje-profesional-2-1.jpg.webp" class="img-fluid" alt="Maquillaje">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="app/assets/images/manicure.png" class="img-fluid" alt="Manicura">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://tahecosmetics.com/trends/wp-content/uploads/2021/12/tipos-tintes-860x545.jpeg" class="img-fluid" alt="Coloración">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="img-fluid" alt="Tratamiento facial">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios" class="py-5 bg-white">
        <div class="container-fluid py-5">
            <h2 class="section-title">Lo Que Dicen Nuestras Clientes</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Cliente" class="testimonial-img">
                        <h5>María González</h5>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"El mejor servicio de belleza que he experimentado. Carmen es una artista con las tijeras."</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Cliente" class="testimonial-img">
                        <h5>Ana Rodríguez</h5>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p>"El color me quedó espectacular, justo lo que quería. ¡Volveré pronto!"</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80" alt="Cliente" class="testimonial-img">
                        <h5>Elena Martínez</h5>
                        <div class="text-warning mb-2">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p>"El maquillaje para mi boda fue perfecto. Me sentí como una princesa todo el día."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Precios -->
    <section id="precios" class="py-5 bg-light">
        <div class="container-fluid py-5">
            <h2 class="section-title">Nuestros Planes</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card pricing-card">
                        <div class="pricing-header">
                            <h4>Básico</h4>
                            <h3 class="price">S/.50.00</h3>
                            <p>por sesión</p>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check text-success me-2"></i> Corte y peinado</li>
                                <li><i class="bi bi-check text-success me-2"></i> Lavado incluido</li>
                                <li><i class="bi bi-x text-secondary me-2"></i> Tratamientos extras</li>
                                <li><i class="bi bi-x text-secondary me-2"></i> Productos premium</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary">Reservar Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card pricing-card">
                        <div class="pricing-header">
                            <h4>Premium</h4>
                            <h3 class="price">S/.100.00</h3>
                            <p>por sesión</p>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check text-success me-2"></i> Corte y peinado</li>
                                <li><i class="bi bi-check text-success me-2"></i> Coloración básica</li>
                                <li><i class="bi bi-check text-success me-2"></i> Tratamiento de keratina</li>
                                <li><i class="bi bi-x text-secondary me-2"></i> Productos premium</li>
                            </ul>
                            <a href="#" class="btn btn-primary">Reservar Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card pricing-card">
                        <div class="pricing-header">
                            <h4>VIP</h4>
                            <h3 class="price">S/.150.00</h3>
                            <p>por sesión</p>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-unstyled">
                                <li><i class="bi bi-check text-success me-2"></i> Servicio completo</li>
                                <li><i class="bi bi-check text-success me-2"></i> Coloración premium</li>
                                <li><i class="bi bi-check text-success me-2"></i> Tratamientos especiales</li>
                                <li><i class="bi bi-check text-success me-2"></i> Productos premium</li>
                            </ul>
                            <a href="#" class="btn btn-outline-primary">Reservar Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto -->
    <section id="contacto" class="py-5 bg-white">
        <div class="container-fluid py-5">
            <!-- <h2 class="section-title">Reserva Tu Cita</h2> -->
            <!-- <div class="row"> -->
            <!-- <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="servicio" class="form-label">Servicio</label>
                            <select class="form-select" id="servicio" required>
                                <option value="">Selecciona un servicio</option>
                                <option value="corte">Corte de Cabello</option>
                                <option value="color">Coloración</option>
                                <option value="maquillaje">Maquillaje</option>
                                <option value="manicura">Manicura</option>
                                <option value="facial">Tratamiento Facial</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha Preferida</label>
                            <input type="date" class="form-control" id="fecha" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje Adicional</label>
                            <textarea class="form-control" id="mensaje" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Reservar Ahora</button>
                    </form>
                </div> -->
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h4>Información de Contacto</h4>
                        <p><i class="bi bi-geo-alt me-2"></i> Avenida Siempreviva 742, Ciudad Rosa</p>
                        <p><i class="bi bi-telephone me-2"></i> (123) 456-7890</p>
                        <p><i class="bi bi-envelope me-2"></i> info@prettygirl.com</p>
                        <hr>
                        <h5>Horario de Atención</h5>
                        <p>Lunes a Viernes: 9:00 AM - 7:00 PM</p>
                        <p>Sábados: 9:00 AM - 5:00 PM</p>
                        <p>Domingos: Cerrado</p>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>Pretty Girl Beauty Salon</h5>
                    <p>Tu belleza es nuestra pasión. Ofrecemos servicios de alta calidad con los mejores profesionales.</p>
                </div>
                <div class="col-md-2 mb-3">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="#inicio" class="text-white">Inicio</a></li>
                        <li><a href="#servicios" class="text-white">Servicios</a></li>
                        <li><a href="#galeria" class="text-white">Galería</a></li>
                        <li><a href="#precios" class="text-white">Precios</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Servicios</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Cortes de Pelo</a></li>
                        <li><a href="#" class="text-white">Coloración</a></li>
                        <li><a href="#" class="text-white">Maquillaje</a></li>
                        <li><a href="#" class="text-white">Manicura & Pedicura</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5>Síguenos</h5>
                    <div class="d-flex">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-tiktok" style="font-size: 1.5rem;"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p>&copy; 2023 Pretty Girl Beauty Salon. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>