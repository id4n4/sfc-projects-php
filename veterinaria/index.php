<?php
$titulo = 'Inicio';
require_once 'cabecera.php';
require_once 'datos.php';

$mascotas_mas_visitas = mascotas_mas_visitas();
?>
<h2>Resumen</h2>

<section class="tarjetas">
    <div class="tarjeta"><span><?= contar('clientes') ?></span> clientes</div>
    <div class="tarjeta"><span><?= contar('mascotas') ?></span> mascotas</div>
    <div class="tarjeta"><span><?= total_pendiente_cobro() ?> €</span> pendientes de cobro</div>
</section>

<h2>Mascotas con más visitas</h2>
<ol>
    <?php foreach ($mascotas_mas_visitas as $mascota): ?>
        <li><?= $mascota['nombre'] ?> (<?= $mascota['especie'] ?>): <?= $mascota['total_visitas'] ?> visitas</li>
    <?php endforeach; ?>
</ol>

<?php require_once 'pie.php'; ?>