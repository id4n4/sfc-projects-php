<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 7 · Variable estática (static)
// Una variable NORMAL (dinámica) es distinta en cada objeto.
// Una variable STATIC es UNA SOLA para toda la clase, la comparten todos.
// Dentro de la clase se usa con  self::$variable
// Fuera de la clase se usa con   NombreClase::$variable

class Jugador
{
    public $nombre;                 // dinámica: cada jugador tiene el suyo
    public static $total = 0;       // estática: una sola para todos

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        self::$total++;             // cada jugador nuevo suma 1 al total común
    }
}

echo "Jugadores al empezar: " . Jugador::$total . "\n";

$j1 = new Jugador("Ana");
$j2 = new Jugador("Luis");
$j3 = new Jugador("Eva");

echo "Nombres: " . $j1->nombre . ", " . $j2->nombre . ", " . $j3->nombre . "\n";
echo "Jugadores creados: " . Jugador::$total . "\n";
