<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 4 · Getter y setter
// Si una variable es private, se lee con un GETTER y se cambia con un SETTER.
// El setter puede comprobar que el dato es correcto antes de guardarlo.
//
// QUÉ TIENES QUE HACER
//  1. Completa getEdad(): devuelve la edad.
//  2. Completa setEdad(): si la edad es menor que 0 o mayor que 120,
//     escribe "Edad no válida: X (no se cambia)" y no la guardes.
//     Si es correcta, guárdala.
//
// RESULTADO ESPERADO
//  Luis tiene 30 años
//  Ahora tiene 31 años
//  Edad no válida: -4 (no se cambia)
//  Sigue teniendo 31 años

class Persona
{
    private int $edad;

    public function __construct(
        private string $nombre,
        int $edad
    ) {
        $this->setEdad($edad);
    }

    public function getNombre()          // GETTER: leer
    {
        return $this->nombre;
    }

    public function getEdad()            // GETTER: leer
    {
        // TODO 1
        return $this->edad;
    }

    public function setEdad($edad)       // SETTER: cambiar, pero con control
    {
        // TODO 2
        if ($edad > 0 && $edad <= 120) $this->edad = $edad;
        else echo "Edad no valida: $edad (no se cambia)\n";
    }
}

$p = new Persona("Luis", 30);
echo $p->getNombre() . " tiene " . $p->getEdad() . " años\n";

$p->setEdad(31);
echo "Ahora tiene " . $p->getEdad() . " años\n";

$p->setEdad(-4);
echo "Sigue teniendo " . $p->getEdad() . " años\n";
