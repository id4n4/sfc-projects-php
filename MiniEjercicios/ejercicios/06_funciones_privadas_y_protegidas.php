<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 6 · Funciones public, protected y private
// Las funciones (métodos) siguen las mismas reglas que las variables.
//
// QUÉ TIENES QUE HACER
//  1. Pon la palabra correcta (public, protected o private) delante de cada función:
//     - etiqueta()      → la usa todo el mundo
//     - formatear()     → la usan esta clase y su hija ProductoOferta
//     - precioConIva()  → solo la usa esta clase
//  2. Ejecuta y comprueba que salen los dos errores del final.
//
// RESULTADO ESPERADO
//  Camiseta: 12,10 €
//  OFERTA Gorra: ahorras 2,00 €
//  ERROR: Call to protected method Producto::formatear() from global scope
//  ERROR: Call to private method Producto::precioConIva() from global scope

class Producto
{
    public $nombre;
    private $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /* TODO */ function etiqueta()
    {
        return $this->nombre . ": " . $this->formatear($this->precioConIva());
    }

    /* TODO */ function formatear($numero)
    {
        return number_format($numero, 2, ',', '.') . " €";
    }

    /* TODO */ function precioConIva()
    {
        return $this->precio * 1.21;
    }
}

class ProductoOferta extends Producto
{
    public function etiquetaOferta()
    {
        return "OFERTA " . $this->nombre . ": ahorras " . $this->formatear(2);
    }
}

$p = new Producto("Camiseta", 10);
echo $p->etiqueta() . "\n";

$o = new ProductoOferta("Gorra", 8);
echo $o->etiquetaOferta() . "\n";

try {
    echo $p->formatear(5);
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
try {
    echo $p->precioConIva();
} catch (Error $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
