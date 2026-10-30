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
        $moneda = rand(0, 1);
        if ($moneda == 0) {
          echo "<h2 style='font-size: 300%;'>Ha salido cara</h2>";
        } else {
          echo "<h2 style='font-size: 300%;'>Ha salido cruz</h2>";
        }
        ?>
      </div>

      <!-- Ejercicio 2 -->
      <div class="tab-pane fade" id="ejercicio2" role="tabpanel" aria-labelledby="ejercicio2-tab">
        <?php
        $nota = rand(0, 10);
        switch ($nota) {
          case 0:
          case 1:
          case 2:
          case 3:
          case 4:
            echo "<p>Nota: $nota - Suspenso</p>";
            break;
          case 5:
          case 6:
            echo "<p>Nota: $nota - Suficiente</p>";
            break;
          case 7:
          case 8:
            echo "<p>Nota: $nota - Notable</p>";
            break;
          case 9:
          case 10:
            echo "<p>Nota: $nota - Sobresaliente</p>";
            break;
        }
        ?>
      </div>

      <!-- Ejercicio 3 -->
      <div class="tab-pane fade" id="ejercicio3" role="tabpanel" aria-labelledby="ejercicio3-tab">
        <?php
        $n1 = rand(1, 10);
        $n2 = rand(1, 10);
        $n3 = rand(1, 10);

        if ($n1 == $n2 && $n1 == $n3) {
          echo "<p>Los tres números son iguales: $n1</p>";
        } elseif ($n1 == $n2) {
          echo "<p>Hay dos números iguales: $n1 y $n2. El otro número es: $n3</p>";
        } elseif ($n2 == $n3) {
          echo "<p>Hay dos números iguales: $n2 y $n3. El otro número es: $n1</p>";
        } elseif ($n1 == $n3) {
          echo "<p>Hay dos números iguales: $n1 y $n3. El otro número es: $n2</p>";
        } else {
          echo "<p>Los tres números son diferentes: $n1, $n2, $n3</p>";
        }
        ?>
      </div>

      <!-- Ejercicio 4 -->
      <div class="tab-pane fade" id="ejercicio4" role="tabpanel" aria-labelledby="ejercicio4-tab">
        <?php
        $numero = rand(50, 100);
        $suma = 0;

        for ($i = 0; $i <= $numero; $i++) {
          if ($i % 2 == 0) {
            $suma += $i;
          }
        }

        echo "<p>El número generado es: $numero</p>";
        echo "<p>La suma de los números pares desde 0 hasta $numero es: $suma</p>";
        ?>
      </div>

      <!-- Ejercicio 5 -->
      <div class="tab-pane fade" id="ejercicio5" role="tabpanel" aria-labelledby="ejercicio5-tab">
        <?php
        $numero = rand(1, 20);
        $multiplicacion = 1;

        while ($multiplicacion <= 10) {
          echo "$numero x $multiplicacion = " . ($numero * $multiplicacion) . "<br>";
          $multiplicacion++;
        }
        ?>
      </div>

      <!-- Ejercicio 6 -->
      <div class="tab-pane fade" id="ejercicio6" role="tabpanel" aria-labelledby="ejercicio6-tab">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Número</th>
              <th scope="col">Unicode</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for ($i = 0; $i <= 2000; $i++) {
              echo "<tr><td>$i</td><td>&#$i;</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>

      <!-- Ejercicio 7 -->
      <div class="tab-pane fade" id="ejercicio7" role="tabpanel" aria-labelledby="ejercicio7-tab">
        <?php
        $numeroFrutas = rand(7, 20);
        $arrayFrutas = [];
        $frutaAzar = rand(127815, 127827);
        $contador = 0;

        echo "<p>Número de frutas generadas: $numeroFrutas</p>";

        echo "<p>";
        for ($i = 0; $i < $numeroFrutas; $i++) {
          $fruta = rand(127815, 127827);
          $arrayFrutas[] = $fruta;
          echo "&#$fruta; ";

        }

        echo "</p>Fruta a buscar: &#$frutaAzar;<br>";
        for ($i = 0; $i < count($arrayFrutas); $i++) {
          if ($arrayFrutas[$i] == $frutaAzar) {
            $contador++;
          }
        }

        switch ($contador) {
          case 0:
            echo "<p>La fruta &#$frutaAzar; no aparece en el array.</p>";
            break;
          case 1:
            echo "<p>La fruta &#$frutaAzar; aparece 1 vez.</p>";
            break;
          default:
            echo "<p>La fruta &#$frutaAzar; aparece $contador veces.</p>";
            break;
        }

        ?>
      </div>

    </div>

    <!-- Ejercicio 8 -->
    <div class="tab-pane fade" id="ejercicio8" role="tabpanel" aria-labelledby="ejercicio8-tab">
      <table class="table table-bordered w-auto"> <!-- Clase de Bootstrap para poner bordes a las tablas -->
        <?php
        for ($i = 0; $i < 10; $i++) {
          echo "<tr>";
          for ($j = 1; $j < 11; $j++) {
            $contador = $j + $i * 10;
            echo "<td>$contador</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>

      <table class="table table-bordered w-auto"> <!-- Clase de Bootstrap para poner bordes a las tablas -->
        <?php
        $arrayEmojis = array("&#128169;", "&#128168;", "&#127866;", "&#128405;", "&#129313;");
        
        for ($i = 0; $i < 10; $i++) {
          echo "<tr>";
          for ($j = 1; $j < 11; $j++) {
            $posicionRandom=rand(0,4);
            echo "<td>" . $arrayEmojis[$posicionRandom] ."</td>";
          }
          echo "</tr>";
        }
        ?>
      </table>
    </div>
    </div>
  </main>

  <!-- JavaScript de Bootstrap (necesario para las pestañas) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>