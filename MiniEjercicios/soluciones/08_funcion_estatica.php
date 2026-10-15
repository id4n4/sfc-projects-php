<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 8 · Función estática
// Una función static se llama con  NombreClase::funcion()  SIN crear ningún objeto.
// Sirve para utilidades que no dependen de un objeto concreto.
// Dentro de una función static NO existe $this.

class Calculadora
{
    public static function sumar($a, $b)
    {
        return $a + $b;
    }

    public static function doble($numero)
    {
        return $numero * 2;
    }

    public static function esPar($numero)
    {
        return $numero % 2 == 0;
    }
}

// No hacemos "new Calculadora()": usamos la clase directamente
echo "3 + 4 = " . Calculadora::sumar(3, 4) . "\n";
echo "El doble de 21 es " . Calculadora::doble(21) . "\n";
echo "¿8 es par? " . (Calculadora::esPar(8) ? "sí" : "no") . "\n";
echo "¿7 es par? " . (Calculadora::esPar(7) ? "sí" : "no") . "\n";
