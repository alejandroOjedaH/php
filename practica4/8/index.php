<?php
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
$archivo_lib;
/*8)  Modifica 8 y guarda sólo el archivo si no existe 
previamente en el directorio de PDFs. Usa la función file_exists(); Necesita un path absoluto, 
tendrás que construirlo con la variable mágica __FILE__ y la función dirname.*/
if(isset($_POST["validar"])){
    echo $_SERVER['REQUEST_METHOD']."<br/>";
    $no_recibidos=[];
    if(!empty($_POST["nombre"])){
        $nombre_lib = $_POST["nombre"];
    }else{
        array_push($no_recibidos,"nombre");
    }
    if(!empty($_POST["genero"])){
        $genero_lib = $_POST["genero"];
    }else{
        array_push($no_recibidos,"genero");
    }
    if(!empty($_POST["num_paginas"])){
        $num_pag_lib = intval($_POST["num_paginas"],10);
    }else{
        array_push($no_recibidos,"numero de paginas");
    }
    if(!empty($_POST["precio"])){
        $precio_lib = floatval($_POST["precio"]);
    }else{
        array_push($no_recibidos,"precio");
    }
    if(!empty($_FILES["archivo"] && comprobar_archivo($_FILES["archivo"]))){
        $archivo_lib = $_FILES["archivo"];
    }else{
        array_push($no_recibidos,"archivo");
    }
    if(count($no_recibidos)>0){
        echo "No se han enviado estos campos: ";
        for ($i=0; $i < count($no_recibidos); $i++) { 
            echo " ".$no_recibidos[$i];
        }
    }else{
        echo "Se han recibido todos los campos <br/>";
    }
}
function comprobar_archivo($archivo){
    $pattern = "/\.(jpg|png|gif|jpeg)$/";
    if(!preg_match($pattern,$archivo["name"])){
        return false;
    }
    if($archivo["size"]>(2*1024*1024*8)){
        return false;
    }
    return true;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
    <h1>Libros:</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del libro:</label>
        <input type="text" id="nombre" name="nombre" value="El nombre del viento"><br>
        <label for="genero">Genero del libro:</label>
        <input type="text" id="genero" name="genero"><br>
        <label for="num_paginas">Numero de paginas del libro:</label>
        <input type="number" id="num_paginas" name="num_paginas" value="100"><br>
        <label for="precio">Precio del libro:</label>
        <input type="number" id="precio" name="precio" value="20"><br>
        <label for="archivo">Archivo pdf:</label>
        <input type="file" id="archivo" name="archivo" accept="image/jpg, image/png, image/gif, image/jpeg"><br>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="hidden" id="validar" name="validar" value="validar">
    </form>
</body>
</html>