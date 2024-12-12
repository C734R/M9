DROP DATABASE IF EXISTS m9uf1;
CREATE DATABASE IF NOT EXISTS m9uf1;
USE m9uf1;

CREATE TABLE usuarios (
    id_usuario int(10) NOT NULL PRIMARY KEY UNIQUE AUTOINCREASE,
    nombre varchar(100) NOT NULL,
    apellido varchar(100) NOT NULL,
    CONSTRAINT nombre_animal FOREIGN KEY (animal) REFERENCES animales_favoritos(Nombre)
)