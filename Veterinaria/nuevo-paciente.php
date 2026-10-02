<?php
require("includes/auth.php");
requireLogin();
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nuevo paciente | Huella Viva</title>
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
        <a class="nav-link" href="citas.php"><span class="nav-indicator"></span>Citas</a>
        <a class="nav-link is-active" href="pacientes.php"><span class="nav-indicator"></span>Pacientes</a>
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
      <section class="page-content form-page">
        <a class="back-link" href="pacientes.php">← Volver a pacientes</a>
        <div class="page-heading">
          <div>
            <p class="eyebrow">Fichas de la clínica</p>
            <h1>Registrar paciente</h1>
            <p class="muted">Añade el animal y los datos de su responsable.</p>
          </div>
        </div>
        <form class="form-panel" action="pacientes.php" method="get">
          <div class="form-section">
            <h2>Datos del paciente</h2>
            <div class="form-grid">
              <div class="field"><label for="name">Nombre *</label><input id="name" name="name" type="text"
                  placeholder="Ej. Nala" required></div>
              <div class="field"><label for="species">Especie *</label><select id="species" name="species" required>
                  <option value="">Selecciona una especie</option>
                  <option>Perro</option>
                  <option>Gato</option>
                  <option>Conejo</option>
                  <option>Ave</option>
                  <option>Otro</option>
                </select></div>
              <div class="field"><label for="breed">Raza</label><input id="breed" name="breed" type="text"
                  placeholder="Raza o tipo"></div>
              <div class="field"><label for="birth-date">Fecha de nacimiento</label><input id="birth-date"
                  name="birth_date" type="date"></div>
              <div class="field"><label for="sex">Sexo</label><select id="sex" name="sex">
                  <option value="">Sin especificar</option>
                  <option>Hembra</option>
                  <option>Macho</option>
                </select></div>
              <div class="field"><label for="microchip">Microchip</label><input id="microchip" name="microchip"
                  type="text" placeholder="Número de identificación"></div>
            </div>
          </div>
          <div class="form-section form-section-bordered">
            <h2>Datos del responsable</h2>
            <div class="form-grid">
              <div class="field"><label for="owner">Nombre completo *</label><input id="owner" name="owner_name"
                  type="text" placeholder="Nombre y apellidos" required></div>
              <div class="field"><label for="phone">Telefono *</label><input id="phone" name="owner_phone" type="tel"
                  placeholder="600 000 000" required></div>
              <div class="field"><label for="owner-email">Correo electrónico</label><input id="owner-email"
                  name="owner_email" type="email" placeholder="nombre@correo.es"></div>
              <div class="field"><label for="address">Dirección</label><input id="address" name="owner_address"
                  type="text" placeholder="Calle, número, ciudad"></div>
            </div>
          </div>
          <div class="form-actions"><a class="button button-secondary" href="pacientes.php">Cancelar</a><button
              class="button button-primary" type="submit">Guardar paciente</button></div>
        </form>
      </section>
    </main>
  </div>
</body>

</html>