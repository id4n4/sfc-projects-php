<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 9 · Estático y dinámico juntos
// Cada pedido tiene SU número y SU importe (dinámico).
// La tienda lleva UN contador de pedidos y UNA caja total (estático).
//
// QUÉ TIENES QUE HACER
//  1. En el constructor: suma 1 al contador, usa el contador como número del pedido,
//     guarda el importe y súmalo a la caja.
//  2. Completa resumen() para que devuelva "X pedidos · caja total: Y €".
//
// RESULTADO ESPERADO
//  Pedido 1: 20 €
//  Pedido 2: 35 €
//  Pedido 3: 15 €
//  3 pedidos · caja total: 70 €

class Pedido
{
    public $numero;                     // dinámico
    public $importe;                    // dinámico

    private static $contador = 0;       // estático
    private static $caja = 0;           // estático

    public function __construct($importe)
    {
        // TODO 1
    }

    public static function resumen()
    {
        // TODO 2
    }
}

$p1 = new Pedido(20);
$p2 = new Pedido(35);
$p3 = new Pedido(15);

echo "Pedido " . $p1->numero . ": " . $p1->importe . " €\n";
echo "Pedido " . $p2->numero . ": " . $p2->importe . " €\n";
echo "Pedido " . $p3->numero . ": " . $p3->importe . " €\n";
echo Pedido::resumen() . "\n";
