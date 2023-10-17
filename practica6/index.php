<?php
/*1) Contiene la palabra 'desarrollador' exactamente, con sus variaciones mayúsculas/minúsculas 
y puede haber más caracteres al principio y al final*/
if(isset($_REQUEST["ejercicio1"])){
    $regex = "/desarrollador/i";
    if(preg_match($regex,$_REQUEST["ejercicio1"])){
        echo "Ejercicio 1 es verdadero<br/>";
    }else{
        echo "Ejercicio 1 no es verdadero<br/>";
    }
}
/*1.1) Contiene la palabra 'desarrollador' exactamente,
 con sus variaciones mayúsculas/minúsculas pero NO puede
  haber más caracteres al principio y/o al final*/
if(isset($_REQUEST["ejercicio1punto1"])){
    $regex = "/^desarrollador$/i";
    if(preg_match($regex,$_REQUEST["ejercicio1punto1"])){
        echo "Ejercicio 1.1 es verdadero<br/>";
    }else{
        echo "Ejercicio 1.1 no es verdadero<br/>";
    }
}
/*2) Contiene la palabra 'desarrollador' exactamente al
 principio y puede haber más caracteres al final*/
if(isset($_REQUEST["ejercicio2"])){
    $regex = "/^desarrollador/i";
    if(preg_match($regex,$_REQUEST["ejercicio2"])){
        echo "Ejercicio 2 es verdadero<br/>";
    }else{
        echo "Ejercicio 2 no es verdadero<br/>";
    }
}
/*3) Contiene la palabra 'desarrollador' exactamente al final y 
puede haber más caracteres al inicio*/
 if(isset($_REQUEST["ejercicio3"])){
    $regex = "/desarrollador$/i";
    if(preg_match($regex,$_REQUEST["ejercicio3"])){
        echo "Ejercicio 3 es verdadero<br/>";
    }else{
        echo "Ejercicio 3 no es verdadero<br/>";
    }

}
/*4)Contiene una fecha con esta representación: DD/MM/YY, con D, M y Y dígito decimal.*/
if(isset($_REQUEST["ejercicio4"])){
    $regex = "/[0-3]{1}[0-9]{1}\/[0-1]{1}[0-9]{1}\/[0-9]{2}/i";
    if(preg_match($regex,$_REQUEST["ejercicio4"])){
        echo "Ejercicio 4 es verdadero<br/>";
    }else{
        echo "Ejercicio 4 no es verdadero<br/>";
    }
}
/*5) Sólo puede contener un teléfono de la Rioja: 941123456*/
if(isset($_REQUEST["ejercicio5"])){
    $regex = "/^941[0-9]{6}$/i";
    if(preg_match($regex,$_REQUEST["ejercicio5"])){
        echo "Ejercicio 5 es verdadero<br/>";
    }else{
        echo "Ejercicio 5 no es verdadero<br/>";
    }
}
/*6) Debe contener un nombre y dos apellidos (una cadena 
alfabética seguida de un espacio en blanco más otra cadena 
alfabética más otro espacio más otra cadena alfabética).*/
if(isset($_REQUEST["ejercicio6"])){
    $regex = "/[a-zA-z]+\s[a-zA-z]+\s[a-zA-z]+/i";
    if(preg_match($regex,$_REQUEST["ejercicio6"])){
        echo "Ejercicio 6 es verdadero<br/>";
    }else{
        echo "Ejercicio 6 no es verdadero<br/>";
    }
}
/*7) Debe contener tres caracteres alfabéticos individuales separados
 por un único espacio en blanco*/
if(isset($_REQUEST["ejercicio7"])){
    $regex = "/^[a-zA-z]{1}\s[a-zA-z]{1}\s[a-zA-z]{1}$/i";
    if(preg_match($regex,$_REQUEST["ejercicio7"])){
        echo "Ejercicio 7 es verdadero<br/>";
    }else{
        echo "Ejercicio 7 no es verdadero<br/>";
    }
}
/*8) Representa una multiplicación: 7*8 (un número más el operador * más otro número)*/
 if(isset($_REQUEST["ejercicio8"])){
    $regex = "/^[0-9]+\*[0-9]+$/i";
    if(preg_match($regex,$_REQUEST["ejercicio8"])){
        echo "Ejercicio 8 es verdadero<br/>";
    }else{
        echo "Ejercicio 8 no es verdadero<br/>";
    }
}
/*9) Representa una operación aritmética general: (un número más uno de 
los operadores aritméticos más otro número)*/
if(isset($_REQUEST["ejercicio9"])){
    $regex = "/^[0-9]+[\*\/\+\-][0-9]+$/i";
    if(preg_match($regex,$_REQUEST["ejercicio9"])){
        echo "Ejercicio 9 es verdadero<br/>";
    }else{
        echo "Ejercicio 9 no es verdadero<br/>";
    }
}
/*10) Valida el DNI (8 dígitos más un carácter alfabético):
Se divide el número entre 23 y el resto se sustituye por una letra 
que se determina por inspección mediante la siguiente tabla:*/
if(isset($_REQUEST["ejercicio10"])){
    $regex = "/^[0-9]+[\*\/\+\-][0-9]+$/i";
    if(preg_match($regex,$_REQUEST["ejercicio10"])){
        echo "Ejercicio 10 es verdadero<br/>";
    }else{
        echo "Ejercicio 10 no es verdadero<br/>";
    }
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
        <label for="ejercicio1">Ejercicio 1:</label>
        <input type="text" id="ejercicio1" name="ejercicio1"><br>
        <label for="ejercicio1punto1">Ejercicio 1.1:</label>
        <input type="text" id="ejercicio1punto1" name="ejercicio1punto1"><br>
        <label for="ejercicio2">Ejercicio 2:</label>
        <input type="text" id="ejercicio2" name="ejercicio2"><br>
        <label for="ejercicio3">Ejercicio 3:</label>
        <input type="text" id="ejercicio3" name="ejercicio3"><br>
        <label for="ejercicio4">Ejercicio 4:</label>
        <input type="text" id="ejercicio4" name="ejercicio4"><br>
        <label for="ejercicio5">Ejercicio 5:</label>
        <input type="text" id="ejercicio5" name="ejercicio5"><br>
        <label for="ejercicio6">Ejercicio 6:</label>
        <input type="text" id="ejercicio6" name="ejercicio6"><br>
        <label for="ejercicio7">Ejercicio 7:</label>
        <input type="text" id="ejercicio7" name="ejercicio7"><br>
        <label for="ejercicio8">Ejercicio 8:</label>
        <input type="text" id="ejercicio8" name="ejercicio8"><br>
        <label for="ejercicio9">Ejercicio 9:</label>
        <input type="text" id="ejercicio9" name="ejercicio9"><br>
        <label for="ejercicio10">Ejercicio 10:</label>
        <input type="text" id="ejercicio10" name="ejercicio10"><br>
        <input type="submit" name="aceptar" value="Enviar">
    </form>
</body>
</html>