
<?php

// Incluimos el archivo que contiene las funciones
require_once("librería.php");

// Creamos un array con los precios iniciales
$preciosIniciales = array(100, 250, 50, 80, 120);

// Aplicamos el descuento del 10% a todos los precios
aplicarDescuento($preciosIniciales);

// Recorremos el array para mostrar los precios con descuento
foreach($preciosIniciales as $precio){
    echo "Precio con descuento: $precio<br><br>";
}

// Calculamos el IVA general (21%) sobre 100 euros
echo "La factura con IVA general es: " . procesarFactura("calcularIvaGeneral", 100) . "<br><br>";

// Calculamos el IVA reducido (10%) sobre 100 euros
echo "La factura con IVA reducido es: " . procesarFactura("calcularIvaReducido", 100) . "<br><br>";

?>
