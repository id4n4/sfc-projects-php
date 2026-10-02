<?php
// pacienteId y veterinarioId corresponden a los arrays respectivos.
// Las citas son datos de ejemplo para la agenda del 12 de junio de 2025.

$citas = [
  [
    'id' => 1,
    'pacienteId' => 1,
    'veterinarioId' => 1,
    'fechaHora' => '2025-06-12 09:30:00',
    'motivo' => 'Revisión anual',
    'notas' => '',
    'estado' => 'confirmada',
  ],
  [
    'id' => 2,
    'pacienteId' => 2,
    'veterinarioId' => 2,
    'fechaHora' => '2025-06-12 10:15:00',
    'motivo' => 'Vacunación',
    'notas' => 'Revisar calendario de vacunas.',
    'estado' => 'pendiente',
  ],
  [
    'id' => 3,
    'pacienteId' => 3,
    'veterinarioId' => 1,
    'fechaHora' => '2025-06-12 11:00:00',
    'motivo' => 'Consulta general',
    'notas' => '',
    'estado' => 'confirmada',
  ],
  [
    'id' => 4,
    'pacienteId' => 4,
    'veterinarioId' => 2,
    'fechaHora' => '2025-06-12 11:45:00',
    'motivo' => 'Revisión postoperatoria',
    'notas' => '',
    'estado' => 'pendiente',
  ],
  [
    'id' => 5,
    'pacienteId' => 5,
    'veterinarioId' => 1,
    'fechaHora' => '2025-06-12 12:30:00',
    'motivo' => 'Consulta dermatológica',
    'notas' => '',
    'estado' => 'cancelada',
  ],
];
