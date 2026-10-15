<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 4 · Getter y setter
// Si una variable es private, se lee con un GETTER y se cambia con un SETTER.
// El setter puede comprobar que el dato es correcto antes de guardarlo.

class Persona
{
    private $nombre;
    private $edad;

    public function __construct($nombre, $edad)
    {
        $this->nombre = $nombre;
        $this->setEdad($edad);
    }

    public function getNombre()          // GETTER: leer
    {
        return $this->nombre;
    }

    public function getEdad()            // GETTER: leer
    {
        return $this->edad;
    }

    public function setEdad($edad)       // SETTER: cambiar, pero con control
    {
        if ($edad < 0 || $edad > 120) {
            echo "Edad no válida: $edad (no se cambia)\n";
            return;
        }
        $this->edad = $edad;
    }
}

$p = new Persona("Luis", 30);
echo $p->getNombre() . " tiene " . $p->getEdad() . " años\n";

$p->setEdad(31);
echo "Ahora tiene " . $p->getEdad() . " años\n";

$p->setEdad(-4);
echo "Sigue teniendo " . $p->getEdad() . " años\n";
