<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h1>Carrito de la compra</h1>

<table>
    <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Peso</th>
        <th>Unidades</th>
    </tr>
    <?php
    $productos =$datos['productos'][0];
    $unidades =$datos['productos'][1];
    for ($i=0; $i < count($productos); $i++) {
        $producto =$productos[$i];
        $valor = $unidades[$i];
        echo "<form method=\"post\" action=\"./carrito/actualizar\">";
        echo "<tr>";
        echo "<td>".$producto->nombre."</td>";
        echo "<td>".$producto->descripcion."</td>";
        echo "<td>".$producto->peso."</td>";
        echo "<td>".$valor."</td>";
        echo "<td><input type=\"number\" min=\"0\" id=\"cantidad\" name=\"cantidad\"></td>";
        echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"".$producto->codPro."\">";
        echo "<td><input type=\"submit\" value=\"Eliminar\"></td>";
        echo "</tr>";
        echo "</form>";
    }
    ?>
</table>
<a href="./pedido">Realizar Pedido</a>
<script type="text/javascript" src="./app/js/carrito.js"></script>