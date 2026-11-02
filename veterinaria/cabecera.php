<?php
require_once 'config/conexion.php';
?>

<!DOCTYPE html>
<!-- Maqueta estática: conviértela en index.php. Portada. Los tres números y la lista de mascotas salen de la base de datos. -->
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($titulo ?? 'Veterinaria') ?> · Clínica veterinaria Patitas</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
  <header>
    <h1>🐾 Clínica veterinaria Patitas</h1>
    <nav>
      <a href="index.php">Inicio</a>
      <a href="mascotas.php">Mascotas</a>
      <a href="clientes.php">Clientes</a>
      <a href="visitas.php">Visitas</a>
    </nav>
  </header>
  <main>