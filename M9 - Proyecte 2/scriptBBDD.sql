DROP DATABASE IF EXISTS m9uf1;
CREATE DATABASE IF NOT EXISTS m9uf1;
USE m9uf1;

CREATE TABLE usuarios (
    usuario VARCHAR(100) NOT NULL PRIMARY KEY UNIQUE,
    password VARCHAR(256) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    apellido1 VARCHAR(100) NOT NULL,
    apellido2 VARCHAR(100) NOT NULL
);

CREATE TABLE coches (
    id_coche INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    precio float NOT NULL
);

CREATE TABLE alquiler (
    id_alquiler INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    coche INT NOT NULL,
    piloto VARCHAR(100) NOT NULL,
    dias INT NOT NULL,
    FOREIGN KEY (piloto) REFERENCES usuarios(usuario),
    FOREIGN KEY (coche) REFERENCES coches(id_coche)
);

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