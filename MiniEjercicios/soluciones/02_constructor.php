<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 2 · El constructor
// __construct() se ejecuta solo al hacer "new" y sirve para dar los datos iniciales.

class Coche
{
    public $marca;
    public $color;

    public function __construct($marca, $color)
    {
        $this->marca = $marca;
        $this->color = $color;
    }

    public function describir()
    {
        return "Un " . $this->marca . " de color " . $this->color;
    }
}

$coche1 = new Coche("Seat", "rojo");
$coche2 = new Coche("Renault", "azul");

echo $coche1->describir() . "\n";
echo $coche2->describir() . "\n";
