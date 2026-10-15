<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 10 · Repaso de todo
// Escribe tú las clases completas siguiendo estas instrucciones.
//
// Clase Empleado:
//   - variable public    $nombre
//   - variable protected $sueldo
//   - variable private   $dni
//   - variable public static $plantilla, que empieza en 0
//   - constructor($nombre, $sueldo, $dni): guarda los tres datos y suma 1 a $plantilla
//   - getSueldo(): devuelve el sueldo
//   - dniOculto(): devuelve "****" y las 4 últimas letras del dni
//     (pista: substr($this->dni, -4))
//
// Clase Jefe, hija de Empleado:
//   - subirSueldo($euros): suma los euros al sueldo
//
// RESULTADO ESPERADO
//  Ana cobra 1500 € · DNI ****678A
//  Luis cobra 2300 € · DNI ****321B
//  Personas en plantilla: 2
//
// PREGUNTA: ¿podría Jefe usar $this->dni? ¿Por qué?

// TODO: clase Empleado


// TODO: clase Jefe


$e = new Empleado("Ana", 1500, "12345678A");
$j = new Jefe("Luis", 2000, "87654321B");
$j->subirSueldo(300);

echo $e->nombre . " cobra " . $e->getSueldo() . " € · DNI " . $e->dniOculto() . "\n";
echo $j->nombre . " cobra " . $j->getSueldo() . " € · DNI " . $j->dniOculto() . "\n";
echo "Personas en plantilla: " . Empleado::$plantilla . "\n";
