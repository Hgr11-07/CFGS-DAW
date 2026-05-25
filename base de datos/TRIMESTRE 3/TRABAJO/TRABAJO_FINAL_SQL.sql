-- 1.Definición de 2 disparadores/triggers sobre operaciones asociadas al modelo de datos.

-- TRIGGER PARA MARCAR UN EJEMPLAR COMO DETERIORADO SI SE ENTREGA TARDÍO

SELECT * FROM ejemplar; -- para verificar el estado de los ejemplares antes del trigger

DELIMITER //
CREATE OR REPLACE TRIGGER marcarEjemplarDeteriorado AFTER UPDATE ON alquila
FOR EACH ROW
BEGIN
    IF NEW.fecha_entrega IS NOT NULL AND OLD.fecha_entrega IS NULL THEN
        IF (NEW.fecha_entrega - OLD.fecha_recogida) > 7 THEN
            UPDATE ejemplar SET estado = 'Deteriorado' WHERE id_ejemplar = NEW.id_ejemplar;
        END IF;
    END IF;
END //
DELIMITER ;

UPDATE alquila SET fecha_entrega = '2024-01-30' WHERE id_cliente = 2;
SELECT * FROM ejemplar WHERE id_ejemplar = 5;
SELECT * FROM alquila WHERE id_cliente = 2;

-- TRIGGER PARA ASIGNAR CATEGORÍA A UNA PELÍCULA NUEVA, SI NO SE ESPECIFICA UNA CATEGORÍA VÁLIDA EN EL MOMENTO DE LA INSERCIÓN SE PONDRÁ LA CATEGORÍA 'Documental' POR DEFECTO

SELECT * FROM pelicula;
SELECT * FROM pertenece;

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
        ELSE
            INSERT INTO pertenece (id_pelicula, id_categoria) VALUES (NEW.id_pelicula, (SELECT id_categoria FROM categoria WHERE nombre = 'Documental')); -- si el género no coincide, se asigna la categoría 'Documental' por defecto
    END CASE;
END //
DELIMITER ;

INSERT INTO pelicula (titulo, año_lanzamiento, genero, clasificacion, id_proveedor, director) VALUES ('Interstellar', 2014, 'Ciencia Ficción', 'PG-13', 1, 1);
SELECT * FROM pertenece WHERE id_pelicula IN (SELECT id_pelicula FROM pelicula WHERE titulo = 'Interstellar');
SELECT * FROM pelicula WHERE titulo = 'Interstellar';


-- 2.Definición de 2 procedimientos almacenados que realicen más de una operación dentro de una transacción, haciendo una gestión adecuada de los errores (mediante mensajes).

-- PROCEDURE PARA ALQUILAR UNA PELÍCULA, CON GESTIÓN DE ERRORES

SELECT * FROM alquila WHERE id_cliente = 1;

DELIMITER //
CREATE OR REPLACE PROCEDURE alquilarPelicula(IN idCl INT, IN idEj INT, IN fecRec DATE, IN idTr INT)
BEGIN
    DECLARE nuevoStock INT;
    START TRANSACTION;
    SELECT stock INTO nuevoStock FROM ejemplar WHERE id_ejemplar = idEj;
    IF nuevoStock > 0 THEN
        INSERT INTO alquila (id_cliente, id_ejemplar, fecha_recogida, id_trabajador) VALUES (idCl, idEj, fecRec, idTr);
        UPDATE ejemplar SET stock = stock - 1, estado = 'Alquilado' WHERE id_ejemplar = idEj;
        COMMIT;
        SELECT 'Película alquilada con éxito.' AS mensaje_exito;
    ELSE
        ROLLBACK;
        SELECT 'No hay stock disponible para esta película. Transacción revertida.' AS mensaje_error;
    END IF;
END //
DELIMITER ;

CALL alquilarPelicula(1, 1, '2024-04-01', 1);
SELECT * FROM alquila WHERE id_cliente = 1;



-- PROCEDURE PARA ELIMINAR TODAS LAS PELÍCULAS DE UN PROVEEDOR, CON GESTIÓN DE ERRORES

SELECT * FROM pelicula WHERE id_proveedor = 1;

DELIMITER //
CREATE OR REPLACE PROCEDURE proveedorEliminarPeliculas(IN idProveedor INT)
BEGIN
    DECLARE numPeliculas INT;
    START TRANSACTION;
    SELECT COUNT(*) INTO numPeliculas FROM pelicula WHERE id_proveedor = idProveedor;
    IF numPeliculas > 0 THEN
        DELETE FROM alquila WHERE id_ejemplar IN (SELECT id_ejemplar FROM ejemplar WHERE id_pelicula IN (SELECT id_pelicula FROM pelicula WHERE id_proveedor = idProveedor)); -- borramos alquileres primero
        DELETE FROM ejemplar WHERE id_pelicula IN (SELECT id_pelicula FROM pelicula WHERE id_proveedor = idProveedor); -- borramos ejemplares después
        DELETE FROM pelicula WHERE id_proveedor = idProveedor; -- borramos películas al final
        COMMIT;
        SELECT CONCAT('Se han eliminado ', numPeliculas, ' películas del proveedor con ID ', idProveedor) AS mensaje_exito;
    ELSE
        ROLLBACK;
        SELECT CONCAT('No se encontraron películas para el proveedor con ID ', idProveedor, '. Transacción revertida.') AS mensaje_error;
    END IF;
END //
DELIMITER ;

CALL proveedorEliminarPeliculas(1);
SELECT * FROM pelicula WHERE id_proveedor = 1;

-- 3.Definición de 2 procedimientos almacenados que utilicen cursores que recorran cierta cantidad de datos, realizando operaciones sobre una o más tablas, haciendo una gestión adecuada de los errores (mediante mensajes).

SELECT * FROM ejemplar; -- para verificar el estado de los ejemplares antes del procedimiento

DELIMITER //
CREATE OR REPLACE PROCEDURE actualizarStockPeliculas()
BEGIN
    DECLARE fin INT DEFAULT 0;
    DECLARE idEjemplar INT;
    DECLARE stockActual INT;
    DECLARE cur CURSOR FOR SELECT id_ejemplar, stock FROM ejemplar;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;
    OPEN cur;
    bucle: LOOP
        FETCH cur INTO idEjemplar, stockActual;
        IF fin = 1 THEN
            LEAVE bucle;
        END IF;
        IF stockActual < 6 THEN
            UPDATE ejemplar SET stock = stock + 10 WHERE id_ejemplar = idEjemplar;
        END IF;
    END LOOP;
    CLOSE cur;
    SELECT 'Stock de películas actualizado correctamente.' AS mensaje_exito;
END //
DELIMITER ;

CALL actualizarStockPeliculas();
SELECT * FROM ejemplar; -- para verificar el estado de los ejemplares después del procedimiento


-- PROCEDURE PARA ELIMINAR CLIENTES INACTIVOS, CON GESTIÓN DE ERRORES
SELECT * FROM cliente; -- para verificar los clientes antes del procedimiento
SELECT * FROM alquila; -- para verificar los alquileres antes del procedimiento

DELIMITER //
CREATE OR REPLACE PROCEDURE eliminarClientesInactivos(IN fechaLimite DATE)
BEGIN
    DECLARE fin INT DEFAULT 0;
    DECLARE idCliente INT;
    DECLARE numEliminados INT DEFAULT 0;
    DECLARE cur CURSOR FOR SELECT id_cliente FROM cliente;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;
    OPEN cur;
    bucle: LOOP
        FETCH cur INTO idCliente;
        IF fin = 1 THEN
            LEAVE bucle;
        END IF;
        IF (fechaLimite - (SELECT MAX(fecha_recogida) FROM alquila WHERE id_cliente = idCliente)) > 365 THEN -- si el cliente no ha alquilado nada en el último año
            DELETE FROM alquila WHERE id_cliente = idCliente;
            DELETE FROM cliente WHERE id_cliente = idCliente;
            SET numEliminados = numEliminados + 1;
        END IF;
    END LOOP;
    CLOSE cur;
    IF numEliminados > 0 THEN
        SELECT CONCAT('Se han eliminado ', numEliminados, ' clientes inactivos.') AS mensaje_exito;
    ELSE
        SELECT 'No se encontraron clientes inactivos.' AS mensaje_info;
    END IF;
END //
DELIMITER ;

CALL eliminarClientesInactivos('2025-01-01');
SELECT * FROM cliente; -- para verificar los clientes después del procedimiento
SELECT * FROM alquila; -- para verificar los alquileres después del procedimiento



-- 4. Creación de 2 funciones que consulten datos de varias tablas y con información relevante para la explotación de información.

-- FUNCION PARA OBTENER EL HISTORIAL DE ALQUILERES DE UN CLIENTE, MOSTRANDO EL TÍTULO DE LA PELÍCULA, FECHA DE RECOGIDA Y FECHA DE ENTREGA (SI SE HA ENTREGADO)

DELIMITER //
CREATE OR REPLACE FUNCTION historialAlquileresCliente(idCl INT) RETURNS TEXT
BEGIN
    DECLARE fin INT DEFAULT 0;
    DECLARE titulo VARCHAR(200);
    DECLARE fechaRec DATE;
    DECLARE fechaEnt DATE;
    DECLARE historial TEXT DEFAULT ''; -- acumula todas las líneas del historial
    DECLARE linea VARCHAR(255);
    DECLARE cur CURSOR FOR SELECT p.titulo, a.fecha_recogida, a.fecha_entrega FROM alquila a INNER JOIN ejemplar e ON a.id_ejemplar = e.id_ejemplar INNER JOIN pelicula p ON e.id_pelicula = p.id_pelicula WHERE a.id_cliente = idCl ORDER BY a.fecha_recogida DESC;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fin = 1;
    OPEN cur;
    bucle: LOOP
        FETCH cur INTO titulo, fechaRec, fechaEnt;
        IF fin = 1 THEN
            LEAVE bucle;
        END IF;
        SET titulo = SUBSTRING(titulo, 1, 20); -- recortamos el título a 20 caracteres para que quede uniforme
        IF fechaEnt IS NOT NULL THEN
            SET linea = CONCAT('- ', titulo, ' | recogida: ', fechaRec, ' | entregada: ', fechaEnt);
        ELSE
            SET linea = CONCAT('- ', titulo, ' | recogida: ', fechaRec, ' | en curso');
        END IF;
        SET historial = CONCAT(historial, linea, '\n'); -- añadimos la línea al historial con un salto de línea
    END LOOP;
    CLOSE cur;
    IF historial = '' THEN
        RETURN 'El cliente no tiene alquileres registrados.';
    END IF;
    RETURN historial;
END //
DELIMITER ;

SELECT historialAlquileresCliente(1);
SELECT historialAlquileresCliente(6); -- cliente con alquiler en curso

-- FUNCION PARA OBTENER EL NOMBRE DEL PROVEEDOR DE UNA PELÍCULA DADA SU TÍTULO

DELIMITER //
CREATE OR REPLACE FUNCTION obtenerProveedorPelicula(tituloBuscado VARCHAR(255)) RETURNS VARCHAR(255)
BEGIN
    DECLARE nombreProv VARCHAR(255);
    IF tituloBuscado IS NULL THEN
        RETURN 'Título de película no proporcionado.';
    END IF;
    SELECT pr.nombre INTO nombreProv FROM pelicula p INNER JOIN proveedor pr ON p.id_proveedor = pr.id_proveedor WHERE p.titulo = tituloBuscado;
    RETURN nombreProv;
END //
DELIMITER ;
SELECT obtenerProveedorPelicula('Lady Bird');
SELECT obtenerProveedorPelicula('Película Inexistente'); -- título que no existe
SELECT obtenerProveedorPelicula(NULL); -- título nulo



-- Creación de un script que haga uso  de un conjunto de procedimientos/funciones que colaboren entre sí para generar un informe estadístico de la BD de vuestro sistema de información. Apóyate en una tabla dashboard donde se refleje la información recopilada y que posteriormente sea consultada.

-- Tabla dashboard para almacenar el informe
CREATE TABLE IF NOT EXISTS dashboard (
    id_dashboard INT AUTO_INCREMENT PRIMARY KEY,
    fecha_informe DATETIME,
    total_clientes INT,
    total_peliculas INT,
    total_alquileres INT,
    pelicula_mas_alquilada VARCHAR(200),
    cliente_mas_activo VARCHAR(100)
);

-- Función 1: obtener el total de alquileres de un cliente
DELIMITER //
CREATE OR REPLACE FUNCTION totalAlquileresCliente(idCl INT) RETURNS INT
BEGIN
    DECLARE total INT;
    SELECT COUNT(*) INTO total FROM alquila WHERE id_cliente = idCl;
    RETURN total;
END //
DELIMITER ;

-- Función 2: obtener la película más alquilada
DELIMITER //
CREATE OR REPLACE FUNCTION peliculaMasAlquilada() RETURNS VARCHAR(200)
BEGIN
    DECLARE titulo VARCHAR(200);
    SELECT p.titulo INTO titulo FROM alquila a INNER JOIN ejemplar e ON a.id_ejemplar = e.id_ejemplar INNER JOIN pelicula p ON e.id_pelicula = p.id_pelicula GROUP BY p.titulo ORDER BY COUNT(*) DESC LIMIT 1;
    RETURN titulo;
END //
DELIMITER ;

-- Procedimiento: genera el informe llamando a las funciones y rellena el dashboard
DELIMITER //
CREATE OR REPLACE PROCEDURE generarInforme()
BEGIN
    DECLARE numClientes INT;
    DECLARE numPeliculas INT;
    DECLARE numAlquileres INT;
    DECLARE pelMasAlquilada VARCHAR(200);
    DECLARE clienteMasActivo VARCHAR(100);
    DECLARE idClienteActivo INT;

    SELECT COUNT(*) INTO numClientes FROM cliente;
    SELECT COUNT(*) INTO numPeliculas FROM pelicula;
    SELECT COUNT(*) INTO numAlquileres FROM alquila;
    SELECT id_cliente INTO idClienteActivo FROM alquila GROUP BY id_cliente ORDER BY COUNT(*) DESC LIMIT 1;
    SELECT nombre INTO clienteMasActivo FROM cliente WHERE id_cliente = idClienteActivo;
    SET pelMasAlquilada = peliculaMasAlquilada();

    INSERT INTO dashboard (fecha_informe, total_clientes, total_peliculas, total_alquileres, pelicula_mas_alquilada, cliente_mas_activo) VALUES (NOW(), numClientes, numPeliculas, numAlquileres, pelMasAlquilada, clienteMasActivo);

    SELECT * FROM dashboard ORDER BY fecha_informe DESC LIMIT 1;
    SELECT CONCAT('El cliente más activo es ', clienteMasActivo, ' con ', totalAlquileresCliente(idClienteActivo), ' alquileres.') AS resumen_cliente;
END //
DELIMITER ;

CALL generarInforme();
SELECT * FROM dashboard; -- para ver el contenido del dashboard después de generar el informe