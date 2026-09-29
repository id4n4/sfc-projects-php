<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Registra y consulta las labores realizadas por Carlos en AgroGest.">
  <title>Mis actividades | AgroGest</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../styles/base.css">
  <link rel="stylesheet" href="../styles/empleado-actividades.css">
</head>

<body class="employee-page">
  <div class="app-shell">
    <aside class="sidebar employee-sidebar">
      <a class="brand" href="dashboard.php" aria-label="AgroGest, mi dashboard"><span class="brand-mark"
          aria-hidden="true">+</span><span>Agro<span>Gest</span></span></a>
      <nav class="main-nav" aria-label="Navegación del empleado">
        <p class="nav-label">Mi espacio</p>
        <a class="nav-item" href="dashboard.php"><span class="nav-icon" aria-hidden="true">▦</span><span>Mi
            Dashboard</span></a>
        <a class="nav-item is-active" href="actividades.php" aria-current="page"><span class="nav-icon"
            aria-hidden="true">◷</span><span>Mis actividades</span></a>
      </nav>
      <div class="sidebar-footer"><a class="logout-link" href="../index.php"><span class="nav-icon"
            aria-hidden="true">↪</span><span>Cerrar sesión</span></a></div>
    </aside>

    <main class="main-content">
      <header class="topbar">
        <div class="page-heading">
          <p class="breadcrumb">Mi espacio <span>/</span> Actividades</p>
          <h1>Mis actividades</h1>
          <p>Registra y consulta las labores que has realizado</p>
        </div>
        <div class="user-menu">
          <div class="user-copy"><strong>Carlos Méndez</strong><span>Empleado de campo</span></div>
          <div class="avatar carlos-avatar" aria-label="Avatar de Carlos Méndez">CM</div>
        </div>
      </header>

      <div class="content-inner my-activities-content">
        <div class="activities-toolbar">
          <div>
            <p class="section-kicker">Registro personal</p>
            <h2>Mi actividad</h2>
          </div><a class="primary-action" href="#registrar-actividad"><span aria-hidden="true">+</span> Registrar
            actividad</a>
        </div>

        <section class="activity-stats" aria-label="Resumen de mis actividades">
          <article class="activity-stat"><span class="activity-stat-icon green-icon" aria-hidden="true">✦</span>
            <div><span>Actividades registradas este mes</span><strong>28</strong></div><small>+4 frente al mes
              anterior</small>
          </article>
          <article class="activity-stat"><span class="activity-stat-icon orange-icon" aria-hidden="true">◷</span>
            <div><span>Horas trabajadas este mes</span><strong>142 <small>h</small></strong></div><small>Promedio de 6.7
              h por día</small>
          </article>
        </section>

        <section class="panel filters-panel" aria-labelledby="filters-title">
          <div class="filters-heading">
            <div>
              <h2 id="filters-title">Filtrar mis actividades</h2>
              <p>Consulta tus registros por fecha, campo o tipo de labor</p>
            </div><span class="filter-icon" aria-hidden="true">☷</span>
          </div>
          <form class="activity-filters" action="#mis-registros" method="get">
            <div class="filter-field"><label for="date-from">Fecha desde</label><input id="date-from" name="date_from"
                type="date" value="2024-06-01"></div>
            <div class="filter-field"><label for="date-to">Fecha hasta</label><input id="date-to" name="date_to"
                type="date" value="2024-06-24"></div>
            <div class="filter-field"><label for="field">Campo</label><select id="field" name="field">
                <option>Todos mis campos</option>
                <option>Parcela Norte</option>
                <option>Parcela Sur</option>
                <option>Campo Central</option>
              </select></div>
            <div class="filter-field"><label for="activity-type">Tipo de actividad</label><select id="activity-type"
                name="activity_type">
                <option>Todos los tipos</option>
                <option>Riego</option>
                <option>Poda</option>
                <option>Siembra</option>
                <option>Fertilización</option>
              </select></div>
            <div class="filter-actions"><button class="filter-submit" type="submit">Filtrar <span
                  aria-hidden="true">→</span></button><a class="clear-filters" href="actividades.php">Limpiar</a></div>
          </form>
        </section>

        <section class="panel own-activities-panel" id="mis-registros" aria-labelledby="activities-title">
          <div class="panel-heading">
            <div>
              <h2 id="activities-title">Mis actividades registradas</h2>
              <p>Solo tú puedes consultar y administrar estos registros</p>
            </div><span class="record-count">28 actividades</span>
          </div>
          <div class="table-scroll">
            <table class="own-activities-table">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Campo</th>
                  <th>Tipo de actividad</th>
                  <th>Descripción</th>
                  <th>Tiempo empleado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Hoy, 10:55</td>
                  <td>Parcela Norte</td>
                  <td><span class="activity-tag tag-water">Riego</span></td>
                  <td>Riego por goteo, sector 3</td>
                  <td class="time-cell">01:45 h</td>
                  <td><span class="row-actions"><a href="#consultar-riego" aria-label="Consultar Riego en Parcela Norte"
                        title="Consultar">◉</a><a href="#editar-riego" aria-label="Editar Riego en Parcela Norte"
                        title="Editar">✎</a><a href="#eliminar-riego" aria-label="Eliminar Riego en Parcela Norte"
                        title="Eliminar">⌫</a></span></td>
                </tr>
                <tr>
                  <td>Hoy, 07:15</td>
                  <td>Campo Central</td>
                  <td><span class="activity-tag tag-prune">Poda</span></td>
                  <td>Poda de mantenimiento de árboles</td>
                  <td class="time-cell">03:30 h</td>
                  <td><span class="row-actions"><a href="#consultar-poda" aria-label="Consultar Poda en Campo Central"
                        title="Consultar">◉</a><a href="#editar-poda" aria-label="Editar Poda en Campo Central"
                        title="Editar">✎</a><a href="#eliminar-poda" aria-label="Eliminar Poda en Campo Central"
                        title="Eliminar">⌫</a></span></td>
                </tr>
                <tr>
                  <td>23 Jun, 08:05</td>
                  <td>Parcela Sur</td>
                  <td><span class="activity-tag tag-seed">Siembra</span></td>
                  <td>Siembra de hortaliza de verano</td>
                  <td class="time-cell">06:00 h</td>
                  <td><span class="row-actions"><a href="#consultar-siembra"
                        aria-label="Consultar Siembra en Parcela Sur" title="Consultar">◉</a><a href="#editar-siembra"
                        aria-label="Editar Siembra en Parcela Sur" title="Editar">✎</a><a href="#eliminar-siembra"
                        aria-label="Eliminar Siembra en Parcela Sur" title="Eliminar">⌫</a></span></td>
                </tr>
                <tr>
                  <td>22 Jun, 07:40</td>
                  <td>Parcela Norte</td>
                  <td><span class="activity-tag tag-fertilize">Fertilización</span></td>
                  <td>Aplicación de abono orgánico</td>
                  <td class="time-cell">05:15 h</td>
                  <td><span class="row-actions"><a href="#consultar-fertilizacion"
                        aria-label="Consultar Fertilización en Parcela Norte" title="Consultar">◉</a><a
                        href="#editar-fertilizacion" aria-label="Editar Fertilización en Parcela Norte"
                        title="Editar">✎</a><a href="#eliminar-fertilizacion"
                        aria-label="Eliminar Fertilización en Parcela Norte" title="Eliminar">⌫</a></span></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="table-footer"><span>Mostrando tus últimos <strong>4</strong> registros</span><span>Última
              actualización: hoy, 14:10</span></div>
        </section>

        <section class="panel activity-form-panel" id="registrar-actividad" aria-labelledby="form-title">
          <div class="form-intro"><span class="form-icon" aria-hidden="true">+</span>
            <div>
              <p class="section-kicker">Nueva jornada</p>
              <h2 id="form-title">Registrar actividad</h2>
              <p>Completa los datos de la labor que realizaste.</p>
            </div>
          </div>
          <form class="activity-form" action="#" method="post">
            <div class="input-group"><label for="form-field">Campo</label><select id="form-field" name="field" required>
                <option value="">Selecciona un campo</option>
                <option>Parcela Norte</option>
                <option>Campo Central</option>
                <option>Parcela Sur</option>
              </select></div>
            <div class="input-group"><label for="form-type">Tipo de actividad</label><select id="form-type"
                name="activity_type" required>
                <option value="">Selecciona un tipo activo</option>
                <option>Riego</option>
                <option>Poda</option>
                <option>Siembra</option>
                <option>Fertilización</option>
              </select></div>
            <div class="input-group"><label for="form-date">Fecha</label><input id="form-date" name="date" type="date"
                value="2024-06-24" required></div>
            <div class="input-group"><label for="form-time">Tiempo empleado en horas</label>
              <div class="unit-input"><input id="form-time" name="time" type="number" min="0.25" step="0.25"
                  placeholder="Ej. 4.5" required><span>h</span></div>
            </div>
            <div class="input-group description-input"><label for="form-description">Descripción
                <small>(opcional)</small></label><textarea id="form-description" name="description" rows="3"
                placeholder="Añade una nota sobre la labor realizada"></textarea></div>
            <div class="form-actions"><a class="cancel-action" href="#activities-title">Cancelar</a><button
                class="save-action" type="submit">Guardar actividad <span aria-hidden="true">→</span></button></div>
          </form>
        </section>
      </div>
    </main>
  </div>
</body>

</html>