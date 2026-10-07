<?php
session_start();
require 'tecnicos.php';

if (isset($_SESSION['email_tecnico'])) {
  header('Location: incidencias.php');
  exit;
}

$tecnicos ??= [];

$error = '';
$email = '';
$clave = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'] ?? '';
  $clave = $_POST['clave'] ?? '';

  $tecnicoEncontrado = null;
  foreach ($tecnicos as $t) {
    if ($t['email'] === $email) {
      $tecnicoEncontrado = $t;
      break;
    }
  }

  if ($tecnicoEncontrado && password_verify($clave, $tecnicoEncontrado['clave'])) {
    $_SESSION['email_tecnico'] = $email;
    header('Location: incidencias.php');
    exit;
  } else {
    $error = 'Email o contraseña incorrectos.';
  }
}
