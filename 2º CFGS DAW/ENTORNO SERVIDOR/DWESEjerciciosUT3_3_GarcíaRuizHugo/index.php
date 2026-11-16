<?php

// Por defecto, utilizamos el tema claro
$tema = "temaClaro.css";

// Comprobamos si se ha elegido un tema
if (isset($_GET["tema"])) {

    if ($_GET["tema"] == "oscuro") {
        $tema = "temaOscuro.css";
    }

    if ($_GET["tema"] == "claro") {
        $tema = "temaClaro.css";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cambio de tema</title>

    <link rel="stylesheet" href="<?php echo $tema; ?>">
</head>

<body>

    <header>
        <h1>Mi página web</h1>

        <a href="index.php?tema=claro">Tema claro</a>

        <a href="index.php?tema=oscuro">Tema oscuro</a>
    </header>

    <main>
        <h2>Bienvenido a mi página</h2>

        <p>
            Esta página permite cambiar entre un tema claro
            y un tema oscuro mediante dos enlaces.
        </p>
    </main>

    <?php include "footer.php"; ?>

</body>

</html>