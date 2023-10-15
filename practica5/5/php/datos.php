<?php
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
$texto;
if(isset($_GET["validar"])){
    $no_recibidos=[];
    if(!empty($_GET["nombre"])){
        $nombre_lib = $_GET["nombre"];
    }else{
        array_push($no_recibidos,"nombre");
    }
    if(!empty($_GET["genero"])){
        $genero_lib = $_GET["genero"];
    }else{
        array_push($no_recibidos,"genero");
    }
    if(!empty($_GET["num_paginas"])){
        $num_pag_lib = intval($_GET["num_paginas"],10);
    }else{
        array_push($no_recibidos,"numero de paginas");
    }
    if(!empty($_GET["precio"])){
        $precio_lib = floatval($_GET["precio"]);
    }else{
        array_push($no_recibidos,"precio");
    }
    if(count($no_recibidos)>0){
        $texto =  "No se han enviado estos campos: ";
        for ($i=0; $i < count($no_recibidos); $i++) { 
            $texto = $texto." ".$no_recibidos[$i];
        }
    }else{
        $texto="Se han recibido todos los campos <br/>";
    }
    header('Location: ../index.php?datos='.$texto);
    die;
}
?>