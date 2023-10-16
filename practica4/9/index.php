<?php
use Libro\Libro;
include 'clases\Libro.php';
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
$archivo_lib;
$libro = new Libro();
/*9) Modifica el script destino para que, al recibir los parámetros el script destino, 
los almacene en un objeto de tu clase Hobby. Agrega el atributo fotografía
 "mágicamente", que almacenará el path de la imagen. La clase estará definida en un 
 directorio aparte, realiza las inclusiones y llamadas respectivas.*/
if(isset($_POST["validar"])){
    echo $_SERVER['REQUEST_METHOD']."<br/>";
    $no_recibidos=[];
    if(!empty($_POST["nombre"])){
        $nombre_lib = $_POST["nombre"];
        $libro->nombre =$nombre_lib;
    }else{
        array_push($no_recibidos,"nombre");
    }
    if(!empty($_POST["genero"])){
        $genero_lib = $_POST["genero"];
        $libro->genero =$genero_lib;
    }else{
        array_push($no_recibidos,"genero");
    }
    if(!empty($_POST["num_paginas"])){
        $num_pag_lib = intval($_POST["num_paginas"],10);
        $libro->numero_paginas =$num_pag_lib;
    }else{
        array_push($no_recibidos,"numero de paginas");
    }
    if(!empty($_POST["precio"])){
        $precio_lib = floatval($_POST["precio"]);
        $libro->precio =$precio_lib;
    }else{
        array_push($no_recibidos,"precio");
    }
    if(!empty($_FILES["archivo"]) && comprobarArchivo($_FILES["archivo"])){
        $archivo_lib = $_FILES["archivo"];
        $libro->foto =$archivo_lib;
        if(!file_exists($archivo_lib["name"])){
            move_uploaded_file($archivo_lib["tmp_name"],$archivo_lib["name"]);
        }
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
    var_dump($libro);
}
function comprobarArchivo($archivo){
    $regex = "/\.(jpg|png|gif)$/i";
    if(!preg_match($regex,$archivo["name"])){
        return false;
    }
    if($archivo["size"]>2*1024*1024){
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
        <input type="file" id="archivo" name="archivo" accept="image/*"><br>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="hidden" id="validar" name="validar" value="validar">
    </form>
    
</body>
</html>