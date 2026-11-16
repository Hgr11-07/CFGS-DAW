
<?php

// Creamos el array del almacén 1 con los códigos y sus unidades
$almacen1 = array(
    "P01" => 12,
    "P03" => 6,
    "P05" => 3,
    "P06" => 0,
);

// Creamos el array del almacén 2
$almacen2 = array(
    "P01" => 5,
    "P02" => 33,
    "P04" => 1,
);

// Comparamos si los dos arrays tienen las mismas claves y valores
if($almacen1 == $almacen2)
    echo "Los almacenes son iguales<br><br>";
else
    echo "Los almacenes son diferentes<br><br>";

// Comparamos si tienen las mismas claves, valores y el mismo orden
if($almacen1 === $almacen2)
    echo "Los almacenes son iguales y del mismo tipo<br><br>";
else
    echo "Los almacenes son diferentes o de distinto tipo<br><br>";

// Sumamos los arrays para obtener el stock total
// Si una clave está en los dos, conserva el valor del primer array
$stockTotal = $almacen1 + $almacen2;

// Mostramos el contenido del array
print_r($stockTotal);
echo "<br><br>";

// Recorremos el array del stock total
foreach($stockTotal as $codigo => $unidades){

    // Mostramos el código del producto y sus unidades
    echo "Código: $codigo, Unidades: $unidades<br>";

    // Si no hay unidades, pasamos al siguiente producto
    if($unidades === 0){
        echo "<br>";
        continue;
    }

    // Comprobamos el estado del stock
    if($unidades < 5){
        echo "Stock crítico (reponer urgente)<br><br>";
    }
    elseif($unidades <= 15){
        echo "Stock normal<br><br>";
    }
    else{
        echo "Exceso de stock.<br><br>";
    }
}

?>
