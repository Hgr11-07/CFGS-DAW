<?php
// EJ CADENAS 0: Recoger por GET cadena1 y cadena2 y guardarlas en variables
//   $cadena1 = $_GET['cadena1']; $cadena2 = $_GET['cadena2'];
//   (Opcional: comprobar con isset() y proteger con htmlspecialchars())

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

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cadena 1</td>
                        <td><?php // EJ CADENAS 1: Mostrar cadena1 recibida por GET 
                        $cadena1 = $_GET['cadena1'];
                        echo $cadena1;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Cadena 2</td>
                        <td><?php // EJ CADENAS 2: Mostrar cadena2 recibida por GET 
                        $cadena2 = $_GET['cadena2'];
                        echo $cadena2;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Concatenación (cadena1 + cadena2)</td>
                        <td><?php // EJ CADENAS 3: Concatenar cadena1 y cadena2 (operador .) y mostrar 
                        $concatenacion = $cadena1 . $cadena2;
                        echo $concatenacion;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Longitud de cadena1</td>
                        <td><?php // EJ CADENAS 4: Longitud de cadena1 (strlen / mb_strlen) 
                        $longitud = strlen($cadena1);
                        echo $longitud;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Longitud de cadena2</td>
                        <td><?php // EJ CADENAS 5: Longitud de cadena2 (ojo con los acentos: mb_strlen) 
                        $longitud = mb_strlen($cadena2, 'UTF-8');
                        echo $longitud;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Últimos 10 caracteres de cadena2</td>
                        <td><?php // EJ CADENAS 6: Extraer los últimos 10 caracteres (substr / mb_substr con -10) 
                        $ultimos10 = mb_substr($cadena2, -10, null, 'UTF-8');
                        echo $ultimos10;
                        ?></td>
                    </tr>
                    <tr>
                        <td>Reemplazar "pepe" por "Juan"</td>
                        <td><?php // EJ CADENAS 7: Reemplazar "pepe" por "Juan" con una función de PHP (str_replace / str_ireplace) 
                        $reemplazado = str_replace("pepe", "Juan", $cadena1);
                        echo $reemplazado;
                        ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-success">← Volver a la página principal</a>
        </div>
    </div>

</body>
</html>