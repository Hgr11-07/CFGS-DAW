DROP DATABASE IF EXISTS videoclub;
CREATE DATABASE videoclub;
USE videoclub;

-- ######################################################################
-- CREACIÓN DE TABLAS
-- ######################################################################

-- 1. Tabla Director
CREATE TABLE director (
    id_director INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50),
    fecha_nacimiento DATE
);

-- 2. Tabla Cliente
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    ciudad VARCHAR(50),
    calle VARCHAR(100),
    numero VARCHAR(20)
);

-- 3. Tabla Telefono_Cliente (atributo multivalorado)
CREATE TABLE telefono_cliente (
    id_telefono INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    numero VARCHAR(20) NOT NULL,
    CONSTRAINT fk_telefono_cliente_cliente
        FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- 4. Tabla Categoría
CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT
);

-- 5. Tabla Proveedor
CREATE TABLE proveedor (
    id_proveedor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    direccion VARCHAR(200),
    telefono VARCHAR(20)
);

-- 6. Tabla Trabajador
CREATE TABLE trabajador (
    id_trabajador INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_contratacion DATE NOT NULL,
    salario DECIMAL(10, 2)
    -- antigüedad es atributo derivado, se calcula a partir de fecha_contratacion
);

-- 7. Tabla Pelicula
CREATE TABLE pelicula (
    id_pelicula INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    año_lanzamiento INT,
    genero VARCHAR(50),
    clasificacion VARCHAR(20),
    id_proveedor INT NOT NULL,
    director INT NOT NULL,
    CONSTRAINT fk_pelicula_proveedor
        FOREIGN KEY (id_proveedor) REFERENCES proveedor(id_proveedor)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    CONSTRAINT fk_pelicula_director
        FOREIGN KEY (director) REFERENCES director(id_director)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

-- 8. Tabla Ejemplar
CREATE TABLE ejemplar (
    id_ejemplar INT AUTO_INCREMENT PRIMARY KEY,
    estado VARCHAR(50),
    stock INT DEFAULT 0,
    id_pelicula INT NOT NULL,
    CONSTRAINT fk_ejemplar_pelicula
        FOREIGN KEY (id_pelicula) REFERENCES pelicula(id_pelicula)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

-- 9. Tabla dirige (N:M Director - Pelicula)
CREATE TABLE dirige (
    id_director INT NOT NULL,
    id_pelicula INT NOT NULL,
    PRIMARY KEY (id_director, id_pelicula),
    CONSTRAINT fk_dirige_director
        FOREIGN KEY (id_director) REFERENCES director(id_director)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_dirige_pelicula
        FOREIGN KEY (id_pelicula) REFERENCES pelicula(id_pelicula)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- 10. Tabla alquila (N:M Cliente - Ejemplar con atributos)
CREATE TABLE alquila (
    id_cliente INT NOT NULL,
    id_ejemplar INT NOT NULL,
    fecha_recogida DATE NOT NULL,
    fecha_entrega DATE,
    id_trabajador INT NOT NULL,
    PRIMARY KEY (id_cliente, id_ejemplar, fecha_recogida),
    CONSTRAINT fk_alquila_cliente
        FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_alquila_ejemplar
        FOREIGN KEY (id_ejemplar) REFERENCES ejemplar(id_ejemplar)
        ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT fk_alquila_trabajador
        FOREIGN KEY (id_trabajador) REFERENCES trabajador(id_trabajador)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 11. Tabla pertenece (N:M Pelicula - Categoría)
CREATE TABLE pertenece (
    id_pelicula INT NOT NULL,
    id_categoria INT NOT NULL,
    PRIMARY KEY (id_pelicula, id_categoria),
    CONSTRAINT fk_pertenece_pelicula
        FOREIGN KEY (id_pelicula) REFERENCES pelicula(id_pelicula)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_pertenece_categoria
        FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
        ON DELETE CASCADE ON UPDATE CASCADE
);

-- ######################################################################
-- INSERCIÓN DE DATOS
-- ######################################################################

-- Directores
INSERT INTO director (nombre, nacionalidad, fecha_nacimiento) VALUES
('Christopher Nolan', 'Británico',      '1970-07-30'),
('Steven Spielberg', 'Estadounidense',  '1946-12-18'),
('Quentin Tarantino','Estadounidense',  '1963-03-27'),
('Pedro Almodóvar',  'Español',         '1949-09-25'),
('Martin Scorsese',  'Estadounidense',  '1942-11-17'),
('Ridley Scott',     'Británico',       '1937-11-30'),
('Alejandro Amenábar','Español',        '1972-03-31'),
('Denis Villeneuve', 'Canadiense',      '1967-10-03'),
('Greta Gerwig',     'Estadounidense',  '1983-08-04'),
('Bong Joon-ho',     'Surcoreano',      '1969-09-14');

-- Clientes
INSERT INTO cliente (nombre, email, ciudad, calle, numero) VALUES
('María García López',      'maria.garcia@email.com',    'Madrid',     'Calle Gran Vía',            '45'),
('Juan Pérez Martínez',     'juan.perez@email.com',      'Barcelona',  'Avenida Diagonal',          '123'),
('Ana Rodríguez Sánchez',   'ana.rodriguez@email.com',   'Valencia',   'Plaza del Ayuntamiento',    '8'),
('Carlos Fernández Torres', 'carlos.fernandez@email.com','Sevilla',    'Calle Sierpes',             '23'),
('Laura Martínez Ruiz',     'laura.martinez@email.com',  'Bilbao',     'Gran Vía',                  '67'),
('Miguel López González',   'miguel.lopez@email.com',    'Málaga',     'Calle Larios',              '12'),
('Sofía Hernández Díaz',    'sofia.hernandez@email.com', 'Zaragoza',   'Paseo Independencia',       '34'),
('David Moreno Jiménez',    'david.moreno@email.com',    'Murcia',     'Plaza de las Flores',       '5'),
('Elena Castro Ruiz',       'elena.castro@email.com',    'Palma',      'Paseo del Borne',           '18'),
('Pablo Sánchez García',    'pablo.sanchez@email.com',   'Las Palmas', 'Calle Triana',              '56');

-- Categorías
INSERT INTO categoria (nombre, descripcion) VALUES
('Acción',        'Películas con escenas de acción, persecuciones y combates'),
('Comedia',       'Películas cómicas y de humor'),
('Drama',         'Películas dramáticas con contenido emocional'),
('Ciencia Ficción','Películas de ciencia ficción y futuristas'),
('Terror',        'Películas de terror y suspense'),
('Romance',       'Películas románticas y de amor'),
('Aventura',      'Películas de aventuras y exploración'),
('Thriller',      'Películas de suspense y thriller psicológico'),
('Animación',     'Películas de animación para todas las edades'),
('Documental',    'Documentales y películas basadas en hechos reales');

-- Proveedores
INSERT INTO proveedor (nombre, direccion, telefono) VALUES
('Distribuidora Cinematográfica S.A.', 'Calle Industria 15, Madrid',      '912345678'),
('Films Internacionales',              'Avenida del Cine 200, Barcelona',  '934567890'),
('Video Distribuciones',               'Plaza del Cine 5, Valencia',       '961234567'),
('Cinema Supply Co.',                  'Calle Película 88, Sevilla',       '954321098'),
('Movie Distributors Ltd.',            'Paseo del Cine 12, Bilbao',        '944567123'),
('Film Express',                       'Avenida Cinema 45, Málaga',        '952345678'),
('Global Films',                       'Calle Distribución 30, Zaragoza',  '976543210'),
('Cinema World',                       'Plaza Films 7, Murcia',            '968765432'),
('Movie Masters',                      'Paseo Distribución 22, Palma',     '971234567'),
('Film Network',                       'Avenida Supply 100, Las Palmas',   '928765432');

-- Trabajadores
INSERT INTO trabajador (nombre, fecha_contratacion, salario) VALUES
('Roberto Martínez',   '2020-01-15', 2500.00),
('Carmen López',       '2019-03-20', 2800.00),
('Javier Sánchez',     '2021-06-10', 2300.00),
('Isabel García',      '2018-09-05', 3000.00),
('Manuel Ruiz',        '2022-02-14', 2200.00),
('Patricia Fernández', '2020-11-30', 2600.00),
('Antonio Moreno',     '2019-07-18', 2700.00),
('Lucía Torres',       '2021-04-22', 2400.00),
('Francisco Jiménez',  '2020-08-12', 2500.00),
('Marta Díaz',         '2022-01-08', 2350.00);

-- Teléfonos de clientes
-- NOTA: la columna se llama 'numero' (coherente con la tabla definida arriba)
INSERT INTO telefono_cliente (id_cliente, numero) VALUES
(1,  '612345678'),
(1,  '912345678'),
(2,  '623456789'),
(3,  '634567890'),
(4,  '645678901'),
(5,  '656789012'),
(6,  '667890123'),
(7,  '678901234'),
(8,  '689012345'),
(9,  '690123456'),
(10, '601234567');

-- Películas
INSERT INTO pelicula (titulo, año_lanzamiento, genero, clasificacion, id_proveedor, director) VALUES
('Inception',    2010, 'Ciencia Ficción', 'PG-13', 1,  1),
('El Padrino',   1972, 'Drama',           'R',     2,  2),
('Pulp Fiction', 1994, 'Crimen',          'R',     3,  3),
('Volver',       2006, 'Drama',           'R',     4,  4),
('Taxi Driver',  1976, 'Drama',           'R',     5,  5),
('Blade Runner', 1982, 'Ciencia Ficción', 'R',     6,  6),
('Los Otros',    2001, 'Terror',          'PG-13', 7,  7),
('Arrival',      2016, 'Ciencia Ficción', 'PG-13', 8,  8),
('Lady Bird',    2017, 'Drama',           'R',     9,  9),
('Parásitos',    2019, 'Thriller',        'R',     10, 10);

-- Ejemplares
INSERT INTO ejemplar (estado, stock, id_pelicula) VALUES
('Disponible', 5, 1),
('Alquilado',  0, 1),
('Disponible', 3, 2),
('Disponible', 4, 2),
('Alquilado',  0, 3),
('Disponible', 6, 3),
('Disponible', 2, 4),
('Alquilado',  0, 4),
('Disponible', 5, 5),
('Disponible', 3, 5),
('Disponible', 4, 6),
('Alquilado',  0, 6),
('Disponible', 7, 7),
('Disponible', 3, 7),
('Alquilado',  0, 8),
('Disponible', 5, 8),
('Disponible', 4, 9),
('Alquilado',  0, 9),
('Disponible', 6, 10),
('Disponible', 2, 10);

-- Relación dirige (Director - Película)
INSERT INTO dirige (id_director, id_pelicula) VALUES
(1, 1), (2, 2), (3, 3), (4, 4),  (5, 5),
(6, 6), (7, 7), (8, 8), (9, 9), (10, 10);

-- Relación alquila (Cliente - Ejemplar - Trabajador)
INSERT INTO alquila (id_cliente, id_ejemplar, fecha_recogida, fecha_entrega, id_trabajador) VALUES
(1,  2,  '2024-01-15', '2024-01-18', 1),
(2,  5,  '2024-01-20', '2024-01-23', 2),
(3,  8,  '2024-02-01', '2024-02-04', 3),
(4,  12, '2024-02-10', '2024-02-13', 4),
(5,  15, '2024-02-15', '2024-02-18', 5),
(6,  18, '2024-02-20', NULL,         6),
(7,  1,  '2024-03-01', '2024-03-04', 7),
(8,  3,  '2024-03-05', '2024-03-08', 8),
(9,  6,  '2024-03-10', '2024-03-13', 9),
(10, 9,  '2024-03-15', NULL,         10);

-- Relación pertenece (Película - Categoría)
INSERT INTO pertenece (id_pelicula, id_categoria) VALUES
(1, 4), (1, 8),
(2, 3), (2, 8),
(3, 3), (3, 8),
(4, 3), (4, 6),
(5, 3), (5, 8),
(6, 4), (6, 8),
(7, 5), (7, 8),
(8, 4), (8, 3),
(9, 3), (9, 2),
(10, 8),(10, 3);

--Definición de 2 disparadores/triggers sobre operaciones asociadas al modelo de datos.

DELIMITER //
CREATE OR REPLACE TRIGGER actualizarStockDevolucion
AFTER UPDATE ON alquila
FOR EACH ROW
BEGIN
    IF NEW.fecha_entrega IS NOT NULL AND OLD.fecha_entrega IS NULL THEN
        UPDATE ejemplar
        SET stock = stock + 1
        WHERE id_ejemplar = NEW.id_ejemplar;

        UPDATE ejemplar
        SET estado = 'Disponible'
        WHERE id_ejemplar = NEW.id_ejemplar;
    END IF;
END;
DELIMITER ;

UPDATE alquila SET fecha_entrega = '2024-03-20' WHERE id_cliente = 6;

DELIMITER //
CREATE OR REPLACE TRIGGER insertarCategoriasNuevaPelicula AFTER INSERT ON pelicula FOR EACH ROW
BEGIN
    CASE
        WHEN NEW.genero = 'Ciencia Ficción' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Ciencia Ficción'));
        WHEN NEW.genero = 'Drama' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Drama'));
        WHEN NEW.genero = 'Terror' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Terror'));
    END CASE;
END;
DELIMITER ;

INSERT INTO pelicula (titulo, año_lanzamiento, genero, clasificacion, id_proveedor, director) VALUES ('Interstellar', 2014, 'Ciencia Ficción', 'PG-13', 1, 1);

--Definición de 2 procedimientos almacenados que realicen más de una operación dentro de una transacción, haciendo una gestión adecuada de los errores (mediante mensajes).

select * from alquila where id_cliente = 1; -- para verificar que el cliente 1 no tiene alquilada la película del ejemplar 1 antes de ejecutar el procedimiento
--PROCEDURE PARA ALQUILAR UNA PELÍCULA, CON GESTIÓN DE ERRORES

DELIMITER //

CREATE OR REPLACE PROCEDURE alquilarPelicula(IN idCl INT, IN idEj INT, IN fecRec DATE, IN idTr INT)
BEGIN
    START TRANSACTION;
    DECLARE nuevoStock INT;
    SELECT stock INTO nuevoStock FROM ejemplar WHERE id_ejemplar = p_id_ejemplar;
    IF nuevoStock > 0 THEN
        INSERT INTO alquila (id_cliente, id_ejemplar, fecha_recogida, id_trabajador) VALUES (idCl, idEj, fecRec, idTr);
        UPDATE ejemplar SET stock = stock - 1, estado = 'Alquilado' WHERE id_ejemplar = idEj;
        COMMIT;
        SELECT 'Película alquilada con éxito.' AS mensaje_exito;
    ELSE
        ROLLBACK;
        SELECT 'No hay stock disponible para esta película. Transacción revertida.' AS mensaje_error
    END IF;
END //
DELIMITER ;
select * from alquila where id_cliente = 1; -- para verificar que el cliente 1 no tiene alquilada la película del ejemplar 1 antes de ejecutar el procedimiento
CALL alquilarPelicula(1, 1, '2024-03-25', 1);

DELIMITER //
--PROCEDURE PARA ELIMINAR TODAS LAS PELÍCULAS DE UN PROVEEDOR, CON GESTIÓN DE ERRORES
select * from pelicula where id_proveedor = 1; -- para verificar que hay películas del proveedor 1 antes de ejecutar el procedimiento
CREATE OR REPLACE PROCEDURE proveedorEliminarPeliculas(IN p_id_proveedor INT)
BEGIN
    START TRANSACTION;
    DECLARE numPeliculas INT;
    SELECT COUNT(*) INTO numPeliculas FROM pelicula WHERE id_proveedor = p_id_proveedor;
    IF numPeliculas > 0 THEN
        DELETE FROM pelicula WHERE id_proveedor = p_id_proveedor;
        COMMIT;
        SELECT CONCAT('Se han eliminado ', numPeliculas, ' películas del proveedor con ID ', p_id_proveedor) AS mensaje_exito;
    ELSE
        ROLLBACK;
        SELECT CONCAT('No se encontraron películas para el proveedor con ID ', p_id_proveedor, '. Transacción revertida.') AS mensaje_error;
    END IF;
END //
DELIMITER ;
CALL proveedorEliminarPeliculas(1);
select * from pelicula where id_proveedor = 1; -- para verificar que se han eliminado las películas del proveedor 1


-- 1.Definición de 2 disparadores/triggers sobre operaciones asociadas al modelo de datos.

SELECT * FROM director; -- para verificar los directores antes de ejecutar el trigger
SELECT * FROM trabajador; -- para verificar los trabajadores antes de ejecutar el trigger

DELIMITER //
CREATE OR REPLACE TRIGGER directormayorSalario AFTER UPDATE ON trabajador FOR EACH ROW
BEGIN
    IF NEW.salario > 3000 THEN
        alter TABLE director ADD COLUMN IF NOT EXISTS rango VARCHAR(50); -- agregamos una columna para almacenar el rango salarial del director
        UPDATE director SET rango = 'Director de alto salario' WHERE id_director = NEW.id_trabajador;
    END IF;
    IF NEW.salario <= 3000 THEN
        UPDATE director SET rango = 'Director de bajo salario' WHERE id_director = NEW.id_trabajador;
    END IF;
    IF NEW.salario IS NULL THEN
        UPDATE director SET rango = 'Director sin salario definido' WHERE id_director = NEW.id_trabajador;
    END IF;
END //
DELIMITER ;

UPDATE trabajador SET salario = 3200 WHERE id_trabajador = 1; -- para verificar que el trigger actualiza el rango del director con ID 1
SELECT * FROM director WHERE id_director = 1; -- para verificar el cambio en el rango del director con ID 1
SELECT * FROM trabajador WHERE id_trabajador = 1; -- para verificar el salario del trabajador con ID 1 después de la actualización


SELECT * FROM pelicula; -- para verificar las películas antes de ejecutar el trigger
SELECT * FROM pertenece; -- para verificar las categorías antes de ejecutar el trigger
DELIMITER //
CREATE OR REPLACE TRIGGER insertarCategoriasNuevaPelicula AFTER INSERT ON pelicula FOR EACH ROW
BEGIN
    CASE
        WHEN NEW.genero = 'Ciencia Ficción' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Ciencia Ficción'));
        WHEN NEW.genero = 'Drama' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Drama'));
        WHEN NEW.genero = 'Terror' THEN
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Terror'));
    END CASE;
END //
DELIMITER ;

INSERT INTO pelicula (titulo, año_lanzamiento, genero, clasificacion, id_proveedor, director) VALUES ('Interstellar', 2014, 'Ciencia Ficción', 'PG-13', 1, 1); -- para verificar que el trigger inserta la categoría correspondiente a la nueva película
SELECT * FROM pertenece WHERE id_pelicula = (SELECT id_pelicula FROM pelicula WHERE titulo = 'Interstellar'); -- para verificar que se ha insertado la categoría correcta para la película 'Interstellar'
SELECT * FROM pelicula WHERE titulo = 'Interstellar'; -- para verificar la nueva película insertada