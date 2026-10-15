<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 6 · Funciones public, protected y private
// Las funciones (métodos) siguen las mismas reglas que las variables.

class Producto
{
    public $nombre;
    private $precio;

    public function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    // public: la usa todo el mundo
    public function etiqueta()
    {
        return $this->nombre . ": " . $this->formatear($this->precioConIva());
    }

    // protected: la pueden usar esta clase y sus hijas
    protected function formatear($numero)
    {
        return number_format($numero, 2, ',', '.') . " €";
    }

    // private: solo esta clase
    private function precioConIva()
    {
        return $this->precio * 1.21;
    }
}

class ProductoOferta extends Producto
{
    public function etiquetaOferta()
    {
        // La hija puede usar formatear() (protected)...
        return "OFERTA " . $this->nombre . ": ahorras " . $this->formatear(2);
    }
}

$p = new Producto("Camiseta", 10);
echo $p->etiqueta() . "\n";

$o = new ProductoOferta("Gorra", 8);
echo $o->etiquetaOferta() . "\n";

// ...pero desde fuera NO se pueden llamar las funciones protected ni private
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
