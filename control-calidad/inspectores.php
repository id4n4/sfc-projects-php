<?php
// inspectores.php · Listado y alta de inspectores
require_once "datos.php";

$errores = [];
$nombre = $email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nombre = trim($_POST["nombre"] ?? "");
  $email = strtolower(trim($_POST["email"] ?? ""));

  if ($nombre === "") $errores[] = "El nombre es obligatorio.";
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "El email no es válido.";
  elseif (existeEmailInspector($pdo, $email)) $errores[] = "Ya existe un inspector con ese email.";

  if (empty($errores)) {
    crearInspector($pdo, $nombre, $email);
    header("Location: inspectores.php?ok=1");
    exit;
  }
}

$inspectores = obtenerInspectores($pdo);
$titulo = "Inspectores";
$pagina = "inspectores";
require "cabecera.php";
?>

<section class="panel">
  <h2>Inspectores</h2>
  <?php if (isset($_GET["ok"])): ?>
    <p class="mensaje ok">Inspector guardado correctamente.</p>
  <?php endif; ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
    </tr>
    <?php foreach ($inspectores as $ins): ?>
      <tr>
        <td><?= e($ins["nombre"]) ?></td>
        <td><?= e($ins["email"]) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>

<section class="panel">
  <h2>Nuevo inspector</h2>
  <?php if (!empty($errores)): ?>
    <div class="mensaje error">
      <ul>
        <?php foreach ($errores as $error): ?><li><?= e($error) ?></li><?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <form method="post" class="formulario">
    <div><label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value="<?= e($nombre) ?>"></div>
    <div><label for="email">Email</label><input type="text" id="email" name="email" value="<?= e($email) ?>"></div>
    <div class="completo"><button type="submit">Guardar inspector</button></div>
  </form>
</section>

<?php require "pie.php"; ?>