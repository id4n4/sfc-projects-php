<?php
// productos.php · Listado y alta de productos
require_once "datos.php";

$errores = [];
$codigo = $nombre = $linea = "";

// ---- Alta (POST) ----
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $codigo = strtoupper(trim($_POST["codigo"] ?? ""));
  $nombre = trim($_POST["nombre"] ?? "");
  $linea = trim($_POST["linea"] ?? "");

  if ($codigo === "") $errores[] = "El código es obligatorio.";
  if ($nombre === "") $errores[] = "El nombre es obligatorio.";
  if ($linea === "") $errores[] = "La línea de producción es obligatoria.";
  if ($codigo !== "" && existeCodigoProducto($pdo, $codigo)) $errores[] = "Ya existe un producto con el código $codigo.";

  if (empty($errores)) {
    crearProducto($pdo, $codigo, $nombre, $linea);
    header("Location: productos.php?ok=1");   // PRG: redirigir después de guardar
    exit;
  }
}

$productos = obtenerProductos($pdo);
$titulo = "Productos";
$pagina = "productos";
require "cabecera.php";
?>

<section class="panel">
  <h2>Productos</h2>
  <?php if (isset($_GET["ok"])): ?>
    <p class="mensaje ok">Producto guardado correctamente.</p>
  <?php endif; ?>
  <table>
    <tr>
      <th>Código</th>
      <th>Nombre</th>
      <th>Línea</th>
    </tr>
    <?php foreach ($productos as $p): ?>
      <tr>
        <td><?= e($p["codigo"]) ?></td>
        <td><?= e($p["nombre"]) ?></td>
        <td><?= e($p["linea"]) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>

<section class="panel">
  <h2>Nuevo producto</h2>
  <?php if (!empty($errores)): ?>
    <div class="mensaje error">
      <ul>
        <?php foreach ($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form method="post" class="formulario">
    <div><label for="codigo">Código</label><input type="text" id="codigo" name="codigo" value="<?= e($codigo) ?>"></div>
    <div><label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value="<?= e($nombre) ?>"></div>
    <div><label for="linea">Línea de producción</label><input type="text" id="linea" name="linea" value="<?= e($linea) ?>"></div>
    <div class="completo"><button type="submit">Guardar producto</button></div>
  </form>
</section>

<?php require "pie.php"; ?>