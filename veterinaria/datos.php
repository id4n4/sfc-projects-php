<?php
require_once 'config/conexion.php';

function contar(string $table): int
{
  return (int) conectar()->query("SELECT COUNT(*) FROM $table")->fetchColumn();
}

function total_pendiente_cobro(): float
{
  return (float) conectar()->query("SELECT SUM(total_debe) from v_deuda")->fetchColumn();
}

function mascotas_mas_visitas(): array
{
  $sql = "select m.nombre, m.especie, count(v.id) as total_visitas from mascotas m
          join visitas v 
          on v.mascota_id = m.id
          group by v.mascota_id
          having total_visitas >= 2
          order by total_visitas desc";
  return (array) conectar()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
