<?php
session_start();
$idPro;
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
if(isset($_REQUEST["id"])){
    $idPro=$_REQUEST["id"];
}
if(isset($_REQUEST["cantidad"])){
    $_SESSION["carrito"][$idPro]= $_SESSION["carrito"][$idPro]-intval($_REQUEST["cantidad"],$base = 10);
    if($_SESSION["carrito"][$idPro]<=0){
        unset($_SESSION["carrito"][$idPro]);
    }
}

header("Location: ./carrito.php");
die;

