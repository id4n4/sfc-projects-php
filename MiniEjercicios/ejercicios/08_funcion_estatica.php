<?php
header('Content-Type: text/plain; charset=utf-8');

// EJERCICIO 8 · Función estática
// Una función static se llama con  NombreClase::funcion()  SIN crear ningún objeto.
// Dentro de una función static NO existe $this.
//
// QUÉ TIENES QUE HACER
//  1. Completa doble(): devuelve el número multiplicado por 2.
//  2. Escribe la función estática esPar($numero): devuelve true si el número es par.
//     (pista: un número es par si  $numero % 2 == 0)
//
// RESULTADO ESPERADO
//  3 + 4 = 7
//  El doble de 21 es 42
//  ¿8 es par? sí
//  ¿7 es par? no

class Calculadora
{
    public static function sumar(int $a, int $b)
    {
        return $a + $b;
    }

    public static function doble(int $numero)
    {
        // TODO 1
        return $numero * 2;
    }

    // TODO 2: función estática esPar($numero)
    public static function esPar(int $numero)
    {
        return $numero % 2 === 0;
    }
}

echo "3 + 4 = " . Calculadora::sumar(3, 4) . "\n";
echo "El doble de 21 es " . Calculadora::doble(21) . "\n";
echo "¿8 es par? " . (Calculadora::esPar(8) ? "sí" : "no") . "\n";
echo "¿7 es par? " . (Calculadora::esPar(7) ? "sí" : "no") . "\n";
