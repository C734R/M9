DROP DATABASE IF EXISTS m9uf1;
CREATE DATABASE IF NOT EXISTS m9uf1;
USE m9uf1;

CREATE TABLE usuarios (
    usuario varchar(100) NOT NULL PRIMARY KEY UNIQUE,
    password varchar(256) NOT NULL,
    nombre varchar(100) NOT NULL,
    apellido1 varchar(100) NOT NULL,
    apellido2 varchar(100) NOT NULL
);

CREATE TABLE coches (
    id_coche INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    modelo varchar(100) NOT NULL,
    precio INT(10) NOT NULL,
    cantidad INT(3) NOT NULL
);