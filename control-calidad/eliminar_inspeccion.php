<?php
// sPell:disable
require "datos.php";

if (!isset($_GET["id"])) {
  die("Falta el parámetro id");
}

$id = (int) $_GET["id"];

if ($id <= 0) {
  die("ID inválido");
}

eliminarInspeccion($pdo, $id);
header("Location: inspecciones.php?deleted=1");
