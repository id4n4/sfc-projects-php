<?php
require 'config/connection.php';
require 'include/auth.php';
redirectIfLoggedIn();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $pdo = connect();
  $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
  $stmt->execute([$email]);
  $user = $stmt->fetch();

  if ($user && password_verify($password, $user['pass'])) {
    // Inicio de sesión exitoso
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['nombre'];
    header('Location: projects.php');
    exit;
  } else {
    // Credenciales inválidas
    $error = 'Correo electrónico o contraseña incorrectos.';
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f5f7fb">
  <title>Iniciar sesión | Nexo</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <main class="login-layout">
    <section class="showcase" aria-label="Presentación de Nexo">
      <a class="brand" href="#" aria-label="Nexo, inicio">
        <span class="brand-mark" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
            <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5v-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
            <path d="m5.5 7.8 6.5 3.5 6.5-3.5M12 11.5V20" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
          </svg>
        </span>
        nexo
      </a>

      <div class="showcase-copy">
        <p class="eyebrow">Todo en marcha</p>
        <h1>Los proyectos avanzan mejor en equipo.</h1>
        <p>Organiza tareas, coordina a tu equipo y ten cada entrega bajo control desde un solo lugar.</p>
      </div>

      <div class="project-preview" aria-label="Vista previa de proyectos">
        <div class="preview-heading">
          <span>Tu espacio de trabajo</span>
          <span class="preview-dots" aria-hidden="true"><span></span><span></span><span></span></span>
        </div>
        <div class="preview-row">
          <div class="preview-title">
            <span class="preview-icon" aria-hidden="true">✦</span>
            <span>Nueva identidad visual</span>
          </div>
          <span class="preview-status">En progreso</span>
        </div>
        <div class="preview-row">
          <div class="preview-title">
            <span class="preview-icon" aria-hidden="true">↗</span>
            <span>Lanzamiento de producto</span>
          </div>
          <span class="preview-status is-review">En revisión</span>
        </div>
      </div>

      <footer class="showcase-footer">Un espacio más claro para hacer grandes cosas.</footer>
    </section>

    <section class="form-side" aria-labelledby="login-title">
      <div class="login-form">
        <a class="brand mobile-brand" href="#" aria-label="Nexo, inicio">
          <span class="brand-mark" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
              <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5v-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
              <path d="m5.5 7.8 6.5 3.5 6.5-3.5M12 11.5V20" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
            </svg>
          </span>
          nexo
        </a>
        <p class="form-kicker">Bienvenido de nuevo</p>
        <h2 id="login-title">Inicia sesión</h2>
        <p class="form-intro">Accede a tu espacio de trabajo y sigue avanzando con tu equipo.</p>

        <?php if ($error) : ?>
          <div class="error-message" role="alert">
            <?php echo htmlspecialchars($error); ?>
          </div>
        <?php endif; ?>

        <form action="" method="post">
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
                placeholder="Introduce tu contraseña"
                autocomplete="current-password"
                required>
              <button class="toggle-password" type="button" aria-controls="password" aria-pressed="false">Mostrar</button>
            </div>
          </div>

          <button class="submit-button" type="submit">Entrar a mi cuenta</button>
        </form>

        <p class="signup">¿Aún no tienes cuenta? <a href="signup.php">Regístrate</a></p>
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