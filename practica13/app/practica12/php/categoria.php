<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
echo "Usuario: ".$_SESSION["username"]." <a href=\"./categoria.php\">Home</a> <a href=\"./carrito.php\">Ver carrito</a> <a href=\"logout.php\">Cerrar Sesión</a>";
?>



