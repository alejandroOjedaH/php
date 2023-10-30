<?php
use GestorLibro\GestorLibro;
use Libro\Libro;
include "GestorLibro.php";
include "Libro.php";
$id = $_REQUEST["id"];
$nombre =$_REQUEST["nombre"];
$pag=$_REQUEST["pag"];
$fecha=$_REQUEST["fecha"];
$leido=$_REQUEST["leido"];
$servername = "localhost";
$username = "root";
$password = "";
$bd;
$libro;

echo "<form method=\"get\" action=\"\"><br>";
echo "<label>Nombre</label><input type=\"text\" id=\"nombre\"  name=\"nombre\" value=\"".$nombre."\"><br>";
echo "<label>Paginas</label><input type=\"number\" id=\"pag\" name=\"pag\" value=\"".$pag."\"><br>";
echo "<label>Fecha</label><input type=\"datetime\" id=\"fecha\" name=\"fecha\" value=\"".$fecha."\"><br>";
echo "<label>Leido</label><input type=\"number\" id=\"leido\" name=\"leido\" value=\"".$leido."\"><br>";
echo "<input type=\"hidden\" name=\"id\" value=\"".$id."\"><br>";
echo "<input type=\"submit\" name=\"Cambiar\" value=\"Cambiar\"><br>";
echo "</form>";

$libro = new Libro($nombre, $pag, new DateTime($fecha), $leido);

try {
    $con = new PDO("mysql:host=$servername;dbname=phpmyadmin", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $bd = new GestorLibro($con);

    $bd->update($libro,$id);
    echo "Modified successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

