
<?php

// Función que comprueba si una edad es válida para registrarse
function validarEdadRegistro($edad){

    // Comprobamos que la edad no esté vacía y sea un número
    if(empty($edad) || !is_numeric($edad)){
        throw new Exception("Error: el dato introducido no es un valor numérico válido.");
    }

    // Comprobamos que la persona tenga al menos 18 años
    elseif($edad < 18){
        throw new Exception("Error: debes ser mayor de edad para completar el registro.");
    }

    // Si cumple las condiciones, devolvemos true
    else {
        return true;
    }
}

// Array con diferentes edades para probar la función
$casos_prueba = [25, 15, "abc", "", 40];

// Recorremos todas las edades del array
foreach($casos_prueba as $edad){

    try {
        // Intentamos validar la edad
        validarEdadRegistro($edad);

        // Si no hay errores, mostramos que el registro está permitido
        echo "Edad " . $edad . " válida: registro permitido.<br>";

    } catch(Exception $e){

        // Si ocurre un error, mostramos su mensaje
        echo $e->getMessage() . "<br>";

    } finally {

        // Este mensaje se muestra siempre, haya error o no
        echo "Comprobación finalizada.<br><br>";
    }
}

?>
