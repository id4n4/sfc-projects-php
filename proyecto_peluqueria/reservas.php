<?php
session_start();
require 'clientes.php';
require 'Cliente.php';

if (!isset($_SESSION['email_cliente'])) {
    header('Location: login.php');
    exit;
}

$error = '';
$nombre = '';
$email = $_SESSION['email_cliente'];
$mensaje = '';
$citas = [];

foreach ($clientes as $c) {
    if ($c['email'] === $email) {
        $nombre = $c['nombre'];
        break;
    }
}

$cliente = new Cliente($email, $nombre);

$tipoServicios =
    [
        'corte' => 'Corte y peinado',
        'color' => 'Coloración',
        'balayage' => 'Balayage',
        'tratamiento' => 'Tratamiento capilar'
    ];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicio = $_POST['servicio'] ?? '';
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $notas = $_POST['notas'] ?? '';

    if (trim($servicio) === '' || trim($fecha) === '' || trim($hora) === '') {
        $error = 'Todos los campos con (*) son obligatorios.';
    } else {
        $citas[] = [
            'servicio' => $servicio,
            'fecha' => $fecha,
            'hora' => $hora,
            'notas' => $notas
        ];
        $mensaje = 'Reserva solicitada con éxito.';
    }
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Panel privado de reservas de Atelier Hair">
    <title>Mis reservas | Atelier Hair</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="site-header">
        <a class="brand" href="reservas.html">Atelier <span>Hair</span></a>
        <nav aria-label="Navegación principal">
            <a href="logout.php">Cerrar sesión</a>
        </nav>
    </header>

    <main class="dashboard">
        <section class="dashboard-heading">
            <div>
                <h1>Tu espacio personal</h1>
                <p>Hola,
                    <?= htmlspecialchars($nombre) ?>. Reserva tu próxima visita y mantén tus citas bajo control.
                </p>
            </div>
        </section>

        <div class="dashboard-grid">
            <section class="panel" aria-labelledby="nueva-reserva">
                <h2 id="nueva-reserva">Nueva reserva</h2>
                <?php if ($error): ?>
                    <span class="error">
                        <?= htmlspecialchars($error) ?>
                    </span>
                <?php endif; ?>
                <?php if ($mensaje): ?>
                    <span class="success">
                        <?= htmlspecialchars($mensaje) ?>
                    </span>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="servicio">Servicio *</label>
                        <select id="servicio" name="servicio" required>
                            <option value="">Selecciona un servicio</option>
                            <?php foreach ($tipoServicios as $valor => $nombreServicio): ?>
                                <option value="<?= htmlspecialchars($valor) ?>">
                                    <?= htmlspecialchars($nombreServicio) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="fecha">Fecha *</label>
                            <input type="date" id="fecha" name="fecha" required>
                        </div>
                        <div class="form-group">
                            <label for="hora">Hora *</label>
                            <input type="time" id="hora" name="hora" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="notas">Notas</label>
                        <textarea id="notas" name="notas"
                            placeholder="Cuéntanos cualquier detalle importante"></textarea>
                    </div>

                    <button type="submit">Solicitar reserva</button>
                </form>
            </section>

            <aside class="summary-card" aria-labelledby="proxima-cita">
                <h3 id="proxima-cita">Próxima cita</h3>
                <?php foreach ($citas as $cita): ?>
                    <p><strong>
                            <?= htmlspecialchars($tipoServicios[$cita['servicio']]) ?>
                        </strong><br>
                        <?= htmlspecialchars($cita['fecha']) ?><br>
                        <?= htmlspecialchars($cita['hora']) ?> <br>
                        <?= htmlspecialchars($cita['notas']) ?>
                    </p>
                    <span class="status">Confirmada</span>
                <?php endforeach; ?>
            </aside>
        </div>
    </main>
</body>

</html>