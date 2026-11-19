<?php
// sPell:disable

// api.php · Devuelve datos en formato JSON para el JavaScript
require_once "datos.php";
header("Content-Type: application/json; charset=utf-8");

$accion = $_GET["accion"] ?? "";

if ($accion === "resumen") {
  $productos = obtenerResumenPorProducto($pdo);
  foreach ($productos as &$p) {
    $p["tasa"] = $p["revisadas"] > 0 ? round($p["defectuosas"] * 100 / $p["revisadas"], 2) : null;
  }
  unset($p);
  echo json_encode(["totales" => obtenerTotales($pdo), "productos" => $productos], JSON_UNESCAPED_UNICODE);
} elseif ($accion === "inspecciones") {
  $productoId = (int) ($_GET["producto"] ?? 0);
  echo json_encode(obtenerInspecciones($pdo, "", $productoId), JSON_UNESCAPED_UNICODE);
} elseif ($accion === 'inspectores') {
  echo json_encode(obtenerRankingInspectores($pdo), JSON_UNESCAPED_UNICODE);
} else {
  http_response_code(400);
  echo json_encode(["error" => "Acción no válida. Usa accion=resumen, accion=inspecciones o accion=inspectores"], JSON_UNESCAPED_UNICODE);
}
