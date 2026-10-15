<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 5 · protected y herencia
// extends    → una clase HIJA hereda todo lo de la clase PADRE
// protected  → lo puede usar la clase y sus hijas, pero NO desde fuera

class Animal
{
    protected $nombre;              // las hijas lo podrán usar

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }
}

class Gato extends Animal          // Gato ES UN Animal
{
    public function maullar()
    {
        return $this->nombre . " dice: ¡Miau!";   // la hija SÍ puede usar $nombre
    }
}

class Vaca extends Animal
{
    public function mugir()
    {
        return $this->nombre . " dice: ¡Muuu!";
    }
}

$gato = new Gato("Misi");
$vaca = new Vaca("Lola");

echo $gato->maullar() . "\n";
echo $vaca->mugir() . "\n";

// Desde fuera NO se puede usar lo protected
try {
    echo $gato->nombre;
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
