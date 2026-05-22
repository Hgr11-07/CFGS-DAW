--1.Definición de 2 procedimientos almacenados que realicen más de una operación dentro de una transacción, haciendo una gestión adecuada de los errores (mediante mensajes).


SELECT * FROM alquila WHERE id_cliente = 1; -- para verificar que el cliente 1 no tiene alquilada la película del ejemplar 1 antes de ejecutar el procedimiento
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
SELECT * FROM alquila WHERE id_cliente = 1; -- para verificar que el cliente 1 no tiene alquilada la película del ejemplar 1 antes de ejecutar el procedimiento
CALL alquilarPelicula(1, 1, '2024-03-25', 1);