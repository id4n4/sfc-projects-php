<?php
require("includes/auth.php");
requireLogin();
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resumen | Huella Viva</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="app-shell">
    <aside class="sidebar">
      <a class="brand" href="dashboard.php"><span class="brand-mark">HV</span><span>Huella
          <strong>Viva</strong></span></a>
      <p class="sidebar-label">Clínica</p>
      <nav class="side-nav" aria-label="Navegacion principal">
        <a class="nav-link is-active" href="dashboard.php"><span class="nav-indicator"></span>Resumen</a>
        <a class="nav-link" href="citas.php"><span class="nav-indicator"></span>Citas</a>
        <a class="nav-link" href="pacientes.php"><span class="nav-indicator"></span>Pacientes</a>
      </nav>
      <div class="sidebar-bottom">
        <div class="user-chip"><span class="avatar">LM</span><span><strong>Laura
              Martín</strong><small>Administración</small></span></div>
        <a class="logout-link" href="logout.php">Cerrar sesión <span aria-hidden="true">↗</span></a>
      </div>
    </aside>

    <main class="main-area">
      <header class="topbar"><span>Jueves, 12 de junio de 2025</span><span class="clinic-status"><i></i> Clínica
          abierta</span></header>
      <section class="page-content">
        <div class="page-heading">
          <div>
            <p class="eyebrow">Tu jornada</p>
            <h1>Buenos días, Laura</h1>
            <p class="muted">Esto es lo que ocurre hoy en la clínica.</p>
          </div>
          <a class="button button-primary" href="nueva-cita.php">+ Nueva cita</a>
        </div>

        <section class="metric-grid" aria-label="Resumen de actividad">
          <article class="metric"><span class="metric-label">Citas de hoy</span><strong>12</strong><span
              class="metric-note">3 pendientes de confirmar</span></article>
          <article class="metric"><span class="metric-label">Pacientes registrados</span><strong>248</strong><span
              class="metric-note">8 incorporados este mes</span></article>
          <article class="metric"><span class="metric-label">Próxima cita</span><strong
              class="metric-time">09:30</strong><span class="metric-note">Nala · Revisión anual</span></article>
        </section>

        <section class="content-section" aria-labelledby="today-title">
          <div class="section-heading">
            <div>
              <p class="eyebrow">Agenda</p>
              <h2 id="today-title">Citas de hoy</h2>
            </div><a class="text-link" href="citas.php">Ver agenda completa <span aria-hidden="true">→</span></a>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Hora</th>
                  <th>Paciente</th>
                  <th>Motivo</th>
                  <th>Veterinario</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="time-cell">09:30</td>
                  <td><span class="patient-name">Nala</span><small class="table-sub">Perro · Ana Ruiz</small></td>
                  <td>Revisión anual</td>
                  <td>Dr. Marcos Gil</td>
                  <td><span class="status status-confirmed">Confirmada</span></td>
                </tr>
                <tr>
                  <td class="time-cell">10:15</td>
                  <td><span class="patient-name">Miso</span><small class="table-sub">Gato · Pablo León</small></td>
                  <td>Vacunación</td>
                  <td>Dra. Irene Soler</td>
                  <td><span class="status status-pending">Pendiente</span></td>
                </tr>
                <tr>
                  <td class="time-cell">11:00</td>
                  <td><span class="patient-name">Bruno</span><small class="table-sub">Perro · Eva Martín</small></td>
                  <td>Consulta general</td>
                  <td>Dr. Marcos Gil</td>
                  <td><span class="status status-confirmed">Confirmada</span></td>
                </tr>
                <tr>
                  <td class="time-cell">11:45</td>
                  <td><span class="patient-name">Lima</span><small class="table-sub">Conejo · Sara Vega</small></td>
                  <td>Revisión postoperatoria</td>
                  <td>Dra. Irene Soler</td>
                  <td><span class="status status-pending">Pendiente</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section class="dashboard-bottom">
          <div class="notice-panel"><span class="notice-mark">!</span>
            <div><strong>Recordatorio de equipo</strong>
              <p>La reunión semanal está prevista para hoy a las 14:00.</p>
            </div>
          </div>
          <a class="quick-link" href="nuevo-paciente.php"><span><strong>Registrar paciente</strong><small>Añade una
                nueva ficha a la clínica</small></span><span aria-hidden="true">→</span></a>
        </section>
      </section>
    </main>
  </div>
</body>

</html>