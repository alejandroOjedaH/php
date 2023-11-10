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
    if(isset($_SESSION["carrito"][$idPro])){
        $_SESSION["carrito"][$idPro]= $_SESSION["carrito"][$idPro]+intval($_REQUEST["cantidad"],$base = 10);
    }else{
        $_SESSION["carrito"][$idPro]= intval($_REQUEST["cantidad"],$base = 10);
    }
}
if(isset($_REQUEST["category"])){
    header("Location: ./productos.php?category=".$_REQUEST["category"]);
    die;
}
header("Location: ./categoria.php");
die;