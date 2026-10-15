<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 3 · public y private
// public  → se puede usar desde fuera de la clase
// private → SOLO se puede usar dentro de la clase
//
// QUÉ TIENES QUE HACER
//  1. Haz que la variable $dinero sea PRIVATE.
//  2. Completa meter() para que sume la cantidad al dinero.
//  3. Completa verDinero() para que devuelva el dinero.
//  4. Ejecuta y fíjate en el ERROR del final: ¿por qué sale?
//
// RESULTADO ESPERADO
//  Ana tiene 15 euros
//  ERROR: Cannot access private property Hucha::$dinero

class Hucha
{
    private $dinero = 0;             // TODO 1: cámbialo a private

    public function __construct(public string $dueno) {}

    public function meter($cantidad)
    {
        // TODO 2
        $this->dinero += $cantidad;
    }

    public function verDinero()
    {
        // TODO 3
        return $this->dinero;
    }
}

$hucha = new Hucha("Ana");
$hucha->meter(5);
$hucha->meter(10);

echo $hucha->dueno . " tiene " . $hucha->verDinero() . " euros\n";

// Prueba: intentar leer el dinero directamente desde fuera
try {
    echo $hucha->verDinero();
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
