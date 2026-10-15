<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 10 · Repaso de todo
// public, protected, private, getter, herencia, static.

class Empleado
{
    public $nombre;                         // public
    protected $sueldo;                      // protected: la hija lo usa
    private $dni;                           // private: solo esta clase
    public static $plantilla = 0;           // static: uno para todos

    public function __construct($nombre, $sueldo, $dni)
    {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->dni = $dni;
        self::$plantilla++;
    }

    public function getSueldo()             // getter
    {
        return $this->sueldo;
    }

    public function dniOculto()             // enseña solo una parte del dato privado
    {
        return "****" . substr($this->dni, -4);
    }
}

class Jefe extends Empleado
{
    public function subirSueldo($euros)
    {
        $this->sueldo = $this->sueldo + $euros;   // protected: la hija SÍ puede
    }
}

$e = new Empleado("Ana", 1500, "12345678A");
$j = new Jefe("Luis", 2000, "87654321B");
$j->subirSueldo(300);

echo $e->nombre . " cobra " . $e->getSueldo() . " € · DNI " . $e->dniOculto() . "\n";
echo $j->nombre . " cobra " . $j->getSueldo() . " € · DNI " . $j->dniOculto() . "\n";
echo "Personas en plantilla: " . Empleado::$plantilla . "\n";
