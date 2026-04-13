CREATE DATABASE bdatos;
USE bdatos;

CREATE TABLE gatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    nombre VARCHAR(50),
    edad_anio INT NOT NULL CHECK (edad_anio >= 0),
    edad_meses INT NOT NULL CHECK (edad_meses >= 0)
);

INSERT INTO gatos (tipo, nombre, edad_anio, edad_meses) VALUES
('angora','pepe',1,3),
('smoquin','Carlos',2,1),
('marron','Lampe',1,11);

CREATE TABLE vacunas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gato_id INT,
    nombre VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    estado ENUM('pendiente','aplicada') NOT NULL,
    descripcion TEXT,
    FOREIGN KEY (gato_id) REFERENCES gatos(id)
);

INSERT INTO vacunas (gato_id, nombre, fecha, estado, descripcion) VALUES
(1,'Rabia','2024-01-10','aplicada','Primera dosis'),
(2,'Triple Felina','2024-02-15','pendiente','Programada'),
(3,'Leucemia','2024-03-20','aplicada','Refuerzo anual');
    edad_meses INT NOT NULL CHECK(edad >= 0)
;
INSERT INTO Gatos VALUES(1,"angora","pepe",1,3),(2,"smoquin","Carlos",2,13),(3,"marron","Lampe",1,11);

/*UPDATE `personas` SET `nombre` = 'Pepe', `edad` = '18', `altura` = '1.70' WHERE ...*/
/*DELETE FROM personas WHERE ...*/