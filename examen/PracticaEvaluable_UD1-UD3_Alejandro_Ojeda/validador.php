<?php
use GestorUsuario\GestorUsuario;
include_once "php\GestorUsuario.php";
$servername = "localhost";
$username = "root";
$password = "";
$gestorUsuario;
session_start();
$_SESSION["logs"] = [];
$row;

try {
    $con = new PDO("mysql:host=$servername;dbname=gestormascotas", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $gestorUsuario = new GestorUsuario($con);
    

    if(isset($_REQUEST["usuario"]) && isset($_REQUEST["contrasenna"])){
        foreach ($gestorUsuario ->getUsuario($_REQUEST["usuario"]) as $linea) {
            $row =$linea;
        }
        if($row){
            if($_REQUEST["usuario"] == $row["username"] && $_REQUEST["contrasenna"]==$row["password"]){
                $_SESSION["username"] = $_REQUEST["usuario"];
                $_SESSION["password"] = $_REQUEST["password"];
                header("Location: ./php/ListadoMascotas.php");
                die;
            }
            else{
                header("Location: index.php");
                die;
            }
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
