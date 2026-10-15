<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 5 · protected y herencia
// extends    → una clase HIJA hereda todo lo de la clase PADRE
// protected  → lo puede usar la clase y sus hijas, pero NO desde fuera
//
// QUÉ TIENES QUE HACER
//  1. Completa maullar() para que devuelva "NOMBRE dice: ¡Miau!".
//  2. Crea la clase Vaca, hija de Animal, con una función mugir()
//     que devuelva "NOMBRE dice: ¡Muuu!".
//  3. PRUEBA: cambia "protected" por "private" en Animal y ejecuta. ¿Qué pasa? ¿Por qué?
//
// RESULTADO ESPERADO
//  Misi dice: ¡Miau!
//  Lola dice: ¡Muuu!
//  ERROR: Cannot access protected property Gato::$nombre

class Animal
{
    public function __construct(protected string $nombre) {}

    public function getNombre()
    {
        return $this->nombre;
    }
}

class Gato extends Animal
{
    public function maullar()
    {
        // TODO 1
        return "$this->nombre dice ¡Miau!";
    }
}

// TODO 2: clase Vaca
class Vaca extends Animal
{
    public function mugir()
    {
        return "$this->nombre dice ¡Muuu!";
    }
}


$gato = new Gato("Misi");
$vaca = new Vaca("Lola");

echo $gato->maullar() . "\n";
echo $vaca->mugir() . "\n";

// Desde fuera NO se puede usar lo protected
try {
    echo $gato->getNombre();
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
