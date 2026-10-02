<?php
require("includes/auth.php");

redirectIfLoggedIn();

$error = "";
$email = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // Buscar el usuario por correo electrónico
  $usuarioEncontrado = EncontrarUsuarioPorEmail($email);

  if ($usuarioEncontrado?->verificarPassword($password)) {
    // Usuario autenticado correctamente
    if (!$usuarioEncontrado->estaActivo()) {
      $error = "Tu cuenta está desactivada. Contacta con el administrador.";
    } else {
      // Redirigir al dashboard o página principal del sistema
      $_SESSION['ID'] = $usuarioEncontrado->id;
      $_SESSION['nombre'] = $usuarioEncontrado->nombre;
      $_SESSION['rol'] = $usuarioEncontrado->rol;
      header("Location: dashboard.php");
      exit();
    }
  } else {
    // Credenciales incorrectas
    $error = "Correo electrónico o contraseña incorrectos.";
  }
}



?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Acceso al sistema de gestión veterinaria Huella Viva.">
  <title>Iniciar sesión | Huella Viva</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="login-page">
  <main class="login-layout">
    <section class="login-story" aria-label="Huella Viva">
      <a class="brand brand-light" href="index.php">
        <span class="brand-mark">HV</span><span>Huella<strong>Viva</strong></span>
      </a>
      <div class="story-copy">
        <p class="eyebrow">Centro veterinario</p>
        <h1>Cuidamos de quienes hacen hogar.</h1>
        <p>Una mirada clara a cada paciente, cada familia y cada visita.</p>
      </div>
      <p class="story-note">Atencion cercana. Cuidado para toda la vida.</p>
    </section>

    <section class="login-form-wrap" aria-labelledby="login-title">
      <div class="login-form-content">
        <p class="eyebrow">Área del equipo</p>
        <h2 id="login-title">Bienvenido de nuevo</h2>
        <p class="muted">Introduce tus datos para acceder a la clínica.</p>
        <form action="index.php" method="post" class="form-stack">
          <div class="field">
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" placeholder="nombre@clinicahuella.es" autocomplete="username"
              required>
          </div>
          <div class="field">
            <label for="password">Contraseña</label>
            <input id="password" name="password" type="password" placeholder="Tu contraseña"
              autocomplete="current-password" required>
          </div>
          <button class="button button-primary button-wide" type="submit">
            Iniciar sesión <span aria-hidden="true">→</span>
          </button>
        </form>
        <p class="form-footnote">Acceso exclusivo para personal autorizado.</p>
      </div>
      <footer class="login-footer">Huella Viva <span>·</span> Gestión veterinaria</footer>
    </section>
  </main>
</body>

</html>