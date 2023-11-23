<?php

class categoriasmodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->validarSesion();
        $this->bd = new Db();
    }

    private function validarSesion(){
        session_start();
        if ($_SESSION["logeado"]!=true){
            header("Location: ../index.php");
            die;
        }
    }
}
