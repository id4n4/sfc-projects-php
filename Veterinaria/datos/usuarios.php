<?php
// Cuentas de demostracion para practicar login y roles.
// Contrasenas locales: laura@huellaviva.test -> huella123
//                      marcos@huellaviva.test -> vet2026
// Los valores de 'clave' son hashes para verificar con password_verify().

$usuarios = [
  [
    'id' => 1,
    'email' => 'laura@huellaviva.test',
    'clave' => '$2y$10$n8TRtUgQse6dZXCFcNPRRuhdJi1nfmCP4czQntWbqsJTGEOlZeGA.',
    'nombre' => 'Laura Martín',
    'rol' => 'administrador',
    'activo' => true,
    'veterinarioId' => null,
  ],
  [
    'id' => 2,
    'email' => 'marcos@huellaviva.test',
    'clave' => '$2y$10$Q.iTBatSiYQsFMg1RKJVK.ngw/w1Zh6hLa3QhOWXKjWhShmQw0Zpy',
    'nombre' => 'Marcos Gil',
    'rol' => 'veterinario',
    'activo' => true,
    'veterinarioId' => 1,
  ],
];
