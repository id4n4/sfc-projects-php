<?php
header('Content-Type: text/plain; charset=utf-8');   // para que se vea bien en el navegador

// EJERCICIO 1 · Mi primera clase y mis primeros objetos
// Una CLASE es un molde. Un OBJETO es cada cosa que creo con el molde.
//
// QUÉ TIENES QUE HACER
//  1. Completa la función ladrar() para que devuelva "NOMBRE dice: ¡Guau!"
//     (pista: el nombre del perro es $this->nombre)
//  2. Crea un segundo perro llamado "Luna", de raza "Galgo".
//
// RESULTADO ESPERADO
//  Toby dice: ¡Guau!
//  Luna dice: ¡Guau!
//  Luna es un Galgo

class Perro
{
    public $nombre;
    public $raza;

    public function ladrar()
    {
        // TODO 1
        return "$this->nombre dice: ¡Guau!";
    }
}

$perro1 = new Perro();
$perro1->nombre = "Toby";
$perro1->raza = "Beagle";

// TODO 2: crea $perro2
$perro2 = new Perro();
$perro2->nombre = "Luna";
$perro2->raza = "Galgo";


echo $perro1->ladrar() . "\n";
echo $perro2->ladrar() . "\n";
echo $perro2->nombre . " es un " . $perro2->raza . "\n";
