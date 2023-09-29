<?php
/*A) Crea un script que determine si un número no es primo y, 
además, si precede a otro que sí es primo.*/

primo_primo_siguente(8);

function primo_primo_siguente($numero){
    if(es_primo($numero)==true){
        echo "El numero ".$numero." es primo";        
    }else{
        echo "El numero ".$numero." no es primo";
    }
    echo "<br/>";
    $numero++;
    if(es_primo($numero)==true){
        echo "El numero ".$numero." es primo";        
    }else{
        echo "El numero ".$numero." no es primo";
    }
}
function es_primo($numero){
    $i=2;
    while($i<$numero){
        if($numero%$i == 0){
            return false;
        }
        $i++;
    }
    return true;
}

/*B) Genera una estructura para que haya al menos una clave cuyos valor represente uno 
de estos tipos de datos: cadena, entero, decimal y una fecha. Genera un catálogo de N 
entidades de forma aleatoria, donde N es una constante PHP definida correctamente. Para ello:*/
    //B.1) Si el tipo de dato es cadena, tendrá entre 1 y 10 caracteres.
    //B.2) Si el tipo de dato es entero, deberá estar comprendido entre 3 y 8 dígitos.
    /*B.3) Si el tipo de dato es decimal, la parte entera deberá tener entre 1 y 3 dígitos, 
    y la parte decimal entre 1 y 5 dígitos*/
    /*B.4) Si el tipo de dato es tipo fecha, deberá estar comprendida entre el 01/01/2021 y el 10/10/2021*/
const VUELTAS = 5;
$biblioteca = [];
for ($i=0; $i < VUELTAS; $i++) { 
    $libro = [
        "titulo" => generar_cadena(),
        "n_paginas" => generar_entero(),
        "precio" => generar_decimal(),
        "fecha_publicacion" => generar_fecha()
    ];
    array_push($biblioteca,$libro);
}
echo "<br/>";
var_dump($biblioteca);

function generar_cadena(){
    $cadena ="";
    for ($i=0; $i < rand(1,10); $i++) { 
        $cadena = $cadena.rand(0,9);
    }
    return $cadena.".";
}
function generar_entero(){
    return rand(3,8);
}
function generar_decimal(){
    $enetera = rand(0,999);
    $decimal = rand(0,99999);
    while($decimal>=1){
        $decimal = $decimal/10;
    }
    $numero = $enetera + $decimal;
    return $numero;
}
function generar_fecha(){
    $dia = rand(1,28);
    $mes = rand(1,12);
    $ano = rand(1, 3000);
    return date("d-m-Y",strtotime($ano.'/'.$mes.'/'.$dia));
}