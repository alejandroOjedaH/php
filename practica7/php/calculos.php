<!--3) En calculos.php tendrás un formulario que 
permitirá introducir dos operandos y una operación aritmética 
a elegir (+,-,*,/) mediante un componente html SELECT.*/
-->
<html>
<body>
    <form action="resolucion.php" method="get">
        <label for="numero1">Primer numero:</label>
        <input type="number" id="numero1" name="numero1"><br>
        <label for="numero2">Segundo numero:</label>
        <input type="number" id="numero2" name="numero2"><br>
        <label for="operador">Operador Aritmético:</label>
        <select name="operador" id="operador">
            <option value="+">Sumar</option>
            <option value="-">Restar</option>
            <option value="*">Multiplicar</option>
            <option value="/">Dividir</option>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
    session_start();
    if (isset($_SESSION["resultado"])){
        echo "El resultado de la operacion es: ".$_SESSION["resultado"];
    }
    ?>
</body>
</html>