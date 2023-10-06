<?php
$nombre_lib;
$genero_lib;
$num_pag_lib;
$precio_lib;
if(isset($_POST["nombre"])){
    $nombre_lib = $_POST(["nombre"]);
    $genero_lib = $_POST(["genero"]);
    $num_pag_lib = $_POST(["num_paginas"]);
    $precio_lib = $_POST(["precio"]);
    echo $nombre_lib;
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
    <form method="post">
        <label for="nombre">Nombre del libro:</label>
        <input type="text" id="nombre" name="nombre" value="El nombre del viento"><br>
        <label for="genero">Genero del libro:</label>
        <input type="text" id="genero" name="genero" value="Aventuras"><br>
        <label for="num_paginas">Numero de paginas del libro:</label>
        <input type="number" id="num_paginas" name="num_paginas" value="100"><br>
        <label for="precio">Precio del libro:</label>
        <input type="number" id="precio" name="precio" value="20"><br>
        <input type="submit" name="aceptar" value="Aceptar">
    </form>
    
</body>
</html>