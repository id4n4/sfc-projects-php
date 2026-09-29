<?php
require("./config/conexion.php");
require("./includes/auth.php");

redirectIfLoggedIn();

$error = "";
$email = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  try {
    //code...
    $pdo = connect();
    $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (password_verify($password, $user['pass'])) {
      $_SESSION['userId'] = $user['id'];
      $_SESSION['userType'] = $user['rol'];
      $_SESSION['userName'] = $user['nombre'];
      header('location: index.php');
      exit();

    } else {
      $error = 'Contraseña incorrecta';
    }
  } catch (PDOException $e) {
    //throw $th;
    $error = $e->getMessage();
  }

}


?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Acceso a AgroGestión, la plataforma para organizar y controlar tu operación agrícola.">
  <title>Ingresar | AgroGestión</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>

<body class="auth-page">
  <main class="auth-shell">
    <section class="brand-panel" aria-label="AgroGestión">
      <a class="brand" href="index.php" aria-label="AgroGestión, inicio">
        <span class="brand-mark" aria-hidden="true">+</span>
        <span>Agro<span>Gestión</span></span>
      </a>

      <div class="brand-message">
        <p class="eyebrow">Tu operación, en una sola cosecha</p>
        <h1>Decisiones claras para <em>campos que crecen.</em></h1>
        <p class="brand-copy">Organiza actividades, equipos y cultivos desde un mismo lugar. Menos vueltas, más tiempo
          para lo que importa.</p>
      </div>

      <div class="field-note" aria-hidden="true">
        <span class="field-note-line"></span>
        <span>Gestión simple · Resultados reales</span>
      </div>
    </section>

    <section class="form-panel">
      <div class="form-wrap">
        <div class="mobile-brand">
          <a class="brand" href="index.php" aria-label="AgroGestión, inicio">
            <span class="brand-mark" aria-hidden="true">+</span>
            <span>Agro<span>Gestión</span></span>
          </a>
        </div>
        <div class="form-heading">
          <p class="eyebrow">Bienvenido de vuelta</p>
          <h2>Ingresa a tu cuenta</h2>
          <p>Consulta el estado de tu operación agrícola.</p>
        </div>

        <form class="auth-form" action="index.php" method="post">
          <?php if ($error): ?>
            <span class="form-message form-message--error" role="alert"><?= htmlspecialchars($error) ?></span>
          <?php endif; ?>
          <div class="field-group">
            <label for="email">Correo electrónico</label>
            <input type="email" id="email" name="email" placeholder="nombre@empresa.com" autocomplete="email" required
              value="<?= htmlspecialchars($email) ?>">
          </div>
          <div class="field-group">
            <div class="label-row">
              <label for="password">Contraseña</label>
            </div>
            <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña"
              autocomplete="current-password" required>
          </div>
          <label class="check-row">
            <input type="checkbox" name="remember">
            <span>Recordar mi sesión</span>
          </label>
          <button class="primary-button" type="submit">Ingresar a AgroGestión <span aria-hidden="true">→</span></button>
        </form>

        <p class="form-footer">¿Aún no tienes una cuenta? <a href="registro.php" class="text-link">Crea tu cuenta</a>
        </p>
      </div>
      <p class="legal-note">Al continuar, aceptas nuestros <a href="#">términos de uso</a> y <a href="#">política de
          privacidad</a>.</p>
    </section>
  </main>
</body>

</html>