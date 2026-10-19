<?php
// $_SERVER es un array superglobal con información del servidor web
$nombreServidor   = $_SERVER['SERVER_NAME'];      // nombre del servidor (p. ej. localhost)
$softwareServidor = $_SERVER['SERVER_SOFTWARE'];  // software (p. ej. Apache/2.4.54 ...)
$versionPHP       = phpversion();                 // phpversion() devuelve la versión de PHP
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Información del servidor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="h3 text-center mb-4">Información del Servidor</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <tbody>
                    <tr><th scope="row">Nombre del servidor:</th><td><?php echo htmlspecialchars($nombreServidor); ?></td></tr>
                    <tr><th scope="row">Software del servidor:</th><td><?php echo htmlspecialchars($softwareServidor); ?></td></tr>
                    <tr><th scope="row">Versión de PHP:</th><td><?php echo htmlspecialchars($versionPHP); ?></td></tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

</body>
</html>
