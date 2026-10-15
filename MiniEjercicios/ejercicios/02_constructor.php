<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 2 · El constructor
// __construct() se ejecuta solo al hacer "new" y sirve para dar los datos iniciales.
//
// QUÉ TIENES QUE HACER
//  1. Completa el constructor: guarda $marca y $color en las variables de la clase.
//  2. Completa describir() para que devuelva "Un MARCA de color COLOR".
//
// RESULTADO ESPERADO
//  Un Seat de color rojo
//  Un Renault de color azul

class Coche
{
    public $marca;
    public $color;

    public function __construct($marca, $color)
    {
        // TODO 1
    }

    public function describir()
    {
        // TODO 2
    }
}

$coche1 = new Coche("Seat", "rojo");
$coche2 = new Coche("Renault", "azul");

echo $coche1->describir() . "\n";
echo $coche2->describir() . "\n";
