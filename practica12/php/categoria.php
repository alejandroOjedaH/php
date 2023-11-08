<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
?>

<h1>Lista de categorías</h1>
<ul>
    <li><a href="./alcohol.php">Bebidas con</a></li>
    <li><a href="">Bebidas sin</a></li>
    <li><a href="">Comida</a></li>
</ul>
<?php
echo "Usuario: ".$_SESSION["username"]." <a href=\"./categoria.php\">Home</a> <a href=\"./carrito.php\">Ver carrito</a> <a href=\"logout.php\">Cerrar Sesión</a>";