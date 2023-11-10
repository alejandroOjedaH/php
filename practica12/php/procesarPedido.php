<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}