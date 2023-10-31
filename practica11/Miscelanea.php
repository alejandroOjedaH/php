<?php namespace Miscelanea;

class Miscelanea{
    public static function calcularFactorial($n) {
        if ($n < 0) {
            return "El factorial no está definido para números negativos.";
        } elseif ($n == 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 1; $i <= $n; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }
    public static function esPalindromo($cadena) {
        $cadena = strtolower($cadena);
        $longitud = strlen($cadena);
        for ($i = 0; $i < $longitud / 2; $i++) {
            if (substr($cadena, $i, 1) !== substr($cadena, $longitud - $i - 1, 1)) {
                return false;
            }
        }
        
        return true;
    }
}
