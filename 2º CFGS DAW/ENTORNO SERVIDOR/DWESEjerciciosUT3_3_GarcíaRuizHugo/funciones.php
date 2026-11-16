
<?php

// EJERCICIO 1A
// Sumar cinco numeros enteros
function sumar_cinco($n1, $n2, $n3, $n4, $n5) {

    $suma = $n1 + $n2 + $n3 + $n4 + $n5;

    echo "La suma es: $suma";
}


// EJERCICIO 1B
// Dividir dos de los cinco numeros recibidos
function dividir_numeros($n1, $n2, $n3, $n4, $n5) {

    if ($n2 == 0) {
        throw new Exception("No se puede dividir entre cero");
    }

    return $n1 / $n2;
}


// EJERCICIO 1C
// Calcular el volumen de un cilindro
function volumen_cilindro($radio, $altura) {

    $pi = 3.1416;

    $volumen = $pi * $radio * $radio * $altura;

    return $volumen;
}


// EJERCICIO 2
// Crear un array con numeros aleatorios
function inicializar_array($numero_de_elementos, $min, $max) {

    $array = [];

    for ($i = 0; $i < $numero_de_elementos; $i++) {
        $array[] = rand($min, $max);
    }

    return $array;
}


// EJERCICIO 3
// Calcular la media del array
function calcular_media($array) {

    $suma = 0;

    foreach ($array as $numero) {
        $suma = $suma + $numero;
    }

    return $suma / count($array);
}


// EJERCICIO 4
// Calcular el maximo del array
function calcular_maximo($array) {

    $maximo = $array[0];

    foreach ($array as $numero) {
        if ($numero > $maximo) {
            $maximo = $numero;
        }
    }

    return $maximo;
}


// EJERCICIO 5
// Calcular el minimo del array
function calcular_minimo($array) {

    $minimo = $array[0];

    foreach ($array as $numero) {
        if ($numero < $minimo) {
            $minimo = $numero;
        }
    }

    return $minimo;
}


// EJERCICIO 6
// Imprimir el array en una tabla
function imprimir_array($array) {

    echo "<table style='border-collapse: collapse; width: 350px; 
    text-align: center; font-family: Arial;'>";

    echo "<tr style='background-color: #243B53; color: white;'>";
    echo "<th style='padding: 10px;'>Posicion</th>";
    echo "<th style='padding: 10px;'>Valor</th>";
    echo "</tr>";

    foreach ($array as $posicion => $valor) {

        echo "<tr>";
        echo "<td style='border: 1px solid #ccc; padding: 10px;'>$posicion</td>";
        echo "<td style='border: 1px solid #ccc; padding: 10px;'>$valor</td>";
        echo "</tr>";

    }

    echo "</table>";
}

?>
