<?php
require("includes/auth.php");
requireLogin();
?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Citas | Huella Viva</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="app-shell">
    <aside class="sidebar">
      <a class="brand" href="dashboard.php"><span class="brand-mark">HV</span><span>Huella
          <strong>Viva</strong></span></a>
      <p class="sidebar-label">Clínica</p>
      <nav class="side-nav" aria-label="Navegacion principal">
        <a class="nav-link" href="dashboard.php"><span class="nav-indicator"></span>Resumen</a>
        <a class="nav-link is-active" href="citas.php"><span class="nav-indicator"></span>Citas</a>
        <a class="nav-link" href="pacientes.php"><span class="nav-indicator"></span>Pacientes</a>
      </nav>
      <div class="sidebar-bottom">
        <div class="user-chip"><span class="avatar">LM</span><span><strong>Laura
              Martín</strong><small>Administración</small></span></div><a class="logout-link" href="logout.php">Cerrar
          sesión <span aria-hidden="true">↗</span></a>
      </div>
    </aside>
    <main class="main-area">
      <header class="topbar"><span>Jueves, 12 de junio de 2025</span><span class="clinic-status"><i></i> Clínica
          abierta</span></header>
      <section class="page-content">
        <div class="page-heading">
          <div>
            <p class="eyebrow">Organización</p>
            <h1>Agenda de citas</h1>
            <p class="muted">Consulta y gestiona las visitas de la clínica.</p>
          </div><a class="button button-primary" href="nueva-cita.php">+ Nueva cita</a>
        </div>
        <div class="toolbar">
          <div class="filter-group"><label class="sr-only" for="date-filter">Filtrar por fecha</label><input
              id="date-filter" type="date" value="2025-06-12"><label class="sr-only" for="status-filter">Filtrar por
              estado</label><select id="status-filter">
              <option>Todos los estados</option>
              <option>Confirmada</option>
              <option>Pendiente</option>
              <option>Cancelada</option>
            </select></div>
          <p class="result-count">12 citas programadas</p>
        </div>
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Fecha y hora</th>
                <th>Paciente</th>
                <th>Motivo</th>
                <th>Veterinario</th>
                <th>Estado</th>
                <th><span class="sr-only">Acciones</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="time-cell">12 jun · 09:30</td>
                <td><span class="patient-name">Nala</span><small class="table-sub">Perro · Ana Ruiz</small></td>
                <td>Revisión anual</td>
                <td>Dr. Marcos Gil</td>
                <td><span class="status status-confirmed">Confirmada</span></td>
                <td><a class="row-action" href="nueva-cita.php" aria-label="Editar cita de Nala">Editar</a></td>
              </tr>
              <tr>
                <td class="time-cell">12 jun · 10:15</td>
                <td><span class="patient-name">Miso</span><small class="table-sub">Gato · Pablo León</small></td>
                <td>Vacunación</td>
                <td>Dra. Irene Soler</td>
                <td><span class="status status-pending">Pendiente</span></td>
                <td><a class="row-action" href="nueva-cita.php" aria-label="Editar cita de Miso">Editar</a></td>
              </tr>
              <tr>
                <td class="time-cell">12 jun · 11:00</td>
                <td><span class="patient-name">Bruno</span><small class="table-sub">Perro · Eva Martín</small></td>
                <td>Consulta general</td>
                <td>Dr. Marcos Gil</td>
                <td><span class="status status-confirmed">Confirmada</span></td>
                <td><a class="row-action" href="nueva-cita.php" aria-label="Editar cita de Bruno">Editar</a></td>
              </tr>
              <tr>
                <td class="time-cell">12 jun · 11:45</td>
                <td><span class="patient-name">Lima</span><small class="table-sub">Conejo · Sara Vega</small></td>
                <td>Revisión postoperatoria</td>
                <td>Dra. Irene Soler</td>
                <td><span class="status status-pending">Pendiente</span></td>
                <td><a class="row-action" href="nueva-cita.php" aria-label="Editar cita de Lima">Editar</a></td>
              </tr>
              <tr>
                <td class="time-cell">12 jun · 12:30</td>
                <td><span class="patient-name">Toby</span><small class="table-sub">Perro · Lucía Cano</small></td>
                <td>Consulta dermatológica</td>
                <td>Dr. Marcos Gil</td>
                <td><span class="status status-cancelled">Cancelada</span></td>
                <td><a class="row-action" href="nueva-cita.php" aria-label="Editar cita de Toby">Editar</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <p class="demo-note">Datos de ejemplo · Los filtros y acciones se conectaran al implementar PHP.</p>
      </section>
    </main>
  </div>
</body>

</html>