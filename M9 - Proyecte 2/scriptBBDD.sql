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

CREATE TABLE coches_stock (
    id_coche INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    cantidad_disponible INT NOT NULL,
    precio float NOT NULL
);

CREATE TABLE alquiler (
    id_alquiler INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    coche INT NOT NULL,
    piloto VARCHAR(100) NOT NULL,
    dias INT NOT NULL,
    FOREIGN KEY (piloto) REFERENCES usuarios(usuario),
    FOREIGN KEY (coche) REFERENCES coches_stock(id_coche)
);


INSERT INTO coches_stock(modelo, cantidad_disponible,precio)
    VALUES ('CUPRA6L', 6 , 100.0);

INSERT INTO coches_stock(modelo, cantidad_disponible,precio)
    VALUES ('CUPRA6L', 6 , 100.0);
    
INSERT INTO coches_stock(modelo, cantidad_disponible,precio)
    VALUES ('CUPRA6L', 6 , 100.0);

INSERT INTO coches_stock(modelo, cantidad_disponible,precio)
    VALUES ('CUPRA6L', 6 , 100.0);