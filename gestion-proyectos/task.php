<?php
require __DIR__ . '/include/auth.php';
require __DIR__ . '/config/connection.php';

requireLogin();

$pdo = connect();
$error = '';
$projectId = $_GET['id-project'] ?? $_POST['id-project'] ?? '';
$userName = $_SESSION['user_name'] ?? 'Usuario';
$taskName = '';
$taskDescription = '';
$taskStartDate = '';
$taskEndDate = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    $deleteId = $_POST['delete_id'];
    if ($deleteId) {
      $stmt = $pdo->prepare('DELETE FROM tarea WHERE id = ?');
      $stmt->execute([$deleteId]);
    } else {
      $taskName = $_POST['nombre'];
      $taskDescription = $_POST['descripcion'];
      $taskStartDate = $_POST['fecha_inicio'];
      $taskEndDate = $_POST['fecha_fin'];

      $stmt = $pdo->prepare('INSERT INTO tarea (id_proyecto, nombre, descripcion, fecha_inicio, fecha_fin) VALUE (?, ?, ?, ?, ?)');
      $stmt->execute([$projectId, $taskName, $taskDescription, $taskStartDate, $taskEndDate]);
    }
    header('Location: task.php?' . http_build_query(['id-project' => $projectId]));
    exit;
  } catch (PDOException $e) {
    $error = $e->getMessage();
  }
}


$stmt = $pdo->prepare("SELECT 
    *,
    CASE
        WHEN CURDATE() BETWEEN fecha_inicio AND fecha_fin THEN 'en progreso'
        WHEN CURDATE() < fecha_inicio THEN 'pendiente'
        ELSE 'cerrada'
    END AS estado
    FROM tarea
    WHERE id_proyecto = ?
    ORDER BY creado_en DESC
    ");
$stmt->execute([$projectId]);
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f5f7fb">
  <title>Tareas del proyecto | Nexo</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body class="project-page">
  <header class="project-nav">
    <a class="brand project-brand" href="projects.php" aria-label="Nexo, proyectos">
      <span class="brand-mark" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
          <path d="M5 7.5 12 4l7 3.5v9L12 20l-7-3.5v-9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
          <path d="m5.5 7.8 6.5 3.5 6.5-3.5M12 11.5V20" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
        </svg>
      </span>
      nexo
    </a>
    <div class="project-nav-right">
      <span class="project-user">Usuario</span>
      <a class="logout-button" href="logout.php">Cerrar sesión</a>
    </div>
  </header>

  <main class="dashboard">
    <section class="dashboard-heading" aria-labelledby="page-title">
      <div>
        <p class="form-kicker">Proyecto</p>
        <h1 id="page-title">Tareas</h1>
        <p class="dashboard-intro">Re-diseño de marca · Consulta y organiza el trabajo pendiente.</p>
      </div>
      <a class="logout-button" href="projects.php">Volver a proyectos</a>
    </section>

    <div class="dashboard-grid">
      <section class="project-list-section" aria-labelledby="tasks-title">
        <div class="section-heading">
          <div>
            <h2 id="tasks-title">Tareas del proyecto</h2>
            <p>Estas son las tareas asociadas al proyecto.</p>
          </div>
          <select class="status-select" name="" id="statusSelected">
            <option value="">Todos</option>
            <option value="pendiente">Pendiente</option>
            <option value="en progreso">En progreso</option>
            <option value="cerrada">Cerrada</option>
          </select>
        </div>

        <div class="project-cards" id="project-cards">
        </div>
      </section>

      <section class="create-project-section" aria-labelledby="create-task-title">
        <div class="section-heading">
          <div>
            <h2 id="create-task-title">Crear tarea</h2>
            <p>Añade una tarea nueva a este proyecto.</p>
          </div>
        </div>

        <?php if ($error !== '') : ?>
          <div class="error-message" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="task.php?id-project=<?= rawurlencode((string) $projectId) ?>" method="post" class="create-project-form">
          <div class="field">
            <label for="nombre">Nombre</label>
            <input
              type="text"
              id="nombre"
              name="nombre"
              maxlength="150"
              placeholder="Ej. Preparar presentación"
              value="<?= htmlspecialchars($taskName) ?>"
              required>
          </div>

          <div class="field">
            <label for="descripcion">Descripción</label>
            <textarea
              id="descripcion"
              name="descripcion"
              rows="5"
              placeholder="Describe qué hay que hacer"><?= htmlspecialchars($taskDescription) ?></textarea>
          </div>

          <div class="field">
            <label for="fecha_inicio">Fecha de inicio</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?= htmlspecialchars($taskStartDate) ?>" required>
          </div>

          <div class="field">
            <label for="fecha_fin">Fecha fin</label>
            <input type="date" id="fecha_fin" name="fecha_fin" value="<?= htmlspecialchars($taskEndDate) ?>" required>
          </div>

          <button class="submit-button" type="submit" name="create_task" value="1">Crear tarea</button>
        </form>
      </section>
    </div>
  </main>
  <script>
    const tasks = <?= json_encode($tasks) ?>
  </script>
  <script src="include/task.js"></script>
</body>

</html>