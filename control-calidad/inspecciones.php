<?php
// inspecciones.php · Listado de inspecciones con filtros
require_once "datos.php";

$resultado = $_GET["resultado"] ?? "";
$productoId = (int) ($_GET["producto"] ?? 0);
if (!in_array($resultado, ["", "Apto", "No apto"])) $resultado = "";

$inspecciones = obtenerInspecciones($pdo, $resultado, $productoId);
$productos = obtenerProductos($pdo);



$titulo = "Inspecciones";
$pagina = "inspecciones";
require "cabecera.php";
?>

<section class="panel">
  <h2>Inspecciones</h2>
  <?php if (isset($_GET["ok"])): ?>
    <p class="mensaje ok">Inspección registrada correctamente.</p>
  <?php endif; ?>
  <?php if (isset($_GET["deleted"])): ?>
    <p class="mensaje ok">Inspección eliminada correctamente.</p>
  <?php endif; ?>


  <form method="get" class="filtros">
    <div>
      <label for="resultado">Resultado</label>
      <select id="resultado" name="resultado">
        <option value="">Todos</option>
        <option value="Apto" <?= $resultado === "Apto" ? "selected" : "" ?>>Apto</option>
        <option value="No apto" <?= $resultado === "No apto" ? "selected" : "" ?>>No apto</option>
      </select>
    </div>
    <div>
      <label for="producto">Producto</label>
      <select id="producto" name="producto">
        <option value="0">Todos</option>
        <?php foreach ($productos as $p): ?>
          <option value="<?= $p["id"] ?>" <?= $productoId === (int) $p["id"] ? "selected" : "" ?>><?= e($p["nombre"]) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit">Filtrar</button>
    <a class="boton" href="nueva_inspeccion.php">+ Nueva inspección</a>
  </form>

  <p><?= count($inspecciones) ?> inspecciones encontradas.</p>
  <table>
    <tr>
      <th>Fecha</th>
      <th>Lote</th>
      <th>Producto</th>
      <th>Inspector</th>
      <th class="numero">Revisadas</th>
      <th class="numero">Defectuosas</th>
      <th class="numero">% defectos</th>
      <th>Resultado</th>
      <th>Acciones</th>
    </tr>
    <?php foreach ($inspecciones as $i): ?>
      <?php $porcentaje = $i["piezas_defectuosas"] * 100 / $i["piezas_revisadas"]; ?>
      <tr>
        <td><?= date("d/m/Y", strtotime($i["fecha"])) ?></td>
        <td><?= e($i["lote"]) ?></td>
        <td><?= e($i["producto"]) ?></td>
        <td><?= e($i["inspector"]) ?></td>
        <td class="numero"><?= $i["piezas_revisadas"] ?></td>
        <td class="numero"><?= $i["piezas_defectuosas"] ?></td>
        <td class="numero"><?= number_format($porcentaje, 1, ",", ".") ?> %</td>
        <td><span class="etiqueta <?= $i["resultado"] === "Apto" ? "apto" : "no-apto" ?>"><?= e($i["resultado"]) ?></span></td>
        <td><a href="eliminar_inspeccion.php?id=<?= $i["id"] ?>" class="boton eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar esta inspección?');">Eliminar</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>

<?php require "pie.php"; ?>