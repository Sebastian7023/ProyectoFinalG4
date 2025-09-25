-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS PrettyGirl_Salon;
USE PrettyGirl_Salon;

-- Tabla Cliente 
CREATE TABLE client (
  id int AUTO_INCREMENT PRIMARY KEY,
  dni varchar(8) UNIQUE NOT NULL,
  fullName varchar(255) NOT NULL,
  phone varchar(15) NOT NULL,
  email varchar(100) NULL,
  registrationDate DATE DEFAULT (CURRENT_DATE) NOT NULL
);

-- Tabla Usuarios (CORREGIDA)
CREATE TABLE users (
  id int AUTO_INCREMENT PRIMARY KEY, 
  userName varchar(50) UNIQUE NOT NULL,
  userPassword varchar(255) NOT NULL,
  fullName varchar(255) NOT NULL,
  rol varchar(45) NOT NULL,
  specialty varchar(100) NULL,
  email varchar(255) UNIQUE NOT NULL,
  isActive tinyint(1) DEFAULT 1 NOT NULL 
);

-- Tabla Servicio 
CREATE TABLE serviceRequest (
  id int AUTO_INCREMENT PRIMARY KEY,
  serviceName varchar(255) NOT NULL,
  durationMinutes int NOT NULL,
  servicePrice decimal(10,2) NOT NULL,
  serviceDescription varchar(500) NULL,  
  isAvailable tinyint(1) DEFAULT 1 NOT NULL 
);

-- Tabla Cita
CREATE TABLE appointment (
  id int AUTO_INCREMENT PRIMARY KEY,
  clientId int NOT NULL,
  serviceId int NOT NULL,
  userId int NOT NULL,  -- Cambiado de idUser a userId para mayor claridad
  appointmentDateTime DATETIME NOT NULL,
  appointmentStatus varchar(20) DEFAULT 'pending' NOT NULL, -- pending, confirmed, completed, cancelled
  notes varchar(1000), 
  FOREIGN KEY (clientId) REFERENCES client(id) ON DELETE CASCADE,
  FOREIGN KEY (serviceId) REFERENCES serviceRequest(id) ON DELETE CASCADE,
  FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE,
  INDEX idx_appointment_datetime (appointmentDateTime)
);

-- Tabla Valoracion 
CREATE TABLE review (
  id int AUTO_INCREMENT PRIMARY KEY,
  appointmentId int NOT NULL,
  ratingValue int NOT NULL, -- de 1 a 5
  reviewComment varchar(500),
  reviewDate DATE DEFAULT (CURRENT_DATE) NOT NULL,
  response VARCHAR(500),
  FOREIGN KEY (appointmentId) REFERENCES appointment(id) ON DELETE CASCADE,
  CHECK (ratingValue BETWEEN 1 AND 5),
  INDEX idx_review_date (reviewDate)
);

-- INSERTAR OBLIGATORIAMENTE
INSERT INTO serviceRequest (serviceName, durationMinutes, servicePrice, serviceDescription, isAvailable) VALUES
('Corte de Pelo', 45, 25.00, 'Incluye lavado y peinado.', 1),
('Coloración', 90, 60.00, 'Tinte de cabello completo, incluye retoques.', 1),
('Maquillaje', 60, 40.00, 'Maquillaje profesional para eventos especiales.', 1),
('Manicura', 30, 15.00, 'Manicura completa con esmalte regular.', 1),
('Tratamiento Facial', 75, 55.00, 'Limpieza profunda y mascarilla hidratante.', 1);

-- Clientes
INSERT INTO client (dni, fullName, phone, email) VALUES
('12345678', 'María López', '987654321', 'maria.lopez@example.com'),
('87654321', 'Carlos Pérez', '912345678', 'carlos.perez@example.com'),
('45678912', 'Ana Torres', '956123478', 'ana.torres@example.com');

-- Usuario
INSERT INTO users (userName, userPassword, fullName, rol, specialty, email) VALUES
('admin', SHA2('admin',256), 'Administrador General', 'Administrador', NULL, 'admin@prettygirl.com'),
('stylist01', SHA2('stylist123',256), 'Laura Gómez', 'stylist', 'Corte y Coloración', 'laura.gomez@prettygirl.com'),
('makeup01', SHA2('makeup123',256), 'Sofía Ramos', 'stylist', 'Maquillaje', 'sofia.ramos@prettygirl.com');

-- Cita
INSERT INTO appointment (clientId, serviceId, userId, appointmentDateTime, appointmentStatus, notes) VALUES
(1, 1, 2, '2025-09-25 10:00:00', 'confirmed', 'Cliente solicitó corte de puntas.'),
(2, 2, 2, '2025-09-26 15:30:00', 'pending', 'Primera vez con coloración.'),
(3, 3, 3, '2025-09-27 18:00:00', 'confirmed', 'Maquillaje para boda.');

-- Review
INSERT INTO review (appointmentId, ratingValue, reviewComment, response) VALUES
(1, 5, 'Excelente servicio, muy profesional.', '¡Gracias por tu confianza, María!'),
(3, 4, 'Me encantó el maquillaje, aunque tardó un poco.', 'Tomaremos en cuenta tu comentario para mejorar.');