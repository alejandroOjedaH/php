<?php
session_start();
if ($_SESSION["logeado"]==true){
    header("Location: ../index.php");
    die;
}
session_destroy();

header("Location: ../index.php");
die;