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

    <!-- Pestañas -->
    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="ejercicio1-tab" data-bs-toggle="tab" data-bs-target="#ejercicio1"
          type="button" role="tab" aria-controls="ejercicio1" aria-selected="true">Ejercicio 1</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio2-tab" data-bs-toggle="tab" data-bs-target="#ejercicio2" type="button"
          role="tab" aria-controls="ejercicio2" aria-selected="false">Ejercicio 2</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio3-tab" data-bs-toggle="tab" data-bs-target="#ejercicio3" type="button"
          role="tab" aria-controls="ejercicio3" aria-selected="false">Ejercicio 3</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio4-tab" data-bs-toggle="tab" data-bs-target="#ejercicio4" type="button"
          role="tab" aria-controls="ejercicio4" aria-selected="false">Ejercicio 4</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio5-tab" data-bs-toggle="tab" data-bs-target="#ejercicio5" type="button"
          role="tab" aria-controls="ejercicio5" aria-selected="false">Ejercicio 5</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio6-tab" data-bs-toggle="tab" data-bs-target="#ejercicio6" type="button"
          role="tab" aria-controls="ejercicio6" aria-selected="false">Ejercicio 6</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio7-tab" data-bs-toggle="tab" data-bs-target="#ejercicio7" type="button"
          role="tab" aria-controls="ejercicio7" aria-selected="false">Ejercicio 7</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio8-tab" data-bs-toggle="tab" data-bs-target="#ejercicio8" type="button"
          role="tab" aria-controls="ejercicio8" aria-selected="false">Ejercicio 8</button>
      </li>
    </ul>

    <!-- Un ÚNICO contenedor para todos los paneles -->
    <div class="tab-content" id="myTabContent">

      <!-- Ejercicio 1 -->
      <div class="tab-pane fade show active" id="ejercicio1" role="tabpanel" aria-labelledby="ejercicio1-tab">
        <?php

        for ($i = 0; $i <= 10; $i++) {
          $numeroRandom = rand(0, 30);
          $arrayNumeros[$i] = $numeroRandom;
        }

        echo "[";
        for ($i = 0; $i <= 10; $i++) {
          if ($i == 0)
            echo "" . $arrayNumeros[$i] . ", ";
          elseif ($i == 10)
            echo " " . $arrayNumeros[$i] . "";
          else
            echo " " . $arrayNumeros[$i] . ",";
        }
        echo "]";
        ?>
      </div>

      <!-- Ejercicio 2 -->
      <div class="tab-pane fade" id="ejercicio2" role="tabpanel" aria-labelledby="ejercicio2-tab">
        <?php

        $media = 0;

        for ($i = 0; $i < 10; $i++) {
          $numeroRandom = rand(0, 30);
          $arrayNumeros[$i] = $numeroRandom;
        }

        echo "[";
        for ($i = 0; $i < 10; $i++) {
          if ($i == 0)
            echo "" . $arrayNumeros[$i] . ", ";
          elseif ($i == 9)
            echo " " . $arrayNumeros[$i] . "";
          else
            echo " " . $arrayNumeros[$i] . ",";
        }
        echo "]";

        echo "<br>";
        echo "<br>";

        for ($i = 0; $i < 10; $i++) {
          $media += $arrayNumeros[$i];
        }
        echo "La media es: " . ($media / 10) . "<br>";

        $ordenado = $arrayNumeros;
        sort($ordenado);

        echo "<h3>Los 3 valores máximos: </h3>";
        for ($i = 10; $i > 7; $i--) {
          echo $ordenado[$i] . " ";
        }

        echo "<br>";

        echo "<h3>Los 3 valores mínimos: </h3>";
        for ($i = 0; $i < 3; $i++) {
          echo $ordenado[$i] . " ";
        }
        echo "<br>";

        $arrayCopiado = $arrayNumeros;

        sort($arrayCopiado);


        ?>
      </div>

      <!-- Ejercicio 3 -->
      <div class="tab-pane fade" id="ejercicio3" role="tabpanel" aria-labelledby="ejercicio3-tab">
        <?php

        ?>
      </div>

      <!-- Ejercicio 4 -->
      <div class="tab-pane fade" id="ejercicio4" role="tabpanel" aria-labelledby="ejercicio4-tab">
        <?php

        ?>
      </div>

      <!-- Ejercicio 5 -->
      <div class="tab-pane fade" id="ejercicio5" role="tabpanel" aria-labelledby="ejercicio5-tab">
        <?php

        ?>
      </div>

      <!-- Ejercicio 6 -->
      <div class="tab-pane fade" id="ejercicio6" role="tabpanel" aria-labelledby="ejercicio6-tab">
        <?php

        ?>

      </div>

      <!-- Ejercicio 7 -->
      <div class="tab-pane fade" id="ejercicio7" role="tabpanel" aria-labelledby="ejercicio7-tab">
        <?php

        ?>
      </div>

    </div>

    <!-- Ejercicio 8 -->
    <div class="tab-pane fade" id="ejercicio8" role="tabpanel" aria-labelledby="ejercicio8-tab">

      <?php

      ?>

      </table>
    </div>
    </div>
  </main>

  <!-- JavaScript de Bootstrap (necesario para las pestañas) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>