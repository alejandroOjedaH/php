<?php require_once RUTA_APP.'/vistas/inc/header.php';

echo "<h1>".$datos["categoria"]."</h1>";
?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Peso</th>
            <th>Cantidad</th>
        </tr>
    <?php
            
        foreach($datos['productos'] as $producto){
            echo "<form method=\"post\" action=\"./agregar\">";
            echo "<tr>";
            echo "<td>".$producto["nombre"]."</td>";
            echo "<td>".$producto["descripcion"]."</td>";
            echo "<td>".$producto["peso"]."</td>";
            echo "<td>".$producto["stock"]."</td>";
            echo "<td><input type=\"number\" min=\"0\" id=\"cantidad\" name=\"cantidad\"></td>";
            echo "<td><input type=\"submit\" value=\"Comprar\"</td>";
            echo "<input type=\"hidden\" id=\"category\" name=\"category\" value=\"".$datos["categoria"]."\">";
            echo "<input type=\"hidden\" id=\"id\" name=\"id\" value=\"".$producto["codPro"]."\">";
            echo "</tr>";
            echo "</form>";
        }
    ?>
</table>