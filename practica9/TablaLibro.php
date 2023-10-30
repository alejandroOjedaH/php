<?php
use GestorLibro\GestorLibro;
include "GestorLibro.php";

$servername = "localhost";
$username = "root";
$password = "";
echo " <link rel=\"stylesheet\" href=\"style.css\">";

try {
    $gestorLibro = null;
    $con = new PDO("mysql:host=$servername;dbname=phpmyadmin", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $gestorLibro = new GestorLibro($con);
    echo "<table>";
    foreach ($gestorLibro-> table() as $row) {
        echo "<tr>";
        echo "<td>";
        print $row['nombre'] . "\t";
        print $row['pag_num'] . "\t";
        print $row['fecha_publicacion'] . "\t";
        print $row['leido'] . "<br>";
        echo "</td>";
        echo "<td>";
        echo "<a href=\"./EliminarFila.php?id=".$row['id']."\">Borrar</a>";
        echo "</td>";
        echo "<td>";
        echo "<a href=\"./ModificarFila.php?id=".$row['id']."&nombre=".$row['nombre']."&pag=".$row['pag_num']."&fecha=".$row['fecha_publicacion']."&leido=".$row['leido']."\">Modificar</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}