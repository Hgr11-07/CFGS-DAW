
<?php

// APARTADO A: SUMAR

function sumar($num1, $num2) {

    if (is_numeric($num1) && is_numeric($num2)) {
        return $num1 + $num2;
    } else {
        throw new Exception("Los valores a sumar tienen que ser numéricos");
    }
}


// APARTADO B: DIVIDIR

function dividir($dividendo, $divisor) {

    if (!is_numeric($dividendo) || !is_numeric($divisor)) {
        throw new Exception("Los valores tienen que ser numéricos");
    }

    if ($divisor == 0) {
        throw new Exception("El divisor no puede ser 0");
    }

    return $dividendo / $divisor;
}


// APARTADO B: CALCULAR ÁREA DEL TRIÁNGULO

function calcularAreaTriangulo($base, $altura) {

    if (!is_numeric($base) || !is_numeric($altura)) {
        throw new Exception("La base y la altura tienen que ser numéricas");
    }

    if ($base <= 0 || $altura <= 0) {
        throw new Exception("La base y la altura tienen que ser positivas");
    }

    return ($base * $altura) / 2;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio de excepciones</title>
</head>
<body>

    <h1>Ejercicio de excepciones en PHP</h1>

    <h2>Resultado de la suma</h2>

    <?php
    try {
        echo "La suma es: " . sumar(15, 5);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>


    <h2>Resultado de la división</h2>

    <?php
    try {
        echo "La división es: " . dividir(20, 4);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>


    <h2>Área del triángulo</h2>

    <?php
    try {
        echo "El área es: " . calcularAreaTriangulo(10, 5);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

</body>
</html>
