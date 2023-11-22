<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
echo "Usuario: ".$_SESSION["username"]." <a href=\"./categoria.php\">Home</a> <a href=\"./carrito.php\">Ver carrito</a> <a href=\"logout.php\">Cerrar Sesión</a>";
?>

<h1>Lista de categorías</h1>
<ul>
    <li><a href="./productos.php?category=1">Bebidas con</a></li>
    <li><a href="./productos.php?category=2">Bebidas sin</a></li>
    <li><a href="./productos.php?category=3">Comida</a></li>
</ul>

