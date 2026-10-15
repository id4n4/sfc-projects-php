<?php
// Página índice: lista los ejercicios y sus soluciones para abrirlos en el navegador
$ficheros = array_map('basename', glob(__DIR__ . '/soluciones/*.php'));
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mini ejercicios PHP</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 760px; margin: 32px auto; padding: 0 16px; font-size: 18px; }
        li { margin: 10px 0; }
        a { color: #2457a6; }
    </style>
</head>
<body>
<h1>Mini ejercicios de PHP orientado a objetos</h1>
<ol>
    <?php foreach ($ficheros as $f): ?>
        <li>
            <?= ucfirst(str_replace(['_', '.php'], [' ', ''], substr($f, 3))) ?> ·
            <a href="ejercicios/<?= $f ?>">ejercicio</a> ·
            <a href="soluciones/<?= $f ?>">solución</a>
        </li>
    <?php endforeach; ?>
</ol>
</body>
</html>
