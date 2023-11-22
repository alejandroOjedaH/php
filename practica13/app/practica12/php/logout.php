<?php
session_start();
if ($_SESSION["logeado"]!=true){
    header("Location: ../index.php");
    die;
}
if(session_destroy()){
    echo "La sesion se cerro con exito";
}else{
    echo "No se puedo cerrar la sesion";
}

echo "<br><a href=\"../index.php\">Volver al login</a>";
