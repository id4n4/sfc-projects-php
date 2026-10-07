<?php
session_start();
require 'tecnicos.php';
require 'Tecnico.php';

if (!isset($_SESSION['email_tecnico'])) {
  header('Location: login.php');
  exit;
}

$tecnicos ??= [];

$email = $_SESSION['email_tecnico'];
$nombre = '';
$especialidad = '';
$incidencia = '';
$mensaje = '';

foreach ($tecnicos as $t) {
  if ($t['email'] === $email) {
    $nombre = $t['nombre'];
    $especialidad = $t['especialidad'];
    $incidencia = $t['incidencia'];
    break;
  }
}

$tecnico = new Tecnico($nombre, $email, $especialidad);

$mensaje = $tecnico->resumen();
