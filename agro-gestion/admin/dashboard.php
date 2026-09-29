<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Dashboard de AgroGest para administrar la operación agrícola.">
  <title>Dashboard | AgroGest</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../styles/base.css">
  <link rel="stylesheet" href="../styles/dashboard.css">
</head>

<body class="dashboard-page">
  <div class="app-shell">
    <aside class="sidebar">
      <a class="brand" href="dashboard.php" aria-label="AgroGest, dashboard">
        <span class="brand-mark" aria-hidden="true">+</span>
        <span>Agro<span>Gest</span></span>
      </a>

      <nav class="main-nav" aria-label="Navegación principal">
        <p class="nav-label">Espacio de trabajo</p>
        <a class="nav-item is-active" href="dashboard.php" aria-current="page">
          <span class="nav-icon" aria-hidden="true">▦</span>
          <span>Dashboard</span>
        </a>
        <a class="nav-item" href="campos.php">
          <span class="nav-icon" aria-hidden="true">⌂</span>
          <span>Campos</span>
        </a>
        <a class="nav-item" href="empleados.php">
          <span class="nav-icon" aria-hidden="true">♙</span>
          <span>Empleados</span>
        </a>
        <a class="nav-item" href="actividades.php">
          <span class="nav-icon" aria-hidden="true">◷</span>
          <span>Historial e informes</span>
        </a>
        <a class="nav-item" href="tipo-actividades.php">
          <span class="nav-icon" aria-hidden="true">✦</span>
          <span>Tipos de actividad</span>
        </a>
      </nav>

      <div class="sidebar-footer">
        <a class="logout-link" href="../index.php">
          <span class="nav-icon" aria-hidden="true">↪</span>
          <span>Cerrar sesión</span>
        </a>
      </div>
    </aside>

    <main class="main-content">
      <header class="topbar">
        <div class="page-heading">
          <p class="breadcrumb">Resumen general <span>/</span> Hoy, 24 junio 2024</p>
          <h1>Dashboard</h1>
          <p>Resumen general de tu explotación agrícola</p>
        </div>
        <div class="user-menu">
          <div class="user-copy">
            <strong>Julián Moreno</strong>
            <span>Jefe de explotación</span>
          </div>
          <div class="avatar" aria-label="Avatar de Julián Moreno">JM</div>
        </div>
      </header>

      <div class="content-inner">
        <section class="stats-grid" aria-label="Estadísticas principales">
          <article class="stat-card">
            <div class="stat-topline"><span class="stat-icon green-icon" aria-hidden="true">⌂</span></div>
            <p>Campos activos</p>
            <strong>8</strong>
          </article>
          <article class="stat-card">
            <div class="stat-topline"><span class="stat-icon orange-icon" aria-hidden="true">♙</span></div>
            <p>Empleados activos</p>
            <strong>12</strong>
          </article>
          <article class="stat-card">
            <div class="stat-topline"><span class="stat-icon lime-icon" aria-hidden="true">✦</span></div>
            <p>Actividades este mes</p>
            <strong>156</strong>
          </article>
          <article class="stat-card">
            <div class="stat-topline"><span class="stat-icon blue-icon" aria-hidden="true">◷</span></div>
            <p>Horas trabajadas este mes</p>
            <strong>342 <small>h</small></strong>
          </article>
        </section>

        <section class="dashboard-grid" aria-label="Análisis de actividad">
          <article class="panel hours-panel">
            <div class="panel-heading">
              <div>
                <h2>Horas trabajadas</h2>
                <p>Seguimiento mensual de la jornada registrada</p>
              </div>
              <button class="select-button" type="button">Este año </button>
            </div>
            <div class="chart-area bar-chart" aria-label="Gráfico de barras con horas trabajadas por mes">
              <div class="y-axis"><span>400h</span><span>300h</span><span>200h</span><span>100h</span><span>0h</span>
              </div>
              <div class="bar-plot">
                <div class="grid-line line-1"></div>
                <div class="grid-line line-2"></div>
                <div class="grid-line line-3"></div>
                <div class="grid-line line-4"></div>
                <div class="bars">
                  <div class="bar-column"><span class="bar-value">248</span><i style="height: 62%"></i><span>Ene</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">292</span><i style="height: 73%"></i><span>Feb</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">278</span><i
                      style="height: 69.5%"></i><span>Mar</span></div>
                  <div class="bar-column"><span class="bar-value">320</span><i style="height: 80%"></i><span>Abr</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">306</span><i
                      style="height: 76.5%"></i><span>May</span></div>
                  <div class="bar-column current"><span class="bar-value">342</span><i
                      style="height: 85.5%"></i><span>Jun</span></div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Jul</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Ago</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Sep</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Oct</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Nov</span>
                  </div>
                  <div class="bar-column"><span class="bar-value">0</span><i style="height: 0%"></i><span>Dic</span>
                  </div>
                </div>
              </div>
            </div>
          </article>

          <article class="panel activity-panel">
            <div class="panel-heading">
              <div>
                <h2>Actividades por tipo</h2>
                <p>Distribución de este mes</p>
              </div>
            </div>
            <div class="donut-wrap">
              <div class="donut-chart" role="img"
                aria-label="Riego 32 por ciento, poda 21 por ciento, siembra 18 por ciento, cosecha 17 por ciento, fertilización 12 por ciento">
                <span>156<small>actividades</small></span>
              </div>
              <ul class="legend-list">
                <li><span class="legend-dot irrigation"></span><span>Riego</span><strong>32%</strong></li>
                <li><span class="legend-dot pruning"></span><span>Poda</span><strong>21%</strong></li>
                <li><span class="legend-dot sowing"></span><span>Siembra</span><strong>18%</strong></li>
                <li><span class="legend-dot harvest"></span><span>Cosecha</span><strong>17%</strong></li>
                <li><span class="legend-dot fertilizer"></span><span>Fertilización</span><strong>12%</strong></li>
              </ul>
            </div>
          </article>
        </section>

        <section class="lower-grid">
          <article class="panel table-panel" id="historial">
            <div class="panel-heading table-heading">
              <div>
                <h2>Actividades recientes</h2>
                <p>Últimos registros de tu equipo</p>
              </div>
              <a class="view-all" href="#historial">Ver historial <span aria-hidden="true">→</span></a>
            </div>
            <div class="table-scroll">
              <table>
                <thead>
                  <tr>
                    <th>Empleado</th>
                    <th>Campo</th>
                    <th>Actividad</th>
                    <th>Fecha</th>
                    <th>Tiempo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span class="employee-cell"><span class="mini-avatar avatar-pink">LC</span> Laura
                        Castillo</span></td>
                    <td>El Olivar</td>
                    <td><span class="activity-tag tag-water">Riego</span></td>
                    <td>24 Jun, 08:42</td>
                    <td>04:30 h</td>
                  </tr>
                  <tr>
                    <td><span class="employee-cell"><span class="mini-avatar avatar-yellow">MR</span> Mateo Rojas</span>
                    </td>
                    <td>La Esperanza</td>
                    <td><span class="activity-tag tag-prune">Poda</span></td>
                    <td>24 Jun, 07:15</td>
                    <td>06:00 h</td>
                  </tr>
                  <tr>
                    <td><span class="employee-cell"><span class="mini-avatar avatar-blue">SV</span> Sofía Vargas</span>
                    </td>
                    <td>Las Acacias</td>
                    <td><span class="activity-tag tag-seed">Siembra</span></td>
                    <td>23 Jun, 16:30</td>
                    <td>03:45 h</td>
                  </tr>
                  <tr>
                    <td><span class="employee-cell"><span class="mini-avatar avatar-green">DP</span> Diego Pérez</span>
                    </td>
                    <td>El Olivar</td>
                    <td><span class="activity-tag tag-fertilize">Fertilización</span></td>
                    <td>23 Jun, 11:20</td>
                    <td>05:15 h</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </article>

          <article class="panel shortcuts-panel">
            <div class="panel-heading">
              <div>
                <h2>Accesos rápidos</h2>
                <p>Gestiona tu operación</p>
              </div>
            </div>
            <div class="shortcut-list">
              <a class="shortcut" href="campos.php"><span class="shortcut-icon">+</span><span><strong>Añadir
                    campo</strong><small>Registra una nueva parcela</small></span><span
                  class="shortcut-arrow">→</span></a>
              <a class="shortcut" href="empleados.php"><span
                  class="shortcut-icon employee-shortcut">♙</span><span><strong>Registrar
                    empleado</strong><small>Incorpora a tu equipo</small></span><span
                  class="shortcut-arrow">→</span></a>
              <a class="shortcut" href="#historial"><span
                  class="shortcut-icon report-shortcut">◷</span><span><strong>Consultar historial</strong><small>Revisa
                    toda la actividad</small></span><span class="shortcut-arrow">→</span></a>
            </div>
          </article>
        </section>
      </div>
    </main>
  </div>
</body>

</html>