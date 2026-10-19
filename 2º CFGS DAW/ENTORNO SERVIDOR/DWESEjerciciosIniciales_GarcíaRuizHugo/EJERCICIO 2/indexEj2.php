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
    </ul>

    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade show active" id="ejercicio1" role="tabpanel" aria-labelledby="ejercicio1-tab">
        <h2>Ejercicio 1</h2>
        <?php
        $fechaActual = time();
        echo "La fecha de hoy es: " . date('d/m/Y', $fechaActual) . "<br>";
        echo "La hora actual es: " . date('H:i:s', $fechaActual);
        ?>
      </div>

      <div class="tab-pane fade" id="ejercicio2" role="tabpanel" aria-labelledby="ejercicio2-tab">
        <h2>Ejercicio 2</h2>
        <?php
        $primerNumero = 8;
        $segundoNumero = 5;
        $suma = $primerNumero + $segundoNumero;
        $resto = $primerNumero % $segundoNumero;
        $division = $primerNumero / $segundoNumero;

        echo "Primer número: $primerNumero<br>";
        echo "Segundo número: $segundoNumero<br>";
        echo "El resto de dividir el primer número entre el segundo --> " . $resto . "<br>";
        echo "El resultado de dividir el primer numero entre el segundo --> " . $division . "<br>";
        echo "El resultado de sumar los dos números --> " . $suma . "<br>";
        ?>
      </div>

      <div class="tab-pane fade" id="ejercicio3" role="tabpanel" aria-labelledby="ejercicio3-tab">
        <h2>Ejercicio 3</h2>
        <?php
        $frase = "Ya decidí que esta noche se sale con todas mis motomami";
        $fraseSinEspacios = str_replace(" ", "", $frase);
        $longitud = strlen($frase);
        $longitudSinEspacios = strlen($fraseSinEspacios);
        echo "La frase original es: <b>" . $frase . "</b><br>";
        echo "La frase resultante es: <b>" . $fraseSinEspacios . "</b><br>";
        echo "La longitud de la cadena original es: " . $longitud . "<br>";
        echo "La longitud de la cadena final es: " . $longitudSinEspacios . "<br>";
        ?>
      </div>

      <div class="tab-pane fade" id="ejercicio4" role="tabpanel" aria-labelledby="ejercicio4-tab">
        <h2>Ejercicio 4</h2>
        <br>
        <?php
        define("Numero_Aureo", 1.6180339887);
        echo "Mi constante es el número áureo y su valor aproximado es: " . Numero_Aureo;
        $mult=Numero_Aureo*100;
        echo "<br>";
        echo "El número áureo x 100 es: ". $mult .".";
        echo "<br>";
        echo "El entero más grande en PHP es: " . PHP_INT_MAX;


        ?>
      </div>

      <div class="tab-pane fade" id="ejercicio5" role="tabpanel" aria-labelledby="ejercicio5-tab">
        <h2>Ejercicio 5</h2>
        <?php
        $fechaActual = time();
        echo "La fecha de hoy es: " . date('d/m/Y', $fechaActual) . "<br>";
        echo "La hora actual es: " . date('H:i:s', $fechaActual);
        ?>
      </div>

    </div>
  </main>

  <!-- JavaScript de Bootstrap (necesario para los tabs) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>