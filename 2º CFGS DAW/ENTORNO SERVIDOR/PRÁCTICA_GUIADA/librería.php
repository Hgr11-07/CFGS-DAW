
<?php

// Aplica un descuento a todos los precios del array
// El porcentaje por defecto es del 10%
function aplicarDescuento(&$precios, $porcentaje = 10){

    // Recorremos todos los precios del array
    foreach($precios as &$precio){

        // Restamos al precio el porcentaje de descuento
        $precio -= $precio * ($porcentaje / 100);
    }
}

// Calcula el IVA general del 21%
function calcularIvaGeneral($importe){
    return $importe * 0.21;
}

// Calcula el IVA reducido del 10%
function calcularIvaReducido($importe){
    return $importe * 0.10;
}

// Recibe una función de IVA y un importe
// Ejecuta la función recibida y devuelve el resultado
function procesarFactura($funcionIva, $importe){
    return $funcionIva($importe);
}

?>
