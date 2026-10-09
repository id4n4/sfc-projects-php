<?php
require './include/auth.php';
require './config/connection.php';

redirectIfLoggedIn();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $nombre = $_POST['nombre'];
  $dni = $_POST['dni'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Verificar si el correo electrónico ya está registrado
  $pdo = connect();
  $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
  $stmt->execute([$email]);
  if ($stmt->rowCount() > 0) {
    $error = 'El correo electrónico ya está registrado.';
  } else {
    // Insertar el nuevo usuario en la base de datos
    try {
      //code...
      $stmt = $pdo->prepare('INSERT INTO usuario (nombre, dni, email, pass) VALUES (?, ?, ?, ?)');
      $stmt->execute([$nombre, $dni, $email, $password]);
      header('Location: index.php');
      exit;
    } catch (PDOException $e) {
      //throw $th;
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
  <meta name="theme-color" content="#f5f7fb">
  <title>Crear cuenta | Nexo</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <main class="login-layout">
    <section class="showcase" aria-label="Presentación de Nexo">
      <a class="brand" href="index.php" aria-label="Nexo, inicio">
        <span class="brand-mark" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
            <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5v-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
            <path d="m5.5 7.8 6.5 3.5 6.5-3.5M12 11.5V20" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
          </svg>
        </span>
        nexo
      </a>

      <div class="showcase-copy">
        <p class="eyebrow">Empieza hoy</p>
        <h1>Un equipo coordinado llega más lejos.</h1>
        <p>Crea tu cuenta y reúne proyectos, tareas y personas en un solo espacio de trabajo.</p>
      </div>

      <div class="project-preview" aria-label="Ventajas de Nexo">
        <div class="preview-heading">
          <span>Con Nexo puedes</span>
          <span class="preview-dots" aria-hidden="true"><span></span><span></span><span></span></span>
        </div>
        <div class="preview-row">
          <div class="preview-title">
            <span class="preview-icon" aria-hidden="true">✓</span>
            <span>Organizar tus proyectos</span>
          </div>
          <span class="preview-status">En equipo</span>
        </div>
        <div class="preview-row">
          <div class="preview-title">
            <span class="preview-icon" aria-hidden="true">↗</span>
            <span>Seguir cada entrega</span>
          </div>
          <span class="preview-status is-review">Al día</span>
        </div>
      </div>

      <footer class="showcase-footer">Un espacio más claro para hacer grandes cosas.</footer>
    </section>

    <section class="form-side" aria-labelledby="register-title">
      <div class="login-form">
        <a class="brand mobile-brand" href="index.php" aria-label="Nexo, inicio">
          <span class="brand-mark" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
              <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5v-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
              <path d="m5.5 7.8 6.5 3.5 6.5-3.5M12 11.5V20" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
            </svg>
          </span>
          nexo
        </a>
        <p class="form-kicker">Tu espacio de trabajo</p>
        <h2 id="register-title">Crea tu cuenta</h2>
        <p class="form-intro">Completa tus datos para empezar a gestionar tus proyectos con Nexo.</p>

        <?php if ($error) : ?>
          <div class="error-message" role="alert">
            <?php echo htmlspecialchars($error); ?>
          </div>
        <?php endif; ?>

        <form action="" method="post">
          <div class="field">
            <label for="nombre">Nombre</label>
            <input
              type="text"
              id="nombre"
              name="nombre"
              placeholder="Tu nombre completo"
              autocomplete="name"
              required>
          </div>
          <div class="field">
            <label for="dni">DNI/NIE</label>
            <input
              type="text"
              id="dni"
              name="dni"
              placeholder="Introduce tu DNI/NIE"
              autocomplete="off"
              style="text-transform: uppercase;"
              required>
          </div>

          <div class="field">
            <label for="email">Correo electrónico</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="nombre@empresa.com"
              autocomplete="email"
              required>
          </div>


          <div class="field">
            <label for="password">Contraseña</label>
            <div class="password-wrap">
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Crea una contraseña"
                autocomplete="new-password"
                required>
              <button class="toggle-password" type="button" aria-controls="password" aria-pressed="false">Mostrar</button>
            </div>
          </div>

          <button class="submit-button" type="submit">Crear cuenta</button>
        </form>

        <p class="signup">¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
      </div>
    </section>
  </main>
  <script>
    const passwordInput = document.querySelector("#password");
    const togglePassword = document.querySelector(".toggle-password");

    togglePassword.addEventListener("click", () => {
      const isVisible = passwordInput.type === "text";
      passwordInput.type = isVisible ? "password" : "text";
      togglePassword.textContent = isVisible ? "Mostrar" : "Ocultar";
      togglePassword.setAttribute("aria-pressed", String(!isVisible));
    });
  </script>
</body>

</html>