<?php

$apartamentos = [
    ['precio/noche' => 37,  'ciudad' => 'Valencia',  'wifi' => true,  'pagina web' => 'https://hotel.com'],
    ['precio/noche' => 87,  'ciudad' => 'Madrid',    'wifi' => false, 'pagina web' => 'https://motel.es'],
    ['precio/noche' => 65,  'ciudad' => 'Sevilla',   'wifi' => true,  'pagina web' => 'https://casa.es'],
    ['precio/noche' => 50,  'ciudad' => 'Valencia',  'wifi' => false, 'pagina web' => 'https://playa.com'],
    ['precio/noche' => 120, 'ciudad' => 'Madrid',    'wifi' => true,  'pagina web' => 'https://granvia.es'],
    ['precio/noche' => 95,  'ciudad' => 'Barcelona', 'wifi' => true,  'pagina web' => 'https://hotel.com'],
    ['precio/noche' => 70,  'ciudad' => 'Barcelona', 'wifi' => false, 'pagina web' => 'https://ramblas.com'],
    ['precio/noche' => 45,  'ciudad' => 'Sevilla',   'wifi' => false, 'pagina web' => 'https://azahar.es'],
    ['precio/noche' => 30,  'ciudad' => 'Granada',   'wifi' => false, 'pagina web' => 'https://alhambra.es'],
    ['precio/noche' => 58,  'ciudad' => 'Granada',   'wifi' => true,  'pagina web' => 'https://sierra.com'],
    ['precio/noche' => 80,  'ciudad' => 'Bilbao',    'wifi' => true,  'pagina web' => 'https://guggenheim.es'],
    ['precio/noche' => 62,  'ciudad' => 'Bilbao',    'wifi' => false, 'pagina web' => 'https://motel.es'],
    ['precio/noche' => 40,  'ciudad' => 'Málaga',    'wifi' => true,  'pagina web' => 'https://costa.com'],
    ['precio/noche' => 110, 'ciudad' => 'Málaga',    'wifi' => true,  'pagina web' => 'https://solymar.es'],
    ['precio/noche' => 55,  'ciudad' => 'Zaragoza',  'wifi' => false, 'pagina web' => 'https://pilar.es'],
    ['precio/noche' => 48,  'ciudad' => 'Zaragoza',  'wifi' => true,  'pagina web' => 'https://hotel.com'],
    ['precio/noche' => 75,  'ciudad' => 'Valencia',  'wifi' => true,  'pagina web' => 'https://playa.com'],
    ['precio/noche' => 99,  'ciudad' => 'Madrid',    'wifi' => false, 'pagina web' => 'https://retiro.com'],
    ['precio/noche' => 35,  'ciudad' => 'Sevilla',   'wifi' => true,  'pagina web' => 'https://triana.es'],
    ['precio/noche' => 68,  'ciudad' => 'Alicante',  'wifi' => true,  'pagina web' => 'https://costa.com'],
    ['precio/noche' => 52,  'ciudad' => 'Alicante',  'wifi' => false, 'pagina web' => 'https://benidorm.es'],
    ['precio/noche' => 85,  'ciudad' => 'Palma',     'wifi' => true,  'pagina web' => 'https://solymar.es'],
];
 
$buscador = isset($_REQUEST['buscador']) ? $_REQUEST['buscador'] : '';
$valor    = isset($_REQUEST['valor']) ? trim($_REQUEST['valor']) : '';
 
$error = '';
$resultados = [];
 
if ($buscador === 'precio') {
    if (!is_numeric($valor)) {
        $error = 'El precio debe ser un número.';
    } else {
        foreach ($apartamentos as $a) {
            if ($a['precio/noche'] <= $valor) {
                $resultados[] = $a;
            }
        }
    }
} elseif ($buscador === 'ciudad') {
    if ($valor === '' || is_numeric($valor)) {
        $error = 'La ciudad debe ser un texto.';
    } else {
        foreach ($apartamentos as $a) {
            if (strtolower($a['ciudad']) === strtolower($valor)) {
                $resultados[] = $a;
            }
        }
    }
} elseif ($buscador === 'wifi') {
    if ($valor !== 'si' && $valor !== 'no') {
        $error = 'Elige si o no.';
    } else {
        foreach ($apartamentos as $a) {
            if ($a['wifi'] === ($valor === 'si')) {
                $resultados[] = $a;
            }
        }
    }
} elseif ($buscador === 'web') {
    if (!filter_var($valor, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) || strpos($valor, '.') === false) {
        $error = 'Escribe un dominio válido, por ejemplo hotel.com';
    } else {
        foreach ($apartamentos as $a) {
            if (parse_url($a['pagina web'], PHP_URL_HOST) === $valor) {
                $resultados[] = $a;
            }
        }
    }
}
 
// Pro: precio medio
$media = 0;
if (count($resultados) > 0) {
    $suma = array_reduce($resultados, function ($total, $a) {
        return $total + $a['precio/noche'];
    }, 0);
    $media = $suma / count($resultados);
}
?>
<html>
    <body>
        <h1>Busca tu apartamento</h1>
 
        <form>
            <input type="hidden" name="buscador" value="precio">
            <input type="text" name="valor" placeholder="Precio máximo">
            <input type="submit" value="Buscar por precio">
        </form>
 
        <form>
            <input type="hidden" name="buscador" value="ciudad">
            <input type="text" name="valor" placeholder="Ciudad">
            <input type="submit" value="Buscar por ciudad">
        </form>
 
        <form>
            <input type="hidden" name="buscador" value="wifi">
            <select name="valor">
                <option value="si">Con wifi</option>
                <option value="no">Sin wifi</option>
            </select>
            <input type="submit" value="Buscar por wifi">
        </form>
 
        <form>
            <input type="hidden" name="buscador" value="web">
            <input type="text" name="valor" placeholder="Dominio (hotel.com)">
            <input type="submit" value="Buscar por web">
        </form>
 
        <hr>
 
        <?php if ($error !== ''): ?>
            <p><?php echo $error; ?></p>
        <?php elseif ($buscador !== '' && count($resultados) === 0): ?>
            <p>No hemos encontrado ningún apartamento.</p>
        <?php elseif (count($resultados) > 0): ?>
            <p>Hemos encontrado <?php echo count($resultados); ?> apartamento(s).</p>
            <?php foreach ($resultados as $a): ?>
                <p>
                    Apartamento en <?php echo $a['ciudad']; ?> por
                    <?php echo $a['precio/noche']; ?> € la noche,
                    <?php echo $a['wifi'] ? 'con wifi' : 'sin wifi'; ?>.
                    Más información en <?php echo $a['pagina web']; ?>
                </p>
            <?php endforeach; ?>
            <p>Precio medio: <?php echo round($media, 2); ?> € la noche.</p>
        <?php endif; ?>
    </body>
</html>
 
