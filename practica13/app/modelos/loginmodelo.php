<?php

class loginmodelo{ 
    private $bd;
    
    public function __construct()
    {
        $this->bd = new Db();
    }

    public function validarlogin(){
        session_start();
        if(isset($_REQUEST["usuario"]) && isset($_REQUEST["contrasenna"])){
            $this->bd->query("select correo, clave from restaurante where correo ='".$_REQUEST["usuario"]."' and clave = '".$_REQUEST["contrasenna"]."'");
            foreach($this->bd->registros() as $row){
                if(isset($row["correo"]) && isset($row["clave"])){
                    $_SESSION["username"] = $row["correo"];
                    $_SESSION["clave"] = $row["clave"];
                    $_SESSION["logeado"] = true;
                    $_SESSION["carrito"] = [];
                    return true;
                }
            }
        }
        return false;
    }
}
