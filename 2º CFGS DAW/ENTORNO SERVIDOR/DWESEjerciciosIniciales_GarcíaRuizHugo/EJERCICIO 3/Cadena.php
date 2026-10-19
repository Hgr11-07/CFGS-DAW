<?php
// Recogemos cadena1 y cadena2 por GET. isset() comprueba que existen.
$valido = isset($_GET['cadena1']) && isset($_GET['cadena2']);

if ($valido) {
    $cadena1 = $_GET['cadena1'];
    $cadena2 = $_GET['cadena2'];

    // Operador . (punto) para concatenar; añadimos un espacio entre ambas
    $concatenacion = $cadena1 . " " . $cadena2;

    // mb_strlen() cuenta caracteres reales (strlen contaría bytes y fallaría con ñ y tildes)
    $longitud1 = mb_strlen($cadena1, 'UTF-8');
    $longitud2 = mb_strlen($cadena2, 'UTF-8');

    // mb_substr() con inicio negativo (-10) extrae los últimos 10 caracteres
    $ultimos10 = mb_substr($cadena2, -10, null, 'UTF-8');

    // str_ireplace() sustituye "pepe" por "Juan" sin distinguir mayúsculas/minúsculas
    $reemplazo = str_ireplace("pepe", "Juan", $cadena2);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operaciones con Cadenas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="h3 text-center mb-4">Operaciones con Cadenas</h1>

        <?php if (!$valido) { ?>
            <div class="alert alert-warning text-center" role="alert">
                Faltan parámetros. Ejemplo:
                cadena.php?cadena1=pepe&amp;cadena2=Vaya%20ñapa
            </div>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center">
                    <tbody>
                        <!-- htmlspecialchars() protege la página de HTML/JS inyectado por la URL -->
                        <tr><th scope="row">Cadena 1:</th><td><?php echo htmlspecialchars($cadena1); ?></td></tr>
                        <tr><th scope="row">Cadena 2:</th><td><?php echo htmlspecialchars($cadena2); ?></td></tr>
                        <tr><th scope="row">Concatenación de cadenas:</th><td><?php echo htmlspecialchars($concatenacion); ?></td></tr>
                        <tr><th scope="row">Longitud de la cadena 1:</th><td><?php echo $longitud1; ?> caracteres</td></tr>
                        <tr><th scope="row">Longitud de la cadena 2:</th><td><?php echo $longitud2; ?> caracteres</td></tr>
                        <tr><th scope="row">Últimos 10 caracteres de la cadena 2:</th><td><?php echo htmlspecialchars($ultimos10); ?></td></tr>
                        <tr><th scope="row">Reemplazo de 'pepe' por 'Juan':</th><td><?php echo htmlspecialchars($reemplazo); ?></td></tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

</body>
</html>
