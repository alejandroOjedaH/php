<?php
/*2) Crea un script destino que valide que el usuario es correcto 
o no (validación hardcodeada). Si no lo es, deberá mostrar una página 
de error maquetada con tal fin, llamada error.php. Si lo es, redirigirá 
la página a un tercer script llamado calculos.php y almacenará la sesión 
como usuario autenticado.*/


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
    <!--1) Crea un formulario que permita introducir usuario y contraseña.-->
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br>
        <label for="contrasenna">Contraseña:</label>
        <input type="password" id="contrasenna" name="contrasenna"><br>
        <input type="submit" name="aceptar" value="Logear">
    </form>
</body>
</html>