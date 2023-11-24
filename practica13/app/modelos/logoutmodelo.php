<?php

class logoutmodelo{ 
    
    public function __construct()
    {
        session_start();
        if ($_SESSION["logeado"]!=true){
            header("Location: ".RUTA_URL);
            die;
        }
    }

    public function desLogear(){
        if(session_destroy()){
            return ['deslogeado'=>true];
        }else{
            return ['deslogeado'=>false];
        }
    }
}
