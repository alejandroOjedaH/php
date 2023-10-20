<?php
/*
1) Instala composer.phar en tu equipo e incluyelo en tu 
PATH para que puedas llamarlo desde cualquier directorio del SO.

2) Instalar PHPMailer tal y como indica en 
https://github.com/PHPMailer/PHPMailer mediante composer.*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
    <h1>Auntentificación:</h1>
    <form method="get" action="./php/validador.php">
    <!--1) Crea un formulario que permita introducir usuario y contraseña.-->
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario"><br>
        <label for="contrasenna">Contraseña:</label>
        <input type="password" id="contrasenna" name="contrasenna"><br>
        <input type="submit" name="aceptar" value="Logear">
    </form>
</body>
</html>