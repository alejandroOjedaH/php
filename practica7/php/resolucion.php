<?php
/*4)Se efectuará el cálculo elegido
en un script destino (resolucion.php) y el resultado se devolverá 
al script calculos.php (encima o debajo del formulario).

5) Si hay al menos 5 operaciones con resultados inferiores a 1000, 
se redirigirá a ecuacion.php. Usa sesiones para gestionar el contador.*/
$numero1;
$numero2;
$operador;
session_start();


if(isset($_REQUEST["numero1"])){
    $numero1 = $_REQUEST["numero1"];
}
if(isset($_REQUEST["numero2"])){
    $numero2 = $_REQUEST["numero2"];
}
if(isset($_REQUEST["operador"])){
    $operador = $_REQUEST["operador"];
}
switch ($operador) {
    case "+":
        $_SESSION["resultado"] = $numero1 + $numero2;
        break;
    case "-":
        $_SESSION["resultado"] = $numero1 - $numero2;
        break;
    case "*":
        $_SESSION["resultado"] = $numero1 * $numero2;
        break;
    case "/":
        $_SESSION["resultado"] = $numero1 / $numero2;
        break;
}
if($_SESSION["resultado"]<1000){
    if(isset($_SESSION["contador"])){
        $_SESSION["contador"] = $_SESSION["contador"]+1;
    }
}
if($_SESSION["contador"]<5){
    header("Location: calculos.php");
    die;
}else{
    header("Location: ecuacion.php");
    die;
}