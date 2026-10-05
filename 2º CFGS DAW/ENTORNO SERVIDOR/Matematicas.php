<?php
// EJ MATES 0: Recoger por GET los tres números y guardarlos en variables
//   $num1 = $_GET['num1']; $num2 = ...; $num3 = ...;
//   (Opcional: comprobar con isset() / is_numeric() que existen y son números)

// EJ MATES 1: Calcular aquí (o directamente en la tabla) las operaciones:
//   suma, producto, media, máximo (max) y mínimo (min)

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

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Número 1 (num1)</td>
                        <td><?php // EJ MATES 2: Mostrar num1 recibido por GET
                        $num1 = $_GET['num1'];
                        echo $num1;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Número 2 (num2)</td>
                        <td><?php // EJ MATES 3: Mostrar num2 recibido por GET 
                        $num2 = $_GET['num2'];
                        echo $num2;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Número 3 (num3)</td>
                        <td><?php // EJ MATES 4: Mostrar num3 recibido por GET
                        $num3 = $_GET['num3'];
                        echo $num3;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Suma de los 3 números</td>
                        <td><?php // EJ MATES 5: Mostrar la suma de num1 + num2 + num3
                        $suma = $num1 + $num2 + $num3;
                        echo $suma;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Producto de los 3 números</td>
                        <td><?php // EJ MATES 6: Mostrar el producto de num1 * num2 * num3 
                        $producto = $num1 * $num2 * $num3;
                        echo $producto;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Media</td>
                        <td><?php // EJ MATES 7: Mostrar la media de los 3 números 
                        $media = ($num1 + $num2 + $num3) / 3;
                        echo $media;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Número más grande</td>
                        <td><?php // EJ MATES 8: Mostrar el máximo de los 3 números (función max) 
                        $max = max($num1, $num2, $num3);
                        echo $max;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Número mínimo</td>
                        <td><?php // EJ MATES 9: Mostrar el mínimo de los 3 números (función min) 
                        $min = min($num1, $num2, $num3);
                        echo $min;
                        ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-primary">← Volver a la página principal</a>
        </div>
    </div>

</body>

</html>