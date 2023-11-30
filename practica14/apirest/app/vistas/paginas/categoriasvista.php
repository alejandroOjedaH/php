<?php require_once RUTA_APP.'/vistas/inc/header.php';?>
<h1>Lista de categorías</h1>

<?php
    foreach ($datos as $categoria) {
        echo "<li><a href=\"./categorias/".$categoria["codCat"]."\">".$categoria["descripcion"]."</a></li>";
    }
?>
