<?php
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
$archivo_lib;
/*6) Modifica la validación del formulario para que sólo se admita un envío de tipo POST.
 Investiga la variable superglobal $_SERVER["REQUEST_METHOD"]*/
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
<<<<<<< HEAD
    if(!empty($_FILES["archivo"] && comprobar_archivo($_FILES["archivo"]))){
=======
    if(!empty($_FILES["archivo"]) && comprobarArchivo($_FILES["archivo"])){
>>>>>>> e02ae8daf3d4c43231803576470a08eb5400eb6d
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
<<<<<<< HEAD
function comprobar_archivo($archivo){
    $pattern = "/\.(jpg|png|gif|jpeg)$/";
    if(!preg_match($pattern,$archivo["name"])){
        return false;
    }
    if($archivo["size"]>(2*1024*1024*8)){
=======
function comprobarArchivo($archivo){
    $regex = "/\.(jpg|png|gif)$/i";
    if(!preg_match($regex,$archivo["name"])){
        return false;
    }
    if($archivo["size"]>2*1024*1024){
>>>>>>> e02ae8daf3d4c43231803576470a08eb5400eb6d
        return false;
    }
    return true;
}
?>
<!--7) Incluye un campo de tipo file para que puedas subir una fotografía del hobby. 
Sólo podrá ser <=2 MegaBytes, y tendrás que guardarla en un directorio específico. 
Debes validar que el archivo, además, sólo sea un PDF, verificando a la vez 
que la extensión del archivo es '.pdf' y que el tipo de archivo también.-->
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
<<<<<<< HEAD
        <input type="file" id="archivo" name="archivo" accept="image/jpg, image/png, image/gif, image/jpeg"><br>
=======
        <input type="file" id="archivo" name="archivo" accept="image/*"><br>
>>>>>>> e02ae8daf3d4c43231803576470a08eb5400eb6d
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="hidden" id="validar" name="validar" value="validar">
    </form>
    
</body>
</html>