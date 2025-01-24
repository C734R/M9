-- Eliminar si ya existe y crear si no existe. Aseguramos evitar errores en la consulta
DROP DATABASE IF EXISTS m9uf1;
CREATE DATABASE IF NOT EXISTS m9uf1;

-- Definimos el esquema a utilizar
USE m9uf1;

-- Creamos tabla de usuarios con los datos necesarios
CREATE TABLE usuarios (
    usuario VARCHAR(100) NOT NULL PRIMARY KEY UNIQUE,
    password VARCHAR(256) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido1 VARCHAR(100) NOT NULL,
    apellido2 VARCHAR(100) NOT NULL
);

-- Creamos tabla de coches con los datos necesarios
CREATE TABLE coches (
    id_coche INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio FLOAT NOT NULL
);

-- Creamos tabla de alquileres con los datos necesarios y asociando a usuarios y coches con claves foráneas
CREATE TABLE alquileres (
    id_alquiler INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    coche INT NOT NULL,
    piloto VARCHAR(100) NOT NULL,
    dias INT NOT NULL,
    precio_total FLOAT NOT NULL,
    FOREIGN KEY (piloto) REFERENCES usuarios(usuario)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (coche) REFERENCES coches(id_coche)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

-- Definimos usuario administrador de la web
INSERT INTO usuarios(usuario,password,nombre,apellido1,apellido2)
    VALUES ('admin', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4' , 'Super', 'Mega', 'Admin');

-- Introducimos los datos básicos de los modelos de coche de la web
INSERT INTO coches(modelo,cantidad,precio)
    VALUES ('HONDAS2000', 3 , 250.0);

INSERT INTO coches(modelo,cantidad,precio)
    VALUES ('BMWM3E30', 2 , 300.0);

INSERT INTO coches(modelo,cantidad,precio)
    VALUES ('MBW201AMG190EDCM', 2 , 400.0);
    
INSERT INTO coches(modelo,cantidad,precio)
    VALUES ('EVO9', 4 , 350.0);

INSERT INTO coches(modelo,cantidad,precio)
    VALUES ('CUPRA6L', 10 , 100.0);