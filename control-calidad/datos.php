<?php
// sPell:disable

// datos.php · Todas las consultas SQL de la aplicación
require_once "conexion.php";

// Escapa un texto antes de mostrarlo en HTML
function e($texto)
{
  return htmlspecialchars($texto ?? "", ENT_QUOTES, "UTF-8");
}

// Regla de la empresa: un lote es apto si los defectos no pasan del 5 %
const LIMITE_DEFECTOS = 5;

// ---------- Productos ----------
function obtenerProductos($pdo)
{
  return $pdo->query("SELECT * FROM productos ORDER BY nombre")->fetchAll();
}

function existeCodigoProducto($pdo, $codigo)
{
  $sql = $pdo->prepare("SELECT COUNT(*) FROM productos WHERE codigo = ?");
  $sql->execute([$codigo]);
  return $sql->fetchColumn() > 0;
}

function crearProducto($pdo, $codigo, $nombre, $linea)
{
  $sql = $pdo->prepare("INSERT INTO productos (codigo, nombre, linea) VALUES (?, ?, ?)");
  $sql->execute([$codigo, $nombre, $linea]);
}

// ---------- Inspectores ----------
function obtenerInspectores($pdo)
{
  return $pdo->query("SELECT * FROM inspectores ORDER BY nombre")->fetchAll();
}

function existeEmailInspector($pdo, $email)
{
  $sql = $pdo->prepare("SELECT COUNT(*) FROM inspectores WHERE email = ?");
  $sql->execute([$email]);
  return $sql->fetchColumn() > 0;
}

function crearInspector($pdo, $nombre, $email)
{
  $sql = $pdo->prepare("INSERT INTO inspectores (nombre, email) VALUES (?, ?)");
  $sql->execute([$nombre, $email]);
}

// ---------- Inspecciones ----------
// Devuelve las inspecciones con el nombre del producto y del inspector.
// Se pueden filtrar por resultado ('Apto' / 'No apto') y por producto.
function obtenerInspecciones($pdo, $resultado = "", $productoId = 0)
{
  $sql = "SELECT i.id, i.fecha, i.lote, i.piezas_revisadas, i.piezas_defectuosas,
                   i.resultado, i.observaciones,
                   p.codigo, p.nombre AS producto, ins.nombre AS inspector
            FROM inspecciones i
            JOIN productos p ON p.id = i.producto_id
            JOIN inspectores ins ON ins.id = i.inspector_id
            WHERE 1 = 1";
  $parametros = [];

  if ($resultado !== "") {
    $sql .= " AND i.resultado = ?";
    $parametros[] = $resultado;
  }
  if ($productoId > 0) {
    $sql .= " AND i.producto_id = ?";
    $parametros[] = $productoId;
  }
  $sql .= " ORDER BY i.fecha DESC, i.id DESC";

  $consulta = $pdo->prepare($sql);
  $consulta->execute($parametros);
  return $consulta->fetchAll();
}


// Calcula el resultado según la regla del 5 %
function calcularResultado($revisadas, $defectuosas)
{
  $porcentaje = $defectuosas * 100 / $revisadas;
  return $porcentaje <= LIMITE_DEFECTOS ? "Apto" : "No apto";
}

function crearInspeccion($pdo, $productoId, $inspectorId, $fecha, $lote, $revisadas, $defectuosas, $observaciones)
{
  $resultado = calcularResultado($revisadas, $defectuosas);
  $sql = $pdo->prepare("INSERT INTO inspecciones
        (producto_id, inspector_id, fecha, lote, piezas_revisadas, piezas_defectuosas, resultado, observaciones)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $sql->execute([
    $productoId,
    $inspectorId,
    $fecha,
    $lote,
    $revisadas,
    $defectuosas,
    $resultado,
    $observaciones === "" ? null : $observaciones
  ]);
}


// ---------- Resumen para la API ----------
function obtenerTotales($pdo)
{
  $sql = "SELECT COUNT(*) AS inspecciones,
                   COALESCE(SUM(CASE WHEN resultado = 'Apto' THEN 1 ELSE 0 END), 0) AS aptas,
                   COALESCE(SUM(CASE WHEN resultado = 'No apto' THEN 1 ELSE 0 END), 0) AS no_aptas,
                   COALESCE(SUM(piezas_revisadas), 0) AS piezas_revisadas,
                   COALESCE(SUM(piezas_defectuosas), 0) AS piezas_defectuosas
            FROM inspecciones";
  return $pdo->query($sql)->fetch();
}

function obtenerResumenPorProducto($pdo)
{
  $sql = "SELECT p.id, p.codigo, p.nombre,
                   COUNT(i.id) AS inspecciones,
                   COALESCE(SUM(i.piezas_revisadas), 0) AS revisadas,
                   COALESCE(SUM(i.piezas_defectuosas), 0) AS defectuosas
            FROM productos p
            LEFT JOIN inspecciones i ON i.producto_id = p.id
            GROUP BY p.id, p.codigo, p.nombre
            ORDER BY p.nombre";
  return $pdo->query($sql)->fetchAll();
}

function eliminarInspeccion($pdo, $id)
{
  $sql = $pdo->prepare("DELETE FROM inspecciones WHERE id = ?");
  $sql->execute([$id]);
}
