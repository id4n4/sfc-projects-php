<?php
// cabecera.php · Parte común de arriba de todas las páginas
// Antes de incluirla, cada página define $titulo y $pagina
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($titulo) ?> · Control de calidad</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
  <header>
    <h1>✔ Control de calidad</h1>
    <nav>
      <a href="index.php" class="<?= $pagina === 'panel' ? 'activo' : '' ?>">Panel</a>
      <a href="inspecciones.php" class="<?= $pagina === 'inspecciones' ? 'activo' : '' ?>">Inspecciones</a>
      <a href="productos.php" class="<?= $pagina === 'productos' ? 'activo' : '' ?>">Productos</a>
      <a href="inspectores.php" class="<?= $pagina === 'inspectores' ? 'activo' : '' ?>">Inspectores</a>
    </nav>
  </header>
  <main>