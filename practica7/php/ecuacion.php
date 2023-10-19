<?php
/*6) En ecuacion.php habrá un enlace para cerrar sesión 
y para dirigirse a calculos.php

6.1) Debes evitar una redirección entre ecuacion.php 
y calculos.php, para ello elimina o resetea la sesión 
que gestiona el contador de cálculos aritméticos.

6.2) El script ecuacion.php dispondrá de un formulario que le permitirá 
introducir los coeficientes de una ecuación de segundo grado y resolverla 
en el mismo script (mediante recarga al pulsar el botón de resolver en el 
formulario). La fórmula es x = (-b+-raiz(b*b-4*a*c))/(2*a)*/
$numero1;
        $numero2;
        $numero3;
        if(isset($_REQUEST["numero1"])){
            $numero1 = $_REQUEST["numero1"];
        }
        if(isset($_REQUEST["numero2"])){
            $numero2 = $_REQUEST["numero2"];
        }
        if(isset($_REQUEST["numero3"])){
            $numero3 = $_REQUEST["numero3"];
        }
session_start();
$_SESSION = [];

?>
<html>
<body>
    <form action="calculos.php" method="get">
        <input type="submit" value="Volver a calculos">
    </form>
    <form action="logout.php" method="get">
        <input type="submit" value="Cerrar sesion">
    </form>
    <form method="get">
        <br>
        <h1>Resolver ecuacion segundo grado</h1><br>
        <label for="numero1">a:</label>
        <input type="number" id="numero1" name="numero1"><br>
        <label for="numero2">b:</label>
        <input type="number" id="numero2" name="numero2"><br>
        <label for="numero3">c:</label>
        <input type="number" id="numero3" name="numero3"><br>
        <br>
        <input type="submit" value="Resolver">
        <?php
        if(isset($numero1) && isset($numero2) && isset($numero3)){
            echo "<br>Resultado de la ecuacion: ".calcularEcuacion($numero1,$numero2,$numero3);
        }
        function calcularEcuacion($a, $b, $c) {
            $discriminante = $b * $b - 4 * $a * $c;   
            if ($discriminante < 0) {
                return "No hay raíces reales.";
            } else {
                $raiz_discriminante = sqrt($discriminante);
                $x1 = (-$b + $raiz_discriminante) / (2 * $a);
                $x2 = (-$b - $raiz_discriminante) / (2 * $a);
                return "x1 = " . $x1 . ", x2 = " . $x2;
            }
        }
        ?>
    </form>
</body>
</html>