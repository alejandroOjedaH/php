<?php
$datos;
if(isset($_REQUEST['libro'])){
    var_dump(unserialize($_REQUEST['libro']));
}
/*10) Serializa el objeto tras recibir la petición el script destino 
(https://www.php.net/manual/es/language.oop5.serialization.php). Haz las modificaciones necesarias
 para que al regresar al script origen se des-serialice el objeto y lo recuperes 
 e imprimas sus valores atributo a atributo.
*/
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
    <form action="php\datos.php" method="post" enctype="multipart/form-data">
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