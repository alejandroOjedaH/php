<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
if(isset($_REQUEST["comprar"])){
    echo $_REQUEST["comprar"];
}