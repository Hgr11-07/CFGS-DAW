
<?php

// Incluir el archivo de funciones
require_once __DIR__ . "/funciones.php";


// COMPROBAR LAS FUNCIONES DEL EJERCICIO 1

echo "<h2>Ejercicio 1</h2>";

// Apartado A
sumar_cinco(2, 4, 6, 8, 10);

echo "<br><br>";

// Apartado B
$n1 = rand(0, 9);
$n2 = rand(0, 9);
$n3 = rand(0, 9);
$n4 = rand(0, 9);
$n5 = rand(0, 9);

echo "Numeros generados: $n1, $n2, $n3, $n4, $n5<br>";

try {

    $tmp = dividir_numeros($n1, $n2, $n3, $n4, $n5);

    echo "Resultado de la division: $tmp";

} catch (Exception $e) {

    echo $e->getMessage();

}

echo "<br><br>";

// Apartado C
$volumen = volumen_cilindro(3, 5);

echo "Volumen del cilindro: $volumen";


// EJERCICIO PRINCIPAL DE LOS ARRAYS

echo "<h2>Ejercicio de arrays</h2>";


// 1. Crear un array de 10 numeros entre 1 y 30
$array = inicializar_array(10, 1, 30);


// 2. Mostrar todos los valores
echo "<h3>Contenido del array</h3>";

imprimir_array($array);


// 3 y 4. Calcular y mostrar la media
$media = calcular_media($array);

echo "<h3>Valor medio</h3>";
echo "La media es: $media";


// 5. Mostrar los tres valores maximos
$ordenados = $array;

rsort($ordenados);

$tres_maximos = array_slice($ordenados, 0, 3);

echo "<h3>Los tres valores maximos</h3>";

imprimir_array($tres_maximos);


// 6. Mostrar los tres valores minimos
sort($ordenados);

$tres_minimos = array_slice($ordenados, 0, 3);

echo "<h3>Los tres valores minimos</h3>";

imprimir_array($tres_minimos);


// Comprobar tambien las funciones de maximo y minimo
echo "<h3>Comprobacion de maximo y minimo</h3>";

echo "Maximo: " . calcular_maximo($array);
echo "<br>";

echo "Minimo: " . calcular_minimo($array);

?>
