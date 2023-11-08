<?php
use GestorUsuario\GestorUsuario;
include_once "GestorUsuario.php";
$servername = "localhost";
$username = "root";
$password = "";
$gestorUsuario;
session_start();

try {
    $con = new PDO("mysql:host=$servername;dbname=tienda", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $gestorUsuario = new GestorUsuario($con);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
if(isset($_REQUEST["usuario"]) && isset($_REQUEST["contrasenna"])){
    foreach($gestorUsuario->getUsuario($_REQUEST["usuario"], $_REQUEST["contrasenna"]) as $row){
        if(isset($row["correo"]) && isset($row["clave"])){
            $_SESSION["correo"] = $row["correo"];
            $_SESSION["clave"] = $row["clave"];
            $_SESSION["logeado"] = true;
            header("Location: ./categoria.php");
            die;
        }
    }
}
header("Location: ../index.php");
die;
