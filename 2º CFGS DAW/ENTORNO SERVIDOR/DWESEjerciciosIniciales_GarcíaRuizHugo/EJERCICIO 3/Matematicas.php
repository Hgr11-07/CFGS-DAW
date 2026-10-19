<?php
// Recogemos num1, num2 y num3 por GET.
// isset() comprueba que el parámetro existe y is_numeric() que es un número,
// así evitamos avisos de "undefined index" y datos no válidos.
$valido = true;
$nums = [];
foreach (['num1', 'num2', 'num3'] as $clave) {
    if (isset($_GET[$clave]) && is_numeric($_GET[$clave])) {
        $nums[$clave] = $_GET[$clave] + 0; // "+ 0" convierte el texto en número (int o float)
    } else {
        $valido = false;
    }
}

if ($valido) {
    $num1 = $nums['num1'];
    $num2 = $nums['num2'];
    $num3 = $nums['num3'];

    $suma     = $num1 + $num2 + $num3;          // suma de los 3 números
    $producto = $num1 * $num2 * $num3;          // producto de los 3 números
    $media    = round($suma / 3, 2);            // round() redondea la media a 2 decimales
    $maximo   = max($num1, $num2, $num3);       // max() devuelve el mayor
    $minimo   = min($num1, $num2, $num3);       // min() devuelve el menor
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operaciones Matemáticas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="h3 text-center mb-4">Operaciones Matemáticas</h1>

        <?php if (!$valido) { ?>
            <div class="alert alert-warning text-center" role="alert">
                Faltan parámetros o no son numéricos. Ejemplo:
                matematicas.php?num1=5&amp;num2=2&amp;num3=3
            </div>
        <?php } else { ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle text-center">
                    <tbody>
                        <tr><th scope="row">Número 1:</th><td><?php echo $num1; ?></td></tr>
                        <tr><th scope="row">Número 2:</th><td><?php echo $num2; ?></td></tr>
                        <tr><th scope="row">Número 3:</th><td><?php echo $num3; ?></td></tr>
                        <tr><th scope="row">Suma:</th><td><?php echo $suma; ?></td></tr>
                        <tr><th scope="row">Producto:</th><td><?php echo $producto; ?></td></tr>
                        <tr><th scope="row">Promedio:</th><td><?php echo $media; ?></td></tr>
                        <tr><th scope="row">Máximo:</th><td><?php echo $maximo; ?></td></tr>
                        <tr><th scope="row">Mínimo:</th><td><?php echo $minimo; ?></td></tr>
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
