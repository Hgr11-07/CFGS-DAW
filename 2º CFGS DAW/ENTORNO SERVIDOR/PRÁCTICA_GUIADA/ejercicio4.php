
<?php

// Variables para guardar los datos y los posibles mensajes
$nombre = "";
$nota1 = "";
$nota2 = "";
$error = "";
$resultado = "";

// Comprobamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recogemos los datos del formulario
    $nombre = filter_input(INPUT_POST, "nombre");
    $nota1 = filter_input(INPUT_POST, "nota1");
    $nota2 = filter_input(INPUT_POST, "nota2");

    // Comprobamos que ningún campo esté vacío
    if (empty($nombre) || $nota1 === "" || $nota2 === "") {
        $error = "No puedes dejar ningún campo vacío.";
    }

    // Comprobamos que las notas sean números
    elseif (!is_numeric($nota1) || !is_numeric($nota2)) {
        $error = "Las notas deben ser números.";
    }

    // Comprobamos que las notas estén entre 0 y 10
    elseif ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10) {
        $error = "Las notas deben estar entre 0 y 10.";
    }

    // Si todo es correcto, calculamos la media
    else {
        $media = ($nota1 + $nota2) / 2;

        // Según la media, asignamos una calificación
        if ($media < 5) {
            $calificacion = "Suspenso";
        }
        elseif ($media < 7) {
            $calificacion = "Aprobado";
        }
        elseif ($media < 9) {
            $calificacion = "Notable";
        }
        else {
            $calificacion = "Sobresaliente";
        }

        // Guardamos el resultado para mostrarlo después
        $resultado = "Alumno: $nombre <br>
                      Nota media: $media <br>
                      Calificación: $calificacion";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cálculo de nota media</title>
</head>
<body>

    <!-- Título de la página -->
    <h2>Cálculo de nota media</h2>

    <?php
    // Si hay un error, lo mostramos en rojo
    if ($error != "") {
        echo "<p style='color:red'>$error</p>";
    }

    // Si hay un resultado, lo mostramos
    if ($resultado != "") {
        echo "<p>$resultado</p>";
    }
    ?>

    <!-- Formulario que envía los datos a esta misma página -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <!-- Campo para introducir el nombre -->
        Nombre:
        <input type="text" name="nombre"
        value="<?php echo htmlspecialchars($nombre ?? ''); ?>">
        <br><br>

        <!-- Campo para introducir la primera nota -->
        Nota 1:
        <input type="number" step="any" name="nota1"
        value="<?php echo htmlspecialchars($nota1 ?? ''); ?>">
        <br><br>

        <!-- Campo para introducir la segunda nota -->
        Nota 2:
        <input type="number" step="any" name="nota2"
        value="<?php echo htmlspecialchars($nota2 ?? ''); ?>">
        <br><br>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Calcular">

    </form>

</body>
</html>
