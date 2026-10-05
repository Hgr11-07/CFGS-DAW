<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Metadatos básicos requeridos para la validación W3C -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicios de PHP - Entorno Servidor</title>

  <!-- CSS de Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Contenido principal de la página -->
  <main class="container my-5">
    
    <header class="mb-4 text-center">
      <h1 class="display-5">EJERCICIOS DE PHP</h1>
      <p>Alumno: Hugo García Ruiz</p>
      <p>Curso: 2º DAW</p>
      <p>Alumno: Hugo García Ruiz</p>
      <p>Módulo: Desarrollo Web en Entorno Servidor (DWES)</p>

    </header>

    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="ejercicio1-tab" data-bs-toggle="tab" data-bs-target="#ejercicio1" type="button" role="tab" aria-controls="ejercicio1" aria-selected="true">Ejercicio 1</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio2-tab" data-bs-toggle="tab" data-bs-target="#ejercicio2" type="button" role="tab" aria-controls="ejercicio2" aria-selected="false">Ejercicio 2</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="ejercicio3-tab" data-bs-toggle="tab" data-bs-target="#ejercicio3" type="button" role="tab" aria-controls="ejercicio3" aria-selected="false">Ejercicio 3</button>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="ejercicio1" role="tabpanel" aria-labelledby="ejercicio1-tab">
        <?php
          $num = rand(1, 100);
          $size = rand(200, 800);
          echo "<h1 style='font-size: {$size}%'>{$num}</h1>";
          echo "Tamaño de fuente: {$size}%";
        ?>
      </div>
    </div>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade" id="ejercicio2" role="tabpanel" aria-labelledby="ejercicio2-tab">
        <?php
          $emoticono = rand(128512, 128586);
          echo "<h1 style='font-size: 2em;'>&#{$emoticono}</h1>";
        ?>
      </div>

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="ejercicio3" role="tabpanel" aria-labelledby="ejercicio3-tab">
          <?php
            $frase = "This is a test";
            echo "La frase es: {$frase}<br>";
            echo "Queremos contar la cantidad de 't' que hay en la frase.<br>";
            $contador = substr_count(strtolower($frase), "t");
            echo "La cantidad de 't' en la frase es: {$contador}";
          ?>
        </div>

  </main>

  <!-- JavaScript de Bootstrap (necesario para la interactividad) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>