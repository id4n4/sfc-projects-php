<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 9 · Estático y dinámico juntos
// Cada pedido tiene SU número y SU importe (dinámico).
// La tienda lleva UN contador de pedidos y UNA caja total (estático).

class Pedido
{
    public $numero;                     // dinámico
    public $importe;                    // dinámico

    private static $contador = 0;       // estático
    private static $caja = 0;           // estático

    public function __construct($importe)
    {
        self::$contador++;
        $this->numero = self::$contador;    // el número sale del contador común
        $this->importe = $importe;
        self::$caja = self::$caja + $importe;
    }

    public static function resumen()
    {
        return self::$contador . " pedidos · caja total: " . self::$caja . " €";
    }
}

$p1 = new Pedido(20);
$p2 = new Pedido(35);
$p3 = new Pedido(15);

echo "Pedido " . $p1->numero . ": " . $p1->importe . " €\n";
echo "Pedido " . $p2->numero . ": " . $p2->importe . " €\n";
echo "Pedido " . $p3->numero . ": " . $p3->importe . " €\n";
echo Pedido::resumen() . "\n";
