<?php
require __DIR__ . '/include/auth.php';
require __DIR__ . '/config/connection.php';

requireLogin();

$pdo = connect();
$error = '';
$userId = $_SESSION['user_id'];
$userName = $_SESSION['user_name'] ?? 'Usuario';
$projects = [];
$projectName = '';
$projectClient = '';
$projectDescription = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $projectName = $_POST['nombre'];
  $projectClient = $_POST['cliente'];
  $projectDescription = $_POST['descripcion'];

  try {
    $stmt = $pdo->prepare('INSERT INTO proyecto (id_usuario, nombre, cliente, descripcion) VALUE (?, ?, ?, ?)');
    $stmt->execute([$userId, $projectName, $projectClient, $projectDescription]);
    header('location: projects.php');
    exit;
  } catch (PDOException $e) {
    $error = $e->getMessage();
  }
}


$stmt = $pdo->prepare("SELECT 
    p.*,
    CASE
        WHEN COUNT(t.id) = 0 THEN 'pendiente'
        WHEN SUM(
            CURDATE() BETWEEN t.fecha_inicio AND t.fecha_fin
        ) > 0 THEN 'en progreso'
        WHEN SUM(
            CURDATE() < t.fecha_inicio
        ) > 0 THEN 'pendiente'
        ELSE 'cerrada'
    END AS estado
    FROM proyecto p
    LEFT JOIN tarea t 
        ON t.id_proyecto = p.id
    WHERE p.id_usuario = ?
    GROUP BY p.id
    ORDER BY p.creado_en DESC
    ");
$stmt->execute([$userId]);
$projects = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f5f7fb">
  <title>Mis proyectos | Nexo</title>
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
      <span class="project-user"><?= htmlspecialchars($userName) ?></span>
      <a class="logout-button" href="logout.php">Cerrar sesión</a>
    </div>
  </header>

  <main class="dashboard">
    <section class="dashboard-heading" aria-labelledby="page-title">
      <div>
        <p class="form-kicker">Tu espacio de trabajo</p>
        <h1 id="page-title">Mis proyectos</h1>
        <p class="dashboard-intro">Organiza tus proyectos y mantén cada entrega bajo control.</p>
      </div>
    </section>

    <?php if (isset($_GET['created'])) : ?>
      <div class="success-message" role="status">El proyecto se ha creado correctamente.</div>
    <?php endif; ?>

    <?php if ($error !== '') : ?>
      <div class="error-message" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="dashboard-grid">
      <section class="project-list-section" aria-labelledby="projects-title">
        <div class="section-heading">
          <div>
            <h2 id="projects-title">Tus proyectos</h2>
            <p>Consulta el estado y los detalles de cada uno.</p>
          </div>
        </div>

        <?php if ($projects === []) : ?>
          <div class="empty-projects">
            <span class="empty-projects-icon" aria-hidden="true">◇</span>
            <h3>Aún no tienes proyectos</h3>
            <p>Crea tu primer proyecto con el formulario para empezar.</p>
          </div>
        <?php else : ?>
          <div class="project-cards">
            <?php foreach ($projects as $project) : ?>
              <?php
              $estado = $project['estado'];
              $estadoClass = $estado === 'en progreso' ? 'is-progress' : ($estado === 'cerrada' ? 'is-closed' : 'is-pending');
              ?>
              <article class="project-card">
                <div class="project-card-heading">
                  <h3><?= htmlspecialchars($project['nombre']) ?></h3>
                  <span class="project-state <?php echo $estadoClass; ?>">
                    <?= htmlspecialchars($estados[$estado] ?? $estado); ?>
                  </span>
                </div>
                <p class="project-client">Cliente: <strong><?= htmlspecialchars($project['cliente']) ?></strong></p>
                <?php if (!empty($project['descripcion'])) : ?>
                  <p class="project-description"><?= nl2br(htmlspecialchars($project['descripcion'])) ?></p>
                <?php else : ?>
                  <p class="project-description is-muted">Sin descripción.</p>
                <?php endif; ?>
                <p class="project-date">Creado el <?= htmlspecialchars(date('d/m/Y', strtotime($project['creado_en']))) ?></p>
                <a href="task.php?id-project=<?= htmlspecialchars($project['id']) ?>">Ir a las tareas</a>
              </article>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>

      <section class="create-project-section" aria-labelledby="create-project-title">
        <div class="section-heading">
          <div>
            <h2 id="create-project-title">Crear proyecto</h2>
            <p>Añade un proyecto a tu espacio de trabajo.</p>
          </div>
        </div>

        <form action="projects.php" method="post" class="create-project-form">

          <div class="field">
            <label for="nombre">Nombre del proyecto</label>
            <input
              type="text"
              id="nombre"
              name="nombre"
              maxlength="100"
              placeholder="Ej. Rediseño de marca"
              value="<?= htmlspecialchars($projectName) ?>"
              required>
          </div>

          <div class="field">
            <label for="cliente">Cliente</label>
            <input
              type="text"
              id="cliente"
              name="cliente"
              maxlength="100"
              placeholder="Nombre del cliente"
              value="<?= htmlspecialchars($projectClient) ?>"
              required>
          </div>

          <div class="field">
            <label for="descripcion">Descripción <span class="optional-label">(opcional)</span></label>
            <textarea
              id="descripcion"
              name="descripcion"
              rows="5"
              placeholder="Describe brevemente los objetivos del proyecto"><?= htmlspecialchars($projectDescription) ?></textarea>
          </div>

          <button class="submit-button" type="submit">Crear proyecto</button>
        </form>
      </section>
    </div>
  </main>
</body>

</html>