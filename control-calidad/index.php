<?php
// index.php · Panel de calidad. Los datos los pinta js/panel.js llamando a api.php
require_once "datos.php";
$titulo = "Panel";
$pagina = "panel";
require "cabecera.php";
?>

<div class="tarjetas">
  <div class="tarjeta">
    <div class="valor" id="total-inspecciones">–</div>
    <div class="texto">Inspecciones</div>
  </div>
  <div class="tarjeta">
    <div class="valor" id="total-aptas">–</div>
    <div class="texto">Lotes aptos</div>
  </div>
  <div class="tarjeta">
    <div class="valor" id="total-no-aptas">–</div>
    <div class="texto">Lotes no aptos</div>
  </div>
  <div class="tarjeta">
    <div class="valor" id="tasa-global">–</div>
    <div class="texto">% de piezas defectuosas</div>
  </div>
</div>

<section class="panel">
  <h2>Calidad por producto</h2>
  <p id="estado">Cargando datos...</p>
  <table>
    <thead>
      <tr>
        <th>Código</th>
        <th>Producto</th>
        <th class="numero">Inspecciones</th>
        <th class="numero">Revisadas</th>
        <th class="numero">Defectuosas</th>
        <th class="numero">% defectos</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="tabla-productos"></tbody>
  </table>
</section>

<section class="panel">
  <h2 id="titulo-detalle">Inspecciones del producto</h2>
  <div id="detalle">
    <p>Pulsa «Ver» en un producto para ver sus inspecciones.</p>
  </div>
</section>

<script src="js/panel.js"></script>
<?php require "pie.php"; ?>