<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
    <h1>Iniciar Sesión:</h1>
    <form method="get" action="validador.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br>
        <label for="contrasenna">Contraseña:</label>
        <input type="password" id="contrasenna" name="contrasenna"><br>
        <input type="submit" name="aceptar" value="Logear">
    </form>
</body>
</html>