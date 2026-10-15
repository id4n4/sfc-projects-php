<?php
header('Content-Type: text/plain; charset=utf-8');   // para que se vea bien en el navegador

// EJERCICIO 1 · Mi primera clase y mis primeros objetos
// Una CLASE es un molde. Un OBJETO es cada cosa que creo con el molde.

class Perro
{
    public $nombre;
    public $raza;

    public function ladrar()
    {
        return $this->nombre . " dice: ¡Guau!";
    }
}

$perro1 = new Perro();          // creo un objeto
$perro1->nombre = "Toby";
$perro1->raza = "Beagle";

$perro2 = new Perro();          // creo otro objeto distinto
$perro2->nombre = "Luna";
$perro2->raza = "Galgo";

echo $perro1->ladrar() . "\n";
echo $perro2->ladrar() . "\n";
echo $perro2->nombre . " es un " . $perro2->raza . "\n";
