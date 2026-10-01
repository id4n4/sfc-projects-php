<?php
session_start();
require 'clientes.php';

if (isset($_SESSION['email_cliente'])) {
    header('Location: reservas.php');
    exit;
}

$error = '';
$email = '';
$clave = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $clave = $_POST['clave'] ?? '';

    $clienteEncontrado = null;
    foreach ($clientes as $c) {
        if ($c['email'] === $email) {
            $clienteEncontrado = $c;
            break;
        }
    }

    if ($clienteEncontrado && password_verify($clave, $clienteEncontrado['clave'])) {
        $_SESSION['email_cliente'] = $email;
        header('Location: reservas.php');
        exit;
    } else {
        $error = 'Email o contraseña incorrectos.';
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Acceso a tu espacio de reservas de peluquería">
    <title>Acceder | Atelier Hair</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="auth-page">
    <main class="auth-card">
        <a class="brand" href="index.html">Atelier <span>Hair</span></a>
        <h1>Bienvenida de nuevo</h1>
        <p class="intro">Accede a tu cuenta para gestionar tus próximas citas.</p>

        <?php if ($error): ?>
            <p class="error">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="tu@email.com" autocomplete="email" required>
            </div>

            <div class="form-group">
                <label for="clave">Contraseña</label>
                <input type="password" id="clave" name="clave" placeholder="Introduce tu contraseña"
                    autocomplete="current-password" required>
            </div>

            <button type="submit">Iniciar sesión</button>
        </form>

        <!-- <p class="form-footer">¿Aún no tienes cuenta? <a href="registro.html">Crear cuenta</a></p> -->
    </main>
</body>

</html>