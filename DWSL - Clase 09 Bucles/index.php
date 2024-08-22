<?php

$canciones = [
    'Nirvana - Smells Like Teen Spirit',
    'Nirvana - Come As You Are',
    'Nirvana - Lithium',
    'Nirvana - Heart-Shaped Box',
    'Nirvana - In Bloom',
    'Guns N\' Roses - Sweet Child O\' Mine',
    'Guns N\' Roses - November Rain',
    'Guns N\' Roses - Welcome to the Jungle',
    'Guns N\' Roses - Paradise City',
    'Guns N\' Roses - Patience',
    'Twenty One Pilots - Stressed Out',
    'Twenty One Pilots - Ride',
    'Twenty One Pilots - Heathens',
    'Twenty One Pilots - Chlorine',
    'Twenty One Pilots - Car Radio',
    'Led Zeppelin - Stairway to Heaven',
    'Led Zeppelin - Whole Lotta Love',
    'Led Zeppelin - Kashmir',
    'Led Zeppelin - Black Dog',
    'Led Zeppelin - Immigrant Song'
];

function obtenerCanciones($canciones, $cantidad, $desde, $hasta) {
    $rango = array_slice($canciones, $desde, $hasta - $desde + 1);
    shuffle($rango);
    $cantidad = min($cantidad, count($rango));
    return array_slice($rango, 0, $cantidad);
}

$resultados = [];

if (
    (isset($_POST['titulo1']) ? (int)$_POST['titulo1'] : 0) > 5 ||
    (isset($_POST['titulo2']) ? (int)$_POST['titulo2'] : 0) > 5 ||
    (isset($_POST['titulo3']) ? (int)$_POST['titulo3'] : 0) > 5 ||
    (isset($_POST['titulo4']) ? (int)$_POST['titulo4'] : 0) > 5 ||
    (isset($_POST['titulo1']) ? (int)$_POST['titulo1'] : 0) <= 0 ||
    (isset($_POST['titulo2']) ? (int)$_POST['titulo2'] : 0) <= 0 ||
    (isset($_POST['titulo3']) ? (int)$_POST['titulo3'] : 0) <= 0 ||
    (isset($_POST['titulo4']) ? (int)$_POST['titulo4'] : 0) <= 0
) {
    echo '<div style="text-align: center;"><p>Ha ingresado un número inválido. Debe ser mayor que 0 y menor o igual que 5.</p></div>';
} else {
    $titulo1 = isset($_POST['titulo1']) ? (int)$_POST['titulo1'] : 0;
    $titulo2 = isset($_POST['titulo2']) ? (int)$_POST['titulo2'] : 0;
    $titulo3 = isset($_POST['titulo3']) ? (int)$_POST['titulo3'] : 0;
    $titulo4 = isset($_POST['titulo4']) ? (int)$_POST['titulo4'] : 0;

    $titulo1A = obtenerCanciones($canciones, $titulo1, 0, 4);
    $titulo2A = obtenerCanciones($canciones, $titulo1, 5, 9);
    $titulo3A = obtenerCanciones($canciones, $titulo1, 10, 14);
    $titulo4A = obtenerCanciones($canciones, $titulo1, 15, 19);

    $resultados = array_merge(
        $resultados, obtenerCanciones($canciones, $titulo1, 0, 4),
        obtenerCanciones($canciones, $titulo2, 5, 9),
        obtenerCanciones($canciones, $titulo3, 10, 14),
        obtenerCanciones($canciones, $titulo4, 15, 19)
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tarea Bucles</title>
</head>
<body>
    <div class="titulo">
        <h1>Recomendación semanal de los mejores títulos</h1>
        <p>Selecciona la cantidad de canciones que quieres que te recomendemos de cada Titulo (Máximo a elegir de 5)</p>
    </div>
    <form action="index.php" method="POST">
        <div class="contenedor">
            <div class="contenedor-cards">
                <div class="card one" style="background-image: url('./img/nirvana.png')">
                    <div class="textos">
                        <h3>Titulo 1</h3>
                        <input type="text" class="input-style" name="titulo1" value="<?php echo isset($_POST['titulo1']) ? htmlspecialchars($_POST['titulo1']) : ''; ?>">
                    </div>
                </div>
                <div class="card dos" style="background-image: url('./img/gunsnroses.png')">
                    <div class="textos">
                        <h3>Titulo 2</h3>
                        <input type="text" class="input-style" name="titulo2" value="<?php echo isset($_POST['titulo2']) ? htmlspecialchars($_POST['titulo2']) : ''; ?>">
                    </div>
                </div>
                <div class="card tres" style="background-image: url('./img/21p.png')">
                    <div class="textos">
                        <h3>Titulo 3</h3>
                        <input type="text" class="input-style" name="titulo3" value="<?php echo isset($_POST['titulo3']) ? htmlspecialchars($_POST['titulo3']) : ''; ?>">
                    </div>
                </div>
                <div class="card cuatro" style="background-image: url('./img/ledzeppelin.png')">
                    <div class="textos">
                        <h3>Titulo 4</h3>
                        <input type="text" class="input-style" name="titulo4" value="<?php echo isset($_POST['titulo4']) ? htmlspecialchars($_POST['titulo4']) : ''; ?>">
                    </div>
                </div>
            </div>
            <div class="banner" style="background-image: url('./img/marco.png')">
                <h3>Recomendaciones</h3>
                <ul>
                    <?php if (isset($resultados) && !empty($resultados)): ?>
                        <?php foreach ($resultados as $resultado): ?>
                            <li><?php echo htmlspecialchars($resultado); ?></li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No hay recomendaciones para mostrar.</p>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="botones">
                <button class="btn btn-info" type="submit">Aceptar</button>
                <input type="reset" class="btn btn-success" value="Nuevo" onclick="location.href='index.php';">
            </div>
        </div>
        <div class="titulo">
            <h1>Recomendación semanal de los mejores títulos</h1>
        </div>
        <div class="recomendaciones">
            <?php
            $i = 1;
            do {
            ?>
                <div>
                    <img src="./img/disco.png" alt="Disco">
                </div>
            <?php
                $i++;
            } while ($i <= 4);
            ?> 
        </div>
    </form>
</body>
</html>