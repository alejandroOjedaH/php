<?php
$usuario_login="Alejandro";
$contrasenna_login="Ojeda";
session_start();
$_SESSION["contador"] = 0;

if(isset($_REQUEST["usuario"])){
    $_SESSION["username"] = $_REQUEST["usuario"];
}
if(isset($_REQUEST["contrasenna"])){
    $_SESSION["password"]=$_REQUEST["contrasenna"];
}

if($_SESSION["username"] == $usuario_login && $_SESSION["password"]==$contrasenna_login){
    header("Location: calculos.php");
    die;
}else{
    header("Location: error.php");
    die;
}
