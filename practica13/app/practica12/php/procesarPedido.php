<?php
use GestorUsuario\GestorUsuario;
use Mailer\Mailer;
require_once 'Mailer.php';
include_once "GestorUsuario.php";
session_start();
$productos = $_SESSION["carrito"];

if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}

agregarPedido();
$_SESSION["carrito"] = [];

header("Location: ./carrito.php");
die;
function agregarPedido(){
    try{
        $mailer = new Mailer();
        $gestorUsuario = new GestorUsuario();

        $codPed = $gestorUsuario -> agregarPedido(recuperarCodRes());
        
        for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
            $clave = array_keys($_SESSION["carrito"])[$i];
            $gestorUsuario -> agregarPedidoProducto($codPed,$clave);
        }
        $mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "El pedido se ha hecho con exito");
    }catch(Exception $e){
        $mailer->send("lombproyecto@gmail.com",$_SESSION["username"], "No se ha podido realizar el pedido");
    }
}

function recuperarCodRes(){
    $gestorUsuario = new GestorUsuario();
    foreach ($gestorUsuario ->getCodigo($_SESSION["username"]) as $row) {
        return $row["codRes"];
    }
}