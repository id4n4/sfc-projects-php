CREATE DATABASE gestion_agricola
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE gestion_agricola;


-- 1. Tabla usuario
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,

    rol ENUM('admin', 'empleado')
        NOT NULL DEFAULT 'admin',

    id_jefe INT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_usuario_jefe
        FOREIGN KEY (id_jefe)
        REFERENCES usuario(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);


-- 2. Tabla campo
CREATE TABLE campo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_jefe INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    n_parcela VARCHAR(30) NOT NULL,
    area DECIMAL(10,2) NOT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1,

    CONSTRAINT fk_campo_jefe
        FOREIGN KEY (id_jefe)
        REFERENCES usuario(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT chk_campo_area
        CHECK (area > 0)
);


-- 3. Tabla tipo_actividad
CREATE TABLE tipo_actividad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    descripcion TEXT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1
);


-- 4. Tabla actividad
CREATE TABLE actividad (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_campo INT NOT NULL,
    id_tipo_actividad INT NOT NULL,
    descripcion TEXT NULL,
    tiempo DECIMAL(5,2) NOT NULL,
    fecha DATE NOT NULL,
    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_actividad_usuario
        FOREIGN KEY (id_usuario)
        REFERENCES usuario(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_actividad_campo
        FOREIGN KEY (id_campo)
        REFERENCES campo(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT fk_actividad_tipo
        FOREIGN KEY (id_tipo_actividad)
        REFERENCES tipo_actividad(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,

    CONSTRAINT chk_actividad_tiempo
        CHECK (tiempo > 0)
);


INSERT INTO tipo_actividad (nombre, descripcion)
VALUES
('Riego', 'Riego de cultivos y parcelas'),
('Siembra', 'Plantación de semillas o cultivos'),
('Poda', 'Mantenimiento y poda de plantas'),
('Fertilización', 'Aplicación de fertilizantes'),
('Cosecha', 'Recolección de productos agrícolas');