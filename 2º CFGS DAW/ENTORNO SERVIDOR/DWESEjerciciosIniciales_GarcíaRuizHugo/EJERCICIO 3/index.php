<?php
// Datos del estudiante guardados en variables para mostrarlos en la cabecera
$nombre = "Hugo García Ruiz";
$curso  = "2ºY";
$modulo = "Desarrollo web en entorno servidor";

// http_build_query() construye la cadena de parámetros GET (num1=5&num2=2...)
// y codifica automáticamente espacios, tildes y la ñ para que viajen bien por la URL.
// htmlspecialchars() convierte el & en &amp; para que el HTML sea válido en el W3C.
$urlMates = "matematicas.php?" . http_build_query(['num1' => 5, 'num2' => 2, 'num3' => 3]);
$urlCadenas = "cadena.php?" . http_build_query([
    'cadena1' => 'pepe',
    'cadena2' => 'Vaya ñapa que me ha hecho pepe'
]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejercicio avanzado PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <header class="text-center mb-4">
            <h1 class="display-5">Ejercicio avanzado PHP</h1>
            <!-- htmlspecialchars() evita que caracteres especiales rompan el HTML -->
            <p class="mb-1"><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
            <p class="mb-1"><strong>Curso:</strong> <?php echo htmlspecialchars($curso); ?></p>
            <p class="mb-0"><strong>Módulo:</strong> <?php echo htmlspecialchars($modulo); ?></p>
        </header>

        <main class="d-grid gap-3 col-12 col-md-6 mx-auto">
            <a class="btn btn-primary" href="<?php echo htmlspecialchars($urlMates); ?>">Operaciones matemáticas</a>
            <a class="btn btn-primary" href="<?php echo htmlspecialchars($urlCadenas); ?>">Operaciones con cadenas</a>
            <a class="btn btn-primary" href="infoServidor.php">Información del servidor</a>
        </main>
    </div>

</body>
</html>
