<?php
$activo = isset($_POST['ejercicio']) ? (int) $_POST['ejercicio'] : 1;
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de PHP - Entorno Servidor</title>

    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <main class="container my-5">

        <header class="mb-4 text-center">
            <h1 class="display-5">EJERCICIOS DE PHP</h1>
            <p>Alumno: Hugo García Ruiz</p>
            <p>Curso: 2º DAW</p>
            <p>Módulo: Desarrollo Web en Entorno Servidor (DWES)</p>
        </header>

        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <?php for ($i = 1; $i <= 9; $i++): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?= $activo == $i ? 'active' : '' ?>" id="ejercicio<?= $i ?>-tab"
                        data-bs-toggle="tab" data-bs-target="#ejercicio<?= $i ?>" type="button" role="tab"
                        aria-controls="ejercicio<?= $i ?>" aria-selected="<?= $activo == $i ? 'true' : 'false' ?>">Ejercicio
                        <?= $i ?></button>
                </li>
            <?php endfor; ?>
        </ul>

        <div class="tab-content" id="myTabContent">

            <!-- Ejercicio 1 -->
            <div class="tab-pane fade <?= $activo == 1 ? 'show active' : '' ?>" id="ejercicio1" role="tabpanel"
                aria-labelledby="ejercicio1-tab">

                <?php

                function sumar($a, $b, $c, $d, $e)
                {
                    echo "<p>Suma: " . ($a + $b + $c + $d + $e) . "</p>";
                }

                function dividir($a, $b, $c, $d, $e)
                {
                    $array = [$a, $b, $c, $d, $e];
                    $pos1 = rand(0, count($array) - 1);
                    $pos2 = rand(0, count($array) - 1);
                    while ($pos1 == $pos2) {
                        $pos2 = rand(0, count($array) - 1);
                    }
                    if ($array[$pos2] == 0) {
                        throw new Exception("Error. No se puede dividir entre cero.");
                    }

                    echo "<p>División de " . $array[$pos1] . " entre " . $array[$pos2] . "</p>";
                    return $array[$pos1] / $array[$pos2];
                }

                function volumenCilindro($radio, $altura)
                {
                    return (3.1416 * $radio * $radio * $altura);
                }

                $num1 = rand(0, 9);
                $num2 = rand(0, 9);
                $num3 = rand(0, 9);
                $num4 = rand(0, 9);
                $num5 = rand(0, 9);

                echo "<p>Números introducidos: $num1, $num2, $num3, $num4, $num5</p>";
                echo "<p><b>APARTADO A)</b></p>";
                sumar($num1, $num2, $num3, $num4, $num5);

                echo "<p><b>APARTADO B)</b></p>";
                if ($num1 == 0 && $num2 == 0 && $num3 == 0 && $num4 == 0 && $num5 == 0) {
                    echo "<p style='color:red;'>Error. No hay ninguna división disponible.</p>";
                } else {
                    $reintentar = true;
                    while ($reintentar == true) {
                        try {
                            $tmp = dividir($num1, $num2, $num3, $num4, $num5);
                            $reintentar = false;
                        } catch (Exception $e) {
                        }
                    }
                    echo "<p>División aleatoria: $tmp</p>";
                }

                echo "<p><b>APARTADO C)</b></p>";
                $radio = rand(1, 10);
                $altura = rand(1, 10);
                echo "<p>Volumen del cilindro con radio $radio y altura $altura: " . volumenCilindro($radio, $altura) . "</p>";

                ?>
            </div>

            <!-- Ejercicio 2 -->
            <div class="tab-pane fade <?= $activo == 2 ? 'show active' : '' ?>" id="ejercicio2" role="tabpanel"
                aria-labelledby="ejercicio2-tab">

                <form method="post" class="mb-4">
                    <input type="hidden" name="ejercicio" value="2">
                    <div class="row g-2">
                        <div class="col"><input type="number" name="numero_de_elementos" class="form-control"
                                placeholder="Número de elementos" required></div>
                        <div class="col"><input type="number" name="min" class="form-control" placeholder="Mínimo"
                                required></div>
                        <div class="col"><input type="number" name="max" class="form-control" placeholder="Máximo"
                                required></div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Calcular</button>
                </form>

                <?php

                function inicializarArray($numero_de_elementos, $min, $max)
                {
                    $array = [];
                    for ($i = 0; $i < $numero_de_elementos; $i++) {
                        $array[$i] = rand($min, $max);
                    }
                    return $array;
                }

                function mostrarArray($array)
                {
                    echo "<p>Array: [";
                    for ($i = 0; $i < count($array); $i++) {
                        echo $array[$i];
                        if ($i < count($array) - 1) {
                            echo ", ";
                        }
                    }
                    echo "]</p>";
                }

                if (isset($_POST['numero_de_elementos'], $_POST['min'], $_POST['max'])) {
                    $numero_de_elementos = (int) $_POST['numero_de_elementos'];
                    $min = (int) $_POST['min'];
                    $max = (int) $_POST['max'];

                    if ($min > $max) {
                        echo "<p style='color:red;'>El mínimo no puede ser mayor que el máximo.</p>";
                    } elseif ($numero_de_elementos < 1) {
                        echo "<p style='color:red;'>El número de elementos debe ser al menos 1.</p>";
                    } else {
                        $array = inicializarArray($numero_de_elementos, $min, $max);
                        mostrarArray($array);
                    }
                }

                ?>
            </div>

            <!-- Ejercicio 3 -->
            <div class="tab-pane fade <?= $activo == 3 ? 'show active' : '' ?>" id="ejercicio3" role="tabpanel"
                aria-labelledby="ejercicio3-tab">
                <?php
                function calcularMedia($array)
                {
                    $suma = array_sum($array);
                    $cantidad = count($array);
                    if ($cantidad == 0) {
                        return 0; // Evitar división por cero
                    }
                    return $suma / $cantidad;
                }

                $array = [];
                $numero_de_elementos = rand(5, 10);

                for ($i = 0; $i < $numero_de_elementos; $i++) {
                    $array[$i] = rand(1, 10);
                }

                echo "<p>Array: [";
                for ($i = 0; $i < count($array); $i++) {
                    echo $array[$i];
                    if ($i < count($array) - 1) {
                        echo ", ";
                    }
                }
                echo "]</p>";

                $media = calcularMedia($array);
                echo "<p>Media: $media</p>";

                ?>
            </div>

            <!-- Ejercicio 4 -->
            <div class="tab-pane fade <?= $activo == 4 ? 'show active' : '' ?>" id="ejercicio4" role="tabpanel"
                aria-labelledby="ejercicio4-tab">
                <?php

                function calcular_maximo($array)
                {

                    $maximo = $array[0];

                    foreach ($array as $numero) {

                        if ($numero > $maximo) {
                            $maximo = $numero;
                        }

                    }

                    return $maximo;
                }

                // Ejemplo de uso
                $numeros = [5, 12, 3, 25, 8];

                echo "<h2>Buscar el número máximo</h2>";
                echo "<p>Array: 5, 12, 3, 25, 8</p>";

                echo "<p>El número máximo es: <strong>";
                echo calcular_maximo($numeros);
                echo "</strong></p>";

                ?>
            </div>

            <!-- Ejercicio 5 -->
            <div class="tab-pane fade <?= $activo == 5 ? 'show active' : '' ?>" id="ejercicio5" role="tabpanel"
                aria-labelledby="ejercicio5-tab">
                <?php

                function calcular_minimo($array)
                {

                    $minimo = $array[0];

                    foreach ($array as $numero) {

                        if ($numero < $minimo) {
                            $minimo = $numero;
                        }

                    }

                    return $minimo;
                }

                $numeros = [5, 12, 3, 25, 8];

                echo "<h2>Buscar el número mínimo</h2>";
                echo "<p>Array: 5, 12, 3, 25, 8</p>";

                echo "<p>El número mínimo es: <strong>";
                echo calcular_minimo($numeros);
                echo "</strong></p>";

                ?>
            </div>

            <!-- Ejercicio 6 -->
            <div class="tab-pane fade <?= $activo == 6 ? 'show active' : '' ?>" id="ejercicio6" role="tabpanel"
                aria-labelledby="ejercicio6-tab">
                <?php

                function imprimir_array($array)
                {

                    echo "<table border='1' cellpadding='10' cellspacing='0'>";

                    echo "<tr>";
                    echo "<th>Posición</th>";
                    echo "<th>Valor</th>";
                    echo "</tr>";

                    foreach ($array as $posicion => $valor) {

                        echo "<tr>";
                        echo "<td>$posicion</td>";
                        echo "<td>$valor</td>";
                        echo "</tr>";

                    }

                    echo "</table>";
                }

                $numeros = [5, 12, 3, 25, 8];

                imprimir_array($numeros);

                ?>
            </div>

            <!-- Ejercicio 7 -->
            <div class="tab-pane fade <?= $activo == 7 ? 'show active' : '' ?>" id="ejercicio7" role="tabpanel"
                aria-labelledby="ejercicio7-tab">
                <?php

                ?>
            </div>

            <!-- Ejercicio 8 -->
            <div class="tab-pane fade <?= $activo == 8 ? 'show active' : '' ?>" id="ejercicio8" role="tabpanel"
                aria-labelledby="ejercicio8-tab">

            </div>

            <!-- Ejercicio 9 -->
            <div class="tab-pane fade <?= $activo == 9 ? 'show active' : '' ?>" id="ejercicio9" role="tabpanel"
                aria-labelledby="ejercicio9-tab">
                <?php


                ?>
            </div>

        </div>
    </main>

    <!-- JavaScript de Bootstrap (necesario para las pestañas) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>