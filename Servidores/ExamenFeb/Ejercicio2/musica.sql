CREATE DATABASE IF NOT EXISTS musica;
USE musica;

CREATE TABLE listas_reproduccion (
    id_lista INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) UNIQUE NOT NULL,
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE canciones (
    id_cancion INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    artista VARCHAR(100) NOT NULL,
    album VARCHAR(150),
    anio INT CHECK (anio >= 1900 AND anio <= YEAR(CURDATE())),
    UNIQUE (titulo, artista, album) 
);


CREATE TABLE lista_canciones (
    id_lista INT,
    id_cancion INT,
    PRIMARY KEY (id_lista, id_cancion),
    FOREIGN KEY (id_lista) REFERENCES listas_reproduccion(id_lista) ON DELETE CASCADE,
    FOREIGN KEY (id_cancion) REFERENCES canciones(id_cancion) ON DELETE CASCADE
);
