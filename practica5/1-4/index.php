<?php
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
/*2) Los campos se enviarán al mismo script destino y se recibirán los valores de los parámetros.  
Incluye para ello algún parámetro de control que indique que el formulario se ha enviado, 
independiente del resto de campos

3) Al obtenerlos, como cadena, deberás convertirlos al tipo de dato primitivo que corresponda: 
integer, float, boolean,  string (si es fecha mantenlo como cadena) y genera un mensaje que 
indique si se han recibido o no todos los parámetros en el propio script destino.
4) Modifica 3) para que el mensaje se devuelva al formulario principal (se imprimirá centrado
justo encima del formulario)*/
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
        echo "No se han enviado estos campos: ";
        for ($i=0; $i < count($no_recibidos); $i++) { 
            echo " ".$no_recibidos[$i];
        }
    }else{
        echo "Se han recibido todos los campos <br/>";
    }
}
?>
<!--1) Crea un formulario de tu hobby: tantos campos como atributos del hobby, con método GET.-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
    <h1>Libros:</h1>
    <form method="get">
        <label for="nombre">Nombre del libro:</label>
        <input type="text" id="nombre" name="nombre" value="El nombre del viento"><br>
        <label for="genero">Genero del libro:</label>
        <input type="text" id="genero" name="genero"><br>
        <label for="num_paginas">Numero de paginas del libro:</label>
        <input type="number" id="num_paginas" name="num_paginas" value="100"><br>
        <label for="precio">Precio del libro:</label>
        <input type="number" id="precio" name="precio" value="20"><br>
        <input type="submit" name="aceptar" value="Aceptar">
        <input type="hidden" id="validar" name="validar" value="validar">
    </form>
    
</body>
</html>