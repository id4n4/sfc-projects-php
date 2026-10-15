<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 3 · public y private
// public  → se puede usar desde fuera de la clase
// private → SOLO se puede usar dentro de la clase

class Hucha
{
    public $dueno;
    private $dinero = 0;            // nadie de fuera puede tocarlo directamente

    public function __construct($dueno)
    {
        $this->dueno = $dueno;
    }

    public function meter($cantidad)
    {
        $this->dinero = $this->dinero + $cantidad;   // dentro de la clase SÍ se puede
    }

    public function verDinero()
    {
        return $this->dinero;
    }
}

$hucha = new Hucha("Ana");
$hucha->meter(5);
$hucha->meter(10);

echo $hucha->dueno . " tiene " . $hucha->verDinero() . " euros\n";

// Prueba: intentar leer el dinero directamente desde fuera
try {
    echo $hucha->dinero;
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
