<?php
// nueva_inspeccion.php · Formulario para registrar una inspección
require_once "datos.php";

$errores = [];
$datos = [
  "producto" => "",
  "inspector" => "",
  "fecha" => date("Y-m-d"),
  "lote" => "",
  "revisadas" => "",
  "defectuosas" => "",
  "observaciones" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  foreach ($datos as $campo => $valor) {
    $datos[$campo] = trim($_POST[$campo] ?? "");
  }

  if ($datos["producto"] === "") $errores[] = "Elige un producto.";
  if ($datos["inspector"] === "") $errores[] = "Elige un inspector.";
  if ($datos["fecha"] === "") $errores[] = "La fecha es obligatoria.";
  if ($datos["lote"] === "") $errores[] = "El lote es obligatorio.";

  $revisadas = filter_var($datos["revisadas"], FILTER_VALIDATE_INT);
  $defectuosas = filter_var($datos["defectuosas"], FILTER_VALIDATE_INT);
  if ($revisadas === false || $revisadas <= 0) {
    $errores[] = "Las piezas revisadas deben ser un número entero mayor que 0.";
  }
  if ($defectuosas === false || $defectuosas < 0) {
    $errores[] = "Las piezas defectuosas deben ser un número entero (0 o más).";
  } elseif ($revisadas !== false && $defectuosas > $revisadas) {
    $errores[] = "No puede haber más piezas defectuosas que revisadas.";
  }

  if (empty($errores)) {
    crearInspeccion(
      $pdo,
      (int) $datos["producto"],
      (int) $datos["inspector"],
      $datos["fecha"],
      $datos["lote"],
      $revisadas,
      $defectuosas,
      $datos["observaciones"]
    );
    header("Location: inspecciones.php?ok=1");
    exit;
  }
}

$productos = obtenerProductos($pdo);
$inspectores = obtenerInspectores($pdo);
$titulo = "Nueva inspección";
$pagina = "inspecciones";
require "cabecera.php";
?>

<section class="panel">
  <h2>Nueva inspección</h2>
  <?php if (!empty($errores)): ?>
    <div class="mensaje error">
      <ul>
        <?php foreach ($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="post" class="formulario" id="form-inspeccion">
    <div>
      <label for="producto">Producto</label>
      <select id="producto" name="producto">
        <option value="">Elige un producto</option>
        <?php foreach ($productos as $p): ?>
          <option value="<?= $p["id"] ?>" <?= $datos["producto"] == $p["id"] ? "selected" : "" ?>><?= e($p["codigo"] . " · " . $p["nombre"]) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <label for="inspector">Inspector</label>
      <select id="inspector" name="inspector">
        <option value="">Elige un inspector</option>
        <?php foreach ($inspectores as $ins): ?>
          <option value="<?= $ins["id"] ?>" <?= $datos["inspector"] == $ins["id"] ? "selected" : "" ?>><?= e($ins["nombre"]) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div><label for="fecha">Fecha</label><input type="date" id="fecha" name="fecha" value="<?= e($datos["fecha"]) ?>"></div>
    <div><label for="lote">Lote</label><input type="text" id="lote" name="lote" value="<?= e($datos["lote"]) ?>" placeholder="L-2611-11"></div>
    <div><label for="revisadas">Piezas revisadas</label><input type="number" id="revisadas" name="revisadas" value="<?= e($datos["revisadas"]) ?>"></div>
    <div><label for="defectuosas">Piezas defectuosas</label><input type="number" id="defectuosas" name="defectuosas" value="<?= e($datos["defectuosas"]) ?>"></div>
    <div class="completo"><label for="observaciones">Observaciones</label><textarea id="observaciones" name="observaciones" rows="3"><?= e($datos["observaciones"]) ?></textarea></div>
    <div class="completo">
      <p id="previsualizacion"></p>
      <p id="aviso-js"></p>
      <button type="submit">Guardar inspección</button>
    </div>
  </form>
</section>

<script src="js/inspeccion.js"></script>
<?php require "pie.php"; ?>