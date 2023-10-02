<?php namespace Ayuda;

class Ayuda{
    public static function generar_cadena(){
        $cadena ="";
        for ($i=0; $i < rand(1,10); $i++) { 
            $cadena = $cadena.chr(rand(65,90));
        }
        return $cadena.".";
    }
    public static function generar_entero(){
        return rand(3,8);
    }
    public static function generar_decimal(){
        $enetera = rand(0,999);
        $decimal = rand(0,99999);
        while($decimal>=1){
            $decimal = $decimal/10;
        }
        $numero = $enetera + $decimal;
        return $numero;
    }
    public static function generar_fecha(){
        $dia = rand(1,28);
        $mes = rand(1,12);
        $ano = rand(1, 3000);
        return date("d-m-Y",strtotime($ano.'/'.$mes.'/'.$dia));
    }
}