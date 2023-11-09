<?php
use GestorProducto\GestorProducto;
use GestorCategoria\GestorCategoria;
include_once "./GestorCategoria.php";
include_once "./GestorProducto.php";
session_start();
$categoria;
$gestorCategoria = new GestorCategoria();
$gestorProducto =new GestorProducto();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
if(isset($_REQUEST["category"])){
    $categoria = $_REQUEST["category"];
}
echo "Usuario: ".$_SESSION["username"]." <a href=\"./categoria.php\">Home</a> <a href=\"./carrito.php\">Ver carrito</a> <a href=\"logout.php\">Cerrar Sesión</a>";
foreach($gestorCategoria->getCategoria($categoria) as $category){
    echo "<h1>".$category["nombre"]."</h1>";
}
?>
<form method="post" action="./aniadir.php">
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Peso</th>
            <th>Cantidad</th>
        </tr>
        <?php
        
            foreach($gestorProducto ->getProductos($categoria) as $producto){
                echo "<tr>";
                echo "<td>".$producto["nombre"]."</td>";
                echo "<td>".$producto["descripcion"]."</td>";
                echo "<td>".$producto["peso"]."</td>";
                echo "<td>".$producto["stock"]."</td>";
                echo "<td><input type=\"number\" min=\"0\" id=\"".$producto["codCat"]."\"></td>";
                echo "<td><input type=\"submit\" value=\"Comprar\"";
                echo "</tr>";
            }
        ?>

    </table>
</form>
