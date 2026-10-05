<?php
// EJ SERVIDOR 0: (Opcional) Guardar en variables los datos del servidor
//   usando $_SERVER y phpversion().

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
        <h1 class="h3 text-center mb-4">Información del servidor</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th>Dato</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre del servidor</td>
                        <td><?php // EJ SERVIDOR 1: Mostrar el nombre del servidor ($_SERVER['SERVER_NAME']) 
                        $nombreServidor = $_SERVER['SERVER_NAME'];
                        echo $nombreServidor;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Software del servidor</td>
                        <td><?php // EJ SERVIDOR 2: Mostrar el software del servidor ($_SERVER['SERVER_SOFTWARE']) 
                        $softwareServidor = $_SERVER['SERVER_SOFTWARE'];
                        echo $softwareServidor;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Versión de PHP</td>
                        <td><?php // EJ SERVIDOR 3: Mostrar la versión de PHP (phpversion() o PHP_VERSION) 
                        $versionPHP = phpversion();
                        echo $versionPHP;
                        ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-secondary">← Volver a la página principal</a>
        </div>
    </div>

</body>
</html>