<?php
$titulo = 'Mascotas';
require 'cabecera.php';
require_once 'datos.php';

$mascotas = listar_mascotas();
?>
<h2>Mascotas</h2>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Especie</th>
      <th>Raza</th>
      <th>Peso</th>
      <th>Dueño</th>
      <th>Visitas</th>
    </tr>
  </thead>
  <tbody id="tabla-libros">
    <?php foreach ($mascotas as $mascota): ?>
      <tr>
        <td><?= e($mascota['titulo']) ?></td>
        <td><?= e($mascota['autor']) ?></td>
        <td><?= e($mascota['genero']) ?></td>
        <td><?= $mascota['anio'] ?></td>
        <td><?= number_format((float) $mascota['precio'], 2, ',', '.') ?> €</td>
        <td>
          <?php if ($mascota['disponible']): ?>
            <span class="etiqueta ok">Disponible</span>
          <?php else: ?>
            <span class="etiqueta no">Prestado</span>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require 'pie.php'; ?>