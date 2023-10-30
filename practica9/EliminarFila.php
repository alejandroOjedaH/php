<?php
use GestorLibro\GestorLibro;
include "GestorLibro.php";
$id = $_REQUEST["id"];
$servername = "localhost";
$username = "root";
$password = "";
$bd;

try {
    $con = new PDO("mysql:host=$servername;dbname=phpmyadmin", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bd = new GestorLibro($con);

    $bd->delete($id);
    echo "Deleted successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

