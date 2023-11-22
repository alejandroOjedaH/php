<?php
use GestorProducto\GestorProducto;
include_once "./GestorProducto.php";
session_start();
$gestorProducto = new GestorProducto();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
    echo "Usuario: ".$_SESSION["username"]." <a href=\"./categoria.php\">Home</a> <a href=\"./carrito.php\">Ver carrito</a> <a href=\"logout.php\">Cerrar Sesión</a>";
?>
<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Peso</th>
        <th>Unidades</th>
    </tr>
    <?php
    for ($i=0; $i < count($_SESSION["carrito"]); $i++) { 
        $clave = array_keys($_SESSION["carrito"])[$i];
        $valor = $_SESSION["carrito"][$clave];

        $producto;
        foreach ($gestorProducto->getProducto($clave) as $value) {
            $producto = $value;
        }

        echo "<form method=\"post\" action=\"eliminar.php?id=".$producto["codPro"]."\">";
        echo "<tr>";
        echo "<td>".$producto["nombre"]."</td>";
        echo "<td>".$producto["descripcion"]."</td>";
        echo "<td>".$producto["peso"]."</td>";
        echo "<td>".$valor."</td>";
        echo "<td><input type=\"number\" min=\"0\" id=\"cantidad\" name=\"cantidad\"></td>";
        echo "<td><input type=\"submit\" value=\"Eliminar\"></td>";
        echo "</tr>";
        echo "</form>";
    }
    ?>
</table>
<a href="./procesarPedido.php">Realizar Pedido</a>