<?php
use Libro\Libro;
include '..\clases\Libro.php';
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
$archivo_lib;
$libro = new Libro();
/*10) Serializa el objeto tras recibir la petición el script destino 
(https://www.php.net/manual/es/language.oop5.serialization.php). 
Haz las modificaciones necesarias para que al regresar al script origen se des-serialice el objeto 
y lo recuperes e imprimas sus valores atributo a atributo.*/
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
    header('Location: ../index.php?libro='.serialize($libro));
    die;
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