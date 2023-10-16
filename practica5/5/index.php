<?php
$datos;
if(isset($_REQUEST['datos'])){
    echo $_REQUEST['datos'];
}
?>
<!--5) Modifica el formulario para que gestione la lógica en distintos scripts (origen y destino distintos). 
Deberá retornar igualmente al script origen con el mensaje establecido en 3).-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
    <h1>Libros:</h1>
    <form action="./php/datos.php" method="get">
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