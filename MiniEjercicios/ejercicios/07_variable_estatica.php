<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 7 · Variable estática (static)
// Una variable NORMAL (dinámica) es distinta en cada objeto.
// Una variable STATIC es UNA SOLA para toda la clase, la comparten todos.
// Dentro de la clase se usa con  self::$variable
// Fuera de la clase se usa con   NombreClase::$variable
//
// QUÉ TIENES QUE HACER
//  1. Declara una variable estática pública $total que empiece en 0.
//  2. En el constructor, súmele 1 cada vez que se crea un jugador.
//
// RESULTADO ESPERADO
//  Jugadores al empezar: 0
//  Nombres: Ana, Luis, Eva
//  Jugadores creados: 3

class Jugador
{
    // TODO 1
    public static int $total = 0;

    public function __construct(public string $nombre)
    {
        // TODO 2
        self::$total += 1;
    }
}

echo "Jugadores al empezar: " . Jugador::$total . "\n";

$j1 = new Jugador("Ana");
$j2 = new Jugador("Luis");
$j3 = new Jugador("Eva");

echo "Nombres: " . $j1->nombre . ", " . $j2->nombre . ", " . $j3->nombre . "\n";
echo "Jugadores creados: " . Jugador::$total . "\n";
