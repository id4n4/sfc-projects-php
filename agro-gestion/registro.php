<?php
require("./config/conexion.php");
require("./includes/auth.php");

redirectIfLoggedIn();

$error = "";
$is_registered = false;
$name = "";
$email = "";
$terms_accepted = false;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $password_confirm = $_POST['password_confirmation'] ?? '';
  $terms_accepted = isset($_POST['terms']);

  if ($password != $password_confirm) {
    $error = 'Las contraseñas no coinciden';
  } else {
    try {
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
      $pdo = connect();
      $stmt = $pdo->prepare('INSERT INTO usuario (nombre, email, pass) values (?,?,?) ');
      $stmt->execute([$name, $email, $password_hash]);
      $is_registered = true;
      $name = "";
      $email = "";
      $terms_accepted = false;
    } catch (PDOException $e) {
      $error = $e->getMessage();
    }

  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Crea tu cuenta en AgroGestión y empieza a organizar tu operación agrícola.">
  <title>Crear cuenta | AgroGestión</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body class="auth-page">
  <main class="auth-shell">
    <section class="brand-panel brand-panel-register" aria-label="AgroGestión">
      <a class="brand" href="index.php" aria-label="AgroGestión, inicio">
        <span class="brand-mark" aria-hidden="true">+</span>
        <span>Agro<span>Gestión</span></span>
      </a>
      <div class="brand-message">
        <p class="eyebrow">Un mejor día empieza aquí</p>
        <h1>Haz crecer tu operación con <em>más control.</em></h1>
        <p class="brand-copy">Centraliza la información de tu campo y convierte cada jornada en una oportunidad para
          avanzar.</p>
      </div>
      <div class="field-note" aria-hidden="true">
        <span class="field-note-line"></span>
        <span>Tu campo. Tu equipo. Tu ritmo.</span>
      </div>
    </section>

    <section class="form-panel">
      <div class="form-wrap register-wrap">
        <div class="mobile-brand">
          <a class="brand" href="index.php" aria-label="AgroGestión, inicio">
            <span class="brand-mark" aria-hidden="true">+</span>
            <span>Agro<span>Gestión</span></span>
          </a>
        </div>
        <div class="form-heading">
          <p class="eyebrow">Empieza hoy</p>
          <h2>Crea tu cuenta</h2>
          <p>Configura tu espacio de trabajo en pocos pasos.</p>
        </div>

        <form class="auth-form" action="registro.php" method="post">
          <?php if ($is_registered): ?>
            <span class="form-message form-message--success" role="status">Usuario registrado exitosamente</span>
          <?php elseif ($error): ?>
            <span class="form-message form-message--error" role="alert"><?= htmlspecialchars($error) ?></span>
          <?php endif; ?>
          <div class="field-group">
            <label for="name">Nombre completo</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"
              placeholder="Tu nombre" autocomplete="name" required>
          </div>
          <div class="field-group">
            <label for="register-email">Correo electrónico</label>
            <input type="email" id="register-email" name="email"
              value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>" placeholder="nombre@empresa.com"
              autocomplete="email" required>
          </div>
          <div class="form-grid">
            <div class="field-group">
              <label for="register-password">Contraseña</label>
              <input type="password" id="register-password" name="password" placeholder="Mínimo 8 caracteres"
                minlength="8" autocomplete="new-password" required>
            </div>
            <div class="field-group">
              <label for="password-confirmation">Confirmar contraseña</label>
              <input type="password" id="password-confirmation" name="password_confirmation"
                placeholder="Repite tu contraseña" minlength="8" autocomplete="new-password" required>
            </div>
          </div>
          <label class="check-row terms-row">
            <input type="checkbox" name="terms" required <?= $terms_accepted ? 'checked' : '' ?>>
            <span>Acepto los <a href="#" class="text-link">términos de uso</a> y la <a href="#"
                class="text-link">política de privacidad</a>.</span>
          </label>
          <button class="primary-button" type="submit">Crear mi cuenta <span aria-hidden="true">→</span></button>
        </form>

        <p class="form-footer">¿Ya tienes una cuenta? <a href="index.php" class="text-link">Inicia sesión</a></p>
      </div>
      <p class="legal-note">Tus datos están protegidos y solo serán usados para gestionar tu cuenta.</p>
    </section>
  </main>
</body>

</html>