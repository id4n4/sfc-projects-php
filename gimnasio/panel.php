<?php
session_start();
require 'socios.php';
require 'Socio.php';

if (!isset($_SESSION['email_socio'])) {
  header('Location: login.php');
  exit;
}

$error = '';
$nombre = '';
$email = $_SESSION['email_socio'];
$tipoCuota = '';
$mensaje = '';

foreach ($socios as $s) {
  if ($s['email'] === $email) {
    $nombre = $s['nombre'];
    $tipoCuota = $s['tipoCuota'];
    break;
  }
}

$socio = new Socio($email, $nombre, $tipoCuota);

$clasesBasicas = ['Yoga', 'Spinning', 'CrossFit'];
$clasePremium = 'Personal Training';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $clase = $_POST['clase'] ?? '';

  if (trim($clase) === '') {
    $error = 'Tienes que indicar la clase';
  } else {
    if ($clase === $clasePremium && !$socio->esPremium())
      $error = 'No puedes registrarte a esta clase, debes tener cuota premium';
    else
      $mensaje = "Te has apuntado a: " . htmlspecialchars($clase);
  }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gimnasio FitCode — Mi panel</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>

  <header>
    <h1>Gimnasio FitCode</h1>
    <p>Hola · <a href="logout.php" style="color:white;">Cerrar sesión</a></p>
  </header>

  <main>

    <!-- Esto es lo que en panel.php genera $socio->resumen() -->
    <p><?= htmlspecialchars($socio->resumen()) ?></p>

    <?php if ($error): ?>
      <p class="errores"><?= htmlspecialchars($error) ?> </p>
    <?php endif; ?>

    <!-- Este mensaje de éxito solo aparece después de enviar el formulario de abajo -->
    <?php if ($mensaje): ?>
      <p class="exito"><?= htmlspecialchars($mensaje) ?> </p>
    <?php endif; ?>

    <h2>Clases disponibles</h2>
    <ul>
      <li>Yoga</li>
      <li>Spinning</li>
      <li>CrossFit</li>
    </ul>

    <!--
      Este bloque solo se muestra si $socio->esPremium() es true.
      Para un socio con cuota "básica" (por ejemplo Luis), este <div> entero
      no aparecería en la página.
    -->
    <div class="premium">
      Clase exclusiva para socios premium: Personal training
    </div>

    <h2>Apuntarme a una clase</h2>
    <form method="post" action="panel.php">
      <label for="clase">Clase</label>
      <select id="clase" name="clase">
        <optgroup label="Básicas">
          <?php foreach ($clasesBasicas as $clase): ?>
            <option value="<?= $clase; ?>">
              <?= $clase; ?>
            </option>

          <?php endforeach; ?>
        </optgroup>
        <optgroup label="Premium">
          <option><?= htmlspecialchars($clasePremium) ?></option>
        </optgroup>
      </select>

      <button type="submit">Apuntarme</button>
    </form>

  </main>

</body>

</html>