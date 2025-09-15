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

-- Tabla Usuarios 
CREATE TABLE users (
  userName varchar(50) PRIMARY KEY,
  userPassword varchar(255) NOT NULL,
  fullName varchar(255) NOT NULL,
  rol varchar(45) NOT NULL,
  specialty varchar(100) NOT NULL,
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
  stylistUser varchar(50) NOT NULL,
  appointmentDateTime DATETIME NOT NULL,
  appointmentStatus varchar(20) DEFAULT 'pending' NOT NULL, -- pending, confirmed, completed, cancelled
  notes varchar(1000), 
  FOREIGN KEY (clientId) REFERENCES client(id),
  FOREIGN KEY (serviceId) REFERENCES serviceRequest(id),
  FOREIGN KEY (stylistUser) REFERENCES stylist(userName),
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
  FOREIGN KEY (appointmentId) REFERENCES appointment(id),
  CHECK (ratingValue BETWEEN 1 AND 5),
  INDEX idx_review_date (reviewDate)
);